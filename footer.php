<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <a class="logo" href="/"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" /></a>
                <div class="contacts">
                    <ul>
                        <li><a href="mailto:info@dataslov.ru"><i class="fa fa-envelope" aria-hidden="true"></i> <span>
                                    info@dataslov.ru</span></a></li>
                        <li><a href="tel:8(812)363-61-11"><i class="fa fa-phone" aria-hidden="true"></i><span>
                                    8(812)363-61-11, доб. 3429</span></a></li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Санкт-Петербург, <br />1-я линия
                                В.О., <br />д. 26, к. 703</span></li>
                        <li><a href="https://vk.com/dataslov" target="_blank"><i class="fa  fa-vk"
                                    aria-hidden="true"></i><span class="mt-1">VK<br /></span></a></li>
                        <li><a href="https://t.me/dataslov" target="_blank"><i class="fa  fa-telegram"
                                    aria-hidden="true"></i><span class="mt-1">Telegram<br /></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <?php

wp_nav_menu([
    'theme_location' => 'footer_menu',
    'menu_id' => 'footer-menu',
    'depth' => 2,
    'container' => false,
    'menu_class' => 'menu menu-1',
]);?>

            </div>
            <div class="col-12 col-md-3">
                <?php

wp_nav_menu([
    'theme_location' => 'footer_menu_2',
    'menu_id' => 'footer-menu_2',
    'depth' => 2,
    'container' => false,
    'menu_class' => 'menu menu-2',
]);?>
            </div>
            <div class="col-12 col-md-3 copyright">

                <p>Копирование материалов сайта запрещено</p>
                <p>© <?=date('Y');?> DATASLOV</p>
                <p><small>created by <a href="//ivan.pw" target="_blank">ivan.pw</a></small></p>
            </div>
        </div>
    </div>

</footer>



<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function(m, e, t, r, i, k, a) {
    m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
    };
    m[i].l = 1 * new Date();
    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k,
        a)
})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(67224415, "init", {
    clickmap: true,
    trackLinks: true,
    accurateTrackBounce: true,
    webvisor: true
});
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/67224415" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177779491-1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'UA-177779491-1');
</script>


<script src="//cdn.jsdelivr.net/npm/share-buttons/dist/share-buttons.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/dist/main.js?<?=time();?>"></script>

<?php wp_footer();?>
</body>

</html>