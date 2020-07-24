<footer>
  <?php

wp_nav_menu([
    'theme_location' => 'footer_menu',
    'menu_id'        => 'footer-menu',
    'depth'          => 2,
    'container'      => false,
    'menu_class'     => 'menu menu-1',
]);?>

  <?php

$locations = get_nav_menu_locations();

echo '<div class="menu-name">' . wp_get_nav_menu_object($locations['footer_menu_2'])->name . '</div>';

wp_nav_menu([
    'theme_location' => 'footer_menu_2',
    'menu_id'        => 'footer-menu_2',
    'depth'          => 2,
    'container'      => false,
    'menu_class'     => 'menu menu-2',
]);

echo '<div class="menu-name">' . wp_get_nav_menu_object($locations['footer_menu_3'])->name . '</div>';
wp_nav_menu([
    'theme_location' => 'footer_menu_3',
    'menu_id'        => 'footer-menu_3',
    'depth'          => 2,
    'container'      => false,
    'menu_class'     => 'menu menu-3',
]);?>

</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/dist/main.js"></script>

<?php wp_footer();?>
</body>

</html>