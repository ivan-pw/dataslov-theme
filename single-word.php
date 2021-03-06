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
                <?php
                if (get_field('avtory')) {
                    ?>
                <div class="col-auto">
                    <i>Автор(ы): </i><?=get_field('avtory'); ?>
                </div>
                <?php
                }
                ?>

                <?php
                if (get_field('redaktory')) {
                    ?>
                <div class="col-auto">
                    <i>Редактор(ы): </i><?=get_field('redaktory'); ?>
                </div>
                <?php
                }
                ?>


                <?php
                if (get_field('sbor_materiala')) {
                    ?>
                <div class="col-auto">
                    <i>Сбор материала: </i><?=get_field('sbor_materiala'); ?>
                </div>
                <?php
                }
                ?>


                <div class="col-12 text-center d-md-flex justify-content-center">

                    <div class="share mt-5 mt-md-3"><a class="btn btn-share" data-link="<?=get_post_permalink();?>" data-title="<?=get_the_title();?>" data-desc="<?=get_the_excerpt();?>">Поделиться
                        </a><span></span>
                    </div>
                    <a class="btn btn-comments ml-md-3 mt-3 mt-md-3" href="<?=get_post_permalink();?>#comments">Предложить изменения</a>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <?php
        $full = get_field('full_description');
        //var_dump($full);

        $keyVar = 0;
        foreach ($full as $key => $variant) {
            ?>
                    <div class="word-variant">
                        <h3><?=$variant['variant_znacheniya']; ?>
                        </h3>

                        <div class="word__list">
                            <?php

            // var_dump($variant);

            foreach ($variant['znachenie'] as $key => $value) {
                $keyVar++; ?>
                            <div class="word__list-item row">


                                <div class="col">
                                    <div class="word__list-name">
                                        <b><?=$keyVar?>. </b>
                                        <?=$value['znachenie']; ?>
                                        <div class="word__list-caption"><?=$value['chast_rechi']; ?>
                                        </div>

                                    </div>


                                    <div class="example-list">
                                        <?php
        foreach ($value['primery'] as $key => $example) {
            ?>
                                        <div class="example-list__name"><?php

        $primerText = str_replace('???', '&#119070;', $example['primer_ispolzovaniya']);
            if (strpos($primerText, ':::') === false) {
                echo '<i>' . $primerText . '</i>';
            } else {
                $str = explode(':::', $primerText);
                echo $str[0] . ': <i>' . $str[1] . '</i>';
            } ?>
                                        </div>
                                        <div class="example-list__source"><?=$example['istochnik_primera']; ?>
                                        </div>
                                        <?php
        } ?>
                                    </div>
                                </div>


                                <div class="image-list col-auto">
                                    <?php
                // var_dump($value);
                foreach ($value['illyustraczii'] as $key => $imgId) {
                    echo '<a data-lightbox="' . $value['znachenie'] . '" href="' . wp_get_attachment_image_url($imgId, 'full') . '" class="image-list__link" ><img class="team__photo" src="' . wp_get_attachment_image_url($imgId, 'thumbnail') . '" /> </a>';
                } ?>
                                </div>



                            </div>
                            <?php
            } ?>
                        </div>
                    </div>
                    <?php
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
                        <a name="comments"></a>
                        <?php
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
$posts = get_posts([
                'numberposts' => 9,
                'post_type' => 'article',
                'meta_query' => [
                    [
                        'key' => 'svyazannye_slova',
                        'value' => $post->ID,
                        'compare' => 'LIKE',
                    ],
                ],
            ]);

//var_dump($posts);

if (count($posts) > 0) {
    echo '
      <h2>Статьи по теме</h2>
      <div class="row">
    ';

    foreach ($posts as $key => $post) {
        echo '
        <div class="col-12 col-md-4 mb-5">
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