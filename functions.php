<?php

// author ivan@ivan.pw
// *************************************

//define(‘WP_DEBUG’, true);

add_image_size('list_preview', 400, 600, false);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_action('init', 'register_post_types');

function register_post_types()
{
    $labels = [
        'name'               => 'Точки продаж',
        'singular_name'      => 'Точки продаж', // админ панель Добавить->Функцию
        'add_new'            => 'Добавить Точки продаж',
        'add_new_item'       => 'Добавить новый Точки продаж', // заголовок тега <title>
        'edit_item'          => 'Редактировать Точки продаж',
        'new_item'           => 'Новое Точки продаж',
        'all_items'          => 'Все Точки продаж',
        'view_item'          => 'Просмотр Точки продаж на сайте',
        'search_items'       => 'Искать Точки продаж',
        'not_found'          => 'Точки продаж не найдено.',
        'not_found_in_trash' => 'В корзине нет Точки продаж.',
        'menu_name'          => 'Точки продаж', // ссылка в меню в админке
    ];
    $args = [
        'labels'        => $labels,
        'public'        => false,
        'show_ui'       => true, // показывать интерфейс в админке
        'has_archive'   => false,
        'menu_position' => 20, // порядок в меню
        'supports'      => ['title', 'editor', 'author', 'thumbnail'],
    ];
    register_post_type('shop', $args);

    $labels = [
        'name'               => 'Продукт',
        'singular_name'      => 'Продукт', // админ панель Добавить->Функцию
        'add_new'            => 'Добавить Продукт',
        'add_new_item'       => 'Добавить новый Продукт', // заголовок тега <title>
        'edit_item'          => 'Редактировать Продукт',
        'new_item'           => 'Новый Продукт',
        'all_items'          => 'Все Продукты',
        'view_item'          => 'Просмотр Продуктов на сайте',
        'search_items'       => 'Искать Продукт',
        'not_found'          => 'Продукт не найден.',
        'not_found_in_trash' => 'В корзине нет Продуктов.',
        'menu_name'          => 'Продукты', // ссылка в меню в админке
    ];
    $args = [
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'has_archive'   => false,
        'menu_position' => 20, // порядок в меню
        'supports'      => ['title', 'editor', 'author', 'thumbnail'],
    ];
    register_post_type('product', $args);
}

//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

function vox_widgets_init()
{
    register_sidebar([
        'name'          => 'contacts',
        'id'            => 'contacts',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="contacts-widget">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'vox_widgets_init');

add_theme_support('post-thumbnails');

add_action('wpcf7_submit', 'action_wpcf7_submit', 10, 2);

add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu'   => 'Меню в шапке',
        'footer_menu'   => 'Меню в подвале',
        'footer_menu_2' => 'Меню в подвале 2',
        'footer_menu_3' => 'Меню в подвале 3',
    ]);
});