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

  <section class="words-slider">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 ">
          <div class="slideshow">

            <ul class="navigation">

              <li class="navigation-item active">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-1.jpeg);"></span>
              </li>
              <!-- slideshow:navigation:item END -->

              <!-- slideshow:navigation:item START -->
              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/statue.jpg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-3.jpg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-4.jpeg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-5.jpg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-6.jpg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/hong.jpg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-8.jpeg);"></span>
              </li>

              <li class="navigation-item">
                <span class="rotate-holder"></span>
                <span class="background-holder" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-9.jpg);"></span>
              </li>


            </ul>

            <div class="detail">

              <div class="detail-item active">
                <div class="headline">INDIA</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider//img-1.jpeg); height: 100vh;"></div>
                <div class="background" style="background-image: url(assets/img/img-1.jpeg); height: 100vh; background-size: cover; background-position: center;"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">AMERICA</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/statue.jpg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">LONDON</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-3.jpg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">JAPAN</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-4.jpeg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">PARIS</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-5.jpg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">SINGAPORE</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-6.jpg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">Sydney</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/hong.jpg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">Istanbul</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-8.jpeg);"></div>
              </div>
              <!-- slideshow:details END -->

              <!-- slideshow:details START -->
              <div class="detail-item">
                <div class="headline">Hong Kong</div>
                <div class="background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/circle-slider/img-9.jpg);"></div>
              </div>
              <!-- slideshow:details END -->
            </div>
          </div>
          <div class="col-12 col-md-4">

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