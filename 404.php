<?php get_header(); ?>

<div class="page-wrap" style="text-align:center; padding: 6rem 0;">
  <div class="container">
    <div style="font-size:5rem; margin-bottom:1rem;">404</div>
    <h1 style="font-size:1.8rem; margin-bottom:1rem;">Sayfa Bulunamadı</h1>
    <p style="max-width:440px; margin:0 auto 2rem;">Aradığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.</p>
    <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--blue">Ana Sayfaya Dön</a>
      <a href="#" onclick="history.back();return false;" class="btn btn--outline">Geri Git</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
