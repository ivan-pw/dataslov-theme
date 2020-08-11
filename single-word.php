<?php get_header();?>

<main>
  <article class="word-page">
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
          <h1>
            <?=get_the_title();?>
          </h1>
        </div>
      </div>

      <?php if (have_posts()): while (have_posts()): the_post();?>

      <div class="authors row">
        <div class="col-auto">
          <i>Автор(ы): </i><?=get_field('avtory');?>
        </div>
        <div class="col-auto">
          <i>Редактор(ы): </i><?=get_field('redaktory');?>
        </div>
        <div class="col-auto">
          <i>Сбор материала: </i><?=get_field('sbor_materiala');?>
        </div>

        <div class="col-12 text-center">

          <div class="share mt-5"><a class="btn btn-share" data-link="<?=get_post_permalink();?>" data-title="<?=get_the_title();?>" data-desc="<?=get_the_excerpt();?>">Поделиться </a><span></span>
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-12">
          <?php
        $full = get_field('full_description');
        //var_dump($full);
        foreach ($full as $key => $variant) {
            ?>
          <div class="word-variant">
            <h3><?=$variant['variant_znacheniya'];?></h3>

            <div class="word__list">
              <?php

            // var_dump($variant);
            foreach ($variant["znachenie"] as $key => $value) {
                ?>
              <div class="word__list-item row">


                <div class="col">
                  <div class="word__list-name">
                    <b><?=$key + 1?>. </b>
                    <?=$value['znachenie'];?>
                    <div class="word__list-caption"><?=$value['chast_rechi'];?></div>

                  </div>


                  <div class="example-list">
                    <?php
        foreach ($value['primery'] as $key => $example) {
                    ?>
                    <div class="example-list__name"><?=$example['primer_ispolzovaniya'];?></div>
                    <div class="example-list__source"><?=$example['istochnik_primera'];?></div>
                    <?
                }
                ?>
                  </div>
                </div>


                <div class="image-list col-auto">
                  <?
                // var_dump($value);
                foreach ($value['illyustraczii'] as $key => $imgId) {
                    echo '<a data-lightbox="' . $value['znachenie'] . '" href="' . wp_get_attachment_image_url($imgId, "full") . '" class="image-list__link" >
																																																																																		              <img class="team__photo" src="' . wp_get_attachment_image_url($imgId, 'thumbnail') . '" /> </a>';
                }
                ?>
                </div>



              </div>
              <?
            }
            ?>
            </div>
          </div>
          <?
        }
        ?>

        </div>
      </div>

      <div class="word-content">
        <?php the_content();?>
      </div>
      <?php endwhile;endif;?>
    </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="comments-wrapper">
            <?
if (comments_open()) {
    comments_template();
}
?>
          </div>
        </div>
      </div>
    </div>
  </article>

  <section class="linked-articles">
    <div class="container">

      <?php
$posts = get_posts(array(
    'numberposts' => 9,
    'post_type'   => 'article',
    'meta_query'  => array(
        array(
            'key'     => 'svyazannye_slova',
            'value'   => $post->ID,
            'compare' => 'LIKE',
        ),
    ),
));

//var_dump($posts);

if (count($posts) > 0) {
    echo '
      <h2>Статьи по теме</h2>
      <div class="row">
    ';

    foreach ($posts as $key => $post) {
        echo '
        <div class="col-12 col-md-4">
      <h4>' . $post->post_title . '</h4>
      <p>' . preg_replace('/\s+?(\S+)?$/', '', mb_substr(get_field('annotacziya', $post), 0, 301)) . '...</p>
      <a href="' . $post->guid . '" class="btn btn-blue">Подробнее</a>
      </div>
      ';
    }
    echo '
      </div>
    ';
}

?>

    </div>
  </section>

</main>

<?php get_footer();