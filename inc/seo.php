<?php

/* ── Temel meta tags ─────────────────────────────────── */
function tepetrafik_meta_tags() {
    global $post;

    $site_adi   = get_bloginfo('name');
    $site_desc  = get_bloginfo('description');
    $site_url   = home_url('/');
    $telefon    = tp('telefon', '0850 000 0 000');
    $adres      = tp('adres', 'İstanbul, Türkiye');

    if ( is_singular() && isset($post) ) {
        $baslik     = get_the_title() . ' – ' . $site_adi;
        $aciklama   = wp_strip_all_tags( get_the_excerpt() ?: wp_trim_words( get_the_content(), 20 ) );
        $url        = get_permalink();
        $gorsel     = get_the_post_thumbnail_url( $post->ID, 'large' ) ?: get_template_directory_uri() . '/assets/og-default.png';
        $tip        = 'article';
        $yayinlanma = get_the_date('c');
        $guncelleme = get_the_modified_date('c');
    } else {
        $baslik     = $site_adi . ( $site_desc ? ' – ' . $site_desc : '' );
        $aciklama   = $site_desc ?: tp('hero_aciklama', 'Güvenilir sigorta çözümleri.');
        $url        = $site_url;
        $gorsel     = get_template_directory_uri() . '/assets/og-default.png';
        $tip        = 'website';
        $yayinlanma = '';
        $guncelleme = '';
    }

    $baslik   = apply_filters( 'tepetrafik_seo_title',  $baslik );
    $aciklama = apply_filters( 'tepetrafik_seo_desc',   $aciklama );
    $gorsel   = apply_filters( 'tepetrafik_og_image',   $gorsel );
    $robots   = apply_filters( 'tepetrafik_robots',     'index, follow' );

    $aciklama = esc_attr( wp_trim_words( $aciklama, 25 ) );
    $baslik   = esc_attr( $baslik );
    $url      = esc_url( $url );
    $gorsel   = esc_url( $gorsel );
    ?>
<!-- SEO Meta -->
<meta name="description"        content="<?php echo $aciklama; ?>">
<meta name="robots"             content="<?php echo esc_attr($robots); ?>">
<link rel="canonical"           href="<?php echo $url; ?>">

<!-- Open Graph -->
<meta property="og:type"        content="<?php echo $tip; ?>">
<meta property="og:title"       content="<?php echo $baslik; ?>">
<meta property="og:description" content="<?php echo $aciklama; ?>">
<meta property="og:url"         content="<?php echo $url; ?>">
<meta property="og:image"       content="<?php echo $gorsel; ?>">
<meta property="og:site_name"   content="<?php echo esc_attr($site_adi); ?>">
<meta property="og:locale"      content="tr_TR">
<?php if ( $yayinlanma ) : ?>
<meta property="article:published_time" content="<?php echo esc_attr($yayinlanma); ?>">
<meta property="article:modified_time"  content="<?php echo esc_attr($guncelleme); ?>">
<?php endif; ?>

<!-- Twitter Card -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="<?php echo $baslik; ?>">
<meta name="twitter:description" content="<?php echo $aciklama; ?>">
<meta name="twitter:image"       content="<?php echo $gorsel; ?>">

<!-- Performans -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action( 'wp_head', 'tepetrafik_meta_tags', 1 );


/* ── WP varsayılan <title> tag'ini kapat ─────────────── */
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
add_action(    'wp_head', 'tepetrafik_title_tag',  1 );

function tepetrafik_title_tag() {
    global $post;
    $site = get_bloginfo('name');

    if      ( is_singular() )     $t = get_the_title() . ' – ' . $site;
    elseif  ( is_home() )         $t = $site . ' – ' . get_bloginfo('description');
    elseif  ( is_category() )     $t = single_cat_title('',false) . ' – ' . $site;
    elseif  ( is_tag() )          $t = single_tag_title('',false) . ' – ' . $site;
    elseif  ( is_search() )       $t = '"' . get_search_query() . '" Arama – ' . $site;
    elseif  ( is_404() )          $t = 'Sayfa Bulunamadı – ' . $site;
    else                          $t = $site;

    echo '<title>' . esc_html($t) . "</title>\n";
}


/* ── Schema.org — Sigorta Acentesi ──────────────────── */
function tepetrafik_schema() {
    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'InsuranceAgency',
        'name'            => get_bloginfo('name'),
        'url'             => home_url('/'),
        'description'     => tp('hero_aciklama', get_bloginfo('description')),
        'telephone'       => tp('telefon', '0850 000 0 000'),
        'email'           => tp('email', get_option('admin_email')),
        'address'         => [
            '@type'           => 'PostalAddress',
            'addressLocality' => tp('adres', 'İstanbul'),
            'addressCountry'  => 'TR',
        ],
        'openingHours'    => 'Mo-Fr 09:00-18:00',
        'areaServed'      => 'TR',
        'priceRange'      => '₺₺',
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'Sigorta Ürünleri',
            'itemListElement' => [
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'Trafik Sigortası']],
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'Kasko']],
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'Konut Sigortası']],
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'Sağlık Sigortası']],
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'Seyahat Sigortası']],
                ['@type'=>'Offer','itemOffered'=>['@type'=>'Service','name'=>'İş Yeri Sigortası']],
            ],
        ],
    ];

    $logo_id = get_theme_mod( 'custom_logo' );
    if ( $logo_id ) {
        $logo = wp_get_attachment_image_src( $logo_id, 'full' );
        if ( $logo ) $schema['logo'] = $logo[0];
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
}
add_action( 'wp_head', 'tepetrafik_schema' );


/* ── FAQ Schema ──────────────────────────────────────── */
function tepetrafik_faq_schema() {
    if ( ! is_front_page() && ! is_page() ) return;

    $faq_items = [
        [ 'q' => 'Trafik sigortası ile kasko arasındaki fark nedir?',
          'a' => 'Trafik sigortası karşı tarafa verilen zararları karşılayan zorunlu bir sigortadır. Kasko ise kendi aracınıza gelen hasarları teminat altına alan isteğe bağlı bir sigorta türüdür.' ],
        [ 'q' => 'Poliçemi ne kadar sürede alabilirim?',
          'a' => 'Bilgilerinizi girdikten sonra ortalama 3 dakika içinde teklifinizi alabilirsiniz. Ödeme sonrası poliçeniz anında e-posta adresinize iletilir.' ],
        [ 'q' => 'Hasar bildirimini online yapabilir miyim?',
          'a' => 'Evet. Hasar bildiriminizi site, mobil uygulama veya 7/24 hasar hattı aracılığıyla yapabilirsiniz.' ],
        [ 'q' => 'Taksitle ödeme seçeneği var mı?',
          'a' => 'Kredi kartıyla 3–12 taksit imkânı mevcuttur. Taksit seçenekleri sigorta türü ve anlaşmalı bankaya göre farklılık gösterebilir.' ],
    ];

    $entities = [];
    foreach ( $faq_items as $item ) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $item['q'],
            'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $item['a'] ],
        ];
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
}
add_action( 'wp_head', 'tepetrafik_faq_schema' );


/* ── BreadcrumbList Schema ───────────────────────────── */
function tepetrafik_breadcrumb_schema() {
    if ( is_front_page() ) return;

    $items = [
        [ 'id' => 1, 'name' => 'Ana Sayfa', 'url' => home_url('/') ],
    ];

    if ( is_singular() ) {
        if ( is_single() ) {
            $cat = get_the_category();
            if ( $cat ) {
                $items[] = [ 'id' => 2, 'name' => $cat[0]->name, 'url' => get_category_link($cat[0]->term_id) ];
                $items[] = [ 'id' => 3, 'name' => get_the_title(), 'url' => get_permalink() ];
            } else {
                $items[] = [ 'id' => 2, 'name' => get_the_title(), 'url' => get_permalink() ];
            }
        } else {
            $items[] = [ 'id' => 2, 'name' => get_the_title(), 'url' => get_permalink() ];
        }
    } elseif ( is_category() ) {
        $items[] = [ 'id' => 2, 'name' => single_cat_title('', false), 'url' => get_category_link(get_queried_object_id()) ];
    } elseif ( is_search() ) {
        $items[] = [ 'id' => 2, 'name' => 'Arama: ' . get_search_query(), 'url' => get_search_link() ];
    }

    $list = [];
    foreach ( $items as $item ) {
        $list[] = [
            '@type'    => 'ListItem',
            'position' => $item['id'],
            'name'     => $item['name'],
            'item'     => $item['url'],
        ];
    }

    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $list,
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
}
add_action( 'wp_head', 'tepetrafik_breadcrumb_schema' );


/* ── WP gereksiz head temizliği ─────────────────────── */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
