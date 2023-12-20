<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>
<?php $post_id = get_the_ID(); ?>

<section id="news_page" class="page-common each-news">

    <div class="container fluid">
        <div class="row">
            <div class="col-md-12 px-0 px-md-3">
                <div class="main-banner owl-carousel owl-theme">
                    <div class="container wide">
                        <div class="slide" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container wide my-3 my-md-5">

        <div class="row mb-3">
            <div class="col-md-9">
                <h2 class="font-weight-black text-uppercase"><?= get_the_title() ?></h2>
                <div class="sub-headline pre-text mb-3">
	                <?= get_the_author_meta('display_name') ?> 
	                <a href="https://instagram.com/<?= get_the_author_meta('nickname') ?>" class="text-underline" target="_blank"><?= '@'.get_the_author_meta('nickname') ?></a> 
	                - <span class="text-muted font-italic"><?= get_the_date() ?></span>

                    <?php $categorias = wp_get_post_terms(get_the_ID(), 'categorias'); ?>
                    <?php if (count($categorias)): ?>
                    	-
                        <?php foreach ($categorias as $i => $cat): ?>
                            <a class="text-underline font-weight-bold text-muted" href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a><?= ($i < count($categorias) - 1) ? ', ' : '' ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
	            </div>
				<div class="content text">
					<?= wpautop(get_the_content(), true) ?> 
				</div>
			</div>
			<div class="col-md-3 sidebar">
				<?php
					$news = new WP_Query(['posts_per_page' => 3, 'post_type' => 'news']);
				    if (!empty($news)): ?>
	                    <h2 class="title title-style mb-3">Últimas Notícias</h2>
	                    <div class="news-list">
	                    	<?php
						    	while ($news->have_posts()): $news->the_post(); ?>
	                            	<a class="card news mb-4" href="<?= get_post_permalink() ?>">
	                            		<div class="content">
		                                    <div class="image" style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></div>
		                                    <div class="title mt-2 mb-2"><?= get_the_title() ?></div>
		                                    <div class="description"><?= get_the_date() ?></div>
		                                </div>
	                                </a>
							<?php
								endwhile;
								wp_reset_query();
							?>
						</div>
				<?php endif; ?>
			</div>
        </div>

    </div>

	<?php
		# Categorias
		$tags = get_the_terms($post_id, 'categorias');
		$tags_id = [];
		if (count($tags)):
			foreach ($tags as $tag):
				$tags_id[] = $tag->term_id;
			endforeach;
		endif;
		# Busca notícias da mesma categoria
		if (count($tags_id)):
			$news = new WP_Query([
		        'posts_per_page' => 4,
		        'post_type' => 'news',
		        'tax_query' => array(
			        array (
			            'taxonomy' => 'categorias',
			            'field' => 'term_id',
			            'terms' => $tags_id,
			        )
			    ),
		    ]);
		    if (!empty($news)): ?>
			    <div class="mt-5 py-5 bg-light">
			        <div class="container wide block block-news">
			            <div class="row">
			                <div class="col-md-12">
			                    <div class="block-header">
			                        <h2 class="title title-style mb-3">Notícias Relacionadas</h2>
			                    </div>
			                    <div class="news-list owl-carousel">
			                    	<?php
								    	while ($news->have_posts()): $news->the_post(); ?>
			                            	<div class="card news">
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
										endwhile;
										wp_reset_query();
									?>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
		<?php
			endif;
		endif;
	?>

</section>

<script>
    $(document).ready(function () {
        $(".main-banner.owl-carousel").owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            items: 1,
            dots: false
        });
        $(".js-modal-btn").modalVideo();

        // NEWS
		var news_items = $(window).width() <= 768 ? 1 : 4;
        $('.news-list.owl-carousel').owlCarousel({
            loop: ($('.news-list.owl-carousel .slide').length > news_items ? true : false),
            nav: false, dots: false, items: news_items, autoplay: false, margin: 18
        });
    });
</script>

<?php get_footer(); ?>