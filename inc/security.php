<?php

/* ── WordPress versiyonunu gizle ────────────────────── */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/* ── Feed versiyonunu gizle ─────────────────────────── */
add_filter( 'feed_links_show_posts_feed',    '__return_false' );
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/* ── XML-RPC kapat ──────────────────────────────────── */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', function( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );

/* ── REST API — sadece giriş yapanlara ──────────────── */
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) return $result;
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'REST API sadece yetkili kullanıcılara açıktır.', [ 'status' => 401 ] );
    }
    return $result;
} );

/* ── Yazar slug'larını kullanıcı adından gizle ──────── */
add_filter( 'author_rewrite_rules', '__return_empty_array' );
add_action( 'template_redirect', function() {
    if ( is_author() ) {
        wp_redirect( home_url('/'), 301 );
        exit;
    }
} );

/* ── Güvenlik başlıkları ─────────────────────────────── */
add_action( 'send_headers', function() {
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1; mode=block' );
    header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
} );

/* ── Login hata mesajlarını maskele ─────────────────── */
add_filter( 'login_errors', function() {
    return 'Kullanıcı adı veya şifre hatalı.';
} );

/* ── Dosya düzenleyiciyi devre dışı bırak ───────────── */
if ( ! defined('DISALLOW_FILE_EDIT') ) {
    define( 'DISALLOW_FILE_EDIT', true );
}

/* ── Yorum spam koruması ────────────────────────────── */
add_filter( 'comment_flood_filter', '__return_true' );

/* ── Gereksiz wp-embed kaldır ───────────────────────── */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/* ── Brute-force: ardışık başarısız giriş sayacı ────── */
add_action( 'wp_login_failed', function( $username ) {
    $ip  = $_SERVER['REMOTE_ADDR'] ?? '';
    $key = 'tp_login_fail_' . md5( $ip );
    $cnt = (int) get_transient( $key );
    set_transient( $key, $cnt + 1, 15 * MINUTE_IN_SECONDS );
} );

add_filter( 'authenticate', function( $user, $username, $password ) {
    $ip  = $_SERVER['REMOTE_ADDR'] ?? '';
    $key = 'tp_login_fail_' . md5( $ip );
    if ( (int) get_transient( $key ) >= 5 ) {
        return new WP_Error( 'too_many_retries', '15 dakika bekleyin ve tekrar deneyin.' );
    }
    return $user;
}, 30, 3 );
