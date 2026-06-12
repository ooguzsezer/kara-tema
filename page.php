<?php get_header(); ?>

<div class="page-wrap">
  <div class="container">

    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
      <span>/</span>
      <span><?php the_title(); ?></span>
    </nav>

    <?php while (have_posts()) : the_post(); ?>
      <article class="page-content">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="page-body">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>

  </div>
</div>

<?php get_footer(); ?>
