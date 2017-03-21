/**
 * Copyright (c) 2007-2013 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.4.7
 */
;(function(d){function h(b){return"object"==typeof b?b:{top:b,left:b}}var n=d.scrollTo=function(b,c,a){return d(window).scrollTo(b,c,a)};n.defaults={axis:"xy",duration:1.3<=parseFloat(d.fn.jquery)?0:1,limit:!0};n.window=function(b){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){if(this.nodeName&&-1==d.inArray(this.nodeName.toLowerCase(),["iframe","#document","html","body"]))return this;var b=(this.contentWindow||this).document||this.ownerDocument||this;return/webkit/i.test(navigator.userAgent)|| "BackCompat"==b.compatMode?b.body:b.documentElement})};d.fn.scrollTo=function(b,c,a){"object"==typeof c&&(a=c,c=0);"function"==typeof a&&(a={onAfter:a});"max"==b&&(b=9E9);a=d.extend({},n.defaults,a);c=c||a.duration;a.queue=a.queue&&1<a.axis.length;a.queue&&(c/=2);a.offset=h(a.offset);a.over=h(a.over);return this._scrollable().each(function(){function q(b){k.animate(e,c,a.easing,b&&function(){b.call(this,g,a)})}if(null!=b){var l=this,k=d(l),g=b,p,e={},s=k.is("html,body");switch(typeof g){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(g)){g= h(g);break}g=d(g,this);if(!g.length)return;case "object":if(g.is||g.style)p=(g=d(g)).offset()}d.each(a.axis.split(""),function(b,d){var c="x"==d?"Left":"Top",m=c.toLowerCase(),f="scroll"+c,h=l[f],r=n.max(l,d);p?(e[f]=p[m]+(s?0:h-k.offset()[m]),a.margin&&(e[f]-=parseInt(g.css("margin"+c))||0,e[f]-=parseInt(g.css("border"+c+"Width"))||0),e[f]+=a.offset[m]||0,a.over[m]&&(e[f]+=g["x"==d?"width":"height"]()*a.over[m])):(c=g[m],e[f]=c.slice&&"%"==c.slice(-1)?parseFloat(c)/100*r:c);a.limit&&/^\d+$/.test(e[f])&& (e[f]=0>=e[f]?0:Math.min(e[f],r));!b&&a.queue&&(h!=e[f]&&q(a.onAfterFirst),delete e[f])});q(a.onAfter)}}).end()};n.max=function(b,c){var a="x"==c?"Width":"Height",h="scroll"+a;if(!d(b).is("html,body"))return b[h]-d(b)[a.toLowerCase()]();var a="client"+a,l=b.ownerDocument.documentElement,k=b.ownerDocument.body;return Math.max(l[h],k[h])-Math.min(l[a],k[a])}})(jQuery);

/*
 * jQuery One Page Nav Plugin
 * http://github.com/davist11/jQuery-One-Page-Nav
 *
 * Copyright (c) 2010 Trevor Davis (http://trevordavis.net)
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://jquery.org/license
 *
 * @version 2.2.0
 *
 * Example usage:
 * $('#nav').onePageNav({
 *   currentClass: 'current',
 *   changeHash: false,
 *   scrollSpeed: 750
 * });
 */

;(function($, window, document, undefined){

  // our plugin constructor
  var OnePageNav = function(elem, options){
    this.elem = elem;
    this.$elem = $(elem);
    this.options = options;
    this.metadata = this.$elem.data('plugin-options');
    this.$nav = this.$elem.find('a');
    this.$win = $(window);
    this.sections = {};
    this.didScroll = false;
    this.$doc = $(document);
    this.docHeight = this.$doc.height();
  };

  // the plugin prototype
  OnePageNav.prototype = {
    defaults: {
      currentClass: 'current',
      changeHash: false,
      easing: 'swing',
      filter: '',
      scrollSpeed: 750,
      scrollOffset: 0,
      scrollThreshold: 0.5,
      begin: false,
      end: false,
      scrollChange: false
    },

    init: function() {
      var self = this;
      
      // Introduce defaults that can be extended either
      // globally or using an object literal.
      self.config = $.extend({}, self.defaults, self.options, self.metadata);
      
      //Filter any links out of the nav
      if(self.config.filter !== '') {
        self.$nav = self.$nav.filter(self.config.filter);
      }
      
      //Handle clicks on the nav
      self.$nav.on('click.onePageNav', $.proxy(self.handleClick, self));

      //Get the section positions
      self.getPositions();
      
      //Handle scroll changes
      self.bindInterval();
      
      //Update the positions on resize too
      self.$win.on('resize.onePageNav', $.proxy(self.getPositions, self));

      return this;
    },
    
    adjustNav: function(self, $parent) {
      self.$elem.find('.' + self.config.currentClass).removeClass(self.config.currentClass);
      $parent.addClass(self.config.currentClass);
    },
    
    bindInterval: function() {
      var self = this;
      var docHeight;
      
      self.$win.on('scroll.onePageNav', function() {
        self.didScroll = true;
      });
      
      self.t = setInterval(function() {
        docHeight = self.$doc.height();
        
        //If it was scrolled
        if(self.didScroll) {
          self.didScroll = false;
          self.scrollChange();
        }
        
        //If the document height changes
        if(docHeight !== self.docHeight) {
          self.docHeight = docHeight;
          self.getPositions();
        }
      }, 250);
    },
    
    getHash: function($link) {
      return $link.attr('href').split('#')[1];
    },
    
    getPositions: function() {
      var self = this;
      var linkHref;
      var topPos;
      var $target;
      
      self.$nav.each(function() {
        linkHref = self.getHash($(this));
        $target = $('#' + linkHref);

        if($target.length) {
          topPos = $target.offset().top;
          self.sections[linkHref] = Math.round(topPos) - self.config.scrollOffset;
        }
      });
    },
    
    getSection: function(windowPos) {
      var returnValue = null;
      var windowHeight = Math.round(this.$win.height() * this.config.scrollThreshold);

      for(var section in this.sections) {
        if((this.sections[section] - windowHeight) < windowPos) {
          returnValue = section;
        }
      }
      
      return returnValue;
    },
    
    handleClick: function(e) {
      var self = this;
      var $link = $(e.currentTarget);
      var $parent = $link.parent();
      var newLoc = '#' + self.getHash($link);
      
      if(!$parent.hasClass(self.config.currentClass)) {
        //Start callback
        if(self.config.begin) {
          self.config.begin();
        }
        
        //Change the highlighted nav item
        self.adjustNav(self, $parent);
        
        //Removing the auto-adjust on scroll
        self.unbindInterval();
        
        //Scroll to the correct position
        $.scrollTo(newLoc, self.config.scrollSpeed, {
          axis: 'y',
          easing: self.config.easing,
          offset: {
            top: -self.config.scrollOffset
          },
          onAfter: function() {
            //Do we need to change the hash?
            if(self.config.changeHash) {
              window.location.hash = newLoc;
            }
            
            //Add the auto-adjust on scroll back in
            self.bindInterval();
            
            //End callback
            if(self.config.end) {
              self.config.end();
            }
          }
        });
      }

      // CHANGED FOR VINTO
      if ( jQuery(newLoc).length > 0 ) 
        e.preventDefault();
      // END CHANGED
    },
    
    scrollChange: function() {
      var windowTop = this.$win.scrollTop();
      var position = this.getSection(windowTop);
      var $parent;
      
      //If the position is set
      if(position !== null) {
        $parent = this.$elem.find('a[href$="#' + position + '"]').parent();
        
        //If it's not already the current section
        if(!$parent.hasClass(this.config.currentClass)) {
          //Change the highlighted nav item
          this.adjustNav(this, $parent);
          
          //If there is a scrollChange callback
          if(this.config.scrollChange) {
            this.config.scrollChange($parent);
          }
        }
      }
    },
    
    unbindInterval: function() {
      clearInterval(this.t);
      this.$win.unbind('scroll.onePageNav');
    }
  };

  OnePageNav.defaults = OnePageNav.prototype.defaults;

  $.fn.onePageNav = function(options) {
    return this.each(function() {
      new OnePageNav(this, options).init();
    });
  };
  
})( jQuery, window , document );


/*! NProgress (c) 2013, Rico Sta. Cruz
 *  http://ricostacruz.com/nprogress */
;(function(e){if(typeof module==="function"){module.exports=e(this.jQuery||require("jquery"))}else if(typeof define==="function"&&define.amd){define(["jquery"],function(t){return e(t)})}else{this.NProgress=e(this.jQuery)}})(function(e){function r(e,t,n){if(e<t)return t;if(e>n)return n;return e}function i(e){return(-1+e)*100}function s(e,t,r){var s;if(n.positionUsing==="translate3d"){s={transform:"translate3d("+i(e)+"%,0,0)"}}else if(n.positionUsing==="translate"){s={transform:"translate("+i(e)+"%,0)"}}else{s={"margin-left":i(e)+"%"}}s.transition="all "+t+"ms "+r;return s}var t={};t.version="0.1.2";var n=t.settings={minimum:.08,easing:"ease",positionUsing:"",speed:200,trickle:true,trickleRate:.02,trickleSpeed:800,showSpinner:true,template:'<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'};t.configure=function(t){e.extend(n,t);return this};t.status=null;t.set=function(e){var i=t.isStarted();e=r(e,n.minimum,1);t.status=e===1?null:e;var o=t.render(!i),u=o.find('[role="bar"]'),a=n.speed,f=n.easing;o[0].offsetWidth;o.queue(function(r){if(n.positionUsing==="")n.positionUsing=t.getPositioningCSS();u.css(s(e,a,f));if(e===1){o.css({transition:"none",opacity:1});o[0].offsetWidth;setTimeout(function(){o.css({transition:"all "+a+"ms linear",opacity:0});setTimeout(function(){t.remove();r()},a)},a)}else{setTimeout(r,a)}});return this};t.isStarted=function(){return typeof t.status==="number"};t.start=function(){if(!t.status)t.set(0);var e=function(){setTimeout(function(){if(!t.status)return;t.trickle();e()},n.trickleSpeed)};if(n.trickle)e();return this};t.done=function(e){if(!e&&!t.status)return this;return t.inc(.3+.5*Math.random()).set(1)};t.inc=function(e){var n=t.status;if(!n){return t.start()}else{if(typeof e!=="number"){e=(1-n)*r(Math.random()*n,.1,.95)}n=r(n+e,0,.994);return t.set(n)}};t.trickle=function(){return t.inc(Math.random()*n.trickleRate)};(function(){var e=0,n=0;t.promise=function(r){if(!r||r.state()=="resolved"){return this}if(n==0){t.start()}e++;n++;r.always(function(){n--;if(n==0){e=0;t.done()}else{t.set((e-n)/e)}});return this}})();t.render=function(r){if(t.isRendered())return e("#nprogress");e("html").addClass("nprogress-busy");var s=e("<div id='nprogress'>").html(n.template);var o=r?"-100":i(t.status||0);s.find('[role="bar"]').css({transition:"all 0 linear",transform:"translate3d("+o+"%,0,0)"});if(!n.showSpinner)s.find('[role="spinner"]').remove();s.appendTo(document.body);return s};t.remove=function(){e("html").removeClass("nprogress-busy");e("#nprogress").remove()};t.isRendered=function(){return e("#nprogress").length>0};t.getPositioningCSS=function(){var e=document.body.style;var t="WebkitTransform"in e?"Webkit":"MozTransform"in e?"Moz":"msTransform"in e?"ms":"OTransform"in e?"O":"";if(t+"Perspective"in e){return"translate3d"}else if(t+"Transform"in e){return"translate"}else{return"margin"}};return t})