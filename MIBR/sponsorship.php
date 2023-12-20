<?php /* Template Name: Patrocinadores */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<section id="sponsorship_page" class="page-common">

    <div class="container wide py-5">
        <h1 class="text-center text-uppercase font-weight-black">Patrocinadores</h1>
    </div>

    <div class="bg-light">
        <div class="container pt-5">
            <div class="row">
                <?php foreach ($page_fields['patrocinadores'] as $sponsor): ?>
                    <div class="col-md-12 text-center pb-5">
                        <?php if ($sponsor['link']): ?>
                            <a href="<?= $sponsor['link'] ?>" target="_blank">
                        <?php endif; ?>
                                <img class="logo mb-3" src="<?= $sponsor['logo'] ?>" alt="">
                        <?php if ($sponsor['link']): ?>
                            </a>
                        <?php endif; ?>
                        <div class="text"><?= $sponsor['texto'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h3 class="text-uppercase font-weight-black">Parceiros</h3>
            </div>
            <div class="col-md-9">
                <div class="logos owl-carousel owl-carousel-custom">
                    <?php foreach ($page_fields['parceiros'] as $sponsor): ?>
                        <div class="each">
                            <?php if ($sponsor['link']): ?>
                                <a href="<?= $sponsor['link'] ?>" target="_blank">
                            <?php endif; ?>
                                    <img class="logo" src="<?= $sponsor['logo'] ?>" alt="">
                            <?php if ($sponsor['link']): ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {
        $(".logos.owl-carousel").owlCarousel({
            loop: $(".logos.owl-carousel").length ? true : false,
            margin: $(window).width() <= 768 ? 20 : 0,
            nav: false,
            items: 2,
            dots: false,
            autoplay: true,
            autoplayTimeout: 10000
        });
    });
</script>

<?php get_footer(); ?>