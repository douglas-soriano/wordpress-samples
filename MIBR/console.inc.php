<ul id="commandsList" class="commands-list d-none d-md-block" v-bind:class="{ 'active': pro_mode_enabled }">
	<li class="commands" v-for="command in commands">
		<div class="keys">
			<div class="key" v-for="key in command.keys" v-text="key"></div>
		</div>
		<div class="title" v-text="command.title"></div>
	</li>
</ul>

<ul id="killLog" class="kill-log d-none d-md-block">
	<li class="kill enable-pro-mode" style="display:none;">
		<div class="killer"><i class="far fa-star"></i> Pro Mode</div>
		<div class="weapon">
			<svg viewBox="0 0 250 224" version="1.1" xmlns="http://www.w3.org/2000/svg" style="transform:rotate(45deg);margin-bottom:-6px;">
				<path d=" M 123.17 8.20 C 139.78 2.44 157.48 0.09 175.03 0.64 C 200.68 1.70 225.14 10.89 248.23 21.49 C 241.47 21.53 234.68 20.74 227.99 19.81 C 215.34 19.27 202.58 19.56 190.16 22.22 C 177.41 25.03 164.89 29.28 153.48 35.69 C 142.32 42.06 131.40 49.22 122.52 58.61 C 114.66 67.53 107.13 76.80 100.72 86.84 C 101.52 88.00 103.20 89.36 102.04 90.89 C 100.86 93.18 99.88 95.64 98.24 97.65 C 90.54 95.56 82.73 91.37 74.53 93.27 C 68.44 94.38 64.02 100.02 63.19 105.97 C 62.12 110.15 63.60 114.34 65.31 118.11 C 63.64 120.36 60.30 120.29 58.46 122.43 C 51.95 128.74 51.21 139.48 55.66 147.19 C 50.35 149.05 45.97 153.43 45.14 159.16 C 43.92 163.33 46.00 167.28 47.48 171.04 C 46.80 172.08 46.07 173.09 45.29 174.07 C 48.92 178.25 53.80 181.43 56.31 186.50 C 58.21 190.42 59.36 194.78 59.20 199.17 C 57.51 206.29 54.03 213.64 47.29 217.22 C 42.08 220.54 35.80 221.04 29.79 221.37 C 26.45 221.49 23.31 223.48 19.97 223.01 C 17.65 220.55 16.77 216.98 14.94 214.13 C 11.85 207.96 7.85 202.26 5.20 195.87 C 3.81 193.08 4.60 189.92 5.21 187.04 C 3.37 186.58 0.71 185.40 1.10 183.07 C 1.60 179.95 1.06 175.11 5.45 174.95 C 4.73 172.85 2.14 171.31 3.52 168.88 C 4.80 168.58 5.92 167.97 6.87 167.07 C 5.96 166.37 5.04 165.67 4.12 164.97 C 4.22 164.40 4.42 163.24 4.52 162.67 C 5.60 162.18 6.68 161.71 7.76 161.23 C 7.70 160.87 7.57 160.15 7.50 159.79 C 6.78 158.72 4.78 157.52 5.89 156.06 C 6.97 155.21 8.25 154.66 9.40 153.93 C 8.70 152.84 7.90 151.82 7.10 150.80 C 7.27 150.27 7.60 149.20 7.77 148.66 C 8.43 148.59 9.77 148.43 10.44 148.36 C 10.53 147.81 10.73 146.71 10.82 146.17 C 10.11 145.51 9.56 144.75 9.19 143.88 C 13.78 128.18 19.41 112.70 27.20 98.27 C 30.07 93.28 31.87 87.23 37.31 84.35 C 37.98 83.68 38.66 83.03 39.36 82.38 C 40.44 81.15 41.56 79.96 42.67 78.76 C 45.86 75.50 48.35 71.67 50.95 67.95 C 51.71 66.62 52.42 65.25 53.00 63.84 C 54.01 63.22 54.48 62.30 54.42 61.10 C 56.12 57.74 56.81 54.05 57.93 50.49 C 59.41 47.70 61.75 45.47 63.76 43.07 C 64.96 44.24 66.18 45.44 67.76 46.09 C 74.17 39.03 81.59 32.99 89.03 27.08 C 99.24 18.90 111.16 13.21 123.17 8.20 M 22.47 179.67 C 13.18 184.20 11.43 198.11 18.58 205.30 C 24.47 211.15 33.68 215.32 41.84 211.95 C 50.07 208.80 54.14 197.96 49.90 190.21 C 46.63 183.70 39.86 179.61 32.87 178.23 C 29.37 177.42 25.66 178.14 22.47 179.67 Z" />
			</svg>
		</div>
		<div class="killed"><i class="far fa-circle"></i> Normal Mode</div>
	</li>
	<li class="kill enable-normal-mode" style="display:none;">
		<div class="killer"><i class="far fa-circle"></i> Normal Mode</div>
		<div class="weapon">
			<svg viewBox="0 0 969 929" version="1.1" xmlns="http://www.w3.org/2000/svg" style="transform:rotate(45deg);">
				<path d=" M 957.55 6.42 C 960.61 4.22 963.90 2.34 967.43 0.97 C 964.81 3.89 963.63 7.70 961.26 10.78 C 960.82 10.93 959.96 11.24 959.53 11.39 C 960.01 13.44 959.90 15.54 959.63 17.61 L 959.02 17.67 C 951.07 32.49 942.43 47.02 932.35 60.49 C 926.42 69.66 919.66 78.28 913.02 86.95 C 888.49 118.24 862.07 148.00 835.01 177.11 C 785.28 230.65 732.19 280.94 680.05 332.10 C 669.72 342.39 659.17 352.47 649.27 363.18 C 646.88 365.56 645.32 368.65 642.80 370.91 C 637.37 375.76 632.71 381.38 627.53 386.48 C 617.29 396.99 606.68 407.12 596.42 417.60 C 591.29 424.28 585.51 430.46 579.67 436.52 C 577.59 440.14 579.34 444.54 581.01 447.99 C 585.16 453.17 591.81 455.13 597.42 458.27 C 602.84 459.65 608.05 461.83 613.62 462.67 C 616.45 463.06 619.00 464.36 621.46 465.76 C 623.89 470.74 621.66 476.46 618.17 480.30 C 616.43 482.15 616.38 484.89 615.03 486.98 C 613.15 490.12 609.54 491.56 607.32 494.39 C 605.61 496.43 603.48 498.19 600.90 498.96 C 596.46 500.19 592.78 503.69 587.95 503.48 C 583.05 503.18 578.13 505.71 573.40 503.44 C 569.74 501.54 565.25 502.56 561.81 500.15 C 559.38 498.68 557.99 495.68 555.06 495.06 C 550.82 493.91 547.25 490.31 546.56 485.91 C 546.23 483.08 544.11 480.19 540.93 480.79 C 537.98 482.57 536.07 485.57 533.80 488.08 C 534.91 490.93 536.87 493.68 536.90 496.81 C 536.19 500.26 532.26 499.77 529.69 500.71 C 527.27 502.29 528.42 505.69 526.97 507.85 C 525.22 510.39 521.25 508.92 519.41 511.30 C 518.81 513.20 518.91 515.30 518.05 517.12 C 516.59 519.15 513.87 518.96 511.68 519.28 C 509.54 521.22 509.78 524.18 508.86 526.68 C 507.30 528.77 504.35 528.16 502.19 529.19 C 500.21 530.85 500.74 533.70 499.87 535.90 C 498.18 538.55 494.29 537.22 492.24 539.35 C 490.91 541.57 491.77 544.73 489.67 546.54 C 487.55 547.62 484.72 547.19 482.99 548.98 C 481.75 551.55 482.64 555.67 479.18 556.65 C 475.88 557.08 472.51 556.59 469.21 557.15 C 446.42 579.72 423.73 602.41 400.83 624.86 C 394.72 630.41 389.38 636.73 383.12 642.12 C 327.61 696.33 271.08 749.51 213.55 801.57 C 201.39 813.37 189.14 825.11 177.81 837.72 C 175.60 839.96 173.67 843.70 169.92 842.80 C 169.42 843.05 168.43 843.56 167.93 843.81 C 145.16 869.11 124.43 896.28 106.33 925.11 C 102.66 929.18 96.85 928.81 91.92 927.93 C 71.75 923.83 52.74 914.35 37.24 900.81 C 18.38 884.17 5.90 860.83 1.25 836.21 C 0.53 832.11 0.07 826.62 4.06 824.02 C 5.41 822.84 8.20 821.99 6.07 819.92 C 9.04 816.39 13.68 815.12 17.12 812.18 C 22.46 807.66 28.70 804.42 34.42 800.46 C 53.03 788.40 70.42 774.56 87.02 759.89 C 89.06 758.24 91.20 755.12 94.16 756.78 C 94.58 756.50 95.43 755.93 95.85 755.64 C 95.81 755.12 95.73 754.07 95.69 753.55 C 103.57 746.78 111.65 740.25 119.47 733.42 C 144.61 708.89 167.98 682.62 192.85 657.82 C 208.87 641.83 225.10 626.04 241.44 610.38 C 254.01 598.64 265.67 586.00 278.18 574.21 C 318.14 535.46 358.51 497.15 399.07 459.03 C 406.27 452.48 413.14 445.56 420.69 439.41 C 421.32 439.80 422.56 440.57 423.19 440.96 C 430.13 434.65 437.26 428.55 444.07 422.09 C 452.69 415.61 461.47 409.35 470.02 402.78 C 472.43 400.84 474.50 398.53 476.36 396.07 C 476.10 394.43 475.90 392.80 475.68 391.18 L 476.94 391.30 C 474.52 385.59 468.55 383.00 463.18 380.82 C 457.64 378.50 450.65 379.87 446.37 374.89 C 446.45 372.21 445.40 369.28 446.87 366.82 C 451.90 358.61 460.90 353.44 470.16 351.47 C 479.54 349.72 489.12 352.50 497.69 356.22 C 502.47 358.10 506.16 361.92 511.00 363.68 C 517.64 361.28 521.57 354.93 527.66 351.65 C 530.12 351.97 532.58 351.53 535.05 351.37 C 548.89 338.77 563.38 326.90 577.06 314.11 C 583.62 308.65 589.51 302.46 596.16 297.11 C 602.19 291.15 608.38 285.33 614.98 280.01 C 636.22 260.60 656.56 240.24 678.04 221.12 C 692.86 207.53 708.25 194.58 723.65 181.66 C 726.68 179.26 729.19 176.18 732.64 174.32 C 742.98 164.66 754.40 156.26 764.99 146.88 C 777.94 136.47 790.83 126.01 803.98 115.83 C 814.49 106.97 826.13 99.55 836.82 90.90 C 876.37 61.78 916.40 33.26 957.55 6.42 M 609.34 367.56 C 602.93 369.66 601.44 379.17 606.96 383.08 C 612.05 387.49 620.97 383.79 621.43 377.07 C 622.51 370.65 615.32 365.03 609.34 367.56 Z" />
			</svg>
		</div>
		<div class="killed"><i class="far fa-star"></i> Pro Mode</div>
	</li>
</ul>

<div id="csgoConsole" class="console">
	<div class="console-overlay" v-on:click="toggleConsole(false)"></div>
	<div class="console-frame">
		<div class="console-title">
			Console
			<div class="console-close" v-on:click="toggleConsole(false)"><i class="far fa-times"></i></div>
		</div>
		<div class="console-area">
			<div class="console-content">
				<div class="message">NET Ports: server 28192, client 919322<br>Server IP address 192.168.1.1:919322</div>
				<div class="message">MIBR © Copyright 2003 - <?= date('Y') ?> - All Rights Reserved</div>
				<div class="message system">-------- MIBR Console --------</div>
				<div class="message system">Commands list:<br>- dark_mode<br>- list_menu<br>- go_to_page (number)<br>- ent_create chicken / give chicken<br>- ent_create flashbang_projectile<br>- #perfeitinha</div>
				<div class="message" v-bind:class="{ 'system': msg.type == 'system' }" v-for="msg in user_messages" v-text="msg.datetime + ': ' +msg.msg"></div>
			</div>
			<div class="console-input">
				<input type="text" class="form-control" v-on:keyup.enter="sendMessage" v-model="user_current_msg" list="commandsAutocomplete">
				<datalist id="commandsAutocomplete">
					<option value="dark_mode" />
					<option value="list_menu" />
					<option value="go_to_page" />
					<option value="ent_create chicken" />
					<option value="give chicken" />
					<option value="ent_create flashbang_projectile" />
					<option value="#perfeitinha" />
				</datalist>
				<button class="btn btn-sm btn-submit" v-on:click="sendMessage">Submit</button>
			</div>
		</div>
	</div>
	<div class="console-stuff"></div>
</div>

<script>
	var commandsList = new Vue({
	    el: '#commandsList',
	    data: {
	    	pro_mode_enabled: false,
	    	console_enabled: false,
	    	commands: [{
	    		keys: ['↑','→','m'],
	    		title: 'Enable Pro Mode'
	    	}],
	    	key_logs: []
	    },
	    mounted: function () {
	    	var self = this;
	        $(document).bind('keyup', function(e) {
	        	let keys = {
	        		'up': 38,
	        		'down': 40,
	        		'left': 37,
	        		'right': 39,
	        		'm': 77,
	        		'console': 192,
	        		'esc': 27,
	        		'b': 66
	        	};

	        	// Mantem últimas 3 teclas no log
			    self.key_logs.push(e.keyCode);
			    if (self.key_logs.length > 3) {
			    	self.key_logs = self.key_logs.slice(1, 4);
			    }

			    // Sequencias:
			    // 1. Enable Pro Mode
			    let kl = self.key_logs;
			    if (kl[0] == keys['up'] && kl[1] == keys['right'] && kl[2] == keys['m']) {
			    	self.showKillLog(true);
			    // 2. Disable Pro Mode
			    } else if (kl[0] == keys['down'] && kl[1] == keys['left'] && kl[2] == keys['m']) {
			    	self.showKillLog(false);
			    // 3. Open Console
			    } else if (self.pro_mode_enabled && kl[kl.length - 1] == keys['console']) {
			    	csgoConsole.toggleConsole(true);
			    // 4. Close Console
			    } else if (kl[kl.length - 1] == keys['esc']) {
			    	csgoConsole.toggleConsole(false);
			    // 5. Store
			    } else if (kl[kl.length - 1] == keys['m'] && kl[1] == keys['b']) {
			    	store_url = 'http://brstore.mibr.gg';
			    	window.open(store_url, '_blank').focus();
			    }
			});

		    // Verifica se já está ativo
		    $(window).on('load', function () {
			    if (csgoConsole.getCookie('mibr_pro_mode_enabled')) {
			    	self.toggleProMode(true, false);
			    }
			});

	    },
	    methods:{

	    	// - Exibe notificação de kill no topo da tela
	        showKillLog (enabled = true, play_sound = true) {
	        	if (enabled) {
	        		this.toggleProMode(true, play_sound);
	        		$(".enable-pro-mode").css("display", "flex");
	        		$(".enable-normal-mode").css("display", "none");
	        	} else {
	        		this.toggleProMode(false, play_sound);
	        		$(".enable-pro-mode").css("display", "none");
	        		$(".enable-normal-mode").css("display", "flex");
	        	}
	        	$("#killLog").addClass("active");
	        	setTimeout(function () {
	        		$("#killLog").removeClass("active");
	        	}, 3000);
	        },

	        // - Habilita e desabilita PRO Mode
	        toggleProMode (enabled = true, play_sound = true) {
	        	this.pro_mode_enabled = enabled;
	        	if (enabled) {
	        		if (play_sound) csgoConsole.playSound('planting-bomb');
	        		this.commands = [{
			    		keys: ['↓','←','m'],
			    		title: 'Disable Pro Mode'
	        		}, {
			    		keys: ["'"],
			    		title: 'Console'
	        		}, {
	        			keys: ["m", "b"],
	        			title: 'Loja'
	        		}];
	        		csgoConsole.setCookie('mibr_pro_mode_enabled', 1, 7);
	        	} else {
	        		if (play_sound) csgoConsole.playSound('defused');
	        		$(".console-stuff").html("");
	        		$("body").removeClass("dark-mode");
	        		$("#csgoConsole").fadeOut(300);
	        		this.commands = [{
			    		keys: ['↑','→','m'],
			    		title: 'Enable Pro Mode'
	        		}];
	        		csgoConsole.setCookie('mibr_pro_mode_enabled', 0, 7);
	        	}
	        }

	    }
	});

	var csgoConsole = new Vue({
	    el: '#csgoConsole',
	    data: {
	    	console_enabled: false,
	    	user_messages: [],
	    	user_current_msg: '',
	    	list_menu: <?= json_encode(get_menu_items_as_array('menu_principal')) ?>
	    },
	    methods: {

	    	// - Exibe e fecha console
	        toggleConsole (enabled = true) {
	        	this.console_enabled = enabled;
	        	commandsList.console_enabled = enabled;
	        	if (enabled) {
	        		var found = commandsList.commands.filter(function (obj) {
						return obj.title == 'Close Console';
					});
					if (!found.length) {
		        		commandsList.commands.push({
				    		keys: ['esc'],
				    		title: 'Close Console'
		        		});
		        	}
	        		$("#csgoConsole").fadeIn(300);
	        		$("#csgoConsole input").focus();
	        	} else {
	        		commandsList.commands = commandsList.commands.filter(function (obj) {
						return obj.title !== 'Close Console';
					});
	        		$("#csgoConsole").fadeOut(300);
	        	}
	        },

	    	// - Send message
	    	sendMessage () {
	    		this.user_messages.push({ 'type': 'user', 'datetime': new Date().toLocaleString(), 'msg': this.user_current_msg });
	    		this.checkForCommand(this.user_current_msg);
	    		this.user_current_msg = '';
	    		setTimeout(function () {
	    			$("#csgoConsole .console-content").scrollTop($("#csgoConsole .console-content")[0].scrollHeight);
	    		});
	    	},

	    	// - Send message from admin
	    	sendSystemMessage (msg) {
	    		this.user_messages.push({ 'type': 'system', 'datetime': new Date().toLocaleString(), 'msg': msg });
	    		setTimeout(function () {
	    			$("#csgoConsole .console-content").scrollTop($("#csgoConsole .console-content")[0].scrollHeight);
	    		});
	    	},

	    	// - Check for command
	    	checkForCommand (code) {

	    		// - Lista items do menu
	    		if (code.includes('list_menu')) {
    				var menu = 'Listando menu:\n';
    				for (var i in this.list_menu) {
    					menu += this.list_menu[i].page_code + ' - ' + this.list_menu[i].title + '\n';
    				}
    				this.sendSystemMessage(menu);

    			// - Navega para uma página
    			} else if (code.includes('go_to_page')) {
    				code = code.split('go_to_page');
    				var page_id = code[1].replace(/\s/g, '');
    				var page_data = null;
    				for (var i in this.list_menu) {
    					if (this.list_menu[i].page_code == page_id) {
    						page_data = this.list_menu[i];
    					}
    				}
    				if (page_data) {
    					this.sendSystemMessage('Carregando página...');
    					setTimeout(function () {
    						window.location.href = page_data.url;
    					}, 1000);
    				} else {
    					this.sendSystemMessage('Página não encontrada. Use "go_to_page (number)" para navegar.');
    				}

    			// - Ativa/desativa dark mode
	    		} else if (code.includes('dark_mode')) {
	    			if (!$('body').hasClass('dark-mode')) {
	    				this.sendSystemMessage('Dark Mode ativado.');
	    				$('body').addClass('dark-mode');
	    				this.changeFavicon('white');
	    			} else {
	    				this.sendSystemMessage('Dark Mode desativado.');
	    				$('body').removeClass('dark-mode');
	    				this.changeFavicon('black');
	    			}

    			// - Adiciona galinha
	    		} else if (code.includes('ent_create chicken') || code.includes('give chicken')) {
	    			$(".console-stuff").append('<img class="chicken" src="<?= esc_url(get_template_directory_uri()) ?>/images/enc-chicken.gif" />');

    			// -Flashbomb
	    		} else if (code.includes('ent_create flashbang_projectile')) {
	    			this.playSound('flashbomb');
	    			$('body').addClass('flashbomb');
	    			setTimeout(function () {
	    				$('body').removeClass('flashbomb');
	    			}, 2000);

				// -Flashbomb perfeitinha
	    		} else if (code.includes('#perfeitinha')) {
	    			this.playSound('flashbomb');
	    			$('body').addClass('flashbomb-perfeitinha');
	    			setTimeout(function () {
	    				$('body').removeClass('flashbomb-perfeitinha');
	    			}, 4000);
	    		}
	    	},

	    	playSound (name) {
    			var audio = new Audio('<?= esc_url(get_template_directory_uri()) ?>/sounds/'+name+'.mp3');
				audio.play();
	    	},

	    	setCookie(name,value,days) {
			    var expires = "";
			    if (days) {
			        var date = new Date();
			        date.setTime(date.getTime() + (days*24*60*60*1000));
			        expires = "; expires=" + date.toUTCString();
			    }
			    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
			},
			getCookie(name) {
			    var nameEQ = name + "=";
			    var ca = document.cookie.split(';');
			    for(var i=0;i < ca.length;i++) {
			        var c = ca[i];
			        while (c.charAt(0)==' ') c = c.substring(1,c.length);
			        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			    }
			    return null;
			},
			eraseCookie(name) {   
			    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			},

			changeFavicon (color = 'black') {
				var link = document.querySelector("link[rel~='icon']");
				if (!link) {
				    link = document.createElement('link');
				    link.rel = 'icon';
				    document.getElementsByTagName('head')[0].appendChild(link);
				}
				link.href = '<?= esc_url( get_template_directory_uri() ); ?>/images/favicon' + (color == 'white' ? '_w' : '') + '.ico';
			}

	    }
	});
</script>