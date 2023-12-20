<?php get_header(); ?>

<section id="mediakit_page" class="page-common">

    <div class="container block block-mediakits wide py-5 mb-5">
		<div class="block-header">
			<h2 class="title">Área de Fã</h2>
			<p class="subtitle">Faça parte da família MIBR</p>
		</div>
        <div class="mediakits owl-carousel owl-theme">
			<?php
				$posts = new WP_Query(['posts_per_page' => -1, 'post_type' => 'mediakit']);
			    if (!empty($posts)):
			    	while ($posts->have_posts()): $posts->the_post(); ?>
			    		<a class="each" href="<?= get_the_permalink() ?>">
							<div class="item mb-2 mb-md-0" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')">
								<div class="bg" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')"></div>
								<div class="bg2" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')"></div>
								<div class="mid">
									<div class="title"><?= get_the_title() ?></div>
								</div>
							</div>
			    		</a>
				<?php
					endwhile;
					wp_reset_query();
				endif;
			?>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {
    	if ($(window).width() > 768) {
	        $(".mediakits.owl-carousel").owlCarousel({
	            loop: $(".mediakits.owl-carousel").length > 4 ? true : false,
	            margin: 10,
	            nav: false,
	            items: 4,
	            dots: false,
	            autoplay: true,
	            autoplayTimeout: 5000
	        });
	    } else {
	    	$(".mediakits").removeClass("owl-carousel");
	    }
    });
</script>

<?php get_footer(); ?>