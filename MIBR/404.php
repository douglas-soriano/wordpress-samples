<?php /* Template Name: Home*/ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_404">

	<div class="container wide py-5 my-5">
		<div class="row py-5 my-5">
			<div class="col-md-12 text-center">
				<h1 class="title font-weight-black">Página não encontrada.</h1>
				<p style="font-size:20px;font-weight:500">Não encontramos o que você está procurando. Tente usar a barra de pesquisa para encontrar o assunto que deseja.</p>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>