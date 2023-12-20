<?php get_header(); ?>

<?php
    if (!isset($IS_TAXONOMY)):
        $IS_TAXONOMY = false;
        $POST_ID = get_the_ID();
        $taxonomy = get_the_terms(get_the_ID(), 'teams')[0];
        $page_fields = get_fields($taxonomy->taxonomy.'_'.$taxonomy->term_id);
    endif;
?>

<section id="teams_page" class="page-common single">

    <div class="container fluid">
        <div class="row">
            <div class="col-md-12 px-0 px-md-3">
                <div class="main-banner owl-carousel owl-theme">
                    <div class="container wide">
                        <div class="slide mb-4" style="background-image:url('<?= $page_fields['imagem_de_destaque'] ?>')">
                            <img src="<?= $page_fields['logo'] ?>" alt="<?= $taxonomy->name ?>" class="game logo">
                            <div class="container wide">
                                <div class="row full-height align-items-end px-0 px-md-5">
                                    <div class="col-md-4 pb-5 pb-md-0">
                                        <h2 class="text-white mb-4"><?= $taxonomy->name ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="teamDetails" class="container wide py-5">

        <div class="team-details owl-carousel owl-carousel-custom-nav">
            <?php
                $equipe = new WP_Query(['posts_per_page' => -1, 'post_type' => 'equipe', 'tax_query' => [['taxonomy' => 'teams', 'field' => 'term_id', 'terms' => $taxonomy->term_id]]]);
                if (!empty($equipe)):
                    while ($equipe->have_posts()): $equipe->the_post();
                        $equipe_fields = get_fields(get_the_ID()); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img class="mb-0 mb-md-4" src="<?= $equipe_fields['foto'] ?>" alt="">
                            </div>
                            <div class="col-md-8 pl-md-5 py-3 py-md-5">
                                <h2 class="font-weight-black text-uppercase mb-0"><?= get_the_title() ?></h2>
                                <h1 class="font-weight-black text-uppercase mb-0"><?= $equipe_fields['nickname'] ?></h1>
                                <div class="social-area">
                                    <?php
                                        # Facebook
                                        $facebook_url = $equipe_fields['link_facebook'];
                                        if ($facebook_url <> ''):
                                            echo '<a class="icon" href="'.$facebook_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Facebook" class="fab fa-facebook-f"></i></a>';
                                        endif;
                                        # Instagram
                                        $instagram_url = $equipe_fields['link_instagram'];
                                        if ($instagram_url <> ''):
                                            echo '<a class="icon" href="'.$instagram_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Instagram" class="fab fa-instagram"></i></a>';
                                        endif;
                                        # Youtube
                                        $youtube_url = $equipe_fields['link_youtube'];
                                        if ($youtube_url <> ''):
                                            echo '<a class="icon" href="'.$youtube_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Youtube" class="fab fa-youtube"></i></a>';
                                        endif;
                                        # Twitter
                                        $twitter_url = $equipe_fields['link_twitter'];
                                        if ($twitter_url <> ''):
                                            echo '<a class="icon" href="'.$twitter_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Twitter" class="fab fa-twitter"></i></a>';
                                        endif;
                                        # Twitch
                                        $twitch_url = $equipe_fields['link_twitch'];
                                        if ($twitch_url <> ''):
                                            echo '<a class="icon" href="'.$twitch_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Twitch" class="fab fa-twitch"></i></a>';
                                        endif;
                                    ?>
                                </div>
                                <div class="text pt-4 mt-2"><?= $equipe_fields['descricao'] ?></div>
                            </div>
                        </div>
            <?php   endwhile;
            endif; ?>
        </div>
        <div class="team-carousel owl-carousel owl-carousel-custom-nav my-5">
            <?php
                $equipe = new WP_Query(['posts_per_page' => -1, 'post_type' => 'equipe', 'tax_query' => [['taxonomy' => 'teams', 'field' => 'term_id', 'terms' => $taxonomy->term_id]]]);
                if (!empty($equipe)):
                    $i = 0;
                    while ($equipe->have_posts()): $equipe->the_post();
                        $i++;
                        $equipe_fields = get_fields(get_the_ID()); ?>
                        <div class="card staff p-1 <?= $i == 1 ? 'active' : '' ?>" id="team_person_<?= get_the_ID() ?>">
                            <div class="content">
                                <div class="image border-radius" style="background-image:url('<?= $equipe_fields['foto'] ?>');">
                                    <div class="bg" style="background-image:url('<?= $equipe_fields['foto'] ?>')"></div>
                                    <div class="bg2" style="background-image:url('<?= $equipe_fields['foto'] ?>')"></div>
                                </div>
                                <div class="links default border-radius mt-0 mt-md-3 p-3 p-md-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <h3 class="text-uppercase font-weight-black mb-0"><?= $equipe_fields['nickname'] ?></h3>
                                        </div>
                                        <div class="col-md-6 text-left text-md-right">
                                            <?= $equipe_fields['link_facebook'] ? '<a class="ml-1" href="'.$equipe_fields['link_facebook'].'" target="_blank" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f"></i></a>' : '' ?>
                                            <?= $equipe_fields['link_instagram'] ? '<a class="ml-1" href="'.$equipe_fields['link_instagram'].'" target="_blank" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram"></i></a>' : '' ?>
                                            <?= $equipe_fields['link_youtube'] ? '<a class="ml-1" href="'.$equipe_fields['link_youtube'].'" target="_blank" data-toggle="tooltip" title="Youtube"><i class="fab fa-youtube"></i></a>' : '' ?>
                                            <?= $equipe_fields['link_twitter'] ? '<a class="ml-1" href="'.$equipe_fields['link_twitter'].'" target="_blank" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter"></i></a>' : '' ?>
                                            <?= $equipe_fields['link_twitch'] ? '<a class="ml-1" href="'.$equipe_fields['link_twitch'].'" target="_blank" data-toggle="tooltip" title="Twitch"><i class="fab fa-twitch"></i></a>' : '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php   endwhile;
                endif;
            ?>
        </div>

    </div>

    <div class="bg-light">
        <div class="container wide py-5">
            <div class="teams owl-carousel owl-theme">
                <?php
                    $teams = get_terms(['taxonomy' => 'teams', 'hide_empty' => false]);
                    if (!empty($teams)):
                        foreach ($teams as $team):
                            $team_fields = get_fields($team); ?>
                            <?php if ($team->term_id <> $taxonomy->term_id): ?>
                                <a class="each small" href="<?= get_term_link($team->term_id) ?>">
                                    <div class="team mb-3 mb-md-0" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')">
                                        <div class="bg" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')"></div>
                                        <div class="bg2" style="background-image:url('<?= $team_fields['imagem_de_destaque'] ?>')"></div>
                                        <div class="mid">
                                            <div class="logo"><img src="<?= $team_fields['logo'] ?>" /></div>
                                            <div class="title"><?= $team->name ?></div>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                    <?php
                        endforeach;
                    endif;
                ?>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {

        $(".main-banner.owl-carousel").owlCarousel({ loop: false, margin: 0, nav: false, items: 1, dots: false });

        // TEAM - TODOS
        var sync1 = $('.team-details.owl-carousel');
        var sync2 = $('.team-carousel.owl-carousel');
        var syncedSecondary = true;

        sync1.owlCarousel({ items : 1, autoplay: false, dots: false, loop: false, nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]}).on('changed.owl.carousel', syncPosition);

        if ($(window).width() > 768) {

            sync2.on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            }).owlCarousel({ items : 5, dots: false, nav: false}).on('changed.owl.carousel', syncPosition2);

            function syncPosition (el) {
                var count = el.item.count - 1;
                var current = el.item.index;
                if(current < 0) current = count;
                if(current > count) current = 0;
                sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();
                if (current > end) sync2.data('owl.carousel').to(current, 100, true);
                if (current < start) sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }

            function syncPosition2 (el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                //e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
                // Scroll
                var element = document.querySelector("#teamDetails");
                element.scrollIntoView();
            });

        } else {
            sync2.removeClass('owl-carousel');
            sync2.on("click", ".card", function (e) {
                var number = $(this).index();
                $(".team-carousel .card").removeClass('active');
                $(this).addClass('active');
                sync1.data('owl.carousel').to(number, 300, true);
                // Scroll
                var element = document.querySelector("#teamDetails");
                element.scrollIntoView();
            });
        }

        // OUTROS TIMES

        if ($(window).width() > 768) {
            $(".teams.owl-carousel").owlCarousel({
                loop: $(".teams.owl-carousel .each").length > 4 ? true : false,
                margin: 10,
                nav: false,
                items: $(".teams.owl-carousel .each").length > 4 ? 4 : $(".teams.owl-carousel .each").length,
                dots: false,
                autoplay: false
            });
        } else {
            $(".teams").removeClass("owl-carousel");
        }

        <?php if (!$IS_TAXONOMY): ?>
            var equipe_index = $("#team_person_<?= $POST_ID ?>").parent().index();
            sync1.data('owl.carousel').to(equipe_index, 300, true);
            if ($(window).width() > 768) {
                sync2.data('owl.carousel').to(equipe_index, 300, true);
            }
        <?php endif; ?>

    });
</script>

<?php get_footer(); ?>