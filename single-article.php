<?php get_header();?>

<main>
  <article class="article-page">
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

      <div class="article-content">
        <?php the_content();?>

        <?// var_dump(get_field('svyazannye_slova'));?>

        <div class="articles-list ">
          <div class="articles-list__item row">
            <div class="col-12 col-md-6">
              <div class="article-type">
                <?=wp_get_post_terms($post->ID, 'article_type')[0]->name?>
              </div>
              <?if (strlen(get_field('avtory')) > 2) {?>
              <div class="authors"><i>Авторы:</i><br><?=get_field('avtory')?></div>
              <?php }?>
              <div class="row">

                <?if (strlen(get_field('nazvanie_izdaniya')) > 2) {?>
                <div class="col-12">
                  <div class="publish"><i>Название издания:</i><br><?=get_field('nazvanie_izdaniya')?></div>
                </div>
                <?php }?>

                <?if (strlen(get_field('gorod')) > 2) {?>
                <div class="col">
                  <div class="city"><i>Город:</i><br><?=get_field('gorod')?></div>
                </div>
                <?php }?>

                <?if (strlen(get_field('god')) > 2) {?>
                <div class="col">
                  <div class="year"><i>Год:</i><br><?=get_field('god')?></div>
                </div>
                <?php }?>

                <?if (strlen(get_field('straniczy')) > 2) {?>
                <div class="col">
                  <div class="pages"><i>Страницы:</i><br><?=get_field('straniczy')?></div>
                </div>
                <?php }?>
              </div>
              <div class="link"><i>Ссылка на публикацию: </i><br><a href="<?=get_field('ssylka_na_publikacziyu')?>" target=" _blank"><?=get_field('ssylka_na_publikacziyu')?></a></div>
              <div class="linked-words"><i>Связанные слова: </i><br>
                <?
        foreach (get_field('svyazannye_slova') as $key => $word) {
            if ($key > 0) {
                echo ', ';
            }
            echo '<a href="' . $word->guid . '">' . $word->post_title . '</a>';
        }
        ?>

              </div>

            </div>
            <div class="col-12 col-md-6">
              <div class="annotation">
                <h6>Аннотация</h6>
                <?=get_field('annotacziya')?>
              </div>

            </div>
          </div>

        </div>
        <?php endwhile;endif;?>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-12 slovnik-list ">

          </div>
        </div>
      </div>
  </article>
</main>

<?php get_footer();