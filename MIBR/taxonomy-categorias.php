<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>
<?php $taxonomy = get_queried_object(); ?>

<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    global $wp_query;
?>

<section id="news_page" class="page-common">

    <div class="bg-light py-5">
        <h2 class="title text-center text-uppercase font-weight-black mb-0">Notícias em "<?= $taxonomy->name ?>"</h2>
    </div>

    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12 px-0 px-md-3">
                <div class="main-banner owl-carousel owl-theme">
                    <?php $post = $wp_query->get_posts()[0]; ?>
                    <div class="container wide">
                        <div class="slide mb-4" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID) ?>')">
                            <div class="container wide">
                                <div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
                                    <div class="col-md-6 pb-5 pb-md-0">
                                        <?php $categorias = wp_get_post_terms($post->ID, 'categorias'); ?>
                                        <?php if (count($categorias)): ?>
                                            <h3 class="text-white mb-2">
                                                <?php foreach ($categorias as $i => $cat): ?>
                                                    <a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a><?= ($i < count($categorias) - 1) ? ', ' : '' ?>
                                                <?php endforeach; ?>
                                            </h3>
                                        <?php endif; ?>
                                        <h2 class="text-white mb-4"><?= limit_text(get_the_title($post->ID), 50) ?></h2>
                                        <a href="<?= get_the_permalink($post->ID) ?>" class="btn btn-white-outlined btn-sm glitch-white-hover">
                                            <span class="glitch dark" data-text="Confira">Confira</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container wide block block-youtube my-5">
        <div class="row">
            <?php
                $i = 0;
                while ($wp_query->have_posts()): $wp_query->the_post(); 
                    if ($i > 0): ?>
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
            <?php
                    endif;
                    $i++;
                endwhile;
                wp_reset_query();
            ?>
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

</section>

<script>
    $(document).ready(function () {
        $(".main-banner.owl-carousel").owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            items: 1,
            dots: false,
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
        $('.news-list.owl-carousel').owlCarousel({
            loop: ($('.news-list.owl-carousel .slide').length > 4 ? true : false),
            nav: false, dots: false, items: 4, autoplay: false, margin: 18
        });
    });
</script>

<?php get_footer(); ?>