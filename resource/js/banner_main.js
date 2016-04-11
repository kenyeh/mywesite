$(document).ready(function () {
    var $slider = $('.slider'), $slideBGs = $('.slide__bg'), diff = 0, curSlide = 0, numOfSlides = $('.slide').length - 1, animating = false, animTime = 500, autoSlideTimeout, autoSlideDelay = 6000, $pagination = $('.slider-pagi');
    function createBullets() {
        for (var i = 0; i < numOfSlides + 1; i++) {
            if (window.CP.shouldStopExecution(1)) {
                break;
            }
            var $li = $('<li class=\'slider-pagi__elem\'></li>');
            $li.addClass('slider-pagi__elem-' + i).data('page', i);
            if (!i)
                $li.addClass('ba_active');
            $pagination.append($li);
        }
        window.CP.exitedLoop(1);
    }
    ;
    createBullets();
    function manageControls() {
        $('.slider-control').removeClass('inactive');
        if (!curSlide)
            $('.slider-control.left').addClass('inactive');
        if (curSlide === numOfSlides)
            $('.slider-control.right').addClass('inactive');
    }
    ;
    function autoSlide() {
        autoSlideTimeout = setTimeout(function () {
            curSlide++;
            if (curSlide > numOfSlides)
                curSlide = 0;
            changeSlides();
        }, autoSlideDelay);
    }
    ;
    autoSlide();
    function changeSlides(instant) {
        if (!instant) {
            animating = true;
            manageControls();
            $slider.addClass('animating');
            $slider.css('top');
            $('.slide').removeClass('ba_active');
            $('.slide-' + curSlide).addClass('ba_active');
            setTimeout(function () {
                $slider.removeClass('animating');
                animating = false;
            }, animTime);
        }
        window.clearTimeout(autoSlideTimeout);
        $('.slider-pagi__elem').removeClass('ba_active');
        $('.slider-pagi__elem-' + curSlide).addClass('ba_active');
        $slider.css('transform', 'translate3d(' + -curSlide * 100 + '%,0,0)');
        $slideBGs.css('transform', 'translate3d(' + curSlide * 50 + '%,0,0)');
        diff = 0;
        autoSlide();
    }
    function navigateLeft() {
        if (animating)
            return;
        if (curSlide > 0)
            curSlide--;
        changeSlides();
    }
    function navigateRight() {
        if (animating)
            return;
        if (curSlide < numOfSlides)
            curSlide++;
        changeSlides();
    }
    $(document).on('mousedown touchstart', '.slider', function (e) {
        if (animating)
            return;
        window.clearTimeout(autoSlideTimeout);
        var startX = e.pageX || e.originalEvent.touches[0].pageX, winW = $(window).width();
        diff = 0;
        $(document).on('mousemove touchmove', function (e) {
            var x = e.pageX || e.originalEvent.touches[0].pageX;
            diff = (startX - x) / winW * 70;
            if (!curSlide && diff < 0 || curSlide === numOfSlides && diff > 0)
                diff /= 2;
            $slider.css('transform', 'translate3d(' + (-curSlide * 100 - diff) + '%,0,0)');
            $slideBGs.css('transform', 'translate3d(' + (curSlide * 50 + diff / 2) + '%,0,0)');
        });
    });
    $(document).on('mouseup touchend', function (e) {
        $(document).off('mousemove touchmove');
        if (animating)
            return;
        if (!diff) {
            changeSlides(true);
            return;
        }
        if (diff > -8 && diff < 8) {
            changeSlides();
            return;
        }
        if (diff <= -8) {
            navigateLeft();
        }
        if (diff >= 8) {
            navigateRight();
        }
    });
    $(document).on('click', '.slider-control', function () {
        if ($(this).hasClass('left')) {
            navigateLeft();
        } else {
            navigateRight();
        }
    });
    $(document).on('click', '.slider-pagi__elem', function () {
        curSlide = $(this).data('page');
        changeSlides();
    });
    
    
});
$(function(){
    banner_check();
    var window_w = $("body").width();//容器宽度
    $(window).resize(function(){
      banner_check();
    });
});

function banner_check(){
	var banner_w= $(window).width();
	var banner_h= (banner_w*9)/16;
	
	if(banner_h>=684)
	{
		banner_h=684;
	}
	
	$('#slider_container').css('height',banner_h+"px");
}