<footer class="site-footer">
  <div class="container">
    <div class="footer-main">
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
          <div class="logo-shield">🛡</div>
          <?php bloginfo('name'); ?>
        </a>
        <p>Türkiye'nin güvenilir sigorta platformu. Hızlı teklif, anlık poliçe, 7/24 destek.</p>
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
          <li><a href="#sss">SSS</a></li>
          <li><a href="#hasar">Hasar Bildirimi</a></li>
          <li><a href="#iletisim">İletişim</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>İletişim</h4>
        <ul>
          <li><a href="tel:08500000000">0850 000 0 000</a></li>
          <li><a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>"><?php echo antispambot(get_option('admin_email')); ?></a></li>
          <li style="color:rgba(255,255,255,0.35);font-size:0.83rem;">Levent, İstanbul</li>
          <li style="color:rgba(255,255,255,0.35);font-size:0.83rem;">7/24 Hasar Hattı Açık</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="footer-copy">&copy; <?php echo date('Y'); ?>, Tepe Trafik - <a href="https://underlineclick.com/agency/" target="_blank" rel="noopener">UnderlineClick</a></span>
    </div>
  </div>
</footer>

<button id="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Yukarı çık">&#8593;</button>

<style>
#scroll-top {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  width: 42px;
  height: 42px;
  background: var(--blue);
  color: #fff;
  border: none;
  border-radius: 3px;
  font-size: 1.1rem;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.25s, visibility 0.25s, background 0.2s;
  z-index: 999;
  display: flex;
  align-items: center;
  justify-content: center;
}
#scroll-top.show { opacity: 1; visibility: visible; }
#scroll-top:hover { background: var(--blue-h); }
</style>

<script>
var btn = document.getElementById('scroll-top');
window.addEventListener('scroll', function() {
  btn.classList.toggle('show', window.scrollY > 400);
});
</script>

<?php wp_footer(); ?>
</body>
</html>
