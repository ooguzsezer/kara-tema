<?php

/* ── /sitemap.xml rewrite kuralı ────────────────────── */
function tepetrafik_sitemap_rewrite() {
    add_rewrite_rule( '^sitemap\.xml$', 'index.php?tepetrafik_sitemap=1', 'top' );
}
add_action( 'init', 'tepetrafik_sitemap_rewrite' );


/* ── Query var ───────────────────────────────────────── */
function tepetrafik_sitemap_query_var( $vars ) {
    $vars[] = 'tepetrafik_sitemap';
    return $vars;
}
add_filter( 'query_vars', 'tepetrafik_sitemap_query_var' );


/* ── Sitemap çıktısı ─────────────────────────────────── */
function tepetrafik_sitemap_output() {
    if ( ! get_query_var('tepetrafik_sitemap') ) return;

    header( 'Content-Type: application/xml; charset=UTF-8' );
    header( 'X-Robots-Tag: noindex' );

    $urls = [];

    /* Ana sayfa */
    $urls[] = [
        'loc'        => home_url('/'),
        'lastmod'    => date('Y-m-d'),
        'changefreq' => 'daily',
        'priority'   => '1.0',
    ];

    /* Sayfalar */
    $pages = get_posts([
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    foreach ( $pages as $page ) {
        $noindex = get_post_meta( $page->ID, '_tp_noindex', true );
        if ( $noindex ) continue;
        $urls[] = [
            'loc'        => get_permalink( $page->ID ),
            'lastmod'    => date( 'Y-m-d', strtotime($page->post_modified) ),
            'changefreq' => 'weekly',
            'priority'   => '0.8',
        ];
    }

    /* Blog yazıları */
    $posts = get_posts([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    foreach ( $posts as $post ) {
        $noindex = get_post_meta( $post->ID, '_tp_noindex', true );
        if ( $noindex ) continue;
        $urls[] = [
            'loc'        => get_permalink( $post->ID ),
            'lastmod'    => date( 'Y-m-d', strtotime($post->post_modified) ),
            'changefreq' => 'monthly',
            'priority'   => '0.6',
        ];
    }

    /* Kategoriler */
    $cats = get_categories([ 'hide_empty' => true ]);
    foreach ( $cats as $cat ) {
        $urls[] = [
            'loc'        => get_category_link( $cat->term_id ),
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority'   => '0.5',
        ];
    }

    /* XML çıktısı */
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ( $urls as $u ) {
        echo "  <url>\n";
        echo '    <loc>'        . esc_url($u['loc'])          . "</loc>\n";
        echo '    <lastmod>'    . esc_html($u['lastmod'])      . "</lastmod>\n";
        echo '    <changefreq>' . esc_html($u['changefreq'])   . "</changefreq>\n";
        echo '    <priority>'   . esc_html($u['priority'])     . "</priority>\n";
        echo "  </url>\n";
    }

    echo '</urlset>';
    exit;
}
add_action( 'template_redirect', 'tepetrafik_sitemap_output' );


/* ── robots.txt kuralları + sitemap ─────────────────── */
add_filter( 'robots_txt', function( $output, $public ) {
    if ( ! $public ) return $output;

    $custom  = "User-agent: *\n";
    $custom .= "Disallow: /wp-admin/\n";
    $custom .= "Disallow: /wp-includes/\n";
    $custom .= "Disallow: /wp-login.php\n";
    $custom .= "Disallow: /?s=\n";
    $custom .= "Disallow: /search/\n";
    $custom .= "Allow: /wp-admin/admin-ajax.php\n";
    $custom .= "\nUser-agent: Googlebot\n";
    $custom .= "Allow: /\n";
    $custom .= "\nSitemap: " . home_url('/sitemap.xml') . "\n";

    return $custom;
}, 10, 2 );


/* ── Tema aktive edilince rewrite flush et ───────────── */
function tepetrafik_flush_rewrite() {
    tepetrafik_sitemap_rewrite();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tepetrafik_flush_rewrite' );
