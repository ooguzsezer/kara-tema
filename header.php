<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
      <div class="logo-icon">🛡</div>
      <?php bloginfo('name'); ?><span class="logo-dot">.</span>
    </a>

    <nav class="site-nav" aria-label="Ana Menü">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'fallback_cb'    => function() {
            echo '<ul>
              <li><a href="#urunler">Ürünler</a></li>
              <li><a href="#neden-biz">Neden Biz?</a></li>
              <li><a href="#hasar">Hasar</a></li>
              <li><a href="#sss">SSS</a></li>
              <li><a href="#iletisim">İletişim</a></li>
            </ul>';
          },
        ]);
      ?>
    </nav>

    <div class="header-cta">
      <div class="header-phone">
        <strong>0850 000 0 000</strong>
        7/24 Destek
      </div>
      <a href="#urunler" class="btn btn--gold">Teklif Al</a>
    </div>
  </div>
</header>
