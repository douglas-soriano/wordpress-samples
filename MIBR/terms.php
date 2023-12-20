<?php /* Template Name: Termos de Uso */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<section id="sponsorship_page" class="page-common">

    <div class="container py-5">
        <h1 class="text-center text-uppercase font-weight-black mb-5"><?= get_the_title() ?></h1>
        <div class="text text-justify"><?= get_the_content() ?></div>
    </div>

</section>

<?php get_footer(); ?>