<div id="twitchStreamers" class="container wide block block-streams mb-5 pt-5 reveal" v-if="show_block">
	<div class="row">
		<div class="col-md-12">
			<div class="block-header">
				<h2 class="title">Streams Online</h2>
				<p class="subtitle">Acompanhe em tempo real</p>
			</div>
			<div class="streams-area">
				<template v-if="streamers_is_loading">
					<div class="loading text-center">
						<?php include("loader.inc.php") ?>
					</div>
				</template>
				<template v-else-if="streamers_has_error">
					<div class="alert alert-info" v-html="streamers_has_error_msg"></div>
				</template>
				<template v-else>
					<div class="streams owl-carousel owl-carousel-custom-nav">
						<a v-for="stream in streamers" v-bind:href="stream.stream_link" target="_blank" class="card stream" v-bind:class="{ 'online': stream.live, 'offline': !stream.live }" v-bind:style="{ 'backgroundImage': 'url(\''+stream.stream_thumbnail+'\')' }">
							<div class="bg1" v-bind:style="{ 'backgroundImage': 'url(\''+stream.stream_thumbnail+'\')' }"></div>
							<div class="bg2" v-bind:style="{ 'backgroundImage': 'url(\''+stream.stream_thumbnail+'\')' }"></div>
							<div class="header p-3">
								<span v-if="stream.live" class="float-left viewers py-1 px-2 text-white">
									<i class="fas fa-users mr-1"></i> 
									<span v-text="stream.live_data.viewer_count"></span>
								</span>
								<span class="float-right live-button py-2 px-4" v-text="stream.live ? 'AO VIVO' : 'OFFLINE'"></span>
							</div>
							<div class="content align-items-bottom p-3">
								<div class="twitch link p-2">
									<div class="row align-items-center">
										<div class="col-3">
											<img v-bind:src="stream.user_avatar" v-bind:alt="stream.user_name" class="avatar">
										</div>
										<div class="col-9 pl-0">
											<div class="title" v-text="stream.user_name"></div>
											<template v-if="stream.live">
												<p class="text-uppercase" v-html="'Jogando <b>' + _limitText(stream.live_data.game_name, 20) + '</b>'"></p>
											</template>
											<template v-else>
												<p class="text-uppercase">Está offline agora</p>
											</template>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</template>
			</div>
		</div>
	</div>
</div>

<script>
	var twitchStreamers = new Vue({
	    el: '#twitchStreamers',
	    data: {
	    	show_block: true,
	        streamers_has_error: false,
	        streamers_has_error_msg: '',
	        streamers_is_loading: true,
	        streamers: []
	    },
	    mounted: function () {
	        this.getStreamers();
	    },
	    methods:{
	        getStreamers () {
	        	var self = this;
	        	$.ajax({
			        url: "<?= get_rest_url() ?>mibr/v1/streamers",
			        type: 'GET',
			        dataType: 'json',
			        success: function (res) {
			            if (res.success) {
			            	self.streamers_is_loading = false;
			            	self.streamers_has_error = false;
			            	self.streamers = res.response;
							// STREAMS
							setTimeout(function () {
								var streams_items = $(window).width() <= 768 ? 1 : 4;
								$('.streams.owl-carousel').owlCarousel({
								    loop: ($('.streams.owl-carousel .stream').length > streams_items ? true : false),
								    dots: false, items: streams_items, margin: 10, autoplay: (streams_items == 1) ? true : false,
								    // autoplay: true, autoplayTimeout: 6000,
								    nav: true, navText: ["<i class='far fa-angle-left'></i>","<i class='far fa-angle-right'></i>"]
								});
							}, 0);
			            } else {
			            	self.streamers_is_loading = false;
			            	self.streamers_has_error = true;
			            	self.show_block = false;
			            	self.streamers_has_error_msg = res.response;
			            }
			        }
			    });
	        },
	        _limitText (string, length = 20) {
	        	return string.length > length ?  string.substring(0, length - 3) + "..." :  string;
	        }
	    }
	});

</script>