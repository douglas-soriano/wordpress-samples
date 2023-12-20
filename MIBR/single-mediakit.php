<?php get_header(); ?>
<?php $post_id = get_the_ID(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<section id="mediakit_page" class="page-common">

    <div class="container block block-mediakits wide py-5 mb-5">
		<div class="block-header">
			<h2 class="title"><?= get_the_title() ?></h2>
			<p class="subtitle"><?= count($page_fields['arquivos']) ? count($page_fields['arquivos']).' arquivo'.(count($page_fields['arquivos']) > 1 ? 's' : '') : 'Sem arquivos' ?></p>
		</div>
        <div class="mediakits gallery owl-carousel owl-theme">
			<?php
		    	foreach ($page_fields['arquivos'] as $file): ?>
		    		<?php if ($file['tipo_de_arquivo'] == 'imagem'): ?>
			    		<a class="each" data-fancybox="gallery" data-caption="<?= $file['titulo'] ?>" href="<?= $file['imagem'] ?>">
							<div class="item square mb-2 mb-md-0" style="background-image:url('<?= $file['imagem'] ?>')"></div>
			    		</a>
			    	<?php else: ?>
			    		<a class="each" href="<?= $file['arquivo'] ?>" download>
							<div class="item square mb-2 mb-md-0">
								<div class="mid">
									<div class="title"><?= get_the_title() ?></div>
								</div>
							</div>
			    		</a>
			    	<?php endif; ?>
			<?php
				endforeach;
			?>
        </div>
    </div>

	<div class="bg-light">
	    <div class="container block wide py-5 text-center">
			<?php
				$posts = new WP_Query(['posts_per_page' => -1, 'post_type' => 'mediakit']);
			    if (!empty($posts)):
			    	while ($posts->have_posts()): $posts->the_post(); ?>
			    		<?php if ($post_id <> get_the_ID()): ?>
							<a class="btn btn-black-outlined btn-sm glitch-black-hover mx-2 mb-2 mb-md-0" href="<?= get_the_permalink() ?>">
								<span class="glitch" data-text="<?= get_the_title() ?>">
									<?= get_the_title() ?>
								</span>
							</a>
						<?php endif; ?>
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
	    	// GALERIA
	        $(".gallery.owl-carousel").owlCarousel({
	            loop: $(".gallery.owl-carousel").length > 4 ? true : false,
	            margin: 10,
	            nav: false,
	            items: 4,
	            dots: false,
	            autoplay: true,
	            autoplayTimeout: 5000
	        });
	    } else {
	    	$(".gallery").removeClass("owl-carousel");
	    }

        // MEDIA KITS
        $(".mediakits.owl-carousel").owlCarousel({
            loop: $(".mediakits.owl-carousel").length > 4 ? true : false,
            margin: 10,
            nav: false,
            items: 4,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000
        });
    });
</script>

<?php get_footer(); ?>