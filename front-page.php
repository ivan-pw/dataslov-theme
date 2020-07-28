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

              #hour,
              #minute {
                background: transparent;
              }

              #second {
                background: #0e4c80;
              }


              #hour:before,
              #minute:before {
                content: '';
                position: absolute;
                display: block;
                bottom: 0;
              }

              #hour:before {
                background: transparent url(http://dataslov.ru/wp-content/themes/dataslov/assets/img/clock-arrows/arrow-3.svg) no-repeat bottom center / contain;
                width: 600%;
                height: 500%;
                left: -229%;
              }

              #minute:before {
                background: transparent url(http://dataslov.ru/wp-content/themes/dataslov/assets/img/clock-arrows/arrow-1.svg) no-repeat bottom center / contain;
                width: 627%;
                height: 146%;
                left: -269%;
                bottom: -15%;
              }
              </style>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="words-slider">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 ">
          <div class="timeline">
            <div class="swiper-container">
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
              <div class="swiper-wrapper"></div>
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

  <section>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;endif;?>
  </section>
</main>


<?php get_footer();