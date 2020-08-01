<?php get_header();?>

<main>
  <article class="word-page">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h1>
            <?=get_the_title();?>
          </h1>
        </div>
      </div>
      <div class="container">

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
        </div>

        <?php
        $full = get_field('full_description');
        //var_dump($full);

        ?>

        <div class="row">
          <div class="col-12">
          </div>
        </div>


        <?php the_content();?>
        <?php endwhile;endif;?>
      </div>
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