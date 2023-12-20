<?php /* Template Name: Notícias */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(28); ?>

<section id="news_page" class="page-common">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0 px-md-3">
                <div class="main-banner owl-carousel owl-theme">
                    <?php if (!empty($page_fields['noticias_em_destaque'])): ?>
                        <?php foreach ($page_fields['noticias_em_destaque'] as $key => $post): ?>
                            <?php $post = $post['noticia']; ?>
                            <div class="container wide">
                                <a href="<?= get_the_permalink($post->ID) ?>">
                                    <div class="slide mb-4" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID) ?>')">
                                        <div class="container wide">
                                            <div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
                                                <div class="col-md-6 pb-3 pb-md-0">
                                                    <?php $categorias = wp_get_post_terms($post->ID, 'categorias'); ?>
                                                    <?php if (count($categorias)): ?>
                                                        <h3 class="text-white mb-2">
                                                            <?php foreach ($categorias as $i => $cat): ?>
                                                                <span href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></span><?= ($i < count($categorias) - 1) ? ', ' : '' ?>
                                                            <?php endforeach; ?>
                                                        </h3>
                                                    <?php endif; ?>
                                                    <h2 class="text-white mb-0 mb-md-4"><?= limit_text(get_the_title($post->ID), 50) ?></h2>
                                                    <div class="btn btn-white-outlined btn-sm glitch-white-hover">
                                                        <span class="glitch dark" data-text="Confira">Confira</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        $post_not_in = [];
        $news = new WP_Query(['posts_per_page' => 4, 'post_type' => 'news', 'orderby' => 'date', 'order' => 'DESC']);
        if (!empty($news)): ?>
            <div class="my-5 py-5 bg-light">
                <div class="container wide block block-news">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-header">
                                <!-- <div class="float-right pt-3">
                                    <a class="link text-underline mr-3" href="#">ÚLTIMAS NOTÍCIAS</a>
                                    <a class="link" href="#">MAIS LIDAS</a>
                                </div> -->
                                <h2 class="title">Últimas Notícias</h2>
                                <p class="subtitle">Fique atualizado com as novidades da MIBR</p>
                            </div>
                            <div class="news-list owl-carousel owl-carousel-custom-nav">
                                <?php
                                    while ($news->have_posts()): $news->the_post(); ?>
                                        <a class="card news mb-4" href="<?= get_post_permalink() ?>">
                                            <div class="content">
                                                <div class="image" style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></div>
                                                <div class="title mt-2 mb-2"><?= get_the_title() ?></div>
                                                <div class="description"><?= get_the_date() ?></div>
                                            </div>
                                        </a>
                                <?php   $post_not_in[] = get_the_ID();
                                    endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            wp_reset_query();
            wp_reset_postdata();
        endif;
    ?>

    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $wp_query = new WP_Query(['post_type' => 'news', 'posts_per_page' => 8, 'paged' => $paged, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in' => $post_not_in]);
        if (!empty($wp_query)): ?>
            <div class="container wide block block-youtube my-5 pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-header">
                            <!-- <div class="float-right filters ml-5">
                                <div class="each px-3 active">TODOS</div>
                                <div class="each px-3">CS:GO</div>
                                <div class="each px-3">RAINBOW SIX</div>
                            </div> -->
                            <h2 class="title">Mais Notícias</h2>
                            <p class="subtitle">Fique atualizado com as novidades da MIBR</p>
                        </div>
                    </div>
                    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                        <div class="card news col-md-3 mb-4">
                            <div class="content">
                                <a href="<?= get_post_permalink() ?>">
                                    <div class="image" style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></div>
                                </a>
                                <div class="category mt-2 mb-2">
                                    <?php $categorias = wp_get_post_terms($post->ID, 'categorias'); ?>
                                    <?php if (count($categorias)): ?>
                                        <?php foreach ($categorias as $i => $cat): ?>
                                            <a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a><?= ($i < count($categorias) - 1) ? ', ' : '' ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <a href="<?= get_post_permalink() ?>">
                                    <div class="title mb-2"><?= get_the_title() ?></div>
                                    <div class="description"><?= get_the_date() ?></div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="bg-light">
                <div class="container">
                    <div class="row">
                        <nav class="col-md-12 my-3">
                            <?= bt_pagination() ?>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
                 wp_reset_query();
                 wp_reset_postdata();
            ?>
    <?php endif; ?>

</section>

<script>
    $(document).ready(function () {
        $(".main-banner.owl-carousel").owlCarousel({
            loop: $(".main-banner.owl-carousel").length ? true : false,
            margin: 0,
            nav: true,
            navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
            items: 1,
            dots: true,
            autoplay: true,
            autoplayTimeout: 10000
        });
        $(".js-modal-btn").modalVideo();

        // YOUTUBE
        if ($(window).width() <= 768) {
            $('.videos.owl-carousel').owlCarousel({
                loop: ($('.videos.owl-carousel .slide').length > 10 ? true : false),
                nav: false, dots: false, items: 5, autoplay: false, margin: 10
            });
        } else {
            $('.videos.owl-carousel').removeClass('owl-carousel');
        }

        // NEWS
        var news_items = $(window).width() <= 768 ? 1 : 4;
        $('.news-list.owl-carousel').owlCarousel({
            loop: ($('.news-list.owl-carousel .slide').length > news_items ? true : false),
            dots: false, items: news_items, autoplay: false, margin: 18,
            nav: (news_items == 1) ? true : false, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
        });
    });
</script>

<?php get_footer(); ?>