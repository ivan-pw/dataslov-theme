<?php get_header()?>

<main>
  <section class="presentation">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-5">
          <h1 class="text-uppercase">Dataslov</h1>
          <p><b>Медиасловарь ключевых слов текущего момента</b> задуман как уникальный
            лексикографический продукт, сочетающий достижения русской лексикографической
            традиции и новейшие технологии.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;endif;?>
  </section>
</main>


<?php get_footer();