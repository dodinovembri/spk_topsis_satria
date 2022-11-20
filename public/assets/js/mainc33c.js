(function ($) {
	'use strict';

	var easyArt = {
		/* ---------------------------------------------
			## Scroll top
		--------------------------------------------- */
		scroll_top: function () {
			var $scrolltop = $('#scroll-top');
			if( $('#ghost-membersjs-root').length > 0 ) {
				$scrolltop.addClass('more-top');
			}
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > $(this).height()) {
					$scrolltop.addClass('btn-show').removeClass('btn-hide');
				} else {
					$scrolltop.addClass('btn-hide').removeClass('btn-show');
				}
			});
			$("a[href='#top']").on('click', function () {
				$('html, body').animate(
					{
						scrollTop: 0,
					},
					'normal'
				);
				return false;
			});

			const $dropdown = $(".dropdown");
			const $dropdownToggle = $(".dropdown-toggle");
			const $dropdownMenu = $(".dropdown-menu");
			const showClass = "show";
			 
			$(window).on("load resize", function() {
			  if (this.matchMedia("(min-width: 768px)").matches) {
			    $dropdown.hover(
			      function() {
			        const $this = $(this);
			        $this.addClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "true");
			        $this.find($dropdownMenu).addClass(showClass);
			      },
			      function() {
			        const $this = $(this);
			        $this.removeClass(showClass);
			        $this.find($dropdownToggle).attr("aria-expanded", "false");
			        $this.find($dropdownMenu).removeClass(showClass);
			      }
			    );
			  } else {
			    $dropdown.off("mouseenter mouseleave");
			    $dropdownToggle.on('click', function(e) {
			    	e.preventDefault();
			    	$(this).next('.dropdown-menu').toggle();
			    });
			  }
			});
		},

		/* ---------------------------------------------
			## Menu Script
		--------------------------------------------- */
		menu_script: function () {
			var w = $(window).width();
			if ($('.mobile-sidebar-menu').length && w < 1200) {
				var mobileMenu = $('.navigation-area .navigation').clone().appendTo('.mobile-sidebar-menu');
			}

			if ($('.navigation-area .mainmenu').find('li > a').siblings('.sub-menu')) {
				$('.mainmenu li > .sub-menu').siblings('a').append("<span class='menu-arrow fas fa-angle-down'></span>");
			}

			// Accordion Menu
			var $AccordianMenu = $('.sidebar-menu .navigation a');
			var $mobileSubMenuOpen = $('.hamburger-menus');
			var $overlayClose = $('.overlaybg');

			$overlayClose.on('click', function (e) {
				e.preventDefault();
				$(this).parent().removeClass('sidemenu-active');
				$mobileSubMenuOpen.removeClass("click-menu");
				$('#sticky-header').addClass("active");
			});

			$mobileSubMenuOpen.on('click', function () {
				$(this).toggleClass("click-menu");
				$('.mobile-sidebar-menu').toggleClass("sidemenu-active");
				$('#sticky-header').toggleClass("active");
			});

			$AccordianMenu.on('click', function () {
				var link = $(this);
				var closestUl = link.closest("ul");
				var parallelActiveLinks = closestUl.find(".active")
				var closestLi = link.closest("li");
				var linkStatus = closestLi.hasClass("active");
				var count = 0;

				closestUl.find("ul").slideUp(function () {
					if (++count == closestUl.find("ul").length)
						parallelActiveLinks.removeClass("active");
				});

				if (!linkStatus) {
					closestLi.children("ul").slideDown();
					closestLi.addClass("active");
				}
			});
		},

		/* ---------------------------------------------
			## Pop Up Scripts
		 --------------------------------------------- */
		popupScript: function () {
			function getScrollBarWidth() {
				var $outer = $('<div>').css({ visibility: 'hidden', width: 100, overflow: 'scroll' }).appendTo('body'),
					widthWithScroll = $('<div>').css({ width: '100%' }).appendTo($outer).outerWidth();
				$outer.remove();
				return 100 - widthWithScroll;
			}

			// Image Pop up
			var $popupImage = $(".popup-image");
			if ($popupImage.length > 0) {
				$popupImage.magnificPopup({
					type: 'image',
					fixedContentPos: false,
					gallery: { enabled: true },
					removalDelay: 300,
					mainClass: 'mfp-fade',
					callbacks: {
						// This prevenpt pushing the entire page to the right after opening Magnific popup image
						open: function () {
							$(".page-wrapper, .navbar-nav").css("margin-right", getScrollBarWidth());
						},
						close: function () {
							$(".page-wrapper, .navbar-nav").css("margin-right", 0);
						}
					}
				});
			}
		},

		/* ---------------------------------------------
		## Ajax Post Load
		 --------------------------------------------- */
		ajaxPostLocad: function() {
			var pagination_next_url = $('link[rel=next]').attr('href'),
			    $load_posts_button  = $('.js-load-posts');

			$load_posts_button.click(function(e) {
			    e.preventDefault();

			    var request_next_link = pagination_next_url.split(/page/)[0] + 'page/' + pagination_next_page_number + '/';

			    $.ajax({
				    url: request_next_link,
				    beforeSend: function() {
				        $load_posts_button.text('Loading');
				        $load_posts_button.addClass('button--loading');
						$('#post-masonry').css({'opacity': '0.85'});
				    }
			    }).done(function(data) {
			        var posts = $('.post-loop', data);

			        $load_posts_button.text('Load More');
			        $load_posts_button.removeClass('button--loading');
					$('#post-masonry').css({'opacity': '1'});

	                if ($('#post-masonry').length) {
						$('#post-masonry').append( posts ).isotope( 'appended', posts );
						$('#post-masonry').imagesLoaded(function(){
							$('#post-masonry').isotope('layout');
						});
		            }

			        pagination_next_page_number++;

			        // If you are on the last pagination page, add the disabled attribute
			        if (pagination_next_page_number > pagination_available_pages_number) {
			            $load_posts_button.attr('disabled', true);
			            $load_posts_button.slideUp();
						$load_posts_button.parent().parent().slideUp();
			        }
			    });
			});
		},

		searchPopup: function() {
			// Search results
			var posts = [],
			    searchKey = $("#search-input"),
			    searchContent = $("#search-full-content"),
			    searchResultnum = $(".no-result");

			// search-bar
			$(".search-bar").on("click", function (e) {
			    e.preventDefault();
			    $(".overlay-content").addClass("active");
			    $("body").addClass("body-overflow");
			    searchKey.focus();

			    if (posts.length == 0 && typeof serachContentApi !== undefined) {
			        $.get(serachContentApi)
			            .done(function (data) {
			                posts = data.posts;
			                search();
			            })
			            .fail(function (err) {});
			    }
			});

			//  click on close icon input text clear
			function seacrhEvent() {
			    $(".overlay-content").removeClass("active");
			    $("body").removeClass("body-overflow");
			    searchKey.val("");
			    searchContent.empty();
			    searchResultnum.removeClass("d-block");
			}

			$(".overlay-close").on("click", function () {
			    seacrhEvent();
			});

			$(document).keydown(function (event) {
			    if (event.keyCode == 27) {
			        seacrhEvent();
			    }
			});

			function search() {
			    var options = {
			        shouldSort: true,
			        tokenize: true,
			        matchAllTokens: true,
			        threshold: 0,
			        location: 0,
			        distance: 100,
			        maxPatternLength: 32,
			        minMatchCharLength: 1,
			        keys: [
			            {
			                name: "title",
			                weight: 0.3,
			            },
			            {
			                name: "author",
			                weight: 0.7,
			            },
			        ],
			    };

			    var fuse = new Fuse(posts, options);

			    searchKey.keyup(function () {
			        var value = this.value,
			            search = fuse.search(value),
			            output = "",
			            language = $("html").attr("lang");

			        searchResultnum.addClass("d-block");
			        searchResultnum.children("span").html(search.length);
			        if (posts.length > 0) {
			            $.each(search, function (key, val) {
			                var pubDate = new Date(val.published_at).toLocaleDateString(language, {
			                    day: "numeric",
			                    month: "long",
			                    year: "numeric",
			                });
			                output += `
			                <a class="single-search-result" href="${val.url}">
			                  <div class="single-result-item">
			                      <div class="search-content pr-sm-30">
			                          <div class="d-flex mb-15 align-items-center">
			                              <h5 class="post-title">${val.title} <span class="post-datetime">
			                              ${pubDate}      
			                              </span></h5>     
			                          </div> 
			                          <p class="excerpt-text mb-0">${val.excerpt}</p>
			                      </div>
			                      <div class="prev-next-arrow d-none d-sm-block">
			                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
			                      </div>
			                  </div>
			               </a>`;
			            });
			            searchContent.html(output);
			        }
			    });
			}
		},

		featured_slider: function() {
			if ($('.frontpage-slider-one').length) {
				$('.frontpage-slider-one').owlCarousel({
					items: 1,
					autoplay: false,
					autoplayTimeout: 3000,
					smartSpeed: 800,
					loop: true,
					autoHeight : true,
					margin: 0,
					dots: false,
					nav: true,
					navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="30px" height="27px"><path fill-rule="evenodd"  fill="currentColor" d="M30.000,14.000 L2.202,14.000 C6.374,16.974 10.266,20.300 11.997,26.343 C11.719,26.556 11.435,26.776 11.150,26.996 C9.178,20.966 4.998,17.712 0.904,14.349 C0.867,14.376 0.830,14.402 0.793,14.429 C0.531,14.231 0.261,14.024 -0.007,13.819 C0.037,13.782 0.081,13.745 0.125,13.708 C0.081,13.671 0.037,13.636 -0.007,13.599 C0.260,13.401 0.529,13.200 0.791,13.008 C0.820,13.028 0.848,13.048 0.877,13.068 C4.991,9.592 9.197,6.236 11.179,0.004 C11.465,0.231 11.749,0.458 12.029,0.677 C10.369,6.635 6.729,10.032 2.756,13.000 L30.000,13.000 L30.000,14.000 Z"/></svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="30px" height="27px"><path fill-rule="evenodd"  fill="currentColor" d="M30.007,13.599 C29.963,13.636 29.919,13.671 29.875,13.708 C29.919,13.745 29.963,13.782 30.006,13.819 C29.739,14.024 29.469,14.231 29.207,14.429 C29.170,14.402 29.133,14.376 29.096,14.349 C25.002,17.712 20.822,20.966 18.849,26.996 C18.565,26.776 18.281,26.556 18.003,26.343 C19.734,20.300 23.626,16.974 27.798,14.000 L-0.000,14.000 L-0.000,13.000 L27.244,13.000 C23.271,10.032 19.631,6.635 17.971,0.677 C18.250,0.458 18.535,0.231 18.820,0.004 C20.803,6.236 25.009,9.592 29.123,13.068 C29.152,13.048 29.180,13.028 29.209,13.008 C29.471,13.200 29.740,13.401 30.007,13.599 Z"/></svg>'],
				});
			}
		},

		postBlog: function() {
			$('#post-masonry').imagesLoaded(function(){
				$('#post-masonry').isotope({
					// options
					itemSelector: '.post-loop',
					percentPosition: true,
					layoutMode: 'packery'
				});
				$('#post-masonry').isotope('layout');
			});

			// Preloader Script
			$("body").imagesLoaded( function() {
				if($('#loader-overlay').length) {
					$("#loader-overlay").delay(500).fadeOut();
					$('.loader').delay(2000).fadeOut('slow');
					setTimeout(function() {
					    //After 2s, the no-scroll class of the body will be removed
					    $('body').removeClass('no-scroll');
						$("body").addClass("loading-done");
					}, 2000); //Here you can change preloader time
				}
			});
		},
		/* ---------------------------------------------
		Content Video Responsive
		 --------------------------------------------- */
		content_video: function() {
			var $postVideo = $('.all-contents');
			$postVideo.fitVids();
		},	

		/* ---------------------------------------------
		 function initialize
		 --------------------------------------------- */
		initialize: function () {
			easyArt.scroll_top();
			easyArt.menu_script();
			easyArt.popupScript();
			easyArt.ajaxPostLocad();
			easyArt.searchPopup();
			easyArt.featured_slider();
			easyArt.content_video();
		},
	};
	/* ---------------------------------------------
	 Document ready function
	 --------------------------------------------- */
	$(function () {
		easyArt.initialize();
	});

	$(window).on('load', function() {
		easyArt.postBlog();
	});

})(jQuery);
