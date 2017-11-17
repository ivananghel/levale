// JavaScript Document
//Google fons
WebFontConfig = {
    google: {families: [ 'Roboto:400,400i,500,500i,700,700i' ] }
};
(function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('body')[0];
    s.appendChild(wf);
})();

(function ($) {
	'use strict';

	var exampleInit = {
        ex_initReady : function() {
            this.ex_eventResize();
			//this.ex_mmenu();
			this.ex_formstyler();
            this.ex_owlCarousel();
			this.ex_datepicker();
			this.ex_mobileSearchEvents();
			this.ex_select2();
			this.ex_modals();
			this.ex_tinymce();
			this.ex_draggable();
			this.ex_googleMap();
			this.ex_nouislider();
			this.ex_tooltip();
            this.ex_sidebarCollapse();
            this.ex_humburger();
        },
        ex_initLoad : function () {
            this.ex_dataRowHeight();
            this.ex_sidebarHeight();
        },
        ex_humburger: function () {
            var $humbergerBtn = $('.c-hamburger');

            $humbergerBtn.on('click touch', function(){

                var $this = $(this),
                    thisMenu = $this.attr('href');

                $this.toggleClass('is-active');
                $(thisMenu).toggleClass('is-open');

                return false;
            });
        },
        ex_sidebarCollapse: function() {
            var $sidebarLeft = $('.sidebar-left'),
                $sidebarLeftCollapse = $sidebarLeft.find('.collapse'),
                that = this;

            var $sidebarNav =  $sidebarLeft.find('.sidebar-nav'),
                $sidebarParent = $sidebarNav.find('.parent');

            $sidebarParent.on('click touch', function(){
                var $this = $(this);

                if($this.is('.collapsed')) {

                    console.log('down');
                    $this.find('.glyphicon').addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
                }else {
                    console.log('up');
                    $this.find('.glyphicon').addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
                }
            });

            $sidebarLeftCollapse.on('hidden.bs.collapse', function () {
                that.ex_sidebarHeight();
            });
            $sidebarLeftCollapse.on('shown.bs.collapse', function () {
                that.ex_sidebarHeight();
            });
        },
        ex_sidebarHeight: function() {
            var $sidebarLeft = $('.sidebar-left'),
                that = this;

            if($sidebarLeft.length) {
                var $sidebarScroll = $('.scroll-sidebar'),
                    $sidebarScrollContainer = $sidebarScroll.find('.scroll-sidebar__container'),
                    sidebarScrollContainerHeight = $sidebarScrollContainer.height();

                var whObj = that.ex_windowHeight();
                var sidebarLeftHeightOuter = $sidebarLeft.outerHeight();
                var sidebarLeftHeight = $sidebarLeft.height();
                var sidebarLeftPadingTop = sidebarLeftHeightOuter - sidebarLeftHeight;

                var scrollHeight = whObj.windowHeight-sidebarLeftPadingTop;
                $sidebarScroll.css({
                    'height' : scrollHeight+'px'
                }).jScrollPane();

                console.log(scrollHeight);

                $sidebarLeft.addClass('loaded');
            }
        },
        ex_nouislider: function() {

            var rangeSlider = document.getElementById('slider-range');

            if( rangeSlider ) {

                noUiSlider.create(rangeSlider, {
                    start: [75],
                    connect: [true, false],
                    range: {
                        'min': [0],
                        'max': [100]
                    },
                    format: wNumb({
                        decimals: 0
                    }),
                    tooltips: true
                });
            }
        },
        ex_googleMapNeed: function() {

            var needMap = false;

            if( $('.object-location-map').length ) {

                needMap = true;
            }

            return needMap;
        },
        ex_googleMapChecker: function() {

            if( this.ex_googleMapNeed() ) {
                if( window.google !== undefined ) {

                    clearInterval(exampleInit.checkgoogleMapLoad);
                    this.ex_googleMapInit();
                }
            }else {

                clearInterval(exampleInit.checkgoogleMapLoad);
            }

        },
        checkgoogleMapLoad: setInterval(function(){ exampleInit.ex_googleMapChecker() }, 500),
        ex_googleMapInit: function () {

            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru,
                scrollwheel: false
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        },
        ex_googleMap: function() {

            if( this.ex_googleMapNeed() ) {

                (function() {
                    var wf = document.createElement('script');
                    wf.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVxXPpBAgJ-XNlC4z43s7YigmqJk82dxU';
                    wf.type = 'text/javascript';
                    wf.async = 'true';
                    var s = document.getElementsByTagName('body')[0];
                    s.appendChild(wf);
                })();
            }
        },
        ex_draggable: function() {

            var $sortable = $( ".sortable" ),
                sortable_length = $sortable.length;

            if( sortable_length ) {

                for( var i = 0; i < sortable_length; i++ ) {

                    var $thisSortable = $sortable.eq(i);

                    $thisSortable.sortable({
                        revert: true
                    });
                }

                $( ".sortable tr, .sortable td" ).disableSelection();
            }
        },
        ex_tinymce: function() {

            if( $('.textarea-tinymce').length ) {

                tinymce.init({
                    selector: '.textarea-tinymce',
                    height: 200,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code'
                    ],
                    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
                });
            }
        },
        ex_tooltip: function() {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            })
        },
		ex_modals: function() {

            $('[data-toggle="modal"]').on('click touch', function(){

                var $this = $(this),
                    thisID = $this.data('target');

                $(thisID).on('shown.bs.modal', function (e) {

                    $('.modal-backdrop').appendTo($('.site-wrapper'));
                });
            });
        },
		ex_select2: function() {

            var $select = $('select'),
                select_length = $select.length,
                template = 'brand';

            function selectPlaceholser($thisSelect){
                $thisSelect.data('placeholder');
            }

            for(var i = 0; i < select_length; i++) {
                var $thisSelect = $select.eq(i);

                $thisSelect.select2({
                    theme: template,
                    placeholder: selectPlaceholser($thisSelect)
                });
            }
        },
		ex_mobileSearchEvents: function() {

            var that = this,
                wwObj = that.ex_windowWidth(),
                $headerMiddleSearch = $('.header-search'),
                $searchSubmit = $headerMiddleSearch.find('.btn');


            $(document).on('click touchstart', function(e){

                var $target = $(e.target);

                if (!$target.is('.header-search') && !$target.parents().is('.header-search')) {
                    $headerMiddleSearch.removeClass('open');
                }
            });

            // $searchSubmit.on('click touch', function() {
            //
            //     var $this = $(this),
            //         $thisSearch = $this.closest('.header-search');
            //
            //     if ( !$thisSearch.is('.open') ) {
            //
            //         $thisSearch.addClass('open');
            //         return false;
            //     }
            // });
        },
		ex_compareHeight: function(compareArray) {

        	if( Array.isArray(compareArray) ) {

                return Math.max.apply(null, compareArray);
			}else {

                return false;
			}
		},
		ex_setHeight: function($items, block_height) {

            if( block_height !== false ) {

                $items.css({
                    'height': block_height+'px'
                });
            }else {

                $items.css({
                    'height': ''
                });
            }
		},
		ex_dataRowHeight: function() {

        	var $rowGroup = $('[data-row-group]'),
                rowGroup_length = $rowGroup.length;

        	if( rowGroup_length ) {

                for( var i = 0; i < rowGroup_length; i++ ) {

					var $row = $rowGroup.eq(i),
						$items = $row.find('[data-row-height]'),
                        items_length = $items.length;

					if( items_length > 1 ) {

						var tempHeight = null,
							compareArray = [];

                        for( var j = 0; j < items_length; j++ ) {

                            var $item = $items.eq(j);

                            if( tempHeight === $item.offset().top || tempHeight === null ) {

                                tempHeight = $item.offset().top;

                                $item.css({
									'height': ''
								});
                                compareArray[j] = $item.outerHeight();
                            }else {

                                compareArray = null;
							}
                        }


                        var block_height = this.ex_compareHeight(compareArray);
						this.ex_setHeight($items, block_height);
					}
                }
			}
		},
		ex_datepicker: function() {
            $('.input-daterange').datepicker();
		},
		ex_formstyler : function() {
            //form styler
            var $formStyled = $('.js_styled');
            if($formStyled.length){
                $formStyled.styler();
            }
        },
        ex_owlCarousel: function() {
			var $productsCarousel = $('.js_products-slider');
			if($productsCarousel.length) {
				$productsCarousel.owlCarousel({
					loop: true,
				    margin: 15,
				    nav: true,
				    responsive:{
				        0:{
				            items: 1
				        },
				        600:{
				            items: 2
				        },
						768:{
				            items: 1
				        },
						991:{
				            items: 1
				        },
				        1000:{
				            items: 2
				        }
				    }
                });
			}
        },
        ex_mmenu: function () {

            var $desktopMenu = $(".sidebar-nav__list"),
                $dropdownHeader = $('#header .dropdown');

            if( $desktopMenu.length ) {
                var mobileMenu = $desktopMenu.clone(),
                    dropdownHeader = $dropdownHeader.clone();


                console.log($desktopMenu);

                mobileMenu.appendTo("#mobilemenu");

                $("#mobilemenu").mmenu({
                    "offCanvas": {
                        "zposition": "front"
                    }
                });

                dropdownHeader.prependTo(".mm-panel");
			}
        },
        ex_scrollControl: function() {
			var scObj = {
				scrollControl: 0
			};

			scObj.scrollControl = $(window).scrollTop();

			return scObj;
		},
        ex_windowHeight: function() {
            var whObj = {
                windowHeight: 0
            };

            whObj.windowHeight = $(window).height();

            return whObj;
        },
		ex_windowWidth: function () {
			//Check browser scroll type
			var wwObj = {
				windowWidth: 0
			};

			wwObj.windowWidth = window.innerWidth;

			return wwObj;
		},
        ex_eventResize: function() {
			//Events call
			var that = this;
			$(window).on("resize", function(){
				//that.ex_sidebarHeight();
                that.ex_dataRowHeight();
                that.ex_sidebarHeight();
			});
		}
    };

    $(document).ready(function(){
		exampleInit.ex_initReady();
	});

	$(window).load(function() {
		exampleInit.ex_initLoad();
        $('.color-pick').colorpicker({});
	});
}(jQuery));
