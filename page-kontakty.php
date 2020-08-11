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
    </div>
    <div class="container-fluid">
      <div class="map">

        <div class="row onmap">
          <div class="onmap__box">
            <ul>
              <li><a href="tel:88120000000"><i class="fa fa-phone" aria-hidden="true"></i> +7(812)000-0000</a></li>
              <li><a href="mailto:info@dataslov.ru"><i class="fa fa-envelope" aria-hidden="true"></i> info@dataslov.ru</a></li>
              <li><i class="fa fa-map-marker" aria-hidden="true"></i> г. Санкт-Петербург, Набережная Фонтанки 14</li>
            </ul>
          </div>
        </div>
        <script type="text/javascript" charset="utf-8" async
          src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4e61a901760e1760d4b37990ec64f7875fd3c09435a0112b99b7ea284f456296&amp;width=100%25&amp;height=600&amp;lang=ru_RU&amp;scroll=true">
        </script>
      </div>
    </div>

    <div class="container">
      <?=do_shortcode('[contact-form-7 id="86" title="Связаться с нами"]');?>
    </div>

  </article>
</main>

<?php get_footer();