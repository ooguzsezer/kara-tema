<?php
/* Template Name: Hakkımızda */
get_header();
?>

<div class="page-wrap" style="padding-top:2rem;">
  <div class="container">

    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
      <span>/</span>
      <span>Hakkımızda</span>
    </nav>

    <!-- Üst bölüm -->
    <div class="hakkimizda-hero">
      <div>
        <span class="section__tag">Hakkımızda</span>
        <h1 style="font-size:clamp(1.8rem,3vw,2.4rem);margin-bottom:1rem;">
          <?php the_title(); ?>
        </h1>
        <div class="page-body">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="hakkimizda-hero__stat">
        <div class="hk-stat"><span>500K+</span>Aktif Poliçe</div>
        <div class="hk-stat"><span>20+</span>Sigorta Şirketi</div>
        <div class="hk-stat"><span>%98</span>Memnuniyet</div>
        <div class="hk-stat"><span>12+</span>Yıllık Deneyim</div>
      </div>
    </div>

    <!-- Misyon / Vizyon -->
    <div class="mv-grid">
      <div class="mv-card">
        <div class="mv-card__icon">🎯</div>
        <h3>Misyonumuz</h3>
        <p>Müşterilerimize en uygun sigorta çözümlerini şeffaf, hızlı ve güvenilir bir şekilde sunmak; hasar anında en etkin desteği sağlamak.</p>
      </div>
      <div class="mv-card">
        <div class="mv-card__icon">🔭</div>
        <h3>Vizyonumuz</h3>
        <p>Türkiye'nin dijital sigortacılık alanında en güvenilir ve tercih edilen platformu olmak; teknolojiyi insan odaklı hizmetle buluşturmak.</p>
      </div>
      <div class="mv-card">
        <div class="mv-card__icon">⚖️</div>
        <h3>Değerlerimiz</h3>
        <p>Dürüstlük, şeffaflık ve müşteri memnuniyeti her kararımızın temelinde yer alır. Sözlerimizin arkasında durur, taahhütlerimizi yerine getiririz.</p>
      </div>
    </div>

    <!-- Neden Tercih Ediliyoruz -->
    <div class="hk-why">
      <h2 style="margin-bottom:2rem;">Neden Bizi Tercih Ediyorlar?</h2>
      <div class="hk-why__grid">
        <div class="hk-why__item">
          <div class="hk-why__num">01</div>
          <h4>20+ Sigorta Şirketi</h4>
          <p>Tek platformdan tüm şirketlerin fiyatlarını karşılaştırma imkânı.</p>
        </div>
        <div class="hk-why__item">
          <div class="hk-why__num">02</div>
          <h4>3 Dakikada Teklif</h4>
          <p>Minimum bilgiyle maksimum hız. Poliçenizi anında e-posta ile alın.</p>
        </div>
        <div class="hk-why__item">
          <div class="hk-why__num">03</div>
          <h4>7/24 Hasar Desteği</h4>
          <p>Gece yarısı, tatil, bayram — hasar hattımız her zaman açık.</p>
        </div>
        <div class="hk-why__item">
          <div class="hk-why__num">04</div>
          <h4>Lisanslı Acente</h4>
          <p>SEDDK lisanslı, denetimli ve güvenilir sigorta acenteliği hizmeti.</p>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="hk-cta">
      <h2>Sizi de Müşterimiz Olmaya Davet Ediyoruz</h2>
      <p>Ücretsiz teklif alın, farkı görün.</p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:1.5rem;">
        <a href="<?php echo esc_url(home_url('/#urunler')); ?>" class="btn btn--blue">Hemen Teklif Al</a>
        <a href="<?php echo esc_url(home_url('/#iletisim')); ?>" class="btn btn--outline">Bize Ulaşın</a>
      </div>
    </div>

  </div>
</div>

<style>
.hakkimizda-hero {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 4rem;
  align-items: start;
  margin-bottom: 4rem;
}

.hakkimizda-hero__stat {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1px;
  background: var(--border);
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
  position: sticky;
  top: 90px;
}

.hk-stat {
  background: #fff;
  padding: 1.5rem;
  text-align: center;
}

.hk-stat span {
  display: block;
  font-size: 2rem;
  font-weight: 800;
  color: var(--blue);
  line-height: 1;
  margin-bottom: 0.35rem;
}

.hk-stat { font-size: 0.78rem; color: var(--muted); }

.mv-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  margin-bottom: 4rem;
}

.mv-card {
  background: var(--bg-light);
  border: 1px solid var(--border);
  border-radius: 4px;
  padding: 2rem;
}

.mv-card__icon { font-size: 1.75rem; margin-bottom: 0.75rem; }
.mv-card h3 { font-size: 1rem; margin-bottom: 0.5rem; }
.mv-card p  { font-size: 0.85rem; color: var(--muted); margin: 0; }

.hk-why { margin-bottom: 4rem; }

.hk-why__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.25rem;
}

.hk-why__item {
  border-left: 3px solid var(--blue);
  padding-left: 1rem;
}

.hk-why__num {
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--blue);
  opacity: 0.2;
  line-height: 1;
  margin-bottom: 0.5rem;
}

.hk-why__item h4 { font-size: 0.92rem; margin-bottom: 0.35rem; }
.hk-why__item p  { font-size: 0.82rem; color: var(--muted); margin: 0; }

.hk-cta {
  background: var(--bg-dark);
  color: #fff;
  border-radius: 4px;
  padding: 3rem 2rem;
  text-align: center;
  margin-bottom: 2rem;
}

.hk-cta h2 { color: #fff; margin-bottom: 0.5rem; }
.hk-cta p  { color: rgba(255,255,255,0.6); margin: 0; }

@media (max-width: 960px) {
  .hakkimizda-hero { grid-template-columns: 1fr; }
  .hakkimizda-hero__stat { position: static; }
  .mv-grid { grid-template-columns: 1fr; }
  .hk-why__grid { grid-template-columns: repeat(2,1fr); }
}

@media (max-width: 600px) {
  .hk-why__grid { grid-template-columns: 1fr; }
}
</style>

<?php get_footer(); ?>
