<?php get_header()?>

<main>
  <section class="presentation">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
          <h1 class="text-uppercase">Dataslov</h1>
          <p><b>Медиасловарь ключевых слов текущего момента</b> задуман как уникальный
            лексикографический продукт, сочетающий достижения русской лексикографической
            традиции и новейшие технологии.</p>
        </div>
        <div class="col-12 col-md-8">
          <div class="back">
            <div class="clock__wrapper">
              <img class="hand" src="<?php echo get_template_directory_uri(); ?>/assets/img/clocks.svg" />
              <style>
              /* for shadow */
              .clock {
                border: 2px solid transparent
              }

              .clock>svg {
                display: none;
              }
              </style>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;endif;?>
  </section>
</main>


<?php get_footer();