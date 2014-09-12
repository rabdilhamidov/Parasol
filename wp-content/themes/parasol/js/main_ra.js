$(function () {
  land_handler();
});
function land_handler() {
  // Инициализация переменных
  var slogan;
  var rules_popup = $('.rules-popup');
  var rules_ch = $('input#rules');
  $(rules_ch).prop({ 'checked': false });
  // Слайдер
  var slider = $('section#slider ul').bxSlider({
      pager: false,
      controls: false,
      onSliderLoad: function (currentIndex) {
        slogan = $('#slider').find('.slogan');
        $(slogan).animate({ top: 100 }, 200);
        // Центровка слайдов
        center_slide();
      },
      onSlideBefore: function ($slideElement) {
        $(slogan).css({ top: 485 }, 200);
      },
      onSlideAfter: function ($slideElement) {
        $(slogan).animate({ top: 100 }, 200);
      }
    });
  // центрирование изображения в слайдере
  $(window).resize(function () {
    center_slide();
  });
  // кружочки-вопросы
  circles();
  // дроп-даун
  var dropDown = function (event) {
    event.preventDefault();
    var $obj = $(this);
    var $parentObj = $obj.closest('.drop-down');
    var overlay;
    var list;
    var closeDrobdown = function () {
      if (this.nodeName === 'LI' && $(this).closest('.drop-down').length === 1) {
        $parentObj.find('input[type=text]').val($(this).text());
        $parentObj.find('input[type=hidden]').val($(this).attr('data'));
      }
      $parentObj.removeClass('open');
      $('body').off('click', '*', closeDrobdown);
      return false;
    };
    $parentObj.addClass('open');
    $('body').on('click', '*', closeDrobdown);
  };
  /*
  */
  $(document).ready(function () {
  }).on('click', '#slider .controls a', function (event) {
    event.preventDefault();
    $(this).hasClass('prev') && slider.goToPrevSlide();
    $(this).hasClass('next') && slider.goToNextSlide();
  }).on('click', '.button#rules', function (event) {
    event.preventDefault();
    $(this).before($(rules_popup));
    $(rules_popup).find('.triangle').css({ 'margin-left': 340 });
    $(rules_popup).css({ 'margin-left': -300 });
    $(rules_popup).show(300);
    baron({
      root: '.wrapper_1',
      scroller: '.scroller',
      bar: '.scroller__bar',
      barOnCls: 'baron'
    });
  }).on('click', '.rules-popup .control .x-close', function (event) {
    event.preventDefault();
    $(this).parent().parent().hide(300);
  }).on('click', '.rules label', function (event) {
    $(rules_ch).prop({ 'checked': true });
    $(this).prev().before($(rules_popup));
    $(rules_popup).find('.triangle').css({ 'margin-left': 205 });
    $(rules_popup).css({ 'margin-left': 50 });
    $(rules_popup).show(300);
    baron({
      root: '.wrapper_1',
      scroller: '.scroller',
      bar: '.scroller__bar',
      barOnCls: 'baron'
    });
  }).on('click', 'div.drop-down', dropDown).on('click', 'a.top-arr', function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 1000);
  });
  $('.run-str-1').liMarquee({ scrollamount: 100 });
  $('.run-str-2').liMarquee({ scrollamount: 50 });
}
function circles() {
  var arCircles = $('section#questions').find('ul li');
  var arColors = [
      '#afadab',
      '#c2c2c2',
      '#d9d8d6',
      '#e7e7e7'
    ];
  var speed = 500;
  arCircles.mouseover(function () {
    $(this).css({ backgroundColor: arColors[0] });
    $(this).prev().css({ backgroundColor: arColors[1] });
    $(this).next().css({ backgroundColor: arColors[1] });
    $(this).prev().prev().css({ backgroundColor: arColors[2] });
    $(this).next().next().css({ backgroundColor: arColors[2] });
  });
  arCircles.mouseleave(function () {
    $(this).css({ backgroundColor: arColors[3] });
    $(this).prev().css({ backgroundColor: arColors[3] });
    $(this).next().css({ backgroundColor: arColors[3] });
    $(this).prev().prev().css({ backgroundColor: arColors[3] });
    $(this).next().next().css({ backgroundColor: arColors[3] });
  });
}
function center_slide() {
  var slide_img = $('.slide').find('img');
  if ($(window).width() < 1920) {
    var ml = ($(window).width() - 1920) * 0.5 + 'px';
    slide_img.css({ 'margin-left': ml });
  } else {
    slide_img.css({ 'margin-left': 0 });
  }
}