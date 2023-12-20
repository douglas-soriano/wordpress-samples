<?php get_header(); ?>

<?php
	global $wp_query;

	$results = [];
	if ($wp_query->have_posts()):
		foreach ($wp_query->get_posts() as $post):
			# Cria array de categoria
			if (!isset($results[$post->post_type])) $results[$post->post_type] = [];
			# Adiciona posts
			$results[$post->post_type][] = $post;
		endforeach;
	endif;
?>

<section id="search_page" class="page-common">

    <?php
	if ($wp_query->have_posts()): ?>
		<div class="bg-light py-5">
			<h2 class="title text-center mb-0">Resultados para: "<?= get_query_var('s') ?>"</h2>
		</div>
		<div class="container wide py-5">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<?php foreach ($results as $post_type => $post_data): ?>


							<?php if ($post_type == 'news'): ?>
								<div class="container wide block block-news mb-5">
									<div class="row">
										<div class="col-md-12">
											<div class="block-header">
												<h2 class="title">Notícias</h2>
											</div>
											<div class="news-list owl-carousel owl-carousel-custom-nav">
												<?php foreach ($post_data as $post): ?>
													<div class="card news">
														<a href="<?= get_permalink($post->ID) ?>" class="content">
															<div class="image" style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></div>
															<div class="category mt-2 mb-2">
				                                                <?php $categorias = wp_get_post_terms($post->ID, 'categorias'); ?>
				                                                <?php if (count($categorias)): ?>
			                                                        <?php foreach ($categorias as $i => $cat): ?>
			                                                            <?= $cat->name ?><?= ($i < count($categorias) - 1) ? ', ' : '' ?>
			                                                        <?php endforeach; ?>
				                                                <?php endif; ?>
															</div>
															<div class="title mb-2"><?= get_the_title() ?></div>
															<div class="description"><?= get_the_date() ?></div>
														</a>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										$('.news-list.owl-carousel').owlCarousel({
										    dots: false, items: 4, autoplay: false, margin: 18, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
										    responsive: { 0: { items: 1 }, 768: { items: 4 } }
										});
									})
								</script>


							<?php elseif ($post_type == 'page'): ?>
								<div class="container wide block block-news mb-5">
									<div class="row">
										<div class="col-md-12">
											<div class="block-header">
												<h2 class="title">Paginas</h2>
											</div>
											<div class="page-list owl-carousel owl-carousel-custom-nav">
												<?php foreach ($post_data as $post): ?>
													<div class="card news border mb-2 mb-md-0">
														<a href="<?= get_permalink($post->ID) ?>" class="content">
															<div class="card-body">
																<div class="category mt-2 mb-2">PÁGINA</div>
																<div class="title mb-2"><?= get_the_title() ?></div>
															</div>
														</a>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										if ($(window).width() > 768) {
											$('.page-list.owl-carousel').owlCarousel({
											    dots: false, items: 4, autoplay: false, margin: 18, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
											    responsive: { 0: { items: 1 }, 768: { items: 4 } }
											});
										} else {
											$(".page-list").removeClass("owl-carousel");
										}
									})
								</script>


							<?php elseif ($post_type == 'post'): ?>
								<div class="container wide block block-news mb-5">
									<div class="row">
										<div class="col-md-12">
											<div class="block-header">
												<h2 class="title">Postagens</h2>
											</div>
											<div class="posts-list owl-carousel owl-carousel-custom-nav">
												<?php foreach ($post_data as $post): ?>
													<div class="card news">
														<a href="<?= get_permalink($post->ID) ?>" class="content">
															<div class="image" style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></div>
															<div class="category mt-2 mb-2">POSTS</div>
															<div class="title mb-2"><?= get_the_title() ?></div>
															<div class="description"><?= get_the_date() ?></div>
														</a>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										$('.posts-list.owl-carousel').owlCarousel({
										    dots: false, items: 4, autoplay: false, margin: 18, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
										    responsive: { 0: { items: 1 }, 768: { items: 4 } }
										});
									})
								</script>


							<?php elseif ($post_type == 'equipe'): ?>
								<div class="container wide block block-news mb-5">
									<div class="row">
										<div class="col-md-12">
											<div class="block-header">
												<h2 class="title">Equipe</h2>
											</div>
											<div class="team-list team-carousel owl-carousel owl-carousel-custom-nav">
												<?php foreach ($post_data as $post): ?>
                        							<?php $equipe_fields = get_fields($post->ID); ?>
													<div class="card staff p-1" id="team_person_<?= $post->ID ?>">
							                            <div class="content">
															<a href="<?= get_permalink($post->ID) ?>">
								                                <div class="image border-radius" style="background-image:url('<?= $equipe_fields['foto'] ?>');">
								                                    <div class="bg" style="background-image:url('<?= $equipe_fields['foto'] ?>')"></div>
								                                    <div class="bg2" style="background-image:url('<?= $equipe_fields['foto'] ?>')"></div>
								                                </div>
								                            </a>
							                                <div class="links default border-radius mt-0 mt-md-3 p-3">
							                                    <div class="row align-items-center">
							                                        <div class="col-md-6">
							                                        	<a href="<?= get_permalink($post->ID) ?>">
							                                            	<h3 class="text-uppercase font-weight-black mb-0"><?= $equipe_fields['nickname'] ?></h3>
							                                            </a>
							                                        </div>
							                                        <div class="col-md-6 text-right">
							                                            <?= $equipe_fields['link_facebook'] ? '<a class="ml-1" href="'.$equipe_fields['link_facebook'].'" target="_blank" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f"></i></a>' : '' ?>
							                                            <?= $equipe_fields['link_instagram'] ? '<a class="ml-1" href="'.$equipe_fields['link_instagram'].'" target="_blank" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram"></i></a>' : '' ?>
							                                            <?= $equipe_fields['link_youtube'] ? '<a class="ml-1" href="'.$equipe_fields['link_youtube'].'" target="_blank" data-toggle="tooltip" title="Youtube"><i class="fab fa-youtube"></i></a>' : '' ?>
							                                            <?= $equipe_fields['link_twitter'] ? '<a class="ml-1" href="'.$equipe_fields['link_twitter'].'" target="_blank" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter"></i></a>' : '' ?>
							                                            <?= $equipe_fields['link_twitch'] ? '<a class="ml-1" href="'.$equipe_fields['link_twitch'].'" target="_blank" data-toggle="tooltip" title="Twitch"><i class="fab fa-twitch"></i></a>' : '' ?>
							                                        </div>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										$(".team-list.owl-carousel").owlCarousel({
								            loop: false, dots: false, autoplay: false,
										    dots: false, items: 4, autoplay: false, margin: 18, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
										    responsive: { 0: { items: 1 }, 768: { items: 4 } }
								        });
									})
								</script>


							<?php elseif ($post_type == 'mediakit'): ?>
								<div class="container wide block block-mediakits mb-5">
									<div class="row">
										<div class="col-md-12">
											<div class="block-header">
												<h2 class="title">Mídia Kit</h2>
											</div>
											<div class="mediakits mediakit-list owl-carousel owl-carousel-custom-nav">
												<?php foreach ($post_data as $post): ?>
										    		<a class="each small" href="<?= get_the_permalink() ?>">
														<div class="item" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')">
															<div class="bg" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')"></div>
															<div class="bg2" style="background-image:url('<?= get_the_post_thumbnail_url() ?>')"></div>
															<div class="mid">
																<div class="title"><?= get_the_title() ?></div>
															</div>
														</div>
										    		</a>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										$(".mediakit-list.owl-carousel").owlCarousel({
								            loop: false, dots: false, autoplay: false,
										    dots: false, items: 4, autoplay: false, margin: 18, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
										    responsive: { 0: { items: 1 }, 768: { items: 4 } }
								        });
									})
								</script>

							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="py-0 py-md-5">
			<div class="container wide">
				<div class="row">
					<div class="col-md-12">
						<div class="text my-5 py-5">
							<h2 class="title text-center mt-0">Nenhum resultado encontrado para: "<?= get_query_var('s') ?>"</h2>
							<p class="text-center">Tente pesquisar por outro termo ou nosso mapa do site através do rodapé.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</section>

<?php get_footer(); ?>