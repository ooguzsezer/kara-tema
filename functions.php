<?php

function kara_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo' );

    register_nav_menus( [
        'primary' => 'Ana Menü',
        'footer'  => 'Alt Menü',
    ] );
}
add_action( 'after_setup_theme', 'kara_setup' );


function kara_enqueue() {
    wp_enqueue_style(
        'kara-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'kara-style',
        get_stylesheet_uri(),
        [ 'kara-fonts' ],
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'kara_enqueue' );


function kara_contact_shortcode( $atts ) {
    ob_start(); ?>
    <form class="contact-form" method="post" action="">
        <?php wp_nonce_field( 'kara_contact', 'kara_nonce' ); ?>
        <input type="text"     name="kara_ad"    placeholder="Adınız"         required>
        <input type="email"    name="kara_email" placeholder="E-posta"        required>
        <textarea              name="kara_mesaj" placeholder="Mesajınız..."   required></textarea>
        <button type="submit" class="btn btn--primary">Gönder</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'kara_iletisim', 'kara_contact_shortcode' );


function kara_handle_contact() {
    if ( empty( $_POST['kara_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['kara_nonce'], 'kara_contact' ) ) return;

    $ad     = sanitize_text_field( $_POST['kara_ad']    ?? '' );
    $email  = sanitize_email(      $_POST['kara_email'] ?? '' );
    $mesaj  = sanitize_textarea_field( $_POST['kara_mesaj'] ?? '' );

    if ( $ad && $email && $mesaj ) {
        wp_mail(
            get_option( 'admin_email' ),
            'Yeni İletişim: ' . $ad,
            "Ad: $ad\nE-posta: $email\n\n$mesaj",
            [ 'Reply-To: ' . $email ]
        );
    }
}
add_action( 'init', 'kara_handle_contact' );
