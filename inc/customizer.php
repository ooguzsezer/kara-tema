<?php

function tepetrafik_customizer( $wp_customize ) {

    /* ── Panel ──────────────────────────────────────── */
    $wp_customize->add_panel( 'tepetrafik_panel', [
        'title'    => 'Tepetrafik Ayarları',
        'priority' => 30,
    ] );

    /* ── Logo (WP yerleşik) ─────────────────────────── */
    $wp_customize->get_setting('custom_logo')->transport = 'refresh';

    /* ── Bölüm: Marka & Logo ────────────────────────── */
    $wp_customize->add_section( 'tepetrafik_marka', [
        'title' => 'Marka & Logo',
        'panel' => 'tepetrafik_panel',
    ] );

    $wp_customize->add_setting( 'tepetrafik_site_adi', [
        'default'           => 'Tepetrafik',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'tepetrafik_site_adi', [
        'label'       => 'Site Adı (Header)',
        'description' => 'Logo yoksa bu metin görünür.',
        'section'     => 'tepetrafik_marka',
        'type'        => 'text',
    ] );

    $wp_customize->add_setting( 'tepetrafik_logo_text', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'tepetrafik_logo_text', [
        'label'       => 'Logo Yanı Slogan',
        'description' => 'Opsiyonel — logo/site adının yanında küçük yazı.',
        'section'     => 'tepetrafik_marka',
        'type'        => 'text',
    ] );

    /* ── Bölüm: Renk Ayarları ───────────────────────── */
    $wp_customize->add_section( 'tepetrafik_renkler', [
        'title' => 'Renk Ayarları',
        'panel' => 'tepetrafik_panel',
    ] );

    $renkler = [
        'ana_renk'      => [ 'Ana Renk (Mavi)',       '#1a4f9e' ],
        'ana_renk_hover'=> [ 'Ana Renk Hover',         '#163f80' ],
        'koyu_renk'     => [ 'Koyu Renk (Hero/Footer)','#1b2a4a' ],
        'buton_renk'    => [ 'Hasar Butonu (Kırmızı)', '#c0392b' ],
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
        'whatsapp'         => [ 'WhatsApp Numarası',    '' ],
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

    /* ── Bölüm: Sosyal Medya ────────────────────────── */
    $wp_customize->add_section( 'tepetrafik_sosyal', [
        'title' => 'Sosyal Medya',
        'panel' => 'tepetrafik_panel',
    ] );

    $sosyal = [
        'facebook'  => 'Facebook URL',
        'instagram' => 'Instagram URL',
        'twitter'   => 'X (Twitter) URL',
        'linkedin'  => 'LinkedIn URL',
        'youtube'   => 'YouTube URL',
    ];

    foreach ( $sosyal as $key => $label ) {
        $wp_customize->add_setting( "tepetrafik_{$key}", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( "tepetrafik_{$key}", [
            'label'   => $label,
            'section' => 'tepetrafik_sosyal',
            'type'    => 'url',
        ] );
    }

    /* ── Bölüm: Hero Metinleri ──────────────────────── */
    $wp_customize->add_section( 'tepetrafik_hero', [
        'title' => 'Ana Sayfa Hero',
        'panel' => 'tepetrafik_panel',
    ] );

    $hero_alanlar = [
        'hero_baslik'    => [ 'Başlık',    'Güvenilir Sigorta Çözümleri, Hızlı Teklif' ],
        'hero_aciklama'  => [ 'Açıklama',  'Araç, konut, sağlık ve işyeri sigortalarında en uygun teklifi karşılaştırın.' ],
        'hero_buton1'    => [ 'Buton 1 Metni', 'Teklif Al' ],
        'hero_buton2'    => [ 'Buton 2 Metni', 'Bize Ulaşın' ],
    ];

    foreach ( $hero_alanlar as $key => $info ) {
        $wp_customize->add_setting( "tepetrafik_{$key}", [
            'default'           => $info[1],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( "tepetrafik_{$key}", [
            'label'   => $info[0],
            'section' => 'tepetrafik_hero',
            'type'    => 'text',
        ] );
    }

    /* ── Bölüm: Footer ──────────────────────────────── */
    $wp_customize->add_section( 'tepetrafik_footer', [
        'title' => 'Footer',
        'panel' => 'tepetrafik_panel',
    ] );

    $wp_customize->add_setting( 'tepetrafik_footer_aciklama', [
        'default'           => "Türkiye'nin güvenilir sigorta platformu. Hızlı teklif, anlık poliçe, 7/24 destek.",
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'tepetrafik_footer_aciklama', [
        'label'   => 'Footer Açıklaması',
        'section' => 'tepetrafik_footer',
        'type'    => 'textarea',
    ] );

    $wp_customize->add_setting( 'tepetrafik_telif', [
        'default'           => '© ' . date('Y') . ', Tepe Trafik - UnderlineClick',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'tepetrafik_telif', [
        'label'   => 'Telif Yazısı',
        'section' => 'tepetrafik_footer',
        'type'    => 'text',
    ] );
}
add_action( 'customize_register', 'tepetrafik_customizer' );


/* ── CSS değişkenlerini dinamik yaz ─────────────────── */
function tepetrafik_customizer_css() {
    $mavi   = get_theme_mod( 'tepetrafik_ana_renk',       '#1a4f9e' );
    $hover  = get_theme_mod( 'tepetrafik_ana_renk_hover',  '#163f80' );
    $koyu   = get_theme_mod( 'tepetrafik_koyu_renk',       '#1b2a4a' );
    $kirmizi= get_theme_mod( 'tepetrafik_buton_renk',      '#c0392b' );
    echo "<style>:root{--blue:{$mavi};--blue-h:{$hover};--bg-dark:{$koyu};--red:{$kirmizi};}</style>\n";
}
add_action( 'wp_head', 'tepetrafik_customizer_css' );


/* ── Yardımcı: ayar değeri al ───────────────────────── */
function tp( $key, $default = '' ) {
    return esc_html( get_theme_mod( "tepetrafik_{$key}", $default ) );
}

/* ── Sosyal medya ikonları footer için ──────────────── */
function tepetrafik_sosyal_ikonlar() {
    $linkler = [
        'facebook'  => ['Facebook',  'f'],
        'instagram' => ['Instagram', '📷'],
        'twitter'   => ['X',         '𝕏'],
        'linkedin'  => ['LinkedIn',  'in'],
        'youtube'   => ['YouTube',   '▶'],
    ];
    $html = '';
    foreach ( $linkler as $key => $info ) {
        $url = get_theme_mod( "tepetrafik_{$key}", '' );
        if ( $url ) {
            $html .= '<a href="' . esc_url($url) . '" target="_blank" rel="noopener" class="sosyal-icon" title="' . esc_attr($info[0]) . '">' . $info[1] . '</a>';
        }
    }
    return $html;
}
