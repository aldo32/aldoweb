/* ----------------------------------------------------------------------------
   # Vinto.js
   # Created by: ThemeShifters
   # Website: http://themeshifters.com
   # 
   # All custom JavaScript/jQuery for Vinto HTML5 Template that is being
   # sold on ThemeForest
   #
   # Version: 1.0
   ---------------------------------------------------------------------------- */

(function( $ ) {

		"use strict";

		var body 		= $( "body" ),
			_window 	= $( window ),

			main_nav 	= $( "#main-nav" ),
			mobile_nav_trigger = $( "#trigger-mobile-nav" );


	/*	==================================================
		# One Page Navigation
		================================================== */
		$( function() {

			// Give the first section a top padding that equals 
			// the header (top) height. We assume the first section
			// is the next element after the header (top).
			var top_header = $("#top");
			top_header.next().css("padding-top", "+=" + top_header.height());

			// adds scrollTo functionality
			main_nav.onePageNav({
				currentClass: "current-menu-item",
				easing: "easeInOutExpo",
				scrollSpeed: 800,
				scrollOffset: 60,
				scrollThreshold: 0.5,
			});

			// initialize the current menu item of the main 
			// navigation by scrolling
			_window.scroll();

			// Mobile Navigation
			// When a user clicks on the mobile navigation trigger we
			// want to check if the main navigation is opened or closed.
			// According to the status, we want to slide up or down.
			mobile_nav_trigger.on("click", function(){

				if ($(this).hasClass("closed"))
				{
					$(this).addClass("opened").removeClass("closed");
					main_nav.slideDown();
				}
				else if ($(this).hasClass("opened"))
				{
					$(this).addClass("closed").removeClass("opened");
					main_nav.slideUp();
				}
				else
				{
					$(this).addClass("opened").removeClass("closed");
					main_nav.slideDown();
				}

			});

			// Function for closing the mobile navigation after the
			// user has clicked on an item.
			var close_mobile_nav = function() {
				mobile_nav_trigger.addClass("closed").removeClass("opened");
				main_nav.slideUp();
			};

			// When the user resizes the browser from under 991px to
			// bigger, we want to set the mobile nav to invisible.
			_window.resize( function() {

				if ( _window.width() < 992 ) {
					main_nav.css("display", "none");
					main_nav.find( "a" ).on("click", close_mobile_nav);
				}
				else
				{
					main_nav.css({
						"display": "block",
						"height": "",
					});
					main_nav.find( "a" ).off("click", close_mobile_nav);
				}

			});

			// initialize window resize function on load
			_window.resize();

			// Header Box
			// Functionality of the slide out menu (aka Header Box).
			// On initial click we want to slide out the header box and
			// else close the header box.

			var header_box_inner = $( "#header-box .header-box-inner" ),
				header_open		 = $( "#header-open" );

			$( ".header-box-trigger" ).on( "click", function() {
				if ( header_box_inner.hasClass("opened") ) {
					header_box_inner.removeClass("animated slideInDown").addClass("animated slideOutUp");

					header_box_inner.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
						$(this).removeClass("opened").addClass("closed");
						header_open.removeClass("animated slideOutUp").addClass("animated slideInDown");
					});
				}
				else {
					header_open.addClass("animated slideOutUp");

					header_open.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
						header_box_inner.removeClass("closed animated slideOutUp").addClass("opened animated slideInDown");
					});
				}
			});


		} );


	/*	==================================================
		# Project Item AJAX Loading - for Team Members and
		# Portfolio items. Load and display of the 
		# portfolio items and team members on click.
		================================================== */
		$( function() {

			var	hash,
				url,
				rootFolder = "portfolio-item",
				rootFolder2 = "team-member",
				is_pageRefreshed = true,
				is_ajaxLoading = false,
				is_clicked = false,
				ajaxType;

			var init_ajax_portfolio = function() {

				var popup_wrap,
					popup_content,
					popup_item,
					popup_nav,
					project_id;


				// On hashchange of the URL we want to check if the hash contains
				// the path to a portfolio item or a team member. According to
				// that information we want to load the project.

				_window.bind("hashchange", function() {

					hash = $(location).attr("hash");

					// General root variables after establishing current root folder (team or portfolio)
					var root,
						rootLength,
						hashRoot;

					// root variables for Team and Portfolio folder
					var rootPortfolio = "#!" + rootFolder + "/",
						rootTeam = "#!" + rootFolder2 + "/",
						rootLengthP = rootPortfolio.length,
						rootLengthT = rootTeam.length,
						hashRootP = hash.substr(0, rootLengthP),
						hashRootT = hash.substr(0, rootLengthT);

					// check if the url consists of the correct folder
					// if url neither consists of portfolio folder or team folder
					if (hashRootP != rootPortfolio && hashRootT != rootTeam)
					{
						if (!is_pageRefreshed)
							exit_project();

						return;
					}
					else
					{
						// if current root is portfolio root, make the general root the portfolio root
						if (hashRootP == rootPortfolio)
						{
							root = rootPortfolio;
							rootLength = rootLengthP;
						}
						// if current root is team root, make the general root the team root
						else if (hashRootT == rootTeam)
						{
							root = rootTeam;
							rootLength = rootLengthT;
						}

						hash = $(location).attr("hash");
						url = hash.replace(/[#\!]/g, "" );
						hashRoot = hash.substr(0, rootLength);

						// if url is passed in or refreshed
						if (is_pageRefreshed && hashRoot == root && !is_clicked) {

							// get the ID of the diamondslider
							if ( $('a[href$="'+ url +'"]').closest(".diamondslider").length > 0 )
								project_id = $('a[href$="'+ url +'"]').closest(".diamondslider").attr("id");
							else if ( $('a[href$="'+ url +'"]').closest(".team-panes").length > 0 )
								project_id = $('a[href$="'+ url +'"]').closest(".team-panes").attr("id");

							$.scrollTo($("#" + project_id), 800, {
					         	axis: 'y',
					        	easing: "easeInOutExpo",
					        	offset: -100,
					        	onAfter: load_project(),
					        });

						}
						else if (is_pageRefreshed && hashRoot == root && is_clicked)
						{
							$.scrollTo($("#" + project_id), 800, {
					         	axis: 'y',
					        	easing: "easeInOutExpo",
					        	offset: -100,
					        	onAfter: load_project(),
					        });
						}
						// if project navigation is used
						else if (!is_pageRefreshed && hashRoot == root && is_clicked)
						{
							load_project();
						}

					}

					is_pageRefreshed = false;

				});

				
				// When an item with ajax nav is clicked we want to
				// do the following.
				var ajax_click = function(e) {

					var $this = $( this );

					is_clicked = true;

					// get the project id
					if ( $this.closest(".diamondslider").length > 0 )
						project_id = $this.closest(".diamondslider").attr("id");
					else if ( $(this).closest(".team-panes").length > 0 )
						project_id = $this.closest(".team-panes").attr("id");

					if ( $this.attr("data-ajax") !== undefined )
					{
						ajaxType = $this.attr("data-ajax");

						// do the action according to the ajax type
						if ( ajaxType == "prev" || ajaxType == "next" )
						{
							var theItem,
								currentItem = $("#" + project_id + ' a[href$="'+ url +'"]');

							if ( ajaxType == "prev" ) {
								if ( $("#" + project_id + ' a[href$="'+ url +'"]').closest(".shape").length > 0 )
									var theItem = currentItem.closest(".shape").prevAll(".active").first();
								else
									var theItem = currentItem.closest(".team-pane").prev(".team-pane");
							} else {
								if ( $("#" + project_id + ' a[href$="'+ url +'"]').closest(".shape").length > 0 )
									var theItem = currentItem.closest(".shape").nextAll(".active").first();
								else
									var theItem = currentItem.closest(".team-pane").next(".team-pane");
							}

							var target = $(theItem).find(".ajax-nav").attr("href");

							if (typeof target == "undefined" || theItem.length === 0) {
					  			return false;
				   			}

							$this.attr("href", target);
						}

						else if ( ajaxType == "exit" )
						{
							exit_project();
							return false;
						}

					}

				};

				$(".ajax-nav").on("click", ajax_click);


				// Function for the loading of the project. This is done with jQuery AJAX
				// While the loading is done, we're using jQuery NProgress to show
				// the loading progress to the user.
				var load_project = function() {

					if (!is_ajaxLoading)
					{
						is_ajaxLoading = true;

						$.ajax({
							url: url,
							type: "GET",
							cache: true,
							beforeSend: function( xhr ) {
								NProgress.start();
							},
						}).always(function( html ) {

							var html = $(html).find("#project-inner");
							var html_obj = $(html);
							var parsed = $('<div/>').append(html_obj);

							parsed.imagesLoaded().always( function( instance ) {

								NProgress.done();
								is_ajaxLoading = false;

								if ( !$("#project-popup").length > 0 )
								{
									// add the popup markup to the body
									var markup_popup = '<div id="project-popup" class="tsp-wrap"><div class="tsp-container"><div class="tsp-content"><section id="project-item" class="page-type project-item"><div class="container no-padding-bottom"></div></section></div></div></div>';
									body.prepend(markup_popup);

									popup_wrap = $("#project-popup");
									popup_content = $("#project-popup .container");

									// don't use css animations for touch devices
									if ( Modernizr.touch ) {
								        // add the html to the popup
										popup_content.html(html);
										popup_content.append('<ul class="project-nav"><li class="prev"><a class="ajax-nav" href="#" data-ajax="prev"></a></li><li class="exit"><a class="ajax-nav" href="#" data-ajax="exit">x</a></li><li class="next"><a class="ajax-nav" href="#" data-ajax="next"></a></li></ul>');

										popup_item = $("#project-popup #project-inner");
										popup_nav = $("#project-popup .project-nav");

										// add overflow hidden to body to prevent scrolling
										body.css({
											"overflow": "hidden",
											"width": "100%",
											"height": "100%",
										});

										// reload js
										reload_js();
										$(".ajax-nav").on("click", ajax_click);

										activate_navigation();

								    } else {
								    	popup_wrap.addClass("animated fadeIn");

										// portfolio item fade in when popup fadeIn animation is done
										popup_wrap.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {

											// add the html to the popup
											popup_content.html(html);
											popup_content.append('<ul class="project-nav"><li class="prev"><a class="ajax-nav" href="#" data-ajax="prev"></a></li><li class="exit"><a class="ajax-nav" href="#" data-ajax="exit">x</a></li><li class="next"><a class="ajax-nav" href="#" data-ajax="next"></a></li></ul>');

											popup_item = $("#project-popup #project-inner");
											popup_nav = $("#project-popup .project-nav");

											// add overflow hidden to body to prevent scrolling
											body.css({
												"overflow": "hidden",
												"width": "100%",
												"height": "100%",
											});

											popup_item.addClass("animated fadeInUp");
											popup_nav.addClass("animated fadeIn");

											// reload js
											reload_js();
											$(".ajax-nav").on("click", ajax_click);

											activate_navigation();

									    });
								    }

								}
								else
								{
									popup_content = $("#project-popup .container");
									popup_item = $("#project-popup #project-inner");

									// add an 'old' class to the old item
									popup_item.removeClass("active").addClass("old");

									// don't use css animations for touch devices
									if (Modernizr.touch) {

										// add the html to the popup
										popup_content.prepend(html);
										popup_content.find("#project-inner.old").remove();

										// reload js
										reload_js();
										$(".ajax-nav").on("click", ajax_click);

									} else {
										if (ajaxType == "prev")
											popup_item.addClass("animated fadeOutRight");
										else if (ajaxType == "next")
											popup_item.addClass("animated fadeOutLeft");
										else
											popup_item.addClass("animated fadeOutRight");

										// portfolio item fade in when popup fadeIn animation is done
										popup_wrap.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
											// add the html to the popup
											popup_content.prepend(html);

											popup_content.find("#project-inner.old").remove();

											if (ajaxType == "prev")
												$("#project-popup #project-inner").addClass("animated fadeInLeft active");
											else if (ajaxType == "next")
												$("#project-popup #project-inner").addClass("animated fadeInRight active");
											else
												$("#project-popup #project-inner").addClass("animated fadeInLeft active");

											// reload js
											reload_js();
											$(".ajax-nav").on("click", ajax_click);
										});
									}

									activate_navigation();

								}

							}).progress( function( instance, image ) {
								NProgress.inc();
							});

						});
					};

				};


				// Function for activating or disabling the project navigation.
				// We check for the length of the active items in the project slider
				// then compare this with the index of the current project item.
				var activate_navigation = function() {

					// disable menu if needed
					if ($('a[href$="'+ url +'"]').closest(".shape").length > 0)
					{
						var item 		= $("#" + project_id + ' a[href$="'+ url +'"]').closest(".shape");
						var itemIndex 	= $("#" + project_id + " .shape.active").index(item);
						var itemsLength = $("#" + project_id + " .shape.active").length;
					}
					else if ($('a[href$="'+ url +'"]').closest(".team-pane").length > 0)
					{
						var item 		= $("#" + project_id + ' a[href$="'+ url +'"]').closest(".team-pane");
						var itemIndex 	= $("#" + project_id + " .team-pane").index(item);
						var itemsLength = $("#" + project_id + " .team-pane").length;
					}

					if (itemIndex == -1)
					{
						popup_nav.find(".prev, .next").addClass("disabled");
					}
					else if (itemIndex == 0)
					{
						popup_nav.find(".prev").addClass("disabled");
						popup_nav.find(".next").removeClass("disabled");
					}
					else if (itemIndex == (itemsLength-1))
					{
						popup_nav.find(".next").addClass("disabled");
						popup_nav.find(".prev").removeClass("disabled");
					}
					else
					{
						popup_nav.find(".prev, .next").removeClass("disabled");
					}

				};


				// Function for exiting/closing the project.
				// We check if the agent is a touch agent. If so we don't want to
				// use CSS3 animations for closing the project popup.
				var exit_project = function() {

					// don't use css animations for touch devices
					if (Modernizr.touch) {
						popup_item.remove();
						popup_wrap.remove();
					} else {
						// fade out the portfolio item
						popup_item.removeClass("fadeIn").addClass("fadeOutDown");

						// remove portfolio item after animation is done
						popup_item.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
					    	popup_item.remove();
					    });

						// fade out the popup window
						popup_wrap.removeClass("fadeIn").addClass("fadeOutDown");

						// remove popup wrap after animation is done
						popup_wrap.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
					    	popup_wrap.remove();
					    });
					}

				    window.location = "#_";

					// remove overflow hidden from body
					body.css({
						"overflow": "",
						"width": "",
						"height": "",
					});

				};

			};

			init_ajax_portfolio();

		} );


	/*	==================================================
		# Initialize hashchange to check if a user
		# refreshes a portfolio item or directly goes
		# to one through the URL bar.
		================================================== */
		_window.bind("load", function () {
			_window.trigger( "hashchange" );
		});

	
	/*	==================================================
		# Initialize all the reloadable JavaScript
		================================================== */
		$( function() {
			reload_js();
		} );


	/*	==================================================
		# OwlCarousel
		# Client Carousel, Testimonials and Depth Slider
		================================================== */
		$( function() {

			// Client Carousel
			$("#carousel-clients").owlCarousel({
				items : 4,
				navigation: true,
				navigationText: false,
				pagination: false,
				slideSpeed: 600,
			});
			
			// Testimonials
			$("#slider-testimonials").owlCarousel({
				singleItem: true,
				navigation: true,
				navigationText: false,
				pagination: false,
				slideSpeed: 600,
			});

			// Depth Slider
			$(".depth-slider").owlCarousel({
				singleItem: true,
				navigation: false,
				navigationText: false,
				pagination: false,
				slideSpeed: 600,
				autoPlay: 5000,
				transitionStyle: "fade",
			});

		} );


	/*	==================================================
		# DiamondSlider
		# Portfolio and Team Diamond Sliders
		================================================== */
		$( function() {

			$( "#diamondslider-home" ).diamondslider({
				rows: 3,
				gutterWidth: 12,
				sliding: true,
				filter: true,
				filterSelector: "#diamond-filter-home",
			});

			$( "#diamondslider-portfolio" ).diamondslider({
				rows: "auto",
				gutterWidth: 12,
				sliding: false,
				filter: true,
				filterSelector: "#diamond-filter-portfolio",
			});

			$( "#diamondslider-team" ).diamondslider({
				rows: 2,
				gutterWidth: 12,
				sliding: true,
				filter: false,
			});

			// When a user hovers over an diamondslider item
			// we want to show the item information.
			$( ".diamondslider .slides > li" ).hover(
				function(){
					var itemhover = $(this).find(".item-hover");
					if ( !itemhover.hasClass("show") )
					{
						itemhover.stop().show();
						itemhover.find(".hover-title").stop().animate({
							"margin-top": "37.3134%",
						}, 300, "easeInOutCirc");
					}
				},
				function(){
					var itemhover = $(this).find(".item-hover");
					if ( !itemhover.hasClass("show") )
					{
						itemhover.find(".hover-title").stop().animate({
							"margin-top": "-30%",
						}, 300, "easeInOutCirc");
						itemhover.stop().hide();
					}
				}
			);

		} );


	/*	==================================================
		# Team Tabs
		# Makes use of our custom Grafixes Tabs plugin.
		================================================== */
		$( function() {

			$( "#diamondslider-team .slides" ).grafixesTabs({
				container: "#team-panes",
			});

			// add a function so the browser scrolls to the diamondslider on tab click
			$(".item-hover").click(function(){
				if ( $(this).attr("data-grtabs") == "tab" ) {
					var newLoc = $(this).closest(".diamondslider");

					$.scrollTo(newLoc, 800, {
			          axis: 'y',
			          easing: "easeInOutExpo",
			          offset: -100,
			        });
				}
			});

		} );


	/*	==================================================
		# Initialize FluidVids
		================================================== */
		$( function() {

			fluidvids.init({
				selector: 'iframe', // runs querySelectorAll()
				players: ['www.youtube.com', 'player.vimeo.com'] // players to support
			});

		} );


	/*	==================================================
		# Disable Parallax If Touch Device
		================================================== */
		$( function() {

			if (Modernizr.touch)
				$(".parallax").addClass("disable-parallax");
			else
				$(".parallax").removeClass("disable-parallax");

		} );


	/*	==================================================
		# Initialize the parallax sections on load.
		================================================== */
		var init_parallax = function() {
			$( "#parallax-index" ).parallax("30%", 0.1);
			$( "#parallax-cta" ).parallax("30%", 0.1);
			$( "#parallax-clients" ).parallax("30%", 0.1);
			$( "#parallax-contact" ).parallax("30%", 0.1);
			$( "#parallax-blog" ).parallax("30%", 0.1);
		};
		_window.bind("load", init_parallax);


	/*	==================================================
		# Function for easily reloading certain jQuery
		# scripts that have to be dynamically reloaded.
		================================================== */
		var reload_js = function() {

			// FluidVids
			fluidvids.apply();

			// OwlCarousel
			$( ".slider" ).owlCarousel({
				singleItem: true,
				navigation: true,
				navigationText: false,
				pagination: false,
				slideSpeed: 600,
			});

			// CSS3 Animations
			// Every element that has data for being animated
			// will be animated. We only want to initialize
			// this functionality for not touch devices.
			if ( !Modernizr.touch ) {

				$( ".animated" ).appear();
				_window.trigger( "scroll" );

				$(document.body).on("appear", ".animated", function() {
					var animationType	= $(this).attr( "data-animation" );
					var animationDelay 	= $(this).attr( "data-animation-delay" );
					
					$(this).each(function() {

						var $this = $( this );

						// add the custom animation delay to the element
						$this.css({
							"-webkit-animation-delay": animationDelay,
							"-moz-animation-delay": animationDelay,
							"animation-delay": animationDelay,
						});
						// add the animation to the element
						$this.addClass(animationType);

						if ($this.hasClass("no-opacity")) {
							$this.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
								$this.removeClass("no-opacity");
							});
						}

					});
				});
			}
			else {
				$( ".animated" ).each(function() {
					$(this).removeClass("animated no-opacity");
				});
			}

			// Twitter Feed
			// We want to support multiple twitter feeds for different
			// twitter usernames and counts. So we get the specified
			// data from the element.
			$( ".tweet" ).each(function() {

				var $this 	 = $( this ),
					username = $this.data( "twitter-username" ),
					count 	 = $this.data( "count" );

				if (username !== "undefined") {
					$this.tweet({
						modpath: "assets/php/twitter/",
						username: username,
						avatar_size: 0,
						count: count,
						template: "{text}{time}",
					});
				}

			});

		};


} )( jQuery );