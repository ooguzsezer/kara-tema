<?php get_header(); ?>

<div class="page-wrap">
  <div class="container">
    <div class="single-layout">

      <!-- Makale -->
      <main class="single-main">
        <?php while ( have_posts() ) : the_post(); ?>

          <nav class="breadcrumb">
            <a href="<?php echo esc_url( home_url('/') ); ?>">Ana Sayfa</a>
            <span>/</span>
            <a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ); ?>">Blog</a>
            <span>/</span>
            <span><?php the_title(); ?></span>
          </nav>

          <article class="single-post">

            <div class="single-post__meta">
              <?php the_category(', '); ?>
              <span class="meta-sep">·</span>
              <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date('d F Y'); ?></time>
              <span class="meta-sep">·</span>
              <?php echo get_the_author(); ?>
            </div>

            <h1 class="single-post__title"><?php the_title(); ?></h1>

            <?php if ( has_post_thumbnail() ) : ?>
              <div class="single-post__thumb">
                <?php the_post_thumbnail('large'); ?>
              </div>
            <?php endif; ?>

            <div class="single-post__body">
              <?php the_content(); ?>
            </div>

            <div class="single-post__tags">
              <?php the_tags('<span class="tag-label">Etiketler:</span> ', ', '); ?>
            </div>

            <div class="single-post__nav">
              <div><?php previous_post_link('%link', '← %title'); ?></div>
              <div><?php next_post_link('%link', '%title →'); ?></div>
            </div>

          </article>

        <?php endwhile; ?>
      </main>

      <!-- Sidebar -->
      <aside class="single-sidebar">

        <div class="sidebar-widget">
          <h4 class="widget-title">Son Yazılar</h4>
          <?php
            $son = new WP_Query(['posts_per_page' => 5]);
            while ($son->have_posts()) : $son->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="sidebar-post">
              <span><?php the_title(); ?></span>
              <small><?php the_date('d M Y'); ?></small>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="sidebar-widget">
          <h4 class="widget-title">Hızlı Teklif</h4>
          <p style="font-size:0.85rem;color:var(--muted);margin-bottom:1rem;">Sigorta teklifinizi hemen alın.</p>
          <a href="<?php echo esc_url(home_url('/#urunler')); ?>" class="btn btn--blue" style="width:100%;text-align:center;">Teklif Al</a>
        </div>

        <div class="sidebar-widget">
          <h4 class="widget-title">7/24 Hasar Hattı</h4>
          <p style="font-size:1.1rem;font-weight:700;color:var(--text);margin:0;">
            <?php echo tp('hasar_telefon','0850 000 0 000'); ?>
          </p>
        </div>

      </aside>

    </div>
  </div>
</div>

<style>
.single-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 3.5rem;
  align-items: start;
}

.single-post__meta {
  font-size: 0.8rem;
  color: var(--muted);
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.4rem;
  flex-wrap: wrap;
}

.single-post__meta a { color: var(--blue); font-size: 0.8rem; }
.meta-sep { color: var(--border); }

.single-post__title {
  font-size: clamp(1.5rem, 3vw, 2.1rem);
  color: var(--text);
  margin-bottom: 1.75rem;
  line-height: 1.25;
}

.single-post__thumb {
  margin-bottom: 2rem;
  border-radius: 4px;
  overflow: hidden;
}

.single-post__thumb img { width: 100%; height: auto; }

.single-post__body { max-width: 100%; }
.single-post__body p      { color: var(--muted); line-height: 1.8; margin-bottom: 1.25rem; }
.single-post__body h2     { font-size: 1.35rem; margin: 2rem 0 0.75rem; }
.single-post__body h3     { font-size: 1.1rem; margin: 1.5rem 0 0.5rem; }
.single-post__body ul,
.single-post__body ol     { margin: 0 0 1.25rem 1.5rem; color: var(--muted); }
.single-post__body li     { margin-bottom: 0.4rem; line-height: 1.65; }
.single-post__body img    { border-radius: 4px; margin: 1.5rem 0; max-width: 100%; }
.single-post__body blockquote {
  border-left: 3px solid var(--blue);
  padding: 0.75rem 1.25rem;
  margin: 1.5rem 0;
  background: var(--bg-light);
  color: var(--muted);
  font-style: italic;
}

.single-post__tags {
  margin-top: 2rem;
  padding-top: 1.25rem;
  border-top: 1px solid var(--border);
  font-size: 0.82rem;
  color: var(--muted);
}

.single-post__tags a { color: var(--blue); font-size: 0.82rem; }
.tag-label { font-weight: 600; color: var(--text); }

.single-post__nav {
  display: flex;
  justify-content: space-between;
  margin-top: 2rem;
  padding-top: 1.25rem;
  border-top: 1px solid var(--border);
  font-size: 0.85rem;
  gap: 1rem;
}

.single-post__nav a { color: var(--blue); }

/* Sidebar */
.sidebar-widget {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 4px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
}

.widget-title {
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--text);
  margin-bottom: 1rem;
  padding-bottom: 0.6rem;
  border-bottom: 2px solid var(--blue);
}

.sidebar-post {
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
  padding: 0.6rem 0;
  border-bottom: 1px solid var(--border);
  font-size: 0.85rem;
  color: var(--text);
  text-decoration: none;
}

.sidebar-post:last-child { border-bottom: none; }
.sidebar-post::after { display: none; }
.sidebar-post:hover span { color: var(--blue); }
.sidebar-post small { color: var(--muted); font-size: 0.75rem; }

@media (max-width: 860px) {
  .single-layout { grid-template-columns: 1fr; }
  .single-sidebar { order: -1; }
}
</style>

<?php get_footer(); ?>
