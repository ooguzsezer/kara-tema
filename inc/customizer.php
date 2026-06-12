<?php

function tepetrafik_customizer( $wp_customize ) {

    /* ── Panel ──────────────────────────────────────── */
    $wp_customize->add_panel( 'tepetrafik_panel', [
        'title'    => 'Tepetrafik Ayarları',
        'priority' => 30,
    ] );

    /* ── Bölüm: İletişim Bilgileri ──────────────────── */
    $wp_customize->add_section( 'tepetrafik_iletisim', [
        'title' => 'İletişim Bilgileri',
        'panel' => 'tepetrafik_panel',
    ] );

    $alanlar = [
        'telefon'          => [ 'Telefon Numarası',    '0850 000 0 000' ],
        'hasar_telefon'    => [ 'Hasar Hattı',         '0850 000 0 000' ],
        'email'            => [ 'E-posta',              'info@tepetrafik.com' ],
        'adres'            => [ 'Adres',                'Levent, İstanbul, Türkiye' ],
        'calisma_saatleri' => [ 'Çalışma Saatleri',    'Pzt–Cum 09:00–18:00' ],
        'ruhsat_no'        => [ 'Ruhsat Numarası',      'XXXX' ],
    ];

    foreach ( $alanlar as $key => $info ) {
        $wp_customize->add_setting( "tepetrafik_{$key}", [
            'default'           => $info[1],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( "tepetrafik_{$key}", [
            'label'   => $info[0],
            'section' => 'tepetrafik_iletisim',
            'type'    => 'text',
        ] );
    }

    /* ── Bölüm: Renk Ayarları ───────────────────────── */
    $wp_customize->add_section( 'tepetrafik_renkler', [
        'title' => 'Renk Ayarları',
        'panel' => 'tepetrafik_panel',
    ] );

    $renkler = [
        'ana_renk'    => [ 'Ana Renk (Mavi)',    '#1a4f9e' ],
        'koyu_renk'   => [ 'Koyu Renk (Footer)', '#1b2a4a' ],
    ];

    foreach ( $renkler as $key => $info ) {
        $wp_customize->add_setting( "tepetrafik_{$key}", [
            'default'           => $info[1],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, "tepetrafik_{$key}", [
                'label'   => $info[0],
                'section' => 'tepetrafik_renkler',
            ] )
        );
    }

    /* ── Bölüm: Hero Metinleri ──────────────────────── */
    $wp_customize->add_section( 'tepetrafik_hero', [
        'title' => 'Ana Sayfa Hero',
        'panel' => 'tepetrafik_panel',
    ] );

    $hero_alanlar = [
        'hero_baslik' => [ 'Başlık',      'Güvenilir Sigorta Çözümleri, Hızlı Teklif',  'textarea' ],
        'hero_aciklama' => [ 'Açıklama',  'Araç, konut, sağlık ve işyeri sigortalarında en uygun teklifi karşılaştırın.', 'textarea' ],
    ];

    foreach ( $hero_alanlar as $key => $info ) {
        $wp_customize->add_setting( "tepetrafik_{$key}", [
            'default'           => $info[1],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( "tepetrafik_{$key}", [
            'label'   => $info[0],
            'section' => 'tepetrafik_hero',
            'type'    => $info[2],
        ] );
    }
}
add_action( 'customize_register', 'tepetrafik_customizer' );


/* ── CSS değişkenlerini dinamik yaz ─────────────────── */
function tepetrafik_customizer_css() {
    $mavi  = get_theme_mod( 'tepetrafik_ana_renk',  '#1a4f9e' );
    $koyu  = get_theme_mod( 'tepetrafik_koyu_renk', '#1b2a4a' );
    echo "<style>:root{--blue:{$mavi};--bg-dark:{$koyu};}</style>";
}
add_action( 'wp_head', 'tepetrafik_customizer_css' );


/* ── Yardımcı: ayar değeri al ───────────────────────── */
function tp( $key, $default = '' ) {
    return esc_html( get_theme_mod( "tepetrafik_{$key}", $default ) );
}
