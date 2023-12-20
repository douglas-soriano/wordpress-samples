<div id="youtubeVideos" class="container wide block block-youtube mb-5 pt-5 reveal" v-if="show_block">
	<div class="row">
		<div class="col-md-12">
			<div class="block-header">
				<div class="float-right pt-3 d-none d-md-block">
					<a class="link" href="<?= do_shortcode('[sv slug="link-youtube"]') ?>" target="_blank">ASSISTIR NO YOUTUBE <i class="far fa-angle-right ml-2"></i></a>
				</div>
				<h2 class="title">YOUTUBE</h2>
				<p class="subtitle">Assista nosso canal</p>
			</div>
			<template v-if="youtube_is_loading">
				<div class="loading text-center">
					<?php include("loader.inc.php") ?>
				</div>
			</template>
			<template v-else-if="youtube_has_error">
				<div class="alert alert-info" v-html="youtube_has_error_msg"></div>
			</template>
			<template v-else>
				<div class="videos" style="margin-left:-8px;margin-right:-8px;">
					<div class="card youtube p-2" v-for="video in youtube">
						<a v-bind:href="video.video_link" target="_blank" class="content mb-3">
							<div class="image" v-bind:style="{ 'backgroundImage': 'url(\''+video.video_thumbnail+'\')' }">
								<div class="bg1" v-bind:style="{ 'backgroundImage': 'url(\''+video.video_thumbnail+'\')' }"></div>
								<div class="bg2" v-bind:style="{ 'backgroundImage': 'url(\''+video.video_thumbnail+'\')' }"></div>
								<img src="<?= esc_url(get_template_directory_uri()) ?>/images/youtube-transparent.png" alt="">
							</div>
							<div class="title mt-3 mb-2" v-text="_limitText(video.title, 54)" v-bind:title="video.title"></div>
							<div class="description" v-text="'Postado '+_getDate(video.published_at)"></div>
						</a>
					</div>
				</div>
			</template>
		</div>
		<div class="col-md-12 text-center pt-3 pb-5">
			<a href="<?= do_shortcode('[sv slug="link-youtube"]') ?>" target="_blank" class="btn btn-black-outlined btn-sm glitch-black-hover">
				<span class="glitch" data-text="Ver Mais Vídeos">Ver Mais Vídeos</span>
			</a>
		</div>
	</div>
</div>

<script>
	var youtubeVideos = new Vue({
	    el: '#youtubeVideos',
	    data: {
	    	show_block: true,
	        youtube_has_error: false,
	        youtube_has_error_msg: '',
	        youtube_is_loading: true,
	        youtube: []
	    },
	    mounted: function () {
	        this.getVideos();
	    },
	    methods:{
	        getVideos () {
	        	var self = this;
	        	$.ajax({
			        url: "<?= get_rest_url() ?>mibr/v1/youtube/videos",
			        type: 'GET',
			        dataType: 'json',
			        success: function (res) {
			            if (res.success) {
			            	self.youtube_is_loading = false;
			            	self.youtube_has_error = false;
			            	self.youtube = res.response;
							// YOUTUBE
							setTimeout(function () {
								if ($(window).width() <= 768) {
									$('.videos').addClass('owl-carousel owl-carousel-custom-nav');
									$('.videos.owl-carousel').owlCarousel({
									    loop: ($('.videos.owl-carousel .slide').length > 10 ? true : false),
									    dots: false, items: 1, autoplay: true, margin: 10,
								    	nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
									});
								} else {
									$('.videos.owl-carousel').removeClass('owl-carousel');
								}
							}, 0);
			            } else {
			            	self.youtube_is_loading = false;
			            	self.youtube_has_error = true;
			            	self.show_block = false;
			            	self.youtube_has_error_msg = res.response;
			            }
			        }
			    });
	        },
	        _limitText (string, length = 20) {
	        	return string.length > length ?  string.substring(0, length - 3) + "..." :  string;
	        },
	        _getDate (date) {
	        	return moment(date).fromNow();
	        	date = new Date(date);
				year = date.getFullYear();
				month = date.getMonth() + 1;
				if (month < 10) month = '0' + month;
				dt = date.getDate();
				if (dt < 10) dt = '0' + dt;
				hour = date.getHours();
				if (hour < 10) hour = '0' + hour;
				minute = date.getMinutes();
				if (minute < 10) minute = '0' + minute;
				return dt + '/' + month + '/' + year + ' às ' + hour + ':' + minute;
	        }
	    }
	});

</script>