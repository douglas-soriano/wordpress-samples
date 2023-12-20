<?php /* Template Name: Nossa História */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<section id="aboutus_page" class="page-common">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0 px-md-3">
                <div class="main-banner owl-carousel owl-theme">
                    <?php if (!empty($page_fields['banner_principal'])): ?>
                        <?php foreach ($page_fields['banner_principal'] as $key => $carousel): ?>
                            <div class="container wide">
                                <?php if ($carousel['midia_tipo'] == 'Youtube'): ?>
                                    <div class="slide mb-4 js-modal-btn-slide" data-video-id="<?= convertYoutubeToCode($carousel['midia_youtube']) ?>">
                                        <div class="video">
                                            <?= convertYoutube($carousel['midia_youtube']) ?>
                                        </div>
                                        <div class="container wide">
                                            <div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
                                                <?php if (get_the_title()): ?>
                                                    <div class="col-md-4 pb-5 pb-md-0">
                                                        <?php if (get_the_title()): ?>
                                                            <h2 class="text-white mb-4"><?= get_the_title() ?></h2>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mid" style="cursor:pointer;">
                                                        <svg style="width:56px;height:56px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-play fa-w-14 fa-3x"><path fill="#FFF" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zM48 453.5v-395c0-4.6 5.1-7.5 9.1-5.2l334.2 197.5c3.9 2.3 3.9 8 0 10.3L57.1 458.7c-4 2.3-9.1-.6-9.1-5.2z" class=""></path></svg>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="slide mb-4" style="background-image:url('<?= $carousel['midia_imagens'] ?>')">
                                        <div class="container wide">
                                            <div class="row full-height align-items-end align-items-md-center px-0 px-md-5">
                                                <?php if (get_the_title()): ?>
                                                    <div class="col-md-4 pb-5 pb-md-0">
                                                        <?php if (get_the_title()): ?>
                                                            <h2 class="text-white mb-4"><?= get_the_title() ?></h2>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container wide block block-timeline py-5">
        <div class="row py-5 py-md-0">
            <div class="col-md-12">
                <div class="block-header">
                    <h2 class="title">Timeline</h2>
                    <p class="subtitle">Since 2003 - Made In Brasil</p>
                </div>
                <div class="timeline">
                    <div class="timeline-area">
                        <?php foreach ($page_fields['timeline'] as $i => $event): ?>
                            <div class="each px-3 <?= ($i % 2) ? 'down' : 'up' ?> <?= $i == 0 ? 'first' : ($i == count($page_fields['timeline'])-1 ? 'last' : '') ?>">
                                <div class="content">
                                    <div class="image" style="background-image:url('<?= $event['imagem'] ?>');"></div>
                                    <div class="title my-2"><?= $event['titulo'] ?></div>
                                    <div class="year"><?= $event['ano'] ?></div>
                                </div>
                                <div class="dot"></div>
                                <div class="progress-line"></div>
                            </div>
                        <?php endforeach; ?>
                        <div class="overall-progress d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (count($page_fields['conquistas'])): ?>
        <?php
            # Pega categorias
            $categories = [];
            $categories_data = [];
            foreach ($page_fields['conquistas'] as $conc):
                if (!in_array($conc['time'], $categories)):
                    $categories[] = $conc['time'];
                endif;
                $categories_data[$conc['time']][] = $conc;
            endforeach;
        ?>
        <div class="my-5 py-5 bg-light">
            <div class="container wide block block-tournaments">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-header">
                            <h2 class="title">Títulos</h2>
                            <p class="subtitle">E mais títulos</p>
                        </div>
                        <div class="box bg-white border-radius p-3 p-md-4">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6 text-center text-md-left">
                                        <h3 class="d-inline-block font-weight-black text-uppercase">Conquistas</h3>
                                    </div>
                                    <div class="col-md-6 text-center text-md-right">
                                        <div class="filters ml-0 ml-md-5 mb-3 mb-md-0" role="tablist">
                                            <a class="each px-2 px-md-3 active" data-toggle="tab" href="#paneAll" role="tab">TODOS</a>
                                            <?php foreach ($categories as $i => $cat): ?>
                                                <a class="each px-2 px-md-3" data-toggle="tab" href="#pane<?= $i ?>" role="tab"><?= $cat ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content content">
    
                                <div class="tab-pane show active" role="tabpanel" id="paneAll">
                                    <div class="table-custom">
                                        <div class="thead d-none d-md-block">
                                            <div class="tr">
                                                <div class="th col-lg-1 col-md-2 col-sm-3 col-12 p-0 p-md-2">Posição</div>
                                                <div class="th p-0 p-md-2">Torneio</div>
                                                <div class="th p-0 p-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="tbody">
                                            <?php foreach ($page_fields['conquistas'] as $conc): ?>
                                                <div class="tr mb-2 mb-md-0">
                                                    <div class="td col-lg-1 col-md-2 col-sm-3 col-12 p-0 p-md-2">
                                                        <?php
                                                            $color = 'default';
                                                            if ($conc['colocacao'] == 1):
                                                                $color = 'first';
                                                            elseif ($conc['colocacao'] == 2):
                                                                $color = 'second';
                                                            elseif ($conc['colocacao'] == 3):
                                                                $color = 'third';
                                                            endif;
                                                        ?>
                                                        <div class="badge badge-<?= $color ?> px-2 px-md-4 py-1 py-md-2 mb-2 mb-md-0">
                                                            <i class="fas fa-trophy"></i> <?= $conc['colocacao'] ?>º
                                                        </div>
                                                    </div>
                                                    <div class="td p-0 p-md-2"><div class="title"><?= $conc['nome_do_torneio'] ?></div></div>
                                                    <div class="td p-0 p-md-2 text-left text-md-right"><div class="text-muted"><?= $conc['time'] ?></div></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($categories_data as $cat => $category_data): ?>
                                    <?php $cat_id = array_search($cat, $categories); ?>
                                    <div class="tab-pane show" role="tabpanel" id="pane<?= $cat_id ?>">
                                        <div class="table-custom">
                                            <div class="thead d-none d-md-block">
                                                <div class="tr">
                                                    <div class="th col-lg-1 col-md-2 col-sm-3 col-12 p-0 p-md-2">Posição</div>
                                                    <div class="th p-0 p-md-2">Torneio</div>
                                                    <div class="th p-0 p-md-2"></div>
                                                </div>
                                            </div>
                                            <div class="tbody">
                                                <?php foreach ($category_data as $conc): ?>
                                                    <div class="tr mb-2 mb-md-0">
                                                        <div class="td col-lg-1 col-md-2 col-sm-3 col-12 p-0 p-md-2">
                                                            <?php
                                                                $color = 'default';
                                                                if ($conc['colocacao'] == 1):
                                                                    $color = 'first';
                                                                elseif ($conc['colocacao'] == 2):
                                                                    $color = 'second';
                                                                elseif ($conc['colocacao'] == 3):
                                                                    $color = 'third';
                                                                endif;
                                                            ?>
                                                            <div class="badge badge-<?= $color ?> px-2 px-md-4 py-1 py-md-2 mb-2 mb-md-0">
                                                                <i class="fas fa-trophy"></i> <?= $conc['colocacao'] ?>º
                                                            </div>
                                                        </div>
                                                        <div class="td p-0 p-md-2"><div class="title"><?= $conc['nome_do_torneio'] ?></div></div>
                                                        <div class="td p-0 p-md-2 text-left text-md-right"><div class="text-muted"><?= $conc['time'] ?></div></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (count($page_fields['staff'])): ?>
        <div class="container wide block block-staff my-5 pt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-header">
                        <h2 class="title">Staff</h2>
                        <p class="subtitle">Nossa equipe</p>
                    </div>
                    <div class="staff owl-carousel owl-carousel-custom-nav">
                        <?php foreach ($page_fields['staff'] as $staff): ?>
                            <div class="card staff active mb-2 mb-md-0">
                                <div class="content">
                                    <div class="image border-radius" style="background-image:url('<?= $staff['foto'] ?>');"></div>
                                    <div class="links default border-radius mt-0 mt-md-3 p-2 p-md-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase font-weight-black mb-0"><?= $staff['nome'] ?></h3>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="mb-0"><?= $staff['cargo'] ?></p>
                                            </div>
                                            <div class="col-md-6 col-12 text-right">
                                                <?php
                                                    # Facebook
                                                    $facebook_url = $staff['link_facebook'];
                                                    if ($facebook_url <> ''):
                                                        echo '<a class="icon mx-1" href="'.$facebook_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Facebook" class="fab fa-facebook-f"></i></a>';
                                                    endif;
                                                    # Instagram
                                                    $instagram_url = $staff['link_instagram'];
                                                    if ($instagram_url <> ''):
                                                        echo '<a class="icon mx-1" href="'.$instagram_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Instagram" class="fab fa-instagram"></i></a>';
                                                    endif;
                                                    # Youtube
                                                    $youtube_url = $staff['link_youtube'];
                                                    if ($youtube_url <> ''):
                                                        echo '<a class="icon mx-1" href="'.$youtube_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Youtube" class="fab fa-youtube"></i></a>';
                                                    endif;
                                                    # Twitter
                                                    $twitter_url = $staff['link_twitter'];
                                                    if ($twitter_url <> ''):
                                                        echo '<a class="icon mx-1" href="'.$twitter_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Twitter" class="fab fa-twitter"></i></a>';
                                                    endif;
                                                    # Twitch
                                                    $twitch_url = $staff['link_twitch'];
                                                    if ($twitch_url <> ''):
                                                        echo '<a class="icon mx-1" href="'.$twitch_url.'" target="_blank"><i data-toggle="tooltip" data-placement="top" title="Twitch" class="fab fa-twitch"></i></a>';
                                                    endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</section>

<script>
    $(document).ready(function () {
        $(".main-banner.owl-carousel").owlCarousel({
            loop:false,
            margin:0,
            nav:false,
            items:1,
            dots:false
        });
        $(".js-modal-btn").modalVideo();

        // STAFF
        var staff_items = $(window).width() <= 768 ? 1 : 4;
        if (staff_items > 1) {
            $('.staff.owl-carousel').owlCarousel({
                loop: ($('.staff.owl-carousel .slide').length > staff_items ? true : false),
                nav: false, dots: false, items: staff_items, autoplay: false, margin: 10,
                nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
            });
        } else {
            $('.staff.owl-carousel').removeClass("owl-carousel");
        }

        $(".block-tournaments .filters .each").on("click", function () {
            $(".block-tournaments .filters .each").not($(this)).removeClass('active');
        });
    });

    $(window).on('load', function () {
        // TIMELINE
        var timeline_elements_pos = [];
        if ($(window).width() > 768) {
            // - Tamanho total do stage
            if ($(".timeline-area .each").length % 2 == 0) {
                columns = ($(".timeline-area .each").length / 2) + 0.5;
            } else {
                columns = Math.round($(".timeline-area .each").length / 2);
            }
            // - Tamanho da timeline total
            var space_at_end = $(window).width() * 0.2;
            var timeline_width = (columns * $(".timeline-area .each").outerWidth());
            var flightPath = { values: [ { x: -1 * (timeline_width - space_at_end), y: 0 } ] };
            // - Quando exibir card
            var fade_in_antecip = 180;
            $(".timeline-area .each").each(function () {
                position_left = ($(this).position().left - fade_in_antecip) < 0 ? 0 : ($(this).position().left - fade_in_antecip);
                timeline_elements_pos.push({ 'element': $(this), 'position': position_left });
            });
        } else {
            // - Tamanho da timeline total
            var timeline_width = (($(".timeline-area .each").length - 1) * $(".timeline-area .each").outerWidth());
            var flightPath = { values: [ { x: -1 * (timeline_width), y: 0 } ] };
            // - Quando exibir card
            var fade_in_antecip = 60;
            $(".timeline-area .each").each(function () {
                position_left = ($(this).position().left - fade_in_antecip) < 0 ? 0 : ($(this).position().left - fade_in_antecip);
                timeline_elements_pos.push({ 'element': $(this), 'position': position_left });
            });
        }

        $(".timeline-area").width(timeline_width);
        const tween = new TimelineLite();
        tween.add(TweenLite.to(".timeline-area", 1, { bezier: flightPath, ease: Power1.easeInOut }));
        const Controller = new ScrollMagic.Controller();
        const scene = new ScrollMagic.Scene({ triggerElement: ".block-timeline", duration: 2000, triggerHook: 0 })
            .setTween(tween)
            .setPin('.block-timeline > .row')
            .addTo(Controller)
            .on("progress", function (event) {
                var matrixValues = $(".timeline-area").css("transform").match(/matrix.*\((.+)\)/)[1].split(', ');
                var progress_width = matrixValues[4] * -1;

                for (var o in timeline_elements_pos) {
                    if (progress_width > timeline_elements_pos[o].position) {
                        timeline_elements_pos[o].element.addClass("active");
                    } else {
                        timeline_elements_pos[o].element.removeClass("active");
                    }
                }

                $(".overall-progress").width(progress_width + 180);

            });
    });
</script>

<?php get_footer(); ?>