<footer>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" /></a>
        <div class="contacts">
          <ul>
            <li><i class="fa fa-envelope" aria-hidden="true"></i> <span>info@dataslov.ru</span></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i><span>+7 (812) 000 0000</span></li>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>г. Санкт-Петербург, <br />Набережная Фонтанки 14</span></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <?php

wp_nav_menu([
    'theme_location' => 'footer_menu',
    'menu_id'        => 'footer-menu',
    'depth'          => 2,
    'container'      => false,
    'menu_class'     => 'menu menu-1',
]);?>

      </div>
      <div class="col-12 col-md-3">
        <?php

wp_nav_menu([
    'theme_location' => 'footer_menu_2',
    'menu_id'        => 'footer-menu_2',
    'depth'          => 2,
    'container'      => false,
    'menu_class'     => 'menu menu-2',
]);?>
      </div>
      <div class="col-12 col-md-3 copyright">

        <p>Копирование материалов сайта запрещено</p>
        <p>© <?=date('Y');?> DATASLOV</p>
      </div>
    </div>
  </div>

</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/dist/main.js?<?=time();?>"></script>

<?php wp_footer();?>
</body>

</html>