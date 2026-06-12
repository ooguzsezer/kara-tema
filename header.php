<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
      <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            bloginfo( 'name' );
        }
      ?>
    </a>

    <nav class="site-nav" aria-label="Ana Menü">
      <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'fallback_cb'    => function() {
                echo '<ul>
                  <li><a href="#hizmetler">Hizmetler</a></li>
                  <li><a href="#hakkimizda">Hakkımızda</a></li>
                  <li><a href="#iletisim">İletişim</a></li>
                </ul>';
            },
        ] );
      ?>
    </nav>
  </div>
</header>
