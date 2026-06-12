<?php get_header(); ?>

<div class="page-wrap">
  <div class="container">

    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
      <span>/</span>
      <span>
        <?php
          if      ( is_category() ) echo 'Kategori: ' . single_cat_title('', false);
          elseif  ( is_tag() )      echo 'Etiket: '   . single_tag_title('', false);
          elseif  ( is_author() )   echo 'Yazar: '    . get_the_author();
          else                      echo 'Blog';
        ?>
      </span>
    </nav>

    <div class="archive-layout">

      <main class="archive-main">
        <h1 class="page-title">
          <?php
            if      ( is_category() ) single_cat_title();
            elseif  ( is_tag() )      single_tag_title();
            elseif  ( is_author() )   the_author();
            else                      echo 'Blog';
          ?>
        </h1>

        <?php if ( have_posts() ) : ?>
          <div class="post-grid">
            <?php while ( have_posts() ) : the_post(); ?>
              <article class="post-card">
                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" class="post-card__thumb">
                    <?php the_post_thumbnail('medium_large'); ?>
                  </a>
                <?php endif; ?>
                <div class="post-card__body">
                  <div class="post-card__meta">
                    <?php the_category(', '); ?>
                    <span>·</span>
                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date('d M Y'); ?></time>
                  </div>
                  <h2 class="post-card__title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <p class="post-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                  <a href="<?php the_permalink(); ?>" class="post-card__more">Devamını Oku →</a>
                </div>
              </article>
            <?php endwhile; ?>
          </div>

          <div class="pagination">
            <?php
              echo paginate_links([
                'prev_text' => '← Önceki',
                'next_text' => 'Sonraki →',
              ]);
            ?>
          </div>

        <?php else : ?>
          <p style="color:var(--muted);">Bu kategoride henüz yazı bulunmuyor.</p>
        <?php endif; ?>
      </main>

      <aside class="archive-sidebar">
        <div class="sidebar-widget">
          <h4 class="widget-title">Kategoriler</h4>
          <?php
            wp_list_categories([
              'show_count' => true,
              'title_li'   => '',
              'walker'     => null,
            ]);
          ?>
        </div>
        <div class="sidebar-widget">
          <h4 class="widget-title">Hızlı Teklif</h4>
          <p style="font-size:0.85rem;color:var(--muted);margin-bottom:1rem;">Sigorta teklifinizi hemen alın.</p>
          <a href="<?php echo esc_url(home_url('/#urunler')); ?>" class="btn btn--blue" style="width:100%;text-align:center;">Teklif Al</a>
        </div>
      </aside>

    </div>
  </div>
</div>

<style>
.archive-layout {
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 3.5rem;
  align-items: start;
}

.post-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
  margin-top: 1.5rem;
}

.post-card {
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
  background: #fff;
  transition: box-shadow 0.18s;
}
.post-card:hover { box-shadow: 0 4px 16px rgba(26,79,158,0.08); }

.post-card__thumb { display: block; overflow: hidden; aspect-ratio: 16/9; }
.post-card__thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s; }
.post-card:hover .post-card__thumb img { transform: scale(1.03); }
.post-card__thumb::after { display: none; }

.post-card__body { padding: 1.25rem; }

.post-card__meta {
  font-size: 0.75rem;
  color: var(--muted);
  margin-bottom: 0.5rem;
  display: flex;
  gap: 0.4rem;
  flex-wrap: wrap;
}
.post-card__meta a { color: var(--blue); font-size: 0.75rem; }

.post-card__title { font-size: 0.95rem; margin-bottom: 0.5rem; line-height: 1.3; }
.post-card__title a { color: var(--text); }
.post-card__title a:hover { color: var(--blue); }
.post-card__title a::after { display: none; }

.post-card__excerpt { font-size: 0.83rem; color: var(--muted); margin-bottom: 0.75rem; }

.post-card__more { font-size: 0.8rem; font-weight: 600; color: var(--blue); }

.pagination { margin-top: 2.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap; }
.pagination a, .pagination span {
  padding: 0.4rem 0.85rem;
  border: 1px solid var(--border);
  border-radius: 3px;
  font-size: 0.82rem;
  color: var(--text);
}
.pagination a:hover { border-color: var(--blue); color: var(--blue); }
.pagination a::after { display: none; }
.pagination .current { background: var(--blue); color: #fff; border-color: var(--blue); }

/* kategori listesi */
.sidebar-widget ul { list-style: none; }
.sidebar-widget li { padding: 0.4rem 0; border-bottom: 1px solid var(--border); font-size: 0.85rem; }
.sidebar-widget li:last-child { border-bottom: none; }
.sidebar-widget li a { color: var(--text); }
.sidebar-widget li a:hover { color: var(--blue); }

@media (max-width: 860px) {
  .archive-layout { grid-template-columns: 1fr; }
  .post-grid { grid-template-columns: 1fr; }
}
</style>

<?php get_footer(); ?>
