<?php get_header(); ?>

<div class="page-wrap">
  <div class="container">

    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
      <span>/</span>
      <span>Arama</span>
    </nav>

    <h1 class="page-title">
      "<?php echo esc_html(get_search_query()); ?>" için arama sonuçları
    </h1>

    <!-- Arama kutusu -->
    <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Aramak istediğinizi yazın...">
      <button type="submit" class="btn btn--blue">Ara</button>
    </form>

    <?php if ( have_posts() ) : ?>
      <p style="color:var(--muted);font-size:0.85rem;margin-bottom:1.5rem;">
        <?php echo $wp_query->found_posts; ?> sonuç bulundu.
      </p>
      <div class="search-results">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="search-item">
            <div class="search-item__type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></div>
            <h2 class="search-item__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="search-item__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
            <a href="<?php the_permalink(); ?>" class="search-item__more">Sayfaya Git →</a>
          </article>
        <?php endwhile; ?>
      </div>

      <div class="pagination">
        <?php echo paginate_links(['prev_text'=>'← Önceki','next_text'=>'Sonraki →']); ?>
      </div>

    <?php else : ?>
      <div class="search-empty">
        <p>Aramanızla eşleşen sonuç bulunamadı.</p>
        <p style="font-size:0.85rem;">Farklı anahtar kelimeler deneyin veya <a href="<?php echo esc_url(home_url('/')); ?>">ana sayfaya</a> dönün.</p>
      </div>
    <?php endif; ?>

  </div>
</div>

<style>
.search-form {
  display: flex;
  gap: 0.75rem;
  margin-bottom: 2rem;
  max-width: 560px;
}

.search-form input {
  flex: 1;
  border: 1px solid var(--border);
  padding: 0.65rem 1rem;
  font-family: var(--font);
  font-size: 0.9rem;
  border-radius: 3px;
  outline: none;
  color: var(--text);
}
.search-form input:focus { border-color: var(--blue); }

.search-results { display: flex; flex-direction: column; gap: 0; }

.search-item {
  padding: 1.5rem 0;
  border-bottom: 1px solid var(--border);
}

.search-item__type {
  font-size: 0.68rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--blue);
  margin-bottom: 0.3rem;
}

.search-item__title { font-size: 1.05rem; margin-bottom: 0.4rem; }
.search-item__title a { color: var(--text); }
.search-item__title a:hover { color: var(--blue); }
.search-item__title a::after { display: none; }

.search-item__excerpt { font-size: 0.85rem; color: var(--muted); margin-bottom: 0.5rem; }
.search-item__more { font-size: 0.82rem; font-weight: 600; color: var(--blue); }

.search-empty {
  background: var(--bg-light);
  border: 1px solid var(--border);
  border-radius: 4px;
  padding: 2.5rem;
  text-align: center;
}
</style>

<?php get_footer(); ?>
