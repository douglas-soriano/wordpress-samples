<?php /* Template Name: Contato */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_contact" class="page-common">

	<div class="container mb-5 pt-5">
		<div class="row">
			<div class="col-md-8 offset-md-2">

				<div class="row">
					<div class="col-md-12 bg-light p-3 p-md-5 form-area border-radius">
        				<h2 class="text-center text-uppercase font-weight-black mb-4"><?= get_the_title() ?></h2>
						<?= do_shortcode('[contact-form-7 id="250" title="Formulário de Contato"]') ?>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>