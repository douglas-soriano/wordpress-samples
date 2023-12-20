<?php get_header(); ?>

<section id="post_page" class="page-common">

    <div class="block section d-flex py-5 align-items-center half-page" style="background-image:url(<?= get_the_post_thumbnail_url() ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
					<h3 class="title"><?= get_the_title() ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="block section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
			    	<div class="text">
						<?= wpautop(get_the_content(), true) ?> 
					</div>
				</div>
			</div>
		</div>
    </div>

    <div class="block section d-flex py-5 align-items-center full-page" style="background:linear-gradient(135deg, #f07e3e 0%, #fff33b 100%);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <img class="mb-3" src="<?= esc_url( get_template_directory_uri() ); ?>/images/logo-catalise-blog-lg.png" alt="Catalise Blog">
                </div>
                <div class="col-md-12">
                    <?php
                        $posts = new WP_Query(['posts_per_page' => -1, 'post_type' => 'conteudos']);
                        if (!empty($posts)): ?>
                            <div class="owl-carousel owl-carousel-custom">
                                <?php
                                    while ($posts->have_posts()): $posts->the_post(); ?>
                                        <div class="each px-4">
                                            <div class="card post">
                                                <div class="header image" style="background-image:url('<?= get_the_post_thumbnail_url() <> '' ? get_the_post_thumbnail_url() : esc_url(get_template_directory_uri()).'/images/placeholder.jpg' ?>')">
                                                    <a href="<?= get_post_permalink() ?>">
                                                        <div class="overlay"></div>
                                                    </a>
                                                </div>
                                                <div class="card-body px-0">
                                                    <a href="<?= get_post_permalink() ?>">
                                                        <div class="title mt-0 mb-1"><?= the_title() ?></div>
                                                        <div class="text"><?= the_excerpt() ?></div>
                                                    </a>
                                                    <a class="btn btn-custom with-arrow" style="background-color:#ea6815;" href="<?= get_post_permalink() ?>">
                                                        Leia Mais <i class="far fa-arrow-right ml-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    endwhile;
                                    wp_reset_query();
                                ?>
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            nav: true,
            navText: ['<span></span>', '<span></span>'],
            loop: $(".owl-carousel .each").length > 1,
            responsive: {
                0: { items: 1 },
                768: { items: 3 }
            },
            dots: true,
            autoplay: true,
            autopalyTimeout: 6000
        });
    });    
</script>

<?php get_footer(); ?>