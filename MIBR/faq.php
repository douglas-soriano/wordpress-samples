<?php /* Template Name: FAQ */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_faq" class="page-common">

    <div class="container wide pt-5 pb-0 pb-md-5">
        <h1 class="text-center text-uppercase font-weight-black"><?= $page_fields['titulo_principal'] ?></h1>
    </div>

	<div class="container mb-5 pt-5">
		<div class="row">
			<div class="col-md-12">

				<div id="faq">
					<?php foreach ($page_fields['perguntas'] as $i => $faq): ?>
						<div class="each">
							<div class="question <?= $i <> 0 ? 'collapsed' : '' ?>" id="heading<?= $i ?>" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
								<div class="icon float-right"><i class="fas fa-angle-down"></i></div>
								<?= $faq['pergunta'] ?>
							</div>
							<div class="answer collapse <?= $i == 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $i ?>" data-parent="#faq" id="collapse<?= $i ?>">
								<div class="text p-3">
									<?= $faq['resposta'] ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>