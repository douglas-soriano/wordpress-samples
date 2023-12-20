<div class="search-area-desk">
	<form role="search" method="GET" class="search-form" action="<?= home_url( '/' ); ?>">
	    <button type="submit" class="search-submit" data-toggle="tooltip" title="Fazer pesquisa"><i class="fas fa-search"></i></button>
	    <input type="search" class="search-field" placeholder="Pesquisar ..." value="<?= get_search_query() ?>" name="s" title="Pesquisar por:" />
	    <button type="button" class="search-close-desk" data-toggle="tooltip" title="Fechar"><i class="fas fa-times"></i></button>
	</form>
</div>

<script>
	$("header#header").on("click", ".btn-open-search-desk", function (e) {
		$(".search-area-desk").addClass("active");
		$(".search-area-desk .search-field").focus();
	});
	$("header#header").on("click", ".search-close-desk", function (e) {
		$(".search-area-desk").removeClass("active");
	});
	$(document).on("click", ".page-common", function (e) {
		console.log("FOI");
		$(".search-area-desk").removeClass("active");
	});
</script>