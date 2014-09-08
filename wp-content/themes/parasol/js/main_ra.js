function land_handler() {
  // Инициализация переменных
  var slogan;
  var rules_popup = $('.rules-popup');
  var order_form_popup = $('.popup-order-form');
  var rules_ch = $('input#rules');
  $(rules_ch).prop({ 'checked': false });
  // Слайдер
  var slider = $('section#slider ul').bxSlider({
      pager: false,
      controls: false,
      onSliderLoad: function (currentIndex) {
        slogan = $('#slider').find('.slogan');
        $(slogan).animate({ top: 100 }, 200);
      },
      onSlideBefore: function ($slideElement) {
        $(slogan).css({ top: 485 }, 200);
      },
      onSlideAfter: function ($slideElement) {
        $(slogan).animate({ top: 100 }, 200);
      }
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
  // форма заказа
  var order_form = function (event) {
    event.preventDefault();
    $(order_form_popup).fadeIn(300);
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
  }).on('click', 'input#rules', function (event) {
    $(rules_ch).prop({ 'checked': true });
    $(this).before($(rules_popup));
    $(rules_popup).find('.triangle').css({ 'margin-left': 205 });
    $(rules_popup).css({ 'margin-left': 50 });
    $(rules_popup).show(300);
    baron({
      root: '.wrapper_1',
      scroller: '.scroller',
      bar: '.scroller__bar',
      barOnCls: 'baron'
    });
  }).on('click', 'a#buy-card', order_form).on('click', '.popup-order-form .control .x-close', function (event) {
    event.preventDefault();
    $(order_form_popup).fadeOut(300);
  }).on('click', 'div.drop-down', dropDown).on('click', 'a.top-arr', function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 1000);
  });
}
// --
function circles() {
  var arCircles = $('section#questions').find('li');
  var arColors = [
      '#afadab',
      '#c2c2c2',
      '#d9d8d6',
      '#e7e7e7'
    ];
  var cols = 5;
  var this_i;
  var speed = 100;
  arCircles.mouseover(function () {
    this_i = $(this).index();
    $(this).animate({ backgroundColor: arColors[0] }, 0);
    $(this).prev().not('.col-5').animate({ backgroundColor: arColors[1] }, speed);
    $(this).next().not('.col-1').animate({ backgroundColor: arColors[1] }, speed);
    $(arCircles[this_i - 5]).animate({ backgroundColor: arColors[1] }, speed);
    $(arCircles[this_i + 5]).animate({ backgroundColor: arColors[1] }, speed);
    $(this).prev().prev().not('.col-4').not('.col-5').animate({ backgroundColor: arColors[2] }, speed);
    $(this).next().next().not('.col-1').not('.col-2').animate({ backgroundColor: arColors[2] }, speed);
    $(arCircles[this_i - 10]).animate({ backgroundColor: arColors[2] }, speed);
    $(arCircles[this_i + 10]).animate({ backgroundColor: arColors[2] }, speed);
  });
  arCircles.mouseleave(function () {
    $(arCircles).animate({ backgroundColor: arColors[3] }, 0);
  });
}