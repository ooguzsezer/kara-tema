<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="top-bar">
  <div class="container">
    <div class="top-bar__left">
      <a href="mailto:<?php echo antispambot( tp('email', get_option('admin_email')) ); ?>">
        📧 <?php echo antispambot( tp('email', get_option('admin_email')) ); ?>
      </a>
      <span><?php echo tp('calisma_saatleri','Pzt–Cum 09:00–18:00'); ?></span>
    </div>
    <div class="top-bar__right">
      <a href="tel:<?php echo preg_replace('/[^0-9]/', '', tp('telefon','08500000000')); ?>">
        📞 <?php echo tp('telefon','0850 000 0 000'); ?>
      </a>
      <span>7/24 Hasar Hattı</span>
    </div>
  </div>
</div>

<header class="site-header">
  <div class="container">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <div class="logo-shield">🛡</div>
        <?php echo tp('site_adi', get_bloginfo('name')); ?>
      <?php endif; ?>
      <?php if ( tp('logo_text') ) : ?>
        <span class="logo-slogan"><?php echo tp('logo_text'); ?></span>
      <?php endif; ?>
    </a>

    <nav class="site-nav">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'fallback_cb'    => function() {
            echo '<ul>
              <li><a href="#urunler">Ürünler</a></li>
              <li><a href="#neden-biz">Hakkımızda</a></li>
              <li><a href="#hasar">Hasar</a></li>
              <li><a href="#sss">SSS</a></li>
              <li><a href="#iletisim">İletişim</a></li>
            </ul>';
          },
        ]);
      ?>
    </nav>

    <div class="header-btn">
      <a href="#hasar"   class="btn btn--outline">Hasar Bildir</a>
      <a href="#urunler" class="btn btn--blue"><?php echo tp('hero_buton1','Teklif Al'); ?></a>
    </div>
  </div>
</header>
