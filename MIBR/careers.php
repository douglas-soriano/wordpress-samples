<?php /* Template Name: Vagas */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_careers" class="page-common">

    <div class="container py-5">
        <h1 class="text-center text-uppercase font-weight-black"><?= get_the_title() ?></h1>

        <div class="bg-light p-3 border-radius mt-5">
    		<div class="table-custom">
                <div class="thead d-none d-md-block">
                    <div class="tr">
                        <div class="th p-0 p-md-2 col-md-8">Vaga</div>
                        <div class="th p-0 p-md-2">Local</div>
                        <div class="th p-0 p-md-2">Contratação</div>
                    </div>
                </div>
                <div class="tbody">
                    <?php if (!empty($page_fields['vagas'])): ?>
                        <?php foreach ($page_fields['vagas'] as $job): ?>
                            <div class="tr py-3 py-md-0">
                                <div class="td p-0 p-md-2 col-md-8"><a href="<?= $job['link'] ?>" target="_blank"><?= $job['titulo'] ?></a></div>
                                <div class="td p-0 p-md-2"><?= $job['local'] ?></div>
                                <div class="td p-0 p-md-2"><?= $job['tipo_de_contratacao'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="tr">
                            <div class="td">
                                Nenhuma vaga aberta no momento.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

	</div>

</div>

<?php get_footer(); ?>