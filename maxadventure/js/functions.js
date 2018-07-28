/*
	Project Name : Hiking
	
	-- Google Map
	
	## Document Scroll		

	## Document Ready
		-- Scrolling Navigation
		-- Find all anchors
		-- Add Easing Effect
		-- Responsive Caret
		-- Remove p empty tag for Shortcode
		-- Back To Top
		-- Contact Map
		-- Quick Contact Form

	## Window Load
		-- Site Loader
*/

(function($) {

	"use strict"
	
	/* - Comment Slider */
	function chkActiveSlider(){
		var slideNum = 0;
		if($( ".mis-slide.mis-current" ).length){
			slideNum = $( ".mis-slide.mis-current" ).attr("id").split("-")[1];
			$( "[id*='mis_slide_content-']" ).css( "display", "none" );
			$( "[id='mis_slide_content-"+slideNum+"']" ).css( "display", "block" );
			$( "[id='mis_slide_content-"+slideNum+"']" ).addClass("animated fadeIn");
		}
	}
	
	/* - Responsive Caret */
	function menu_dropdown_open(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".ow-navigation .nav li.ddl-active").length ) {
				$(".ow-navigation .nav > li").removeClass("ddl-active");
				$(".ow-navigation .nav li .dropdown-menu").removeAttr("style");
			}
		} else {
			$(".ow-navigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
	
	/* - Expand Panel Resize */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header-section #slidepanel").length ) {
				$(".header-section #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* - About Section */
	function about_img() {
		var width = $(window).width();
		var about_content_height = $(".about-section").height();
		if ( width >= 992 ) {
			$( ".about-section .about-img" ).removeAttr("style");
			$( ".about-section .about-img img" ).remove();
			var about_image = $(".about-section .about-img").attr("data-image");
			$( ".about-section .about-img" ).css({"background-image":"url('" + about_image + "')","height": about_content_height });
		} else {
			$( ".about-section .about-img" ).removeAttr("style");
			$( ".about-section .about-img img" ).remove();
			var about_image = $(".about-section .about-img").attr("data-image");
			$( ".about-section .about-img" ).append("<img src='"+ about_image +"' />")
		}
	}
	
	/* - Trip Detail Section */
	function trip_img() {
		var width = $(window).width();
		var trip_content_height = $(".trip-detail-section").height();
		if ( width >= 992 ) {
			$( ".trip-detail-section .trip-image-block" ).removeAttr("style");
			$( ".trip-detail-section .trip-image-block img" ).remove();
			var trip_image = $(".trip-detail-section .trip-image-block").attr("data-image");
			$( ".trip-detail-section .trip-image-block" ).css({"background-image":"url('" + trip_image + "')","height": trip_content_height });
		} else {
			$( ".trip-detail-section .trip-image-block" ).removeAttr("style");
			$( ".trip-detail-section .trip-image-block img" ).remove();
			var trip_image = $(".trip-detail-section .trip-image-block").attr("data-image");
			$( ".trip-detail-section .trip-image-block" ).css({"background-image":"url('" + trip_image + "')"});
		}
	}
	
	/* - Google Map */
	function initialize(obj) {
		var lat = $('#'+obj).attr("data-lat");
        var lng = $('#'+obj).attr("data-lng");
		var contentString = $('#'+obj).attr("data-string");
		var myLatlng = new google.maps.LatLng(lat,lng);
		var map, marker, infowindow;
		var image = "images/marker.png";
		var zoomLevel = parseInt($('#'+obj).attr("data-zoom") ,10);		
		var styles = [{"featureType": "administrative.country","elementType": "geometry","stylers": [{"visibility": "simplified"},{"hue": "#ff0000"}]}]		
		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
		var mapOptions = {
			zoom: zoomLevel,
			disableDefaultUI: true,
			center: myLatlng,
            scrollwheel: false,
			mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
			}
		}
		
		map = new google.maps.Map(document.getElementById(obj), mapOptions);	
		
		map.mapTypes.set("map_style", styledMap);
		map.setMapTypeId("map_style");
		
		infowindow = new google.maps.InfoWindow({
			content: contentString
		});      
	    
        marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image
		});

		google.maps.event.addListener(marker, "click", function() {
			infowindow.open(map,marker);
		});	
	}
	
	function sticky_menu() {
		var menu_scroll = $(".header-section").offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".header-section .menu-block").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".header-section .menu-block").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
		
	/* ## Document Ready - Handler for ready() called */
	$(document).on("ready",function() {

		/* - Scrolling Navigation */
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Set Sticky Menu */
		if( $(".header-section").length ) {
			
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});
		
		/* - Go to Next */
		$('.goto-next a').on('click', function(event)
		{
			var anchor = $(this);
			if( anchor == 'undefined' || anchor == null || anchor.attr('href') == '#' ) { return; }
			if ( anchor.attr('href').indexOf('#') === 0 )
			{
				if( $(anchor.attr('href')).length )
				{
					$('html, body').stop().animate( { scrollTop: $(anchor.attr('href')).offset().top - 49 }, 1500, 'easeInOutExpo' );			
				}
				event.preventDefault();
			}
		});

		/* -- Responsive Caret */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		
		/* - Expand Panel */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* Collapse Panel */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* Switch buttons from "Log In | Register" to "Close Panel" on click */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});	
		
		panel_resize();
		
		/* - Search */
		if($(".search-box").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		/* - Revolution Slider */
		if($(".slider-section").length){
			$("#home-slider1").revolution({
				sliderType:"standard",
				delay:6000,
				responsiveLevels:[1920,1025,768,480],
				gridwidth:[1920,1025,768,480],
				gridheight:[800,700,600,400],
				navigation: {
					arrows:{
						enable:true,
						style:"uranus",
					}
				},
			});
			
			$("#home-slider2").revolution({
				/* sliderType:"standard", */
				delay:6000,
				responsiveLevels:[1920,1025,768,480],
				gridwidth:[1920,1025,768,480],
				gridheight:[920,700,560,400],
				navigation: {
					arrows:{
						enable:true,
						style:"uranus",
					},
					bullets: {
						enable:true,
						hide_onmobile:true,
						hide_under:768,
						style:"zeus",
						hide_onleave:false,
						direction:"horizontal",
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:40,
						space:15,
						tmp:''
					}
				},
			});
			
		}
		
		/* - Features Section */
		if($("#features-section").length) {
			
			$(".features-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					480:{
						items: 2
					},
					700:{
						items: 3
					},
					1200:{
						items: 4
					}
				}
			});
			
			$(".features-box").magnificPopup({
				delegate: '.features-detail > a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});

		}
		
		/* - About Section */
		if($("#about-section").length) {
			about_img();
		}
		
		/* - Counter Section */
		if($("#counter-section").length) {
			$( "#counter-section" ).each(function ()
			{
				var $this = $(this);
				var myVal = $(this).data("value");

				$this.appear(function() {
					var statistics_item_count = 0;
					var statistics_count = 0;					
					statistics_item_count = $( "[id*='statistics_count-']" ).length;
					 
					for(var i=1; i<=statistics_item_count; i++)
					{
						statistics_count = $( "[id*='statistics_count-"+ i +"']" ).attr( "data-statistics_percent" );
						$("[id*='statistics_count-"+ i +"']").animateNumber({ number: statistics_count }, 4000);
					}				
				});
			});
		}
		
		/* - Blog Thumbnail */
		if($(".latest-blog-thumbnail").length) {
			$(".blog-carousel").owlCarousel({
				loop: true,
				margin: 30,
				nav: true,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					640:{
						items: 2
					},
					768:{
						items: 2
					},
					1200:{
						items: 3
					}
				}
			});
		}
		
		/* - Gallery Section */
		if($("#gallery-section").length) {
			$(".gallery-box .gallery-detail").magnificPopup({
				delegate: '.gallery-link > a.zoom',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});
			
		}
		
		/* - Team Section */
		if($("#team-section").length) {
			
			$(".team-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					992:{
						items: 3
					}
				}
			});
		}
		
		/* - Testimonial Section */
		if($(".testimonial-section").length) {
			$(".testimonial-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					992:{
						items: 3
					}
				}
			});
		}
		
		/* - Client Section */
		if($(".clients-section").length) {
			$(".clients-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					480:{
						items: 2
					},
					992:{
						items: 4
					},
					1200:{
						items: 5
					}
				}
			});
		}
		
		/* - Trip Detail Section */
		if($(".trip-detail-section").length) {
			trip_img();
		}
		
		/* - Comment Slider */	
		if( $( ".post-comments-slider" ).length ) {
			setInterval( chkActiveSlider, 1000 );
		}
		if($(".post-comments-slider").length) {
			var slider = $('.mis-stage').miSlider({
				speed: 1000,
				stageHeight: false,
				slidesLoaded: true,
				slidesOnStage: false,
				navList: false,
				navButtons: true,
				slidePosition: 'center',
				slideStart: 'mid',
				slideScaling: 100,
				offsetV: 0,
				centerV: true,
				navButtonsShow: false,
				navButtonsOpacity: 0
			});
			$(".mis-navi .b-m-prev").on("click", function(){
				$(".mis-prev").trigger("click");
			});
			$(".mis-navi .b-m-next").on("click", function(){
				$(".mis-next").trigger("click");
			});
		}
		
		/* - Photographs Section */
		if($(".photographs-section").length) {
			$(".photographs-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: true,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					480:{
						items: 2
					},
					640:{
						items: 3
					},
					992:{
						items: 4
					}
				}
			});
			
			$(".photographs-carousel").magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});
		}
		
		/* - Price Filter */
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 15000,
			values: [ 0, 10000 ],
			slide: function( event, ui ) {
				$( "#amount" ).html( "$" + ui.values[ 0 ] )
				$( "#amount2" ).html( "$" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) );
		$( "#amount2" ).html( " $" + $(  "#slider-range" ).slider( "values", 1 ) );
		
		/* - Quantity */
		/* This button will increment the value*/
		$(".qtyplus").on( "click", function(e){
			e.preventDefault();
			var fieldName = $(this).attr('data-field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal)) {
				$('input[name='+fieldName+']').val(currentVal + 1);
			} else {
				$(this).find('input[name='+fieldName+']').val(0);
			}
		});

		/* This button will decrement the value till 0 */
		$(".qtyminus").on( "click" , function(e) {		
			e.preventDefault();		
			var fieldName = $(this).attr('data-field');		
			var currentVal = parseInt($('input[name='+fieldName+']').val());		
			if (!isNaN(currentVal) && currentVal > 0) {			
				$('input[name='+fieldName+']').val(currentVal - 1);
			} else {			
				$('input[name='+fieldName+']').val(0);
			}
		});
		
		$( "a.review-link" ).on("click",function() {
			$( ".wc-tabs a.tab-review" ).trigger("click");
			return false;
		});
		
		/* - Contact Map */
		if($("#map-canvas-contact").length==1){
			initialize("map-canvas-contact");
		}
		
		/* - Quick Contact Form */
		$( "#btn_submit" ).on( "click", function(event) {
			event.preventDefault();
			var mydata = $("form").serialize();
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "contact.php",
				data: mydata,
				success: function(data) {
					if( data["type"] == "error" ){
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").removeClass("alert-msg-success");
						$("#alert-msg").addClass("alert-msg-failure");
						$("#alert-msg").show();
					} else {
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").addClass("alert-msg-success");
						$("#alert-msg").removeClass("alert-msg-failure");					
						$("#input_name").val("");
						$("#input_email").val("");
						$("#contact_message").val("");
						$("#alert-msg").show();
					}
				},
				error: function(xhr, textStatus, errorThrown) {
					//alert(textStatus);
				}
			});
			return false;
		});/* Quick Contact Form /- */
		
	}); /* - Document Ready /- */
	
	/* Event - Window Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu */
		if( $(".header-section .menu-block").length ) {
			sticky_menu();
		}
	});
	
	$( window ).on("resize",function() {
		/* - Expand Panel Resize */
		panel_resize();
		
		/* - About Section */
		if($("#about-section").length) {
			about_img();
		}
		
		/* - Trip Detail Section */
		if($(".trip-detail-section").length) {
			trip_img();
		}
	});
	
	
	/* ## Window Load - Handler for load() called */
	
	$(window).on("load",function() {
		/* -- Site Loader */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		/* - Gallery Section */
		if( $(".gallery-list").length ) {
			var $container = $(".gallery-list");
			$container.isotope({
				layoutMode: 'fitRows',
				itemSelector: ".gallery-box",
				gutter: 0,
				transitionDuration: "0.5s"
			});
			
			/* $(".vehicle-categories a").on("click",function(){
				$(".vehicle-categories a").removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });		
				return false;
			}); */
		}
	});

})(jQuery);