<?php get_header();?>

<main>
  <article class="library-page">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <div class="">

            <h1>
              <?=get_the_title();?>
            </h1>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8 offset-md-2">
            <div class="">
              <?php if (have_posts()): while (have_posts()): the_post();?>
              <?php the_content();?>
              <?php endwhile;endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container library-filter mt-5">
      <div class="row library-filter__type">
        <div class="col library-filter__type__items-wrapper">
          <?
$terms = get_terms('article_type', array(
    'hide_empty' => false,
));

foreach ($terms as $key => $term) {
    echo '<span class="library-filter__type__item" data-term-id="' . $term->term_id . '" data-term-name="' . $term->name . '">' . $term->name . '</span>';
}
?>
        </div>
      </div>



      <div class="row library-filter__year">
        <div class="col-auto library-filter__name">
          Год:
        </div>
        <div class="col library-filter__items-wrapper">
          <?
$terms = get_terms('word_year', array(
    'hide_empty' => false,
));

foreach ($terms as $key => $term) {
    echo '<span class="library-filter__item" data-term-id="' . $term->term_id . '" data-term-name="' . $term->name . '">' . $term->name . '</span>';
}
?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 articles-list ">

        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer();