<?php /* Template Name: Times */ ?>

<?php get_header(); ?>

<section id="teams_page" class="page-common">

    <div class="container wide block py-5 mb-5">
		<div class="block-header">
			<h2 class="title">Times</h2>
			<p class="subtitle">Conheça a família MIBR</p>
		</div>
        <div class="teams owl-carousel owl-theme">
			<?php
				$teams = get_terms(['taxonomy' => 'teams', 'hide_empty' => false]);
			    if (!empty($teams)):
			    	foreach ($teams as $team):
			    		$team_fields = get_fields($team); ?>
			    		<a class="each" href="<?= get_term_link($team->term_id) ?>">
							<div class="team mb-3 mb-md-0" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')">
								<div class="bg" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')"></div>
								<div class="bg2" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')"></div>
								<div class="mid">
									<div class="logo"><img src="<?= $team_fields['logo'] ?>" /></div>
									<div class="title"><?= $team->name ?></div>
								</div>
							</div>
			    		</a>
				<?php
					endforeach;
				endif;
			?>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {
		var teams_items = $(window).width() <= 768 ? 1 : 4;
		if (teams_items != 1) {
	        $(".teams.owl-carousel").owlCarousel({
	            loop: $(".teams.owl-carousel").length > teams_items ? true : false,
	            margin: 10,
		    	nav: true,
		    	navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"],
	            items: teams_items,
	            dots: false,
	            autoplay: false
	        });
	    } else {
	    	$(".teams").removeClass("owl-carousel");
	    }
    });
</script>

<?php get_footer(); ?>