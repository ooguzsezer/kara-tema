<?php

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/meta-fields.php';
require_once get_template_directory() . '/inc/sitemap.php';
require_once get_template_directory() . '/inc/security.php';

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


/* ── Form rate limiting: IP başına 5 dakikada 1 gönderim ── */
function kara_form_rate_ok( string $form_id ): bool {
    $ip  = $_SERVER['REMOTE_ADDR'] ?? '';
    $key = 'tp_form_' . $form_id . '_' . md5( $ip );
    if ( get_transient( $key ) ) return false;
    set_transient( $key, 1, 5 * MINUTE_IN_SECONDS );
    return true;
}


function kara_teklif_shortcode( $atts ) {
    ob_start(); ?>
    <form class="quote-form" method="post" action="">
        <?php wp_nonce_field( 'kara_teklif', 'kara_teklif_nonce' ); ?>
        <div style="display:none!important" aria-hidden="true">
            <input type="text" name="kara_website" value="" tabindex="-1" autocomplete="off">
        </div>
        <label>Sigorta Türü</label>
        <select name="kara_tur" required>
            <option value="" disabled selected>Seçiniz...</option>
            <option value="trafik">🚗 Trafik Sigortası</option>
            <option value="kasko">🛡️ Kasko</option>
            <option value="konut">🏠 Konut Sigortası</option>
            <option value="saglik">❤️ Sağlık Sigortası</option>
            <option value="seyahat">✈️ Seyahat Sigortası</option>
            <option value="iş-yeri">🏢 İş Yeri Sigortası</option>
        </select>
        <label>Ad Soyad</label>
        <input type="text"  name="kara_ad"    placeholder="Adınız Soyadınız" required>
        <label>Telefon</label>
        <input type="tel"   name="kara_tel"   placeholder="05XX XXX XX XX"   required>
        <label>E-posta</label>
        <input type="email" name="kara_email" placeholder="ornek@mail.com"   required>
        <button type="submit" class="btn btn--gold">Ücretsiz Teklif Al →</button>
    </form>
    <p class="quote-disclaimer">Kişisel verileriniz KVKK kapsamında korunur.</p>
    <?php
    return ob_get_clean();
}
add_shortcode( 'kara_teklif_formu', 'kara_teklif_shortcode' );


function kara_contact_shortcode( $atts ) {
    ob_start(); ?>
    <form class="contact-form" method="post" action="">
        <?php wp_nonce_field( 'kara_contact', 'kara_contact_nonce' ); ?>
        <div style="display:none!important" aria-hidden="true">
            <input type="text" name="kara_website" value="" tabindex="-1" autocomplete="off">
        </div>
        <input type="text"     name="kara_ad"    placeholder="Adınız Soyadınız" required>
        <input type="email"    name="kara_email" placeholder="E-posta adresiniz" required>
        <input type="tel"      name="kara_tel"   placeholder="Telefon numaranız">
        <textarea              name="kara_mesaj" placeholder="Mesajınız..."      required></textarea>
        <button type="submit" class="btn btn--primary">Gönder</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'kara_iletisim', 'kara_contact_shortcode' );


function kara_handle_teklif() {
    if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) return;
    if ( empty( $_POST['kara_teklif_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['kara_teklif_nonce'], 'kara_teklif' ) ) return;
    if ( ! empty( $_POST['kara_website'] ) ) return;
    if ( ! kara_form_rate_ok( 'teklif' ) ) return;

    $allowed_tur = [ 'trafik', 'kasko', 'konut', 'saglik', 'seyahat', 'iş-yeri' ];
    $tur   = in_array( $_POST['kara_tur'] ?? '', $allowed_tur, true ) ? $_POST['kara_tur'] : '';
    $ad    = sanitize_text_field( $_POST['kara_ad']    ?? '' );
    $tel   = sanitize_text_field( $_POST['kara_tel']   ?? '' );
    $email = sanitize_email(      $_POST['kara_email'] ?? '' );

    if ( $tur && $ad && $tel && $email ) {
        wp_mail(
            get_option( 'admin_email' ),
            'Yeni Teklif Talebi: ' . $ad,
            "Sigorta Türü: $tur\nAd Soyad: $ad\nTelefon: $tel\nE-posta: $email",
            [ 'Reply-To: ' . $email ]
        );
    }
}
if ( ! is_admin() ) add_action( 'init', 'kara_handle_teklif' );


function kara_handle_contact() {
    if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) return;
    if ( empty( $_POST['kara_contact_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['kara_contact_nonce'], 'kara_contact' ) ) return;
    if ( ! empty( $_POST['kara_website'] ) ) return;
    if ( ! kara_form_rate_ok( 'contact' ) ) return;

    $ad    = sanitize_text_field(     $_POST['kara_ad']    ?? '' );
    $email = sanitize_email(          $_POST['kara_email'] ?? '' );
    $tel   = sanitize_text_field(     $_POST['kara_tel']   ?? '' );
    $mesaj = sanitize_textarea_field( $_POST['kara_mesaj'] ?? '' );

    if ( $ad && $email && $mesaj ) {
        $body  = "Ad: $ad\nE-posta: $email";
        $body .= $tel ? "\nTelefon: $tel" : '';
        $body .= "\n\n$mesaj";
        wp_mail(
            get_option( 'admin_email' ),
            'Yeni İletişim: ' . $ad,
            $body,
            [ 'Reply-To: ' . $email ]
        );
    }
}
if ( ! is_admin() ) add_action( 'init', 'kara_handle_contact' );
