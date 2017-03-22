
/*
	*	Grafixes Tabs
	*
	*	Version: 1.0
	*	Copyright 2013 Grafixes
 */

;(function($){

	"use strict";

	/** Grafixes Tabs: Object Instace */
	$.grafixesTabs = function(el, options)
	{
		// global reference to the nav
		var nav = $(el);

		// global variables
		var methods = {};

		// making variables public
		nav.vars = $.extend({}, $.grafixesTabs.defaults, options);

		methods =
		{
			init: function()
			{
				// global nav vars
				nav.tab = nav.find("[data-grtabs='tab']");
				nav.container = nav.vars.container;
				nav.pane = $(nav.container).find(".grtabs-pane");
				nav.active = $(nav.container).find(".active");

				nav.setup();
			},
			destroy: function()
			{

			}
		};

		nav.setup = function()
		{
			nav.active.css("display", "block");

			nav.tab.on("click", function(e) {
				var tab_id = $(this).attr("href");
				var tab_pane = $(nav.container).find(tab_id);

				nav.active = $(nav.container).find(".active");

				if (!$(this).hasClass("show"))
				{
					nav.find(".item-hover.show").find(".hover-title").stop().animate({
						"margin-top": "-30%",
					}, 300, "easeInOutCirc");
					nav.find(".item-hover.show").hide().removeClass("show");
					$(this).addClass("show");
				}
				
				if (!tab_pane.hasClass("active")) {
					nav.active.slideUp({

						duration: 400,
						easing: "easeInOutExpo",
						complete: function() {
							nav.active.removeClass("active");

							tab_pane.slideDown({
								duration: 600,
								easing: "easeInOutExpo",
								complete: function() {
									tab_pane.addClass("active");
								},
							});
						},

					});
				}

				e.preventDefault();
			});
		};

		methods.init();
	};

	/** Diamondnav: Default Settings */
	$.grafixesTabs.defaults =
	{
		container: "#tabs-container",
	};

	/** Grafixes Tabs: Plugin Function */
	$.fn.grafixesTabs = function (options)
	{
		if (options === undefined) options = {};

		if (typeof options === "object") {
			
			return this.each(function()
			{
				new $.grafixesTabs(this, options);
			});

        }

	};

})( jQuery );