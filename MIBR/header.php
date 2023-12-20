<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title><?= wp_get_document_title(); ?></title>
<link rel="shortcut icon" href="<?= esc_url( get_template_directory_uri() ); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?= esc_url( get_template_directory_uri() ); ?>/favicon.ico" type="image/x-icon">
<!-- >> CSS
============================================================================== -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/fancybox.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/hover-min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/fonts.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/owl.theme.default.min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/modal-video.min.css" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/style.css?hash=81AAS" rel="stylesheet">
<link href="<?= esc_url( get_template_directory_uri() ); ?>/css/theme.css?hash=81AAS" rel="stylesheet">
<?php if (is_page(131)): ?>
<link rel="stylesheet" href="<?= esc_url( get_template_directory_uri() ); ?>/css/home.css">
<?php endif; ?>
<!-- >> /CSS
============================================================================= -->
<!-- >> JS
============================================================================== -->
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/fancybox.umd.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/ScrollMagic.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/jquery.maskedinput.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/jquery-modal-video.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/vue.min.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/moment.js"></script>
<script src="<?= esc_url( get_template_directory_uri() ); ?>/js/theme.js?hash=81AAS"></script>
<!-- >> /JS
============================================================================= -->
<?php wp_head(); ?>

<!-- MAILCHIMP -->
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0cea00b1dd7346f4cb37d603d/fdfc8c6ba222d95864c3b7052.js");</script>

</head>
<body class="<?= is_page(2) ? '' : 'almost-ready ready' ?>">

<?php if (is_page(2)) include("loader2.page.php") ?>

<section id="website">

<!-- Header
================================================== -->
<!-- <div class="header-area"></div> -->
<header id="header">
	<?php include("searchform-mobile.php") ?>
	<div class="container wide py-0 py-md-3">
		<div class="row align-items-center">
			<div class="col-md-1 order-1 logo-area text-center text-md-left py-2 py-md-2">
				<a href="<?= get_home_url() ?>">
					<?php include("images/logo.svg") ?>
				</a>
			</div>
			<div class="col-md-10 order-2 order-md-2 menu-area">
				<nav class="navbar navbar-light navbar-expand-lg">
					<button class="btn btn-link btn-open-search d-block d-md-none" title="Pesquisar">
						<i class="far fa-search"></i>
					</button>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<?php
							wp_nav_menu([
								'menu' => 'menu_principal',
								'theme_location' => 'menu_principal',
								'echo' => true,
								'container' => false,
								'menu_class' => 'navbar-nav',
							]);
						?>
						<div class="d-block d-md-none text-center py-2 bg-white">
							<!-- <button class="btn btn-link btn-open-search" title="Pesquisar">
								<i class="far fa-search"></i>
							</button> -->
							<div class="language-area">
								<?= do_shortcode('[language-switcher]') ?>
							</div>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-md-1 text-right order-3 d-none d-md-block right-menu-area">
				<?php include("searchform-desk.php") ?>
				<button class="btn btn-link btn-open-search-desk" data-toggle="tooltip" title="Pesquisar">
					<i class="fas fa-search"></i>
				</button>
				<div class="language-area">
					<?= do_shortcode('[language-switcher]') ?>
				</div>
			</div>
		</div>
	</div>
	<div class="sub-menu-bg"></div>
</header>
<div class="header-area d-block d-md-none"></div>

<script>
	function getSubmenuHeight (element) {
		var height = 30;
		element.find("li").each(function () {
			height += $(this).outerHeight();
		});
		return height;
	}

	var menu_hovered = false;
	$("ul#menu-menu-principal > li").on({
	    mouseenter: function () {
	    	if ($(this).find("ul.sub-menu").length) {
	    		menu_hovered = true;
	        	$("header#header .sub-menu-bg").css('height', getSubmenuHeight($(this)));
	    	}
	    },
	    mouseleave: function () {
	    	if ($(this).find("ul.sub-menu").length) {
	    		menu_hovered = false;
	    		setTimeout(function () {
	    			if (!menu_hovered) {
	        			$("header#header .sub-menu-bg").css('height', 0);
	        		}
	    		}, 200);
	    	}
	    }
	});
</script>

<!-- / Header
================================================== -->