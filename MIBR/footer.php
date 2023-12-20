<footer id="footer" class="py-5">
	<div class="container wide py-5">
		<div class="row">
			<div class="col-md-4 text-center align-self-center">
				<a href="<?= get_page_link(2) ?>">
					<?php include("images/logo.svg") ?>
				</a>
			</div>
			<div class="col-md-4 text-center text-md-left">
				<h5 class="mb-3 mb-md-4 mt-2 mt-md-0">MADE IN BRAZIL</h5>
				<div class="menu mb-5 mb-md-0">
					<div class="menu-footer text-left">
						<?php
							wp_nav_menu([
								'menu' => 'menu_rodape',
								'theme_location' => 'menu_rodape',
								'echo' => true,
								'container' => false,
								'menu_class' => 'menu-footer',
							]);
						?>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center text-md-left">
				<div class="newsletter-area">
					<h5 class="mb-3 mt-2 mt-md-0">NEWSLETTER</h5>
					<div class="description mb-3">Faça parte da família MIBR. <span class="text-white">#SOMOSMIBR</span></div>
					<div class="newsletter">
						<?= do_shortcode('[mc4wp_form id="307"]') ?>
					</div>
				</div>
				<div class="social-area mt-3">
					<?php
						# Facebook
						$facebook_url = do_shortcode('[sv slug="link-facebook"]');
						if ($facebook_url <> ''):
							echo '<a class="icon" href="'.$facebook_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Facebook" class="fab fa-facebook-f"></i></a>';
						endif;
						# Instagram
						$instagram_url = do_shortcode('[sv slug="link-instagram"]');
						if ($instagram_url <> ''):
							echo '<a class="icon" href="'.$instagram_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Instagram" class="fab fa-instagram"></i></a>';
						endif;
						# Youtube
						$youtube_url = do_shortcode('[sv slug="link-youtube"]');
						if ($youtube_url <> ''):
							echo '<a class="icon" href="'.$youtube_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Youtube" class="fab fa-youtube"></i></a>';
						endif;
						# LinkedIn
						$linkedin_url = do_shortcode('[sv slug="link-linkedin"]');
						if ($linkedin_url <> ''):
							echo '<a class="icon" href="'.$linkedin_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="LinkedIn" class="fab fa-linkedin-in"></i></a>';
						endif;
						# WhatsApp
						$whatsapp_url = do_shortcode('[sv slug="link-whatsapp"]');
						if ($whatsapp_url <> ''):
							echo '<a class="icon" href="https://api.whatsapp.com/send?phone=55'.preg_replace('/[^0-9]/', '', $whatsapp_url).'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="WhatsApp" class="fab fa-whatsapp"></i></a>';
						endif;
						# Twitter
						$twitter_url = do_shortcode('[sv slug="link-twitter"]');
						if ($twitter_url <> ''):
							echo '<a class="icon" href="'.$twitter_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Twitter" class="fab fa-twitter"></i></a>';
						endif;
						# Discord
						$discord_url = do_shortcode('[sv slug="link-discord"]');
						if ($discord_url <> ''):
							echo '<a class="icon" href="'.$discord_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Discord" class="fab fa-discord"></i></a>';
						endif;
						# TikTok
						$tiktok_url = do_shortcode('[sv slug="link-tiktok"]');
						if ($tiktok_url <> ''):
							echo '<a class="icon" href="'.$tiktok_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="TikTok" class="fab fa-tiktok"></i></a>';
						endif;
					?>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 text-center my-5 py-5">
				<div class="customers owl-carousel">
					<?php $sponsorship_page = get_fields(190); ?>
                    <?php foreach ($sponsorship_page['logos_do_rodape'] as $sponsor): ?>
						<div class="each px-3 pb-2 pb-md-0 px-md-2">
							<?php if ($sponsor['link']): ?>
								<a href="<?= $sponsor['link'] ?>" target="_blank">
							<?php endif; ?>
									<img class="logo <?= $sponsor['ativar_logo_preto_e_branco'] ? 'pb' : '' ?>" src="<?= $sponsor['logo'] ?>" alt="">
							<?php if ($sponsor['link']): ?>
								</a>
                        	<?php endif; ?>
						</div>
                    <?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<p class="mb-3 text-center">© <?= date('Y') ?> MIBR - Todos os direitos reservados</p>
			</div>
		</div>
	</div>
</footer>

<script>
	$(function() {
		// CUSTOMERS
		var customers_items = $(window).width() <= 768 ? 1 : 4;
		$('.customers.owl-carousel').owlCarousel({
		    loop: ($('.customers.owl-carousel .logo').length > customers_items ? true : false),
		    nav: false, dots: false, items: customers_items, autoplay: true, margin: 20, autoWidth:true
		});
	});
</script>

<?php wp_footer(); ?>

</section>

<?php include("console.inc.php") ?>

</body>
</html>