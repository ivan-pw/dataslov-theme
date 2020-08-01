<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <meta charset="<?php bloginfo('charset');?>" />
  <title><?php wp_title();?>
  </title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/vox-fav.png" type="image/png">

  <?php if (is_singular() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
}?>

  <?php wp_head()?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/dist/main.css?<?=time();?>">

</head>

<body <?php body_class();?>>


  <header class="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light row">
        <a class="navbar-brand col-8 col-md-4" href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo--blue.svg" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <?php
wp_nav_menu([
    'theme_location' => 'header_menu',
    'menu_id'        => 'top-menu',
    'depth'          => 3,
    'container'      => false,
    'menu_class'     => 'navbar-nav',
    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
    'walker'         => new WP_Bootstrap_Navwalker(),
]);
?>
        </div>
      </nav>
    </div>
  </header>