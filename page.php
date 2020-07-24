<?php get_header(); ?>

<article class="article-page">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
  <section class="top">
    <div class="container-fluid top-text"
      style="background: url(<?=get_the_post_thumbnail_url($post, 'large');?>) no-repeat 50% 50% / cover;">
      <div class="row">
        <div class="col-12">
          <div class="container-custom">
            <h1>
              <span><?=get_the_title();?></span>
            </h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-custom">
      <div class="row">
        <div class="col-12">
          <div class="">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>
</article>

<?php get_footer();
