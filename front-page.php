<?php get_header()?>

<main>
    <section class="presentation">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <h1 class="text-uppercase">Dataslov</h1>
                    <p><b>Медиасловарь ключевых слов текущего момента</b> задуман как уникальный
                        лексикографический продукт, сочетающий достижения русской лексикографической
                        традиции и новейшие технологии.</p>
                </div>
                <div class="col-12 col-md-8">
                    <div class="back">
                        <div class="clock__wrapper">
                            <img class="hand" src="<?php echo get_template_directory_uri(); ?>/assets/img/hand.png" />
                            <style>
                            /* for shadow */
                            .clock {
                                border: 2px solid transparent
                            }

                            .clock>svg {
                                display: none;
                            }

                            #hour,
                            #minute {
                                background: transparent;
                            }

                            #minute {
                                top: 10%;
                                height: 40%;
                                width: 6%;
                            }

                            #second {
                                background: #0e4c80;
                            }

                            .clock.simple:after {
                                background: #0f4c81;
                            }


                            #hour:before,
                            #minute:before {
                                content: '';
                                position: absolute;
                                display: block;
                                bottom: 0;
                            }

                            #hour:before {
                                background: transparent url(http://dataslov.ru/wp-content/themes/dataslov/assets/img/clock-arrows/arrow-3.svg) no-repeat bottom center / contain;
                                width: 600%;
                                height: 500%;
                                left: -229%;
                            }

                            #minute:before {
                                background: transparent url(http://dataslov.ru/wp-content/themes/dataslov/assets/img/clock-arrows/arrow-1.svg) no-repeat bottom center / contain;
                                width: 627%;
                                height: 146%;
                                left: -269%;
                                bottom: -15%;
                            }
                            </style>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--
  <section class="words-slider">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 ">
          <div class="timeline">
            <div class="swiper-container">
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
              <div class="swiper-wrapper"></div>
            </div>
          </div>
        </div>
      </div>
  </section> -->

    <section class="words-slider">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-2 ">
                    <ul class='circle-container'>
                    </ul>
                </div>
                <div class="col-8 col-md-6 words-container">
                    <div class="description"></div>
                </div>
                <div class="col-12 col-md-4 words-list-wrapper">
                    <div class="words-list"></div>
                </div>
            </div>
    </section>

    <!-- <section class="circle-slider">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 ">
          <div class="circle-slider-block">

          </div>
        </div>
      </div>
  </section> -->

    <section class="conception">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Концепция проекта</h2>
                </div>
            </div>
            <div class="row level level-1">
                <div class="col-12 col-md-3">
                    <h4 class="text-uppercase">Наша миссия</h4>
                    <div class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/conception/level-1.svg" />
                    </div>
                </div>
                <div class="col-12 col-md-6 description">
                    <p>Медиасловарь ключевых слов текущего момента задуман как уникальный лексикографический продукт, сочетающий достижения русской лексикографической традиции и новейшие технологии.</p>
                    <p>Мы искренне убеждены, что словарь, представляющий новейшие элементы актуальной картины мира, должен быть интерактивным.</p>
                </div>
                <div class="col-12 col-md-3">
                    <ul>
                        <li><b>МИССИЯ</b></li>
                        <li>ИДЕЯ</li>
                        <li>ПРОЕКТ</li>
                        <li>БУДУЩЕЕ</li>
                    </ul>
                </div>
            </div>
            <div class="row level level-2">
                <div class="col-12 col-md-3">
                    <h4 class="text-uppercase">ИДЕЯ СОЗДАНИЯ МЕДИАСЛОВАРЯ</h4>
                    <div class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/conception/level-2.svg" />
                    </div>
                </div>
                <div class="col-12 col-md-6 description">
                    <p>Сама идея медиасловаря появилась ещё в 2017 году. С тех пор мы много раз обсуждали её между собой, делились нашими мыслями с коллегами, апробировали первые результаты на конференциях,
                        писали статьи - постепенно идея крепла, обретала чёткость и конкретику, крепло и наше убеждение в необходимости её осуществления на практике.
                    </p>
                </div>
                <div class="col-12 col-md-3">
                    <ul>
                        <li>МИССИЯ</li>
                        <li><b>ИДЕЯ</b></li>
                        <li>ПРОЕКТ</li>
                        <li>БУДУЩЕЕ</li>
                    </ul>
                </div>
            </div>
            <div class="row level level-3">
                <div class="col-12 col-md-3">
                    <h4 class="text-uppercase">ЗАПУСК ПРОЕКТА</h4>
                    <div class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/conception/level-3.svg" />
                    </div>
                </div>
                <div class="col-12 col-md-6 description">
                    <p>Запуск данной платформы произошёл при поддержке Благотворительного фонда Владимира Потанина в рамках проекта “Разработка интерактивной образовательной платформы как онлайн компонента к
                        учебному курсу “Языковая картина современности” для направления магистратуры “Медиатекст в массовых коммуникациях” (договор № ГСГК-55/20).</p>
                </div>
                <div class="col-12 col-md-3">
                    <ul>
                        <li>МИССИЯ</li>
                        <li>ИДЕЯ</li>
                        <li><b>ПРОЕКТ</b></li>
                        <li>БУДУЩЕЕ</li>
                    </ul>
                </div>
            </div>
            <div class="row level level-4">
                <div class="col-12 col-md-3">
                    <h4 class="text-uppercase">ЗАЧЕМ НУЖЕН МЕДИАСЛОВАРЬ</h4>
                    <div class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/conception/level-4.svg" />
                    </div>
                </div>
                <div class="col-12 col-md-6 description">
                    <p>Именно поэтому основное предназначение онлайн-платформы на данном этапе - апробация эмпирического материала в учебной аудитории. На основе разработанной методики мы предлагаем обучающимся
                        выявлять ключевые слова эпохи и, учитывая выявленные контексты, создавать дефиниции как основу словарных статей.</p>
                </div>
                <div class="col-12 col-md-3">
                    <ul>
                        <li>МИССИЯ</li>
                        <li>ИДЕЯ</li>
                        <li>ПРОЕКТ</li>
                        <li><b>БУДУЩЕЕ</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="howto text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="">Как стать участником проекта?</h2>
                </div>
            </div>
            <div class="row big-arrow">
                <div class="col-12 col-md-3 item">
                    <div class="num">I.</div>
                    <p><b>Зарегистрироваться</b><br /> на сайте</p>
                </div>
                <div class="col-12 col-md-3 item">
                    <div class="num">II.</div>
                    <p><b>Подождать одобрения</b> <br />своей учетной записи</p>
                </div>
                <div class="col-12 col-md-3 item">
                    <div class="num">III.</div>
                    <p><b>Предложить новое определение</b> <br />или внести изменение</p>
                </div>
                <div class="col-12 col-md-3 item">
                    <div class="num">IV.</div>
                    <p><b>Одобренное определение</b> <br />добавят на сайт ведущие проекта</p>
                </div>
            </div>
            <div class="row text-center">
                <a href="/wp-login.php?action=register" class="btn btn-white mt-5">Зарегистрироваться</a>
            </div>
        </div>
    </section>

    <section class="team">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2>Наша команда</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 mb-5">
                    <p>В состав нашей команды вошли по-настоящему увлечённые люди - преподаватели <a href="/kontakty/">Института “Высшая школа журналистики и массовых коммуникаций”</a>
                        Санкт-Петербургского государственного университета.</p>
                    <p>Сама идея проекта возникла во время обсуждения актуальных процессов современного языка медиа: особенностей словообразования и функционирования новых лексических единиц.</p>
                    <p>Что может быть важно как медиадеятелю, так и читателю? Что становится объединяющим моментом в их взаимодействии? Что одновременно даёт исчерпывающую информацию и обеспечивает установление
                        неразрывного контакта? Что характеризует эпоху? Без чего нет общей картины современности? Ответ пришёл довольно быстро - ключевое слово текущего момента. И повлёк за собой сопутствующие
                        решения.</p>
                    <p>Ключ к тексту - <a href="/slovnik/">точное понимание слова</a>, а это обеспечивается словарной работой. Отсюда идея создания медиасловаря. Почему именно МЕДИАсловаря? Потому что сегодня
                        именно
                        здесь формируется актуальная языковая картина мира. Медиадискурс сегодня - законодатель языковой моды. Здесь кристаллизуется семантика и прагматика употребления актуальной лексики эпохи,
                        здесь возникают новые коннотации, впоследствии закрепляющиеся в узусе.</p>
                    <p>А что должно стать уникальной особенностью медиасловаря? В чём особенность медиадискурса, выделяющая его среди других пространств существования языка? Интерактивность. Со-творчество. И,
                        конечно, словарь, обслуживающий медиа, должен быть интерактивным. Наша команда приглашает к <a href="/o-slovare/"></a>сотрудничеству</a> всех, кто готов вдумываться в контексты
                        употребления слова,
                        разбираться в тонкостях его значения и быть причастным к тому, чтобы остановить мгновение...</p>

                </div>
            </div>
            <div class="row">

                <?php
$users = get_users([
                    'role' => 'administrator',
                    'exclude' => [1],
                ]);

foreach ($users as $user) {
    $meta = get_user_meta($user->ID);
    //var_dump($meta);

    //rol_v_proekte
    echo '
      <div class="col-12 col-md-4">
        <div class="user">
          <img class="team__photo" src="' . wp_get_attachment_image_url(get_field('foto', 'user_' . $user->ID), [300, 300]) . '" />
          <h5 class="team__name">
          ' . $meta['first_name'][0] . '
          ' . $meta['otchestvo'][0] . ' <br />
          ' . $meta['last_name'][0] . '
          </h5>
          <p>' . get_field('rol_v_proekte', 'user_' . $user->ID) . '</p>
        </div>
      </div>
      ';
}
?>
            </div>

        </div>

    </section>

    <!-- <section>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;endif;?>
    </section>

    <section>
        <?php if (have_posts()): while (have_posts()): the_post();?>
        <?php the_content();?>
        <?php endwhile;endif;?>
    </section> -->
</main>


<?php get_footer();