<?php get_header();?>

<main>
  <article>
    <div class="container">
      <div class="row">
        <div class="col-12 ">
          <?php

if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-12">
          <div class="">

            <h1>
              <?=get_the_title();?>
            </h1>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="">
              <?php if (have_posts()): while (have_posts()): the_post();?>
              <?php the_content();?>
              <?php endwhile;endif;?>
            </div>
          </div>
        </div>
      </div>
  </article>
</main>

<?php get_footer();