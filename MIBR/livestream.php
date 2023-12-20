<?php /* Template Name: Livestream */ ?>

<?php get_header(); ?>
<?php $page_fields = get_fields(get_the_ID()); ?>

<div id="page_livestream">

	<?php include ("block-streamers.inc.php") ?>

	<?php include ("block-youtube.inc.php") ?>

</div>

<?php get_footer(); ?>