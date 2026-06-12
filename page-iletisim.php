<?php
/* Template Name: İletişim Sayfası */
get_header();
?>

<div class="page-wrap">
  <div class="container">

    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
      <span>/</span>
      <span>İletişim</span>
    </nav>

    <h1 class="page-title">Bize Ulaşın</h1>

    <div class="iletisim-grid">

      <!-- Form -->
      <div>
        <h2 style="font-size:1.1rem;margin-bottom:1.5rem;color:var(--text);">Mesaj Gönderin</h2>
        <?php echo do_shortcode('[kara_iletisim]'); ?>
      </div>

      <!-- Bilgi + Harita -->
      <div>
        <h2 style="font-size:1.1rem;margin-bottom:1.5rem;color:var(--text);">İletişim Bilgileri</h2>

        <div class="iletisim-bilgi">
          <div class="ib-row">
            <span class="ib-icon">📞</span>
            <div>
              <p class="ci-label">Müşteri Hizmetleri</p>
              <p class="ci-value"><a href="tel:08500000000">0850 000 0 000</a></p>
            </div>
          </div>
          <div class="ib-row">
            <span class="ib-icon">📧</span>
            <div>
              <p class="ci-label">E-posta</p>
              <p class="ci-value"><a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>"><?php echo antispambot(get_option('admin_email')); ?></a></p>
            </div>
          </div>
          <div class="ib-row">
            <span class="ib-icon">📍</span>
            <div>
              <p class="ci-label">Adres</p>
              <p class="ci-value">Levent, İstanbul, Türkiye</p>
            </div>
          </div>
          <div class="ib-row">
            <span class="ib-icon">🕐</span>
            <div>
              <p class="ci-label">Çalışma Saatleri</p>
              <p class="ci-value">Pzt–Cum 09:00–18:00</p>
              <p style="font-size:0.8rem;color:var(--muted);">Hasar hattı 7/24 açık</p>
            </div>
          </div>
        </div>

        <!-- Google Harita -->
        <div class="iletisim-harita">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.5!2d29.01!3d41.08!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zLevent%2C%20%C4%B0stanbul!5e0!3m2!1str!2str!4v1234567890"
            width="100%"
            height="240"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
.iletisim-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  margin-top: 1rem;
}

.iletisim-bilgi { display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 1.5rem; }

.ib-row {
  display: flex;
  gap: 1rem;
  align-items: flex-start;
}

.ib-icon {
  font-size: 1rem;
  width: 36px; height: 36px;
  background: #eef2fb;
  border-radius: 3px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}

.iletisim-harita {
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
}

@media (max-width: 768px) {
  .iletisim-grid { grid-template-columns: 1fr; gap: 2.5rem; }
}
</style>

<?php get_footer(); ?>
