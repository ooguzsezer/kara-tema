<footer class="site-footer">
  <div class="container">
    <span class="footer__copy">
      &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. Tüm hakları saklıdır.
    </span>

    <nav class="footer__nav" aria-label="Alt Menü">
      <?php
        wp_nav_menu( [
            'theme_location' => 'footer',
            'container'      => false,
            'fallback_cb'    => function() {
                echo '<ul>
                  <li><a href="#hizmetler">Hizmetler</a></li>
                  <li><a href="#iletisim">İletişim</a></li>
                </ul>';
            },
        ] );
      ?>
    </nav>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
