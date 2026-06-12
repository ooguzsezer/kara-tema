<footer class="site-footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" style="margin-bottom:0.75rem;display:inline-flex;">
          <div class="logo-icon">🛡</div>
          <?php bloginfo('name'); ?><span class="logo-dot">.</span>
        </a>
        <p>Türkiye'nin en hızlı sigorta karşılaştırma ve satın alma platformu. Güvenilir, şeffaf, anlık.</p>
      </div>

      <div class="footer-col">
        <h4>Ürünler</h4>
        <ul>
          <li><a href="#urunler">Trafik Sigortası</a></li>
          <li><a href="#urunler">Kasko</a></li>
          <li><a href="#urunler">Konut Sigortası</a></li>
          <li><a href="#urunler">Sağlık Sigortası</a></li>
          <li><a href="#urunler">Seyahat Sigortası</a></li>
          <li><a href="#urunler">İş Yeri Sigortası</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Kurumsal</h4>
        <ul>
          <li><a href="#neden-biz">Hakkımızda</a></li>
          <li><a href="#iletisim">İletişim</a></li>
          <li><a href="#sss">SSS</a></li>
          <li><a href="#hasar">Hasar Bildirimi</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>İletişim</h4>
        <ul>
          <li><a href="tel:08500000000">0850 000 0 000</a></li>
          <li><a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>"><?php echo antispambot(get_option('admin_email')); ?></a></li>
          <li style="color:var(--text-muted);font-size:0.875rem;">Levent, İstanbul</li>
          <li style="color:var(--text-muted);font-size:0.875rem;">7/24 Hasar Hattı Açık</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copy">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tüm hakları saklıdır.
        TOBB / Sigorta Acenteliği Ruhsat No: XXXX
      </p>
      <div class="footer-legal">
        <a href="#">Gizlilik Politikası</a>
        <a href="#">Kullanım Koşulları</a>
        <a href="#">KVKK</a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
