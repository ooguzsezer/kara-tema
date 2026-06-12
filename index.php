<?php get_header(); ?>

<!-- ── Hero ─────────────────────────────────────────── -->
<section class="hero" id="anasayfa">
  <div class="container">
    <div class="hero__content">
      <p class="hero__eyebrow"><span></span> Türkiye'nin Hızlı Sigorta Platformu</p>
      <h1 class="hero__title">
        Sigortanızı <em>Dakikalar</em> İçinde<br>Alın ve Güvende Kalın
      </h1>
      <p class="hero__desc">
        Araç, konut, sağlık ve daha fazlası için en uygun teklifleri karşılaştırın. Anında poliçe, 7/24 destek.
      </p>
      <div class="hero__actions">
        <a href="#urunler" class="btn btn--gold">Hemen Teklif Al</a>
        <a href="#hasar" class="btn btn--outline">Hasar Bildir</a>
      </div>
      <div class="hero__trust">
        <div class="trust-item">
          <div class="trust-item__dot"></div>
          <p><strong>500.000+</strong> Mutlu Müşteri</p>
        </div>
        <div class="trust-item">
          <div class="trust-item__dot"></div>
          <p><strong>20+</strong> Sigorta Şirketi</p>
        </div>
        <div class="trust-item">
          <div class="trust-item__dot"></div>
          <p><strong>7/24</strong> Destek Hattı</p>
        </div>
      </div>
    </div>

    <div class="quote-card">
      <div class="quote-card__badge">Ücretsiz & Hızlı Teklif</div>
      <h3>Sigortanı Şimdi Hesapla</h3>
      <?php echo do_shortcode('[kara_teklif_formu]'); ?>
    </div>
  </div>
</section>

<!-- ── Ürünler ────────────────────────────────────── -->
<section class="section section--border" id="urunler">
  <div class="container">
    <span class="section__label">Ürünlerimiz</span>
    <h2 class="section__title">Her İhtiyacınız İçin<br>Doğru Sigorta</h2>
    <p class="section__desc">Bireysel ve kurumsal sigortacılık alanında geniş ürün yelpazemizle yanınızdayız.</p>

    <div class="products-grid">

      <div class="product-card">
        <div class="product-icon">🚗</div>
        <p class="product-card__title">Trafik Sigortası</p>
        <p class="product-card__desc">Zorunlu Mali Sorumluluk kapsamı ile yasal yükümlülüğünüzü yerine getirin.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

      <div class="product-card">
        <div class="product-icon">🛡️</div>
        <p class="product-card__title">Kasko</p>
        <p class="product-card__desc">Tam ya da mini kasko seçenekleriyle aracınızı her türlü riske karşı koruyun.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

      <div class="product-card">
        <div class="product-icon">🏠</div>
        <p class="product-card__title">Konut Sigortası</p>
        <p class="product-card__desc">Evinizi deprem, yangın, su baskını ve hırsızlığa karşı güvence altına alın.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

      <div class="product-card">
        <div class="product-icon">❤️</div>
        <p class="product-card__title">Sağlık Sigortası</p>
        <p class="product-card__desc">Özel hastane güvencesiyle sağlık harcamalarınızı teminata bağlayın.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

      <div class="product-card">
        <div class="product-icon">✈️</div>
        <p class="product-card__title">Seyahat Sigortası</p>
        <p class="product-card__desc">Yurt içi ve yurt dışı seyahatlerinizde sağlık ve bagaj güvencesi.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

      <div class="product-card">
        <div class="product-icon">🏢</div>
        <p class="product-card__title">İş Yeri Sigortası</p>
        <p class="product-card__desc">İşletmenizi yangın, hırsızlık ve iş durmasına karşı koruma altına alın.</p>
        <span class="product-card__arrow">Teklif Al →</span>
      </div>

    </div>
  </div>
</section>

<!-- ── Stats ──────────────────────────────────────── -->
<div class="stats-section">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-item__number">500<span>K+</span></div>
        <div class="stat-item__label">Aktif Poliçe</div>
      </div>
      <div class="stat-item">
        <div class="stat-item__number">20<span>+</span></div>
        <div class="stat-item__label">Sigorta Şirketi</div>
      </div>
      <div class="stat-item">
        <div class="stat-item__number">98<span>%</span></div>
        <div class="stat-item__label">Müşteri Memnuniyeti</div>
      </div>
      <div class="stat-item">
        <div class="stat-item__number">3<span>dk</span></div>
        <div class="stat-item__label">Ortalama Teklif Süresi</div>
      </div>
    </div>
  </div>
</div>

<!-- ── Neden Biz ───────────────────────────────────── -->
<section class="section section--border" id="neden-biz">
  <div class="container">
    <span class="section__label">Neden Biz?</span>
    <h2 class="section__title">Sigortada Fark<br>Yaratan Üç Şey</h2>

    <div class="why-grid">
      <div class="why-card">
        <div class="why-card__num">01</div>
        <h3>Anında Karşılaştırma</h3>
        <p>20'den fazla sigorta şirketinin teklifini saniyeler içinde yan yana görüp en uygununu seçin.</p>
      </div>
      <div class="why-card">
        <div class="why-card__num">02</div>
        <h3>Dijital Poliçe</h3>
        <p>Hiç büroya gitmeden, kağıt imzalamadan — tamamen online poliçe düzenleyin ve anında alın.</p>
      </div>
      <div class="why-card">
        <div class="why-card__num">03</div>
        <h3>7/24 Hasar Desteği</h3>
        <p>Hasarınızda yanınızdayız. Gece yarısı veya tatil fark etmeksizin uzman ekibimize ulaşabilirsiniz.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── Hasar Bildirimi ─────────────────────────────── -->
<section class="section section--border" id="hasar">
  <div class="container">
    <div class="claims-grid">
      <div>
        <span class="section__label">Hasar Bildirimi</span>
        <h2 class="section__title">Hasarınızı Hızlıca<br>Bildirin</h2>
        <p style="color:var(--text-muted); margin-bottom:0;">Hasar anında panik yapmayın. Adım adım rehberimizle süreci kolayca tamamlayın.</p>

        <div class="claims-steps">
          <div class="claim-step">
            <div class="claim-step__num">1</div>
            <div>
              <p class="claim-step__title">Güvenliğinizi Sağlayın</p>
              <p class="claim-step__desc">Hasar yerinde önce güvenliğinizi sağlayın, gerekirse 112'yi arayın.</p>
            </div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">2</div>
            <div>
              <p class="claim-step__title">Fotoğraf Çekin</p>
              <p class="claim-step__desc">Hasarı belgeleyin; araç, çevre ve belgelerinizin fotoğraflarını alın.</p>
            </div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">3</div>
            <div>
              <p class="claim-step__title">Bizi Arayın</p>
              <p class="claim-step__desc">7/24 hasar hattımızı arayın, dosyanız dakikalar içinde açılır.</p>
            </div>
          </div>
          <div class="claim-step">
            <div class="claim-step__num">4</div>
            <div>
              <p class="claim-step__title">Eksper Ataması</p>
              <p class="claim-step__desc">Uzman eksperimiz 24 saat içinde size ulaşır ve hasarı değerlendirir.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="claims-hotline">
        <p class="claims-hotline__label">7/24 Hasar Hattı</p>
        <div class="claims-hotline__number">0850 000 0 000</div>
        <p class="claims-hotline__sub">Hafta içi, hafta sonu, gece yarısı — her zaman açık.</p>
        <a href="tel:08500000000" class="btn btn--gold" style="width:100%;justify-content:center;">Hemen Ara</a>

        <hr>

        <div class="claims-channel">
          <div class="claims-channel__icon">📧</div>
          <div>
            <p class="claims-channel__label">E-posta</p>
            <p class="claims-channel__value">hasar@<?php echo str_replace(['http://','https://','www.'], '', home_url()); ?></p>
          </div>
        </div>
        <div class="claims-channel">
          <div class="claims-channel__icon">💬</div>
          <div>
            <p class="claims-channel__label">Canlı Destek</p>
            <p class="claims-channel__value">Site üzerinden anlık chat</p>
          </div>
        </div>
        <div class="claims-channel">
          <div class="claims-channel__icon">📱</div>
          <div>
            <p class="claims-channel__label">Mobil Uygulama</p>
            <p class="claims-channel__value">iOS & Android üzerinden bildir</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SSS ─────────────────────────────────────────── -->
<section class="section section--border" id="sss">
  <div class="container">
    <span class="section__label">SSS</span>
    <h2 class="section__title">Sıkça Sorulan Sorular</h2>

    <div class="faq-list">

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          Trafik sigortası ve kasko arasındaki fark nedir?
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          Trafik sigortası (ZMS), karşı tarafa verdiğiniz zararları karşılayan <strong>zorunlu</strong> bir sigortadır. Kasko ise kendi aracınıza gelen hasarları teminat altına alan <strong>isteğe bağlı</strong> bir sigorta türüdür. İkisini birlikte kullanmak en kapsamlı korumayı sağlar.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          Poliçemi ne kadar sürede alabilirim?
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          Gerekli bilgileri girdikten sonra ortalama 3 dakika içinde teklifinizi alabilirsiniz. Ödeme tamamlandığında poliçeniz anında e-posta adresinize iletilir.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          Hasar bildirimini online yapabilir miyim?
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          Evet. Hasar bildiriminizi site üzerinden, mobil uygulamamızdan veya 7/24 hasar hattımızı arayarak yapabilirsiniz. Online bildirimde fotoğraf ve belge yükleme imkânı da bulunmaktadır.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          Taksitle ödeme yapabilir miyim?
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          Evet, kredi kartıyla 3 ila 12 taksit seçeneği sunulmaktadır. Taksit seçenekleri sigorta türüne ve anlaşmalı bankaya göre farklılık gösterebilir.
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── İletişim ───────────────────────────────────── -->
<section class="section section--border" id="iletisim">
  <div class="container">
    <span class="section__label">İletişim</span>
    <h2 class="section__title">Size Nasıl Yardımcı<br>Olabiliriz?</h2>

    <div class="contact-grid">
      <div>
        <?php echo do_shortcode('[kara_iletisim]'); ?>
      </div>
      <div class="contact-info">
        <div class="contact-info__item">
          <p class="contact-info__label">Müşteri Hizmetleri</p>
          <p class="contact-info__value">0850 000 0 000</p>
        </div>
        <div class="contact-info__item">
          <p class="contact-info__label">E-posta</p>
          <p class="contact-info__value"><?php echo antispambot(get_option('admin_email')); ?></p>
        </div>
        <div class="contact-info__item">
          <p class="contact-info__label">Adres</p>
          <p class="contact-info__value">Levent, İstanbul, Türkiye</p>
        </div>
        <div class="contact-info__item">
          <p class="contact-info__label">Çalışma Saatleri</p>
          <p class="contact-info__value">Pzt–Cum 09:00–18:00<br><span style="color:var(--text-muted);font-size:0.85rem;">Hasar hattı 7/24 açık</span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function toggleFaq(el) {
  var item = el.parentElement;
  var isOpen = item.classList.contains('open');
  document.querySelectorAll('.faq-item.open').forEach(function(i){ i.classList.remove('open'); });
  if (!isOpen) item.classList.add('open');
}
</script>

<?php get_footer(); ?>
