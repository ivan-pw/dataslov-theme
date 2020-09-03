<footer>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <a class="logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" /></a>
        <div class="contacts">
          <ul>
            <li><a href="mailto:info@dataslov.ru"><i class="fa fa-envelope" aria-hidden="true"></i> <span> info@dataslov.ru</span></a></li>
            <li><a href="tel:8(812)363-61-11"><i class="fa fa-phone" aria-hidden="true"></i><span> 8(812)363-61-11, доб. 3429</span></a></li>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Санкт-Петербург, <br />1-я линия В.О., <br />д. 26, к. 703</span></li>
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

<script src="<?php echo get_template_directory_uri(); ?>/assets/node_modules/share-buttons/dist/share-buttons.js?<?=time();?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/dist/main.js?<?=time();?>"></script>

<?php wp_footer();?>
</body>

</html>