(function($){
	'use strict';

    
    function removePanier(element) {
    	element.closest(".cart-item").fadeOut();
    	console.log("element : ? ");
    	console.log("element : " + element);
    }
    
    function testPopup() {
    	console.log("Hello Popup");
    }
    
	$(document).ready(function() {
		

		  $(document).ready(function () {
		    $(".list-view").on('click', function () {
		      $(this).addClass('current');
		      $(".grid-view").removeClass('current');
		      $(".listing-list-view").addClass('show-list');
		      $(".list-grid-view").removeClass('show-list');
		      return false;
		    });
		    $(".grid-view").on('click', function () {
		      $(this).addClass('current');
		      $(".list-view").removeClass('current');
		      $(".list-grid-view").addClass('show-list');
		      $(".listing-list-view").removeClass('show-list');
		      return false;
		    });
		  });
		

		    (function() {

		        $("#featured-slider").owlCarousel({
		            items:2, 
		            nav:true,
		            autoplay:true,
		            dots:true,
		            autoplayHoverPause:true,
		            nav:true,
		            navText: [
		              "<i class='fa fa-angle-left '></i>",
		              "<i class='fa fa-angle-right'></i>"
		            ],
		            responsive: {
		                0: {
		                    items: 1,
		                    slideBy:1
		                },
		                576: {
		                    items: 1,
		                    slideBy:1
		                },
		                768: {
		                    items: 1,
		                    slideBy:1
		                },
		                1200: {
		                    items: 2,
		                    slideBy:1
		                },
		            }            

		        });

		    }());
		  
		  
		  
		$('.add-fav').click(function(e) { 
	        e.preventDefault();
	        
	        var object = $(this);
	        
	       if( object.hasClass("active") ) {

	           $.ajax({
		   			url: "http://nosybe-shop.com/account-remove-favorite?id=" + $(this).attr('data-favorite-id') + "&bus="+ $(this).attr('data-isbus'),
		   			type: 'POST',
		   			data: "",
		   			dataType: "html",
		   			success: function (data) {
		   				$(":first-child", object).removeClass("linea-arrows-check");
		   				$(":first-child", object).addClass("linea-basic-star");
		   				
		   	    	   object.removeClass("active"); 
		   	    	   updateNotification();
		   			},
		   			error:function(data,status,er) {
		   			   //         alert("error: "+data+" status: "+status+" er:"+er);
		   			}
		   		}); 
	           
	       } else {
		           $.ajax({
		   			url: "http://nosybe-shop.com/add-to-favorite?id=" + $(this).attr('data-favorite-id') + "&bus="+  $(this).attr('data-isbus'),
		   			type: 'POST',
		   			data: "",
		   			dataType: "html",
		   			success: function (data) {
		   				$(":first-child", object).removeClass("linea-basic-star");
		   				$(":first-child", object).addClass("linea-arrows-check");
		   				object.addClass("active"); 
		   				updateNotification();
		   			},
		   			error:function(data,status,er) {
		   			   //         alert("error: "+data+" status: "+status+" er:"+er);
		   			}
		   		}); 
	       }

	    });

		

		'use strict';

		/* global jQuery, PhotoSwipe, PhotoSwipeUI_Default, console */

		(function($) {

		  // Init empty gallery array
		  var container = [];

		  // Loop over gallery items and push it to the array
		  $('#gallery').find('figure').each(function() {
		    var $link = $(this).find('a'),
		      item = {
		        src: $link.attr('href'),
		        w: $link.data('width'),
		        h: $link.data('height'),
		        title: $link.data('caption')
		      };
		    container.push(item);
		  });

		  // Define click event on gallery item
		  $('#gallery figure a').click(function(event) {

		    // Prevent location change
		    event.preventDefault();

		    // Define object and gallery options
		    var $pswp = $('.pswp')[0],
		      options = {
		        index: $(this).parent('figure').index(),
		        bgOpacity: 0.85,
		        showHideOpacity: true
		      };

		    // Initialize PhotoSwipe
		    var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
		    gallery.init();
		  });

		}(jQuery));
		
		
		
	//	$("#mc-embedded-subscribe-form").formchimp();
		
		var culture = 'en';
		
		$.cookieBanner({
			culture: culture,
			cookiePageUrl: {
				en: 'http://nosybe-shop.com/legal-terms'
			}
		});
		
		if( $('#jssor_2').length > 0 ) {
			
        	var jssor_1_options = {
                $AutoPlay: 1,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $ArrowNavigatorOptions: {
                  $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                  $Class: $JssorBulletNavigator$
                }
              };

              //var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
              var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_1_options);

              /*#region responsive code begin*/

              var MAX_WIDTH = 3000;

              function ScaleSlider() {
                  var containerElement = jssor_2_slider.$Elmt.parentNode;
                  var containerWidth = containerElement.clientWidth;
                  if (containerWidth) {

                      var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                      //jssor_1_slider.$ScaleWidth(expectedWidth);
                      jssor_2_slider.$ScaleWidth(expectedWidth);
                  }
                  else {
                      window.setTimeout(ScaleSlider, 30);
                  }
              }

              ScaleSlider();

              $(window).bind("load", ScaleSlider);
              $(window).bind("resize", ScaleSlider);
              $(window).bind("orientationchange", ScaleSlider);
		}       
		
		
        $(".img-container").popupLightbox({
            width: 800,
            height: 650
         }); 

        $(".img-container2").popupLightbox({
            width: 800,
            height: 650
         }); 

        
        
		$('.popup-programme').magnificPopup({
			  type: 'image'
			  // other options
		});
		
        $(document).on("click", ".removePanier" , function() {
            $(this).parent().remove();
        });
		
		initNavbar();
		initScroller();
		//initCountCirc();
		//initCountCircMin();
		
		if($('#count-1').length) {
			initCountNbr();
		}
		
		//initCountMin();
		initSliders();
		initGallery(); 
		initAnimation();
		initVideoBg();
		initKenburns();
		initCountdown();
		
		$('.add-to-cart').on('click', function (e) { 
			
			e.preventDefault();
			
	        var cart = $('.shopping-cart');
	        var panier = $('#panierlist');
	        var imgtodrag = $(this).parent('.product-image-wrapper').find("img").eq(0);
	        
	        if(panier) {
	        	var text = "<div class='cart-item'><a href='"+$(this).data("alias")+"'><img src='"+$(this).data("img")+"' alt='"+$(this).data("name")+"' class='p-thumb'></a><a href='#' class='cart-remove-btn removePanier' data-ignore-hash='1'><span class='linea-arrows-square-remove'></span></a><a href='"+$(this).data("alias")+"' class='cp-name'>"+$(this).data("name")+"</a><p class='cp-price'>1 x "+$(this).data("price")+"</p></div>";
	        	$('#panierlist').append(text); 
	        	$.notify("Ajouter avec succès", "success");	
	        } 
	         
	        
	        if (imgtodrag) {
	            var imgclone = imgtodrag.clone()
	                .offset({
	                top: imgtodrag.offset().top,
	                left: imgtodrag.offset().left
	            })
	                .css({
	                'opacity': '0.5',
	                    'position': 'absolute',
	                    'height': '150px',
	                    'width': '150px',
	                    'z-index': '100'
	            })
	                .appendTo($('body'))
	                .animate({
	                'top': cart.offset().top + 10,
	                    'left': cart.offset().left + 10,
	                    'width': 75,
	                    'height': 75
	            }, 1000, 'easeInOutExpo');
	            
	            setTimeout(function () {
	                cart.effect("shake", {
	                    times: 2
	                }, 200);
	            }, 1500);

	            imgclone.animate({
	                'width': 0,
	                    'height': 0
	            }, function () {
	            	console.log("VAL ? :  " + $("#cartcount").text());
	            	
	            	var counter = parseInt($("#cartcount").text()) + 1;
	            	console.log("COUNTER : " + counter);
	            	$("#cartcount").html(counter);
	            	 
	                $(this).detach()
	            });
	        }
	    });
		
		// product carousel active js
		var trend = $('.product-trend-carousel');
		trend.slick({
			arrows: true,
			autoplay: false,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			fade: false,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
			infinite: true,
			slidesToShow: 4,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						arrows: false,
					}
				},
				{
					breakpoint: 479,
					settings: {
						slidesToShow: 1,
						arrows: false,
					}
				},
			]
		});

		// product details slider nav active
		$('.pro-nav').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.product-large-slider',
			centerMode: true,
			arrows: false,
			centerPadding: 0,
			focusOnSelect: true,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: false,
					}
				},
			]
		});

		// product details vertical slider active
		$('.product-large-slider2').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			arrows: false,
			asNavFor: '.pro-nav2'
		});


		// product details vertical slider nav active
		$('.pro-nav2').slick({
			autoplay: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: '.product-large-slider2',
			centerMode: true,
			arrows: false,
			vertical: true,
			centerPadding: 0,
			focusOnSelect: true,
		});

		// related post carousel
		var related = $('.related-post-carousel');
		related.slick({
			arrows: true,
			autoplay: false,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			fade: false,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
			infinite: true,
			slidesToShow: 4,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						arrows: false,
					}
				},
				{
					breakpoint: 479,
					settings: {
						slidesToShow: 1,
						arrows: false,
					}
				},
			]
		});

		// related post carousel
		var slider_box = $('.slider-box-active');
		slider_box.slick({
			arrows: true,
			autoplay: false,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			fade: false,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
			infinite: true,
			slidesToShow: 4,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						arrows: false,
					}
				},
				{
					breakpoint: 479,
					settings: {
						slidesToShow: 1,
						arrows: false,
					}
				},
			]
		});

		// blog gallery slider
		var gallery = $('.blog-gallery-slider');
		gallery.slick({
			arrows: false,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnFocus: false,
			pauseOnHover: false,
			fade: true,
			dots: true,
			infinite: true,
			slidesToShow: 1,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: false,
					}
				},
			]
		});

	    
		$('[data-rel="chosen"],[rel="chosen"]').chosen();
	
        $('.slider_four_in_line').EasySlides({
            'autoplay': true,
            'show': 9
        });
        
        
        $(".removePanier").on('click', function(event){
			event.preventDefault();
			removePanier($(this));
		}); 
        

		//close the navigation
		$('.cd-close-nav, .cd-overlay').on('click', function(event){
			event.preventDefault();
			toggleNav(false);
		});
		//select a new section
		$('.cd-nav li').on('click', function(event) {
			event.preventDefault();
			var target = $(this),
				//detect which section user has chosen
				sectionTarget = target.data('menu');
			if( !target.hasClass('cd-selected') ) {
				//if user has selected a section different from the one alredy visible
				//update the navigation -> assign the .cd-selected class to the selected item
				target.addClass('cd-selected').siblings('.cd-selected').removeClass('cd-selected');
				//load the new section
				loadNewContent(sectionTarget);
			} else {
				// otherwise close navigation
				toggleNav(false);
			} 
		});
	
		function toggleNav(bool) {
			$('.cd-nav-container, .cd-overlay').toggleClass('is-visible', bool);
			$('main').toggleClass('scale-down', bool);
		}
	
		function loadNewContent(newSection) {
			//create a new section element and insert it into the DOM
			var section = $('<section class="cd-section '+newSection+'"></section>').appendTo($('main'));
			//load the new content from the proper html file
			section.load(newSection+'.html .cd-section > *', function(event){
				//add the .cd-selected to the new section element -> it will cover the old one
				section.addClass('cd-selected').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					//close navigation
					toggleNav(false);
				});
				section.prev('.cd-selected').removeClass('cd-selected');
			});
	
			$('main').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				//once the navigation is closed, remove the old section from the DOM
				section.prev('.cd-section').remove();
			});
	
			if( $('.no-csstransitions').length > 0 ) {
				//if browser doesn't support transitions - don't wait but close navigation and remove old item
				toggleNav(false);
				section.prev('.cd-section').remove();
			}
		}
		
		$("a[href^=#]").on("click", function(e) {
			
			e.preventDefault();
			
			if($(this).attr('data-ignore-hash') != "1") {
			    window.location = this.href;
			    
				setTimeout(function() {
					window.scrollTop = '0';
				    window.scrollTo(0, 0);
				  }, 1);   
			}
		});

		 
		$(".cat-filter").on("click", function(e) {
			
			e.preventDefault();
			
			if($(this).attr('data-cat-id') != "1") {	
				var catid = $(this).attr('data-cat-id');
				$("#"+catid).fadeOut("slow", function() {
						window.open("search-filter?cat="+catid,"_self");
				  });
			}
			
//			if($(this).attr('data-word-id') != "1") {	
//				$("#"+$(this).attr('data-cat-id')).fadeOut( "slow" );
//		        window.open("search-filter", "_self");
//			}
		});

		
		if(window.location.hash != "") {
			$('a[href="' + window.location.hash + '"]').click();
			
			if(window.location.hash == "#edit") {
		        $(".view-profile").fadeOut();
		        $(".edit-profile").fadeIn();
			}
		}
		
	    $(".infobusiness").click(function(e) {
	        e.preventDefault();
	        var url = $(this).attr('data-link');
	        window.open(url, "_self");
	    });
	    
	    $(".author").click(function(e) {
	        e.preventDefault();
	        var url = $(this).attr('data-link');
	        window.open(url, "_self");
	    });
	    
	    
	    $("#profile .edit-profile-btn").click(function(e) {
	        e.preventDefault();
	        $(".view-profile").fadeOut();
	        $(".edit-profile").fadeIn();
	    });
	    
	    $('a[href="#profile"]').on('shown.bs.tab', function (e) {
	        $(".view-profile").show();
	        $(".edit-profile").hide();
	    }); 
	    
	
		if($('#carousel').length) {
			
			$("#carousel").waterwheelCarousel({
				  autoPlay: 5000
				  // (use quotes only for string values, and no trailing comma after last option)
				  // option: value,
				  // option: value
				});

		}	
		
		//tabs
		$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		});
		

		if ( document.getElementById('shop-slider-range') ) {
			initRangeSlider();
		}

		// Parallax disabled for mobile screens
		if ($(window).width() >= 1260) {
			initParallax();

			$(window).stellar({
				hideDistantElements: false
			});
		}

	});

	// Initialize functions after elements are loaded.
	$(window).load(function() {

		// Preloader
		$('.preloader img').fadeOut(); // will first fade out the loading animation
		$('.preloader').delay(350).fadeOut('slow', function() {

		});

		initPortfolio();
		initBlogMasonry();

	});


/* --------------------------------------------------
	Navigation | Navbar
-------------------------------------------------- */
	
	function initNavbar(){

		

	} // initNavbar



/* --------------------------------------------------
	Scroll Nav
-------------------------------------------------- */

	function initScroller () {

		$('#navbar').localScroll({
			easing: 'easeInOutExpo'
		});

		$('#page-top').localScroll({
			easing: 'easeInOutExpo'
		});	
	} // initScroller




/* --------------------------------------------------
	Parallax
-------------------------------------------------- */

	
	function initParallax () {

		var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
		if (!isSafari) {
			$(".main-op").parallax("50%", 0.2);
			$(".number-counters").parallax("50%", 0.2);
			$(".cirlce-counters").parallax("50%", 0.3);
			$(".client-list-parallax").parallax("50%", 0.4);
			$(".ft-slider-parallax").parallax("50%", 0.4);
			$(".testimonials-parallaxx").parallax("50%", 0.4);
			$(".twitter-slider").parallax("50%", 0.4);
			$(".login-2").parallax("50%", 0.2);
		}
	}






/* --------------------------------------------------
	Sliders
-------------------------------------------------- */
	
	function initSliders() {

		// Features Slider
		$('.ft-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="info-slider-nav slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
			nextArrow: '<button type="button" class="info-slider-nav slick-next"><i class="fa fa-long-arrow-right"></i></button>',
			responsive: [
			    {
			      breakpoint: 999,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			        infinite: true,
			      }
			    },
			    {
			      breakpoint: 770,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
		});

		// Testimonials Sliders
		$('.t-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="t-slider-nav slick-prev"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="t-slider-nav slick-next"><span class="linea-arrows-slim-right"></span></button>',
		});

		// Brands/Clients Slider
		$('.clients-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			slidesToShow: 5,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			responsive: [
			    {
			      breakpoint: 999,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 2,
			        infinite: true,
			      }
			    },
			    {
			      breakpoint: 770,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 599,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			]
		});
		
		
 
		// Brands/Clients Slider
		$('.related-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="t-slider-nav slick-prev blacked"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="t-slider-nav slick-next blacked"><span class="linea-arrows-slim-right"></span></button>',
			responsive: [
			    {
			      breakpoint: 999,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 2,
			        infinite: true,
			      }
			    },
			    {
			      breakpoint: 770,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 599,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			]
		});
		

		// Portfolio Single Slider
		$('.single-img-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="slider-nav sl-prev"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="slider-nav sl-next"><span class="linea-arrows-slim-right"></span></button>',
		});

		// Centered Gallery
		$('.centered-gallery').slick({
			centerMode: true,
			  centerPadding: '60px',
			  slidesToShow: 3,
			  responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			        arrows: false,
			        centerMode: true,
			        centerPadding: '40px',
			        slidesToShow: 3
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        arrows: false,
			        centerMode: true,
			        centerPadding: '40px',
			        slidesToShow: 1
			      }
			    }
			  ]
		});

		// Full Screen Hero Slider
		$('.fs-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			useCSS: true,
			fade: true,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="slick-next"><span class="linea-arrows-slim-right"></span></button>',
			autoplay: true,
			autoplaySpeed: 4000,
		});

		// Full Width Hero Slider
		$('.fw-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="slick-next"><span class="linea-arrows-slim-right"></span></button>',
			autoplay: true,
			autoplaySpeed: 4000,
		});

		// Text Slider
		$('.text-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			speed: 300,
			fade: true,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="slick-next"><span class="linea-arrows-slim-right"></span></button>',
			autoplay: true,
			autoplaySpeed: 4000,
		});

		// Shop Product Slider
		$('.shop-p-slider').slick({
			slidesToShow: 1,
		    variableWidth: true,
			speed: 300,
			// fade: false,
			dots: false,
			arrows: true,
			prevArrow: '<button type="button" class="shop-p-slider-nav shop-p-slider-nav-left"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="shop-p-slider-nav shop-p-slider-nav-right"><span class="linea-arrows-slim-right"></span></button>',
			autoplay: false,
		});

		// Shop Product Single - Slider
		$('.prod_single_img_slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			speed: 300,
			// fade: false,
			infinite: true,
			dots: true,
			arrows: true,
			prevArrow: '<button type="button" class="shop-p-slider-nav shop-p-slider-nav-left"><span class="linea-arrows-slim-left"></span></button>',
			nextArrow: '<button type="button" class="shop-p-slider-nav shop-p-slider-nav-right"><span class="linea-arrows-slim-right"></span></button>',
			autoplay: false,
			accessibility: false,
			customPaging: function (slider, i) {
	            return '<a href="#">' + $('.prod_single_thumbs_slider li:nth-child(' + (i + 1) + ')').html() + '</a>';
	        }
		});

	} // initSliders



/* --------------------------------------------------
	Portfolio
-------------------------------------------------- */
	
	function initPortfolio () {

		// Filters
		$('.portfolio-filters a').click(function (e) {
			  e.preventDefault();

			  $('li').removeClass('active');
			  $(this).parent().addClass('active');
		});

		
		// Full Width Gallery (3 columns)
		function pfolio3colFW () {
			
			var $container = $('#pfolio');
			// init
			$container.isotope({
				// options
				itemSelector: '.portfolio-item',
			});

			// Filter items
			$('#pfolio-filters').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({ filter: filterValue });
			});

		} // fwNogap3col


		function pfolioMasonry () {
			
			var $container = $('.pfolio-items');
			// init
			$container.isotope({
				// options
				itemSelector: '.p-item',
			    percentPosition: true,
			    layoutMode: 'masonry',
			    masonry: {
			      columnWidth: '.grid-sizer'
			    }				
			});

			// Filter items
			$('#pfolio-filters').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({ filter: filterValue });
			});

		}


		pfolio3colFW();
		pfolioMasonry();

	} // initPortfolio



/* --------------------------------------------------
	Light Gallery
-------------------------------------------------- */

	function initGallery () {

		// Image Lightbox
		var hasPopup = $('a').hasClass('open-gallery');

		if (hasPopup) {

			$('.open-gallery').magnificPopup({
				type:'image',
				gallery: {
				    enabled: true
				  }
			});
			
		}

		// Footer Gallery Lightbox
		var hasFtPopup = $('a').hasClass('gallery-widget-lightbox');

		if (hasPopup) {

			$('.gallery-widget-lightbox').magnificPopup({
				type:'image',
				gallery: {
				    enabled: true
				  }
			});

		}

		// Video Lightbox
		var hasVideoPopup = $('a').hasClass('popup-video');

		if (hasVideoPopup) {

			$('.popup-video').magnificPopup({
	          	disableOn: 700, 
	         	type: 'iframe',
	          	mainClass: 'mfp-fade',
	          	removalDelay: 160,
	          	preloader: false,

	          	fixedContentPos: false
			});

		}

	} // initGallery




/* --------------------------------------------------
	Blog Masonry Layout
-------------------------------------------------- */

	function initBlogMasonry () {

		var $container = $('.blog-container');
			// init
			$container.isotope({
				// options
				itemSelector: '.blog-selector',
				percentPosition: true
			});
	}
	



/* --------------------------------------------------
  Contact Pages
-------------------------------------------------- */

	$('.show-map').on('click', function(e){
	  e.preventDefault();
	  $('.contact-info-wrapper').toggleClass('map-open');
	  $('.show-info-link').toggleClass('info-open');
	});

	$('.show-info-link').on('click', function(e){
	  e.preventDefault();
	  $('.contact-info-wrapper').toggleClass('map-open');
	  $(this).toggleClass('info-open');
	});



/* --------------------------------------------------
	Animation
-------------------------------------------------- */

	function initAnimation () {
		
		new WOW().init();

	}




/* --------------------------------------------------
	Video Background
-------------------------------------------------- */

	function initVideoBg () {

		var hasBgVideo = $('#fs-video-one-bg').hasClass('player');
		var hasFwBgVideo = $('#fw-video-one-bg').hasClass('player');
		var hasSecBgVideo = $('#section-video').hasClass('player');

		if (hasBgVideo || hasFwBgVideo || hasSecBgVideo) {

			$('.player').YTPlayer();

		}
		

	}



/* --------------------------------------------------
	Ken Burns Slider
-------------------------------------------------- */
	function initKenburns () {
		
		var hasKenburns = $('.kenburn-hero')[0];

		if (hasKenburns) {
			var w_height = $(window).height();
			var w_width = $(window).width();

			$('.kenburns').attr('width', w_width);
			$('.kenburns').attr('height', w_height);
			$('.kenburns').kenburns({
				images: ['assets/images/hero/kb-slide-1.jpg',
						'assets/images/hero/kb-slide-2.jpg',
						'assets/images/hero/kb-slide-3.jpg'
						],
				frames_per_second: 30,
				display_time: 5000,
				fade_time: 1000,
				zoom: 1.1,
				background_color:'#000000'
			});
		}

	} // initKenburns



/* --------------------------------------------------
	Coming Soon - Countdown
-------------------------------------------------- */

	function initCountdown () {

		var hasCountdown = $('#cs-timer').hasClass('cs-timer');

		if (hasCountdown) {

			// Add end date here (current: 2017/01/01) from witch the timer will countdown.
			$('#cs-timer').countdown('2019/31/01', function(event) {
			    $(this).html(event.strftime('<div class="item"><span class="nbr-timer">%D</span><span class="title-timer">Jours<span></div><div class="item"><span class="nbr-timer">%H</span><span class="title-timer">Heures<span></div><div class="item"><span class="nbr-timer">%M</span><span class="title-timer">Minutes<span></div><div class="item"><span class="nbr-timer">%S</span><span class="title-timer">Secondes<span></div>'));
			  });

		}

		
		
		
		
		
		
		

		//update these values if you change these breakpoints in the style.css file (or _layout.scss if you use SASS)
		var MqM= 768,
			MqL = 1024;

		var faqsSections = $('.cd-faq-group'),
			faqTrigger = $('.cd-faq-trigger'),
			faqsContainer = $('.cd-faq-items'),
			faqsCategoriesContainer = $('.cd-faq-categories'),
			faqsCategories = faqsCategoriesContainer.find('a'),
			closeFaqsContainer = $('.cd-close-panel');
		
		//select a faq section 
		faqsCategories.on('click', function(event){
			event.preventDefault();
			var selectedHref = $(this).attr('href'),
				target= $(selectedHref);
			if( $(window).width() < MqM) {
				faqsContainer.scrollTop(0).addClass('slide-in').children('ul').removeClass('selected').end().children(selectedHref).addClass('selected');
				closeFaqsContainer.addClass('move-left');
				$('body').addClass('cd-overlay');
			} else {
		        $('body,html').animate({ 'scrollTop': target.offset().top - 19}, 200); 
			}
		});

		//close faq lateral panel - mobile only
		$('body').bind('click touchstart', function(event){
			if( $(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) { 
				closePanel(event);
			}
		});
		faqsContainer.on('swiperight', function(event){
			closePanel(event);
		});

		//show faq content clicking on faqTrigger
		faqTrigger.on('click', function(event){
			event.preventDefault();
			$(this).next('.cd-faq-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
		});

		//update category sidebar while scrolling
		$(window).on('scroll', function(){
			if ( $(window).width() > MqL ) {
				(!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory); 
			}
		});

		$(window).on('resize', function(){
			if($(window).width() <= MqL) {
				faqsCategoriesContainer.removeClass('is-fixed').css({
					'-moz-transform': 'translateY(0)',
				    '-webkit-transform': 'translateY(0)',
					'-ms-transform': 'translateY(0)',
					'-o-transform': 'translateY(0)',
					'transform': 'translateY(0)',
				});
			}	
			if( faqsCategoriesContainer.hasClass('is-fixed') ) {
				faqsCategoriesContainer.css({
					'left': faqsContainer.offset().left,
				});
			}
		});

		function closePanel(e) {
			e.preventDefault();
			faqsContainer.removeClass('slide-in').find('li').show();
			closeFaqsContainer.removeClass('move-left');
			$('body').removeClass('cd-overlay');
		}

		function updateCategory(){
			updateCategoryPosition();
			updateSelectedCategory();
		}
		
		function updateCategoryPosition() {
			
			if($('.cd-faq').length) {
				 
				
				var top = $('.cd-faq').offset().top,
					height = jQuery('.cd-faq').height() - jQuery('.cd-faq-categories').height(),
					margin = 20;
				if( top - margin <= $(window).scrollTop() && top - margin + height > $(window).scrollTop() ) {
					var leftValue = faqsCategoriesContainer.offset().left,
						widthValue = faqsCategoriesContainer.width();
					faqsCategoriesContainer.addClass('is-fixed').css({
						'left': leftValue,
						'top': margin,
						'-moz-transform': 'translateZ(0)',
					    '-webkit-transform': 'translateZ(0)',
						'-ms-transform': 'translateZ(0)',
						'-o-transform': 'translateZ(0)',
						'transform': 'translateZ(0)',
					});
				} else if( top - margin + height <= $(window).scrollTop()) {
					var delta = top - margin + height - $(window).scrollTop();
					faqsCategoriesContainer.css({
						'-moz-transform': 'translateZ(0) translateY('+delta+'px)',
					    '-webkit-transform': 'translateZ(0) translateY('+delta+'px)',
						'-ms-transform': 'translateZ(0) translateY('+delta+'px)',
						'-o-transform': 'translateZ(0) translateY('+delta+'px)',
						'transform': 'translateZ(0) translateY('+delta+'px)',
					});
				} else { 
					faqsCategoriesContainer.removeClass('is-fixed').css({
						'left': 0,
						'top': 0,
					});
				}
			}
			
		}

		function updateSelectedCategory() {
			faqsSections.each(function(){
				var actual = $(this),
					margin = parseInt($('.cd-faq-title').eq(1).css('marginTop').replace('px', '')),
					activeCategory = $('.cd-faq-categories a[href="#'+actual.attr('id')+'"]'),
					topSection = (activeCategory.parent('li').is(':first-child')) ? 0 : Math.round(actual.offset().top);
				
				if ( ( topSection - 20 <= $(window).scrollTop() ) && ( Math.round(actual.offset().top) + actual.height() + margin - 20 > $(window).scrollTop() ) ) {
					activeCategory.addClass('selected');
				}else {
					activeCategory.removeClass('selected');
				}
			});
		}
		
		
		
		
		
		
		
	}



/* --------------------------------------------------
	Shop Price Filter - (range slider)
-------------------------------------------------- */
	function initRangeSlider () {

		$( "#shop-slider-range" ).slider({
			range: true,
			min: 100,
			max: 750,
			values: [ 121, 721 ], // starting values
			slide: function( event, ui ) {
				$( "#shop-slider-range-amount" ).val( "$" + ui.values[ 0 ] + " TO $" + ui.values[ 1 ] );
			}
		});
		$( "#shop-slider-range-amount" ).val( "$" + $( "#shop-slider-range" ).slider( "values", 0 ) +
			" TO $" + $( "#shop-slider-range" ).slider( "values", 1 ) );

	} // initRangeSlider



})(jQuery);



/* --------------------------------------------------
	Contact Form JS Validation & AJAX call 
-------------------------------------------------- */
$(function() {

//	Regular Expressions
var expEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/;
var	expLettersOnly = /^[A-Za-z ]+$/;

//	Checks if a field has the correct length
function validateLength ( fieldValue, minLength ) {
	return ( $.trim( fieldValue ).length > minLength );
}

//	Validate form on typing
$( '.form-ajax' ).on( 'keyup', 'input.validate-locally', function() {
	validateField( $(this) );
});

//	AJAX call
$( '.form-ajax' ).submit(function(e) {
	e.preventDefault();
	var $this = $( this ),
			action = $this.attr( 'action' );

	// The AJAX requrest
	$.post(
			action,
			$this.serialize(),
			function( data ) {
				$( '.ajax-message' ).html( data );
			}
	);
});

//	Validates the fileds
function validateField ( field ) {
	var errorText = "",
			error = false,
			value = field.val(),
			siblings = field.siblings( ".alert-error" );

	// Test the name field
	if ( field.attr("name") === "name" ) {
		if ( !validateLength( value, 2 ) ) {
					error = true;
					errorText += '<i class="fa fa-info-circle"></i> The name is too short!<br>';
					$('input[name="name"]').addClass('input-error');
		} else {
			$('input[name="name"]').removeClass('input-error');
		}

		if ( !expLettersOnly.test( value ) ) {
					error = true;
					errorText += '<i class="fa fa-info-circle"></i> The name can contain only letters and spaces!<br>';
					$('input[name="name"]').addClass('input-error-2');
		} else {
			$('input[name="name"]').removeClass('input-error-2');
		}
	}

	// Test the email field
	if ( field.attr("name") === "email" ) {
		if ( !expEmail.test( value ) ) {
					error = true;
					errorText += '<i class="fa fa-info-circle"></i> Enter correct email address!<br>';
					$('input[name="email"]').addClass('input-error');
		} else {
			$('input[name="email"]').removeClass('input-error');
		}
	}

	// Display the errors
	siblings.html( errorText );

	}

});