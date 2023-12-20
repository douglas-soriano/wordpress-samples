<div class="search-area">
	<div class="container">
		<form role="search" method="GET" class="search-form px-0 py-2 px-md-3 py-md-3" action="<?= home_url( '/' ); ?>">
		    <button type="submit" class="search-submit" data-toggle="tooltip" title="Fazer pesquisa"><i class="far fa-search"></i></button>
		    <input type="search" class="search-field" placeholder="Pesquisar ..." value="<?= get_search_query() ?>" name="s" title="Pesquisar por:" />
		    <button type="button" class="search-close" data-toggle="tooltip" title="Fechar"><i class="far fa-times"></i></button>
		</form>
	</div>
	<div class="search-overlay"></div>
</div>

<script>
	$("header#header").on("click", ".btn-open-search", function (e) {
		$(".search-area").addClass("active");
		$(".search-area .search-field").focus();
	});
	$("header#header").on("click", ".search-close", function (e) {
		$(".search-area").removeClass("active");
	});
	$("header#header").on("click", ".search-overlay", function (e) {
		$(".search-area").removeClass("active");
	});
</script>