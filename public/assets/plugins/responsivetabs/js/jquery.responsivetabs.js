// JavaScript Document
(function ($) {

	var resTabInit = {
		rt_initReady : function() {
			this.rt_eventResize();
			this.rt_windowWidth();
			this.rt_disableHideDropdown();
			this.rt_dropdownShow();
		},
		rt_initLoad : function () {
			this.rt_responsiveTab();
			this.rt_responsiveTabLoaded();
		},
		rt_responsiveTabLoaded: function() {
			var $resTaber = $('.responsive-taber');
			$resTaber.addClass('loaded');
		},
		rt_windowWidth: function () {
			//Check browser scroll type
			var wwObj = {
				windowWidth: 0
			};

			wwObj.windowWidth = window.innerWidth;

			return wwObj;
		},
		rt_dropdownShow:  function() {
			$(document).on('click touch', '.responsive-taber__arrow', function () {
				var $this = $(this),
					$thisDropDown = $this.next('.dropdown-menu');

				var ddPostion = $thisDropDown.offset().left;
				if(ddPostion < 0) {
					$thisDropDown.css({
						'right': ddPostion-15+'px'
					});
				}
			});
		},
		rt_disableHideDropdown: function() {
			$(document).on('click touch', '.responsive-taber__dropdown-item > .dropdown-toggle', function(){
				$(this).closest('.responsive-taber__dropdown').toggleClass("open",true);
			});
		},
		rt_responsiveTab: function() {
			//Call form styler
			var $resTaber = $('.responsive-taber');
			var that = this;

			if($resTaber.length) {
				var resItemWidth = 0;
				for(var i=0;i<$resTaber.length;i++) {
					var resTaberWidth = $resTaber.eq(i).outerWidth();
					var resArrow = $resTaber.eq(i).attr('data-arrow');
					var resPadding = $resTaber.eq(i).attr('data-padding');
					var resStart = $resTaber.eq(i).attr('data-start');
					var $dropdownExist = $resTaber.eq(i).find('.responsive-taber__dropdown');
					if(resStart != undefined) {
						var wwObj = that.rt_windowWidth();

						if(wwObj.windowWidth <= resStart) {
							resMagic();
						}else {
							resExist();
						}

					} else {
						resMagic();
					}

					function resExist() {
						if($dropdownExist.length) {

							$dropdownExist.find('.responsive-taber__dropdown-item').addClass('responsive-taber__item').removeClass('responsive-taber__dropdown-item');
							var dropdownItems = $dropdownExist.find('.dropdown-menu').html();
							$resTaber.eq(i).append(dropdownItems);

							$dropdownExist.remove();
							$resTaber.eq(i).find('.responsive-taber__arrow').remove();
						}
					}

					function resMagic() {
						resExist();

						for(var j=0;j<$resTaber.eq(i).find('.responsive-taber__item').length;j++){
							resItemWidth += $resTaber.eq(i).find('.responsive-taber__item').eq(j).outerWidth();

							if(resItemWidth > (resTaberWidth - (parseInt(resArrow) + parseInt(resPadding)))) {
								$resTaber.eq(i).find('.responsive-taber__item').eq(j).addClass('responsive-taber__dropdown-item');
							}

						}

						$resTaber.eq(i).find('.responsive-taber__dropdown-item').removeClass('responsive-taber__item').wrapAll('<div class="responsive-taber__dropdown"><div class="dropdown-menu" aria-labelledby="dropdownMenu'+i+'"></div></div>');
						$resTaber.eq(i).find('.responsive-taber__dropdown-item').closest('.responsive-taber').addClass('modify');

						if($resTaber.eq(i).is('.modify')) {
							var $resArrow = $resTaber.eq(i).find('responsive-taber__arrow');

							if(!$resArrow.length) {
								$resTaber.eq(i).find('.responsive-taber__dropdown').prepend('<div class="responsive-taber__arrow" id="dropdownMenu'+i+'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a style="width: '+resArrow+'px" href="#">arrow</a></div>');
							}
						}
					}
				}
			}
		},
        rt_eventResize: function() {
			//Events call
			var that = this;
			$(window).on("resize", function(){
				that.rt_responsiveTab();
			});
		},

	}

	$(document).ready(function(){
		resTabInit.rt_initReady();
	});

	$(window).load(function() {
		resTabInit.rt_initLoad();
	});
}(jQuery));
