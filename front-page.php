<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <div>
      <h1>Güvenilir Sigorta<br>Çözümleri, Hızlı Teklif</h1>
      <p>Araç, konut, sağlık ve işyeri sigortalarında en uygun teklifi karşılaştırın. Dakikalar içinde poliçenizi alın.</p>
      <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
        <a href="#urunler" class="btn btn--blue">Teklif Al</a>
        <a href="#iletisim" class="btn btn--outline" style="color:#fff;border-color:rgba(255,255,255,0.35);">Bize Ulaşın</a>
      </div>
      <div class="hero__badges">
        <div class="badge"><span class="badge__dot"></span> 500.000+ Aktif Poliçe</div>
        <div class="badge"><span class="badge__dot"></span> 20+ Sigorta Şirketi</div>
        <div class="badge"><span class="badge__dot"></span> 7/24 Hasar Desteği</div>
      </div>
    </div>
    <div class="quote-box">
      <h3>Ücretsiz Teklif Alın</h3>
      <?php echo do_shortcode('[kara_teklif_formu]'); ?>
    </div>
  </div>
</section>

<!-- Ürünler -->
<section class="section" id="urunler">
  <div class="container">
    <span class="section__tag">Ürünlerimiz</span>
    <h2 class="section__title">Sunduğumuz Sigorta Hizmetleri</h2>
    <p class="section__sub">Bireysel ve kurumsal ihtiyaçlarınıza uygun geniş sigorta ürün yelpazemiz.</p>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-card__icon">🚗</div>
        <p class="service-card__title">Trafik Sigortası</p>
        <p class="service-card__desc">Zorunlu Mali Sorumluluk sigortası ile yasal yükümlülüğünüzü yerine getirin.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
      <div class="service-card">
        <div class="service-card__icon">🛡️</div>
        <p class="service-card__title">Kasko</p>
        <p class="service-card__desc">Tam ve mini kasko seçenekleriyle aracınıza gelebilecek hasarları teminat altına alın.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
      <div class="service-card">
        <div class="service-card__icon">🏠</div>
        <p class="service-card__title">Konut Sigortası</p>
        <p class="service-card__desc">Evinizi deprem, yangın, su baskını ve hırsızlığa karşı güvence altına alın.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
      <div class="service-card">
        <div class="service-card__icon">❤️</div>
        <p class="service-card__title">Sağlık Sigortası</p>
        <p class="service-card__desc">Özel hastane güvencesiyle sağlık masraflarınızı teminata bağlayın.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
      <div class="service-card">
        <div class="service-card__icon">✈️</div>
        <p class="service-card__title">Seyahat Sigortası</p>
        <p class="service-card__desc">Yurt içi ve yurt dışı seyahatlerinizde sağlık ve bagaj güvencesi.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
      <div class="service-card">
        <div class="service-card__icon">🏢</div>
        <p class="service-card__title">İş Yeri Sigortası</p>
        <p class="service-card__desc">İşletmenizi yangın, hırsızlık ve iş durmasına karşı koruma altına alın.</p>
        <a href="#" class="service-card__link">Detaylı Bilgi »</a>
      </div>
    </div>
  </div>
</section>

<!-- Stats -->
<div class="stats-bar">
  <div class="container">
    <div class="stat"><div class="stat__num">500K+</div><div class="stat__label">Aktif Poliçe</div></div>
    <div class="stat"><div class="stat__num">20+</div><div class="stat__label">Sigorta Şirketi</div></div>
    <div class="stat"><div class="stat__num">%98</div><div class="stat__label">Müşteri Memnuniyeti</div></div>
    <div class="stat"><div class="stat__num">3 dk</div><div class="stat__label">Ortalama Teklif Süresi</div></div>
  </div>
</div>

<!-- Neden Biz -->
<section class="section why-bg" id="neden-biz">
  <div class="container">
    <span class="section__tag">Neden Biz?</span>
    <h2 class="section__title">Farkımız</h2>
    <div class="why-grid">
      <div class="why-card">
        <div class="why-card__num">01</div>
        <h3>Anında Karşılaştırma</h3>
        <p>20+ sigorta şirketinin fiyatlarını tek ekranda görüp en uygununu seçin.</p>
      </div>
      <div class="why-card">
        <div class="why-card__num">02</div>
        <h3>Dijital Poliçe</h3>
        <p>Büro ziyareti ve kağıt imza olmadan tamamen online poliçe düzenleyin.</p>
      </div>
      <div class="why-card">
        <div class="why-card__num">03</div>
        <h3>7/24 Hasar Desteği</h3>
        <p>Hasar anında uzman ekibimiz gece yarısı ve tatil günleri dahil yanınızda.</p>
      </div>
    </div>
  </div>
</section>

<!-- Hasar -->
<section class="section" id="hasar">
  <div class="container">
    <div class="claims-grid">
      <div>
        <span class="section__tag">Hasar Bildirimi</span>
        <h2 class="section__title">Hasarınızı Nasıl Bildirirsiniz?</h2>
        <div class="claims-steps">
          <div class="claim-step">
            <div class="claim-step__num">1</div>
            <div><h4>Güvenliğinizi Sağlayın</h4><p>Hasar yerinde önce güvenliğinizi sağlayın, gerekirse 112'yi arayın.</p></div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">2</div>
            <div><h4>Fotoğraf ve Belge</h4><p>Hasarı ve çevreyi belgeleyin; kaza tutanağı varsa temin edin.</p></div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">3</div>
            <div><h4>Hasar Hattını Arayın</h4><p>7/24 hasar hattımızı arayın, dosyanız dakikalar içinde açılır.</p></div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">4</div>
            <div><h4>Eksper Ataması</h4><p>Uzman eksperimiz 24 saat içinde hasarınızı yerinde değerlendirir.</p></div>
          </div>
        </div>
      </div>
      <div class="hotline-box">
        <p class="hotline-box__tag">7/24 Hasar Hattı</p>
        <div class="hotline-box__num">0850 000 0 000</div>
        <p class="hotline-box__sub">Hafta içi, hafta sonu, her gün açık.</p>
        <a href="tel:08500000000" class="btn btn--red" style="width:100%;text-align:center;">Hemen Ara</a>
        <hr>
        <div class="hotline-row">
          <span class="hotline-row__icon">📧</span>
          <div><p>E-posta</p><strong>hasar@tepetrafik.com</strong></div>
        </div>
        <div class="hotline-row">
          <span class="hotline-row__icon">💬</span>
          <div><p>Canlı Destek</p><strong>Site üzerinden anlık chat</strong></div>
        </div>
        <div class="hotline-row">
          <span class="hotline-row__icon">📱</span>
          <div><p>Mobil Uygulama</p><strong>iOS & Android</strong></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SSS -->
<section class="section why-bg" id="sss">
  <div class="container">
    <span class="section__tag">SSS</span>
    <h2 class="section__title">Sıkça Sorulan Sorular</h2>
    <div class="faq-wrap">
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">Trafik sigortası ile kasko arasındaki fark nedir?<span class="faq-icon">+</span></div>
        <div class="faq-a">Trafik sigortası karşı tarafa verilen zararları karşılayan zorunlu bir sigortadır. Kasko ise kendi aracınıza gelen hasarları teminat altına alan isteğe bağlı bir sigorta türüdür.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">Poliçemi ne kadar sürede alabilirim?<span class="faq-icon">+</span></div>
        <div class="faq-a">Bilgilerinizi girdikten sonra ortalama 3 dakika içinde teklifinizi alabilirsiniz. Ödeme sonrası poliçeniz anında e-posta adresinize iletilir.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">Hasar bildirimini online yapabilir miyim?<span class="faq-icon">+</span></div>
        <div class="faq-a">Evet. Hasar bildiriminizi site, mobil uygulama veya 7/24 hasar hattı aracılığıyla yapabilirsiniz.</div>
      </div>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">Taksitle ödeme seçeneği var mı?<span class="faq-icon">+</span></div>
        <div class="faq-a">Kredi kartıyla 3–12 taksit imkânı mevcuttur. Taksit seçenekleri sigorta türü ve anlaşmalı bankaya göre farklılık gösterebilir.</div>
      </div>
    </div>
  </div>
</section>

<!-- İletişim -->
<section class="section contact-bg" id="iletisim">
  <div class="container">
    <span class="section__tag">İletişim</span>
    <h2 class="section__title">Bize Ulaşın</h2>
    <div class="contact-grid">
      <div><?php echo do_shortcode('[kara_iletisim]'); ?></div>
      <div class="contact-info">
        <div><p class="ci-label">Müşteri Hizmetleri</p><p class="ci-value">0850 000 0 000</p></div>
        <div><p class="ci-label">E-posta</p><p class="ci-value"><?php echo antispambot(get_option('admin_email')); ?></p></div>
        <div><p class="ci-label">Adres</p><p class="ci-value">Levent, İstanbul, Türkiye</p></div>
        <div>
          <p class="ci-label">Çalışma Saatleri</p>
          <p class="ci-value">Pzt–Cum 09:00–18:00</p>
          <p style="font-size:0.8rem;color:var(--muted);">Hasar hattı 7/24 açık</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function toggleFaq(el) {
  var item = el.parentElement;
  var open = item.classList.contains('open');
  document.querySelectorAll('.faq-item.open').forEach(function(i){ i.classList.remove('open'); });
  if (!open) item.classList.add('open');
}
</script>

<?php get_footer(); ?>
