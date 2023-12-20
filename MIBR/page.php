<?php get_header(); ?>

<?php $image = get_the_post_thumbnail_url(); ?>
<div class="page-cover"><div class="image" style="background-image:url('<?= $image ?>')"></div><h1 class="text-center font-roboto"><?= get_the_title() ?></h1></div>

<section id="company_page" class="page-common">

	<div class="py-5">
		<div class="container wide">
			<div class="row py-5">
				<div class="col-md-12">
					<div class="text">
						<div class="call-box float-right mb-3">
							<?php include('contact-card.inc.php') ?>
						</div>
						<?= apply_filters('the_content', $post->post_content); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<?php include('contact-form.inc.php') ?>

<?php get_footer(); ?>