<?php /* Template Name: Home*/ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_home">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 px-0 px-md-3">
				<div class="main-banner owl-carousel owl-theme reveal">
					<?php if (!empty($page_fields['banner_principal'])): ?>
						<?php foreach ($page_fields['banner_principal'] as $key => $carousel): ?>
							<div class="container wide">
								<?php if ($carousel['midia_tipo'] == 'Youtube'): ?>
									<div class="slide js-modal-btn-slide" style="cursor:pointer;" data-video-id="<?= convertYoutubeToCode($carousel['midia_youtube']) ?>">
										<div class="video">
											<?= convertYoutube($carousel['midia_youtube']) ?>
										</div>
										<div class="container wide">
											<div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
												<?php if ($carousel['texto_imagem']): ?>
													<div class="col-md-4 pb-4 pb-md-0">
														<?php if ($carousel['texto_secundario']): ?>
															<h3 class="text-white mb-2"><?= $carousel['texto_secundario'] ?></h3>
														<?php endif; ?>
														<?php if ($carousel['texto_imagem']): ?>
															<h2 class="text-white mb-2 mb-md-4"><?= $carousel['texto_imagem'] ?></h2>
														<?php endif; ?>
														<?php if ($carousel['texto_do_botao']): ?>
															<div class="btn btn-white-outlined btn-sm glitch-white-hover" style="cursor:pointer;" data-video-id="<?= convertYoutubeToCode($carousel['midia_youtube']) ?>">
																<span class="glitch dark" data-text="<?= $carousel['texto_do_botao'] <> '' ? $carousel['texto_do_botao'] : 'Assistir Vídeo' ?>">
																	<?= $carousel['texto_do_botao'] <> '' ? $carousel['texto_do_botao'] : 'Assistir Vídeo' ?>
																</span>
															</div>
														<?php endif; ?>
													</div>
												<?php else: ?>
													<div class="mid" style="cursor:pointer;">
														<svg style="width:56px;height:56px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-play fa-w-14 fa-3x"><path fill="#FFF" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zM48 453.5v-395c0-4.6 5.1-7.5 9.1-5.2l334.2 197.5c3.9 2.3 3.9 8 0 10.3L57.1 458.7c-4 2.3-9.1-.6-9.1-5.2z" class=""></path></svg>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php else: ?>
									<?php if ($carousel['link'] <> ''): ?>
										<a href="<?= $carousel['link'] ?>">
									<?php endif; ?>
									<div class="slide mb-4" style="background-image:url('<?= $carousel['midia_imagens'] ?>')">
										<div class="container wide">
											<div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
												<?php if ($carousel['texto_imagem']): ?>
													<div class="col-md-4 pb-4 pb-md-0">
														<?php if ($carousel['texto_secundario']): ?>
															<h3 class="text-white mb-2"><?= $carousel['texto_secundario'] ?></h3>
														<?php endif; ?>
														<?php if ($carousel['texto_imagem']): ?>
															<h2 class="text-white mb-2 mb-md-4"><?= $carousel['texto_imagem'] ?></h2>
														<?php endif; ?>
														<?php if ($carousel['link'] <> ''): ?>
															<div class="btn btn-white-outlined btn-sm glitch-white-hover">
																<span class="glitch dark" data-text="<?= $carousel['texto_do_botao'] <> '' ? $carousel['texto_do_botao'] : 'Saiba Mais' ?>">
																	<?= $carousel['texto_do_botao'] <> '' ? $carousel['texto_do_botao'] : 'Saiba Mais' ?>
																</span>
															</div>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<?php if ($carousel['link'] <> ''): ?>
										</a>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		$matches = $page_fields['proximas_partidas'];
		if ($matches && count($matches)): ?>
			<div class="container wide block block-calendar my-5 reveal">
				<div class="row">
					<div class="col-md-12">
						<div class="block-header">
							<h2 class="title">Próximas Partidas</h2>
							<p class="subtitle">Acompanhe em tempo real</p>
						</div>
						<div class="matches owl-carousel owl-carousel-custom-nav">
							<?php foreach ($matches as $i => $match): ?>
								<a class="card match <?= $match['esta_ao_vivo'] ? 'online' : 'offline' ?>" href="<?= $match['link_para_assistir'] ?>" target="_blank" data-toggle="tooltip" title="<?= $match['titulo_do_evento'] ?>">
									<div class="header p-2">
										<div class="d-flex py-2 align-items-center">
											<div class="col-1 text-center px-0">
												<img src="<?= $match['logo'] ?>" alt="<?= $match['titulo_do_evento'] ?>">
											</div>
											<div class="col-8 pr-0">
												<div class="title"><?= limitText($match['titulo_do_evento'], 24) ?></div>
												<div class="date"><?= $match['data_e_hora'] ?></div>
											</div>
											<div class="col-3 text-right px-0">
												<span class="live-button py-1 py-md-2 <?= ($match['esta_ao_vivo']) ? 'px-2' : 'px-3' ?>"><?= ($match['esta_ao_vivo']) ? '<i class="fas fa-play mr-1"></i> AO VIVO' : '<i class="fas fa-info mr-1"></i> INFO' ?></span>
											</div>
										</div>
									</div>
									<div class="content pb-2">
										<div class="line row p-2 py-3 font-weight-bold border-bottom align-items-center">
											<div class="col-3 text-center">
												<img src="<?= $match['placar_1']['logo_do_time'] ?>" alt="<?= $match['placar_1']['time'] ?>">
											</div>
											<div class="col-6 px-0"><?= $match['placar_1']['time'] ?></div>
											<div class="col-3 text-right">
												<?= $match['placar_1']['placar'] ?>
												<?= $match['placar_1']['score_de_mapa'] || $match['placar_1']['score_de_mapa'] == 0 ? '('.$match['placar_1']['score_de_mapa'].')' : '' ?>
											</div>
										</div>
										<div class="line row p-2 py-3 font-weight-bold align-items-center">
											<div class="col-3 text-center">
												<img src="<?= $match['placar_2']['logo_do_time'] ?>" alt="<?= $match['placar_2']['time'] ?>">
											</div>
											<div class="col-6 px-0"><?= $match['placar_2']['time'] ?></div>
											<div class="col-3 text-right">
												<?= $match['placar_2']['placar'] ?>
												<?= $match['placar_2']['score_de_mapa'] || $match['placar_2']['score_de_mapa'] == 0 ? '('.$match['placar_2']['score_de_mapa'].')' : '' ?>
											</div>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
	<?php
		endif;
	?>

	<?php include ("block-streamers.inc.php") ?>

	<?php include ("block-youtube.inc.php") ?>

	<?php
		$news = new WP_Query(['posts_per_page' => 4, 'post_type' => 'news']);
	    if (!empty($news)): ?>
			<div class="my-5 py-5 bg-light reveal">
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
	?>

	<div class="block block-instagram">
		<div class="container wide mt-5 mb-2 pt-5 reveal">
			<div class="row">
				<div class="col-md-12">
					<div class="block-header">
						<h2 class="title"><a href="<?= do_shortcode('[sv slug="link-instagram"]') ?>" target="_blank">@MIBRTEAM</a></h2>
						<p class="subtitle mb-0"><a href="<?= do_shortcode('[sv slug="link-instagram"]') ?>" target="_blank">Siga no Instagram</a></p>
					</div>
				</div>
			</div>
		</div>
		<?= do_shortcode('[instagram-feed feed=2]') ?>
	</div>

</div>

<script>
	$(document).ready(function () {

		// MAIN BANNER
		$('.main-banner.owl-carousel').owlCarousel({
		    loop: ($('.main-banner.owl-carousel .slide').length > 1 ? true : false),
		    nav: true, dots: true, items: 1, autoplay: false, autoplayTimeout: 8000,
		    navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
		});
		$(".js-modal-btn-slide").modalVideo();

		// MATCHES
		var matches_items = $(window).width() <= 768 ? 1 : 4;
		$('.matches.owl-carousel').owlCarousel({
		    loop: ($('.matches.owl-carousel .slide').length > matches_items ? true : false),
		    nav: false, dots: false, items: matches_items, autoplay: false, margin: 10,
		    nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
		});

		// NEWS
		var news_items = $(window).width() <= 768 ? 1 : 4;
		$('.news-list.owl-carousel').owlCarousel({
		    loop: ($('.news-list.owl-carousel .slide').length > news_items ? true : false),
		    dots: false, items: news_items, autoplay: false, margin: 18,
		    nav: (news_items == 1) ? true : false, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
		});

		// INSTAGRAM
		var instagram_items = $(window).width() <= 768 ? 1 : 4;
		$('#sbi_images').addClass("owl-carousel owl-carousel-custom-nav");
		$('#sbi_images').owlCarousel({
		    loop: false, dots: false, items: instagram_items, autoplay: false, margin: 0,
		    nav: false, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
		    responsive: {
				0: { items:1 },
				760: { items:3 },
				1300: { items:4 },
				1600: { items:6 },
				1900: { items:7 }
			}
		});

	});
</script>

<?php get_footer(); ?>