<?php get_header(); ?>

<!-- ── Hero ─────────────────────────────────────── -->
<section class="hero">
  <div class="container">
    <p class="hero__label">Kurumsal Çözümler</p>
    <h1 class="hero__title">
      <?php bloginfo( 'description' ); ?>
    </h1>
    <p class="hero__desc">
      Markanızı büyütmek için ihtiyacınız olan her şey tek çatı altında.
    </p>
    <div class="hero__actions">
      <a href="#hizmetler" class="btn btn--primary">Hizmetlerimiz</a>
      <a href="#iletisim"  class="btn btn--outline">İletişim</a>
    </div>
  </div>
</section>

<!-- ── Hizmetler ──────────────────────────────── -->
<section class="section section--border" id="hizmetler">
  <div class="container">
    <h2>Hizmetler</h2>
    <div class="services-grid">

      <div class="service-card">
        <p class="service-card__number">01</p>
        <h3 class="service-card__title">Strateji</h3>
        <p class="service-card__desc">Veriye dayalı büyüme stratejileri ve pazar analizi.</p>
      </div>

      <div class="service-card">
        <p class="service-card__number">02</p>
        <h3 class="service-card__title">Tasarım</h3>
        <p class="service-card__desc">Marka kimliği, UI/UX ve kurumsal görsel çözümler.</p>
      </div>

      <div class="service-card">
        <p class="service-card__number">03</p>
        <h3 class="service-card__title">Teknoloji</h3>
        <p class="service-card__desc">Web, mobil ve özel yazılım geliştirme.</p>
      </div>

      <div class="service-card">
        <p class="service-card__number">04</p>
        <h3 class="service-card__title">Pazarlama</h3>
        <p class="service-card__desc">Dijital pazarlama, SEO ve içerik stratejisi.</p>
      </div>

    </div>
  </div>
</section>

<!-- ── Hakkımızda ─────────────────────────────── -->
<section class="section section--border" id="hakkimizda">
  <div class="container">
    <div class="about-grid">
      <div>
        <h2>Biz Kimiz</h2>
        <p style="color: var(--text-muted); margin-top: 1.5rem;">
          Yıllar içinde edindiğimiz deneyimle işletmelerin dijital dönüşümüne öncülük ediyoruz.
          Müşterilerimizin hedeflerini anlamak ve onları aşmak için çalışıyoruz.
        </p>
        <a href="#iletisim" class="btn btn--outline" style="margin-top: 2rem;">Tanışalım</a>
      </div>
      <div class="about__stats">
        <div>
          <div class="stat__number">120+</div>
          <div class="stat__label">Tamamlanan Proje</div>
        </div>
        <div>
          <div class="stat__number">8</div>
          <div class="stat__label">Yıllık Deneyim</div>
        </div>
        <div>
          <div class="stat__number">40+</div>
          <div class="stat__label">Mutlu Müşteri</div>
        </div>
        <div>
          <div class="stat__number">12</div>
          <div class="stat__label">Ödül</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── İletişim ───────────────────────────────── -->
<section class="section section--border" id="iletisim">
  <div class="container">
    <h2>İletişim</h2>
    <div class="contact-grid">

      <div>
        <?php echo do_shortcode( '[kara_iletisim]' ); ?>
      </div>

      <div>
        <div class="contact-info__item">
          <p class="contact-info__label">E-posta</p>
          <a href="mailto:<?php echo antispambot( get_option( 'admin_email' ) ); ?>">
            <?php echo antispambot( get_option( 'admin_email' ) ); ?>
          </a>
        </div>
        <div class="contact-info__item">
          <p class="contact-info__label">Adres</p>
          <p style="color: var(--text-muted);">İstanbul, Türkiye</p>
        </div>
        <div class="contact-info__item">
          <p class="contact-info__label">Çalışma Saatleri</p>
          <p style="color: var(--text-muted);">Pzt — Cum, 09:00 — 18:00</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
