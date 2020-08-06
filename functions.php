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

function register_post_types()
{
    $labels = [
        'name'               => 'Слово',
        'singular_name'      => 'Слово', // админ панель Добавить->Функцию
        'add_new'            => 'Добавить Слово',
        'add_new_item'       => 'Добавить новое Слово', // заголовок тега <title>
        'edit_item'          => 'Редактировать Слово',
        'new_item'           => 'Новое Слово',
        'all_items'          => 'Все Слова',
        'view_item'          => 'Просмотр Слова на сайте',
        'search_items'       => 'Искать Слово',
        'not_found'          => 'Слово не найдено.',
        'not_found_in_trash' => 'В корзине нет Слова.',
        'menu_name'          => 'Слова', // ссылка в меню в админке
    ];
    $args = [
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_position' => 20, // порядок в меню
        'supports'      => ['title', 'editor', 'author', 'thumbnail', 'comments'],
    ];
    register_post_type('word', $args);

    $labels = [
        'name'               => 'Статья',
        'singular_name'      => 'Статья', // админ панель Добавить->Функцию
        'add_new'            => 'Добавить Статью',
        'add_new_item'       => 'Добавить новую Статью', // заголовок тега <title>
        'edit_item'          => 'Редактировать Статью',
        'new_item'           => 'Новая Статья',
        'all_items'          => 'Все Статьи',
        'view_item'          => 'Просмотр Статей на сайте',
        'search_items'       => 'Искать Статьи',
        'not_found'          => 'Статьи не найдены.',
        'not_found_in_trash' => 'В корзине нет Статей.',
        'menu_name'          => 'Статьи', // ссылка в меню в админке
    ];
    $args = [
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_position' => 20, // порядок в меню
        'supports'      => ['title', 'editor', 'author', 'thumbnail'],
    ];
    register_post_type('article', $args);

}
add_action('init', 'register_post_types');

function add_custom_taxonomies()
{
// Labels part for the GUI

    $labels = array(
        'name'                       => _x('Год', 'taxonomy general name'),
        'singular_name'              => _x('Год', 'taxonomy singular name'),
        'search_items'               => __('Найти Год'),
        'popular_items'              => __('Popular Topics'),
        'all_items'                  => __('Все Года'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Изменить Год'),
        'update_item'                => __('Обновить Год'),
        'add_new_item'               => __('Добавить новый Год'),
        'new_item_name'              => __('New Topic Name'),
        'separate_items_with_commas' => __('Separate topics with commas'),
        'add_or_remove_items'        => __('Add or remove topics'),
        'choose_from_most_used'      => __('Choose from the most used topics'),
        'menu_name'                  => __('Года'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('word_year', ['word', 'article'], array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'word_year'),
        'show_in_quick_edit'    => true,
    ));

// Labels part for the GUI

    $labels = array(
        'name'                       => _x('Буква', 'taxonomy general name'),
        'singular_name'              => _x('Буква', 'taxonomy singular name'),
        'search_items'               => __('Найти Букву'),
        'popular_items'              => __('Popular Topics'),
        'all_items'                  => __('Все Буквы'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Изменить Букву'),
        'update_item'                => __('Обновить Букву'),
        'add_new_item'               => __('Добавить новую Букву'),
        'new_item_name'              => __('New Topic Name'),
        'separate_items_with_commas' => __('Separate topics with commas'),
        'add_or_remove_items'        => __('Add or remove topics'),
        'choose_from_most_used'      => __('Choose from the most used topics'),
        'menu_name'                  => __('Буквы'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('word_letter', 'word', array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'word_letter'),
        'show_in_quick_edit'    => true,
    ));

// Labels part for the GUI

    $labels = array(
        'name'                       => _x('Тип спатьи', 'taxonomy general name'),
        'singular_name'              => _x('Тип спатьи', 'taxonomy singular name'),
        'search_items'               => __('Найти Тип спатьи'),
        'popular_items'              => __('Popular Тип спатьи'),
        'all_items'                  => __('Все Типы спатей'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Изменить Тип спатьи'),
        'update_item'                => __('Обновить Тип спатьи'),
        'add_new_item'               => __('Добавить новый Тип спатьи'),
        'new_item_name'              => __('New Topic Name'),
        'separate_items_with_commas' => __('Separate topics with commas'),
        'add_or_remove_items'        => __('Add or remove topics'),
        'choose_from_most_used'      => __('Choose from the most used topics'),
        'menu_name'                  => __('Типы спатей'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('article_type', 'article', array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'article_type'),
        'show_in_quick_edit'    => true,
    ));
}
add_action('init', 'add_custom_taxonomies', 0);

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

function filter_rest_work_query($args, $request)
{
    $params = $request->get_params();
    if (isset($params['word_year_slug'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'word_year',
                'field'    => 'slug',
                'terms'    => explode(',', $params['word_year_slug']),
            ),
        );
    }
    return $args;
}
// add the filter
add_filter("rest_work_query", 'filter_rest_work_query', 10, 2);

add_action('register_form', 'myplugin_register_form');
function myplugin_register_form()
{

    $first_name = (!empty($_POST['first_name'])) ? trim($_POST['first_name']) : '';
    $last_name  = (!empty($_POST['last_name'])) ? trim($_POST['last_name']) : '';

    ?>
<p>
  <label for="first_name"><?php _e('Имя', 'mydomain')?><br />
    <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(wp_unslash($first_name)); ?>" size="25" /></label>
</p>

<p>
  <label for="last_name"><?php _e('Фамилия', 'mydomain')?><br />
    <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(wp_unslash($last_name)); ?>" size="25" /></label>
</p>

<?php
}

//2. Add validation. In this case, we make sure first_name is required.
add_filter('registration_errors', 'myplugin_registration_errors', 10, 3);
function myplugin_registration_errors($errors, $sanitized_user_login, $user_email)
{

    if (empty($_POST['first_name']) || !empty($_POST['first_name']) && trim($_POST['first_name']) == '') {
        $errors->add('first_name_error', __('<strong>ERROR</strong>: You must include a first name.', 'mydomain'));
    }
    // if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['first_name'] ) == '' ) {
    //     $errors->add( 'last_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
    // }
    if (empty($_POST['last_name']) || !empty($_POST['last_name']) && trim($_POST['last_name']) == '') {
        $errors->add('last_name_error', __('<strong>ERROR</strong>: You must include a first name.', 'mydomain'));
    }
    return $errors;
}

//3. Finally, save our extra registration user meta.
add_action('user_register', 'myplugin_user_register');
function myplugin_user_register($user_id)
{
    if (!empty($_POST['first_name'])) {
        update_user_meta($user_id, 'first_name', trim($_POST['first_name']));
        update_user_meta($user_id, 'last_name', trim($_POST['last_name']));
    }
}

function my_login_logo()
{
    ?>
<style type="text/css">
body {
  background: #ffffff !important;
}

body #login h1 {
  background-image: unset;
  background: url('<?php echo get_template_directory_uri(); ?>/assets/img/logo--blue.svg') no-repeat 50% 50% / contain;
  width: 100%;
  padding-top: 100px;
}

body #login h1 a {
  display: none;
}

body #login form {
  margin-top: 20px;
  margin-left: 0;
  padding: 26px 24px 46px;
  font-weight: 400;
  overflow: hidden;
  background: #007fc7;
  color: #fff;
  border: 1px solid #ccd0d4;
  box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
  border-radius: 5px;
}


body #login form .submit #wp-submit {
  border: 2px solid #1f5e82 !important;
  background: #fff !important;
  color: #007fc7 !important;
  text-transform: uppercase !important;
  font-weight: 800 !important;
</style>
}
<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');

add_filter('get_comment_author', 'comments_filter_uprise', 10, 1);

function comments_filter_uprise($author = '')
{
    $comment = get_comment($comment_author_email);

    if (!empty($comment->comment_author_email)) {
        if (!empty($comment->comment_author_email)) {
            $user   = get_user_by('email', $comment->comment_author_email);
            $author = $user->first_name . ' ' . $user->last_name;
        } else {
            $user   = get_user_by('email', $comment->comment_author_email);
            $author = $user->first_name;
        }
    } else {
        $user   = get_userdata($comment->user_id);
        $author = $user->first_name . ' ' . $user->last_name;
        $author = $comment->comment_author;
    }
    return $author;
}