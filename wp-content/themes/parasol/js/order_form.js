$(function () {
  var order_form_popup = $('.popup-order-form');
  var steps = $('.form-content');
  var step1 = $(order_form_popup).find('.form-content#step-1');
  var step2 = $(order_form_popup).find('.form-content#step-2');
  var step3 = $(order_form_popup).find('.form-content#step-3');
  var arr_steps = $(order_form_popup).find('.head-block a.steps');
  var arr_step1 = $(order_form_popup).find('.head-block a.step-1');
  var arr_step2 = $(order_form_popup).find('.head-block a.step-2');
  var arr_step3 = $(order_form_popup).find('.head-block a.step-3');
  var prev_activ_step = $(order_form_popup).find('.head-block a.step-1');
  var order_form = function (event) {
    event.preventDefault();
    $(order_form_popup).fadeIn(300);
  };
  var steps_nav = function (event) {
    event.preventDefault();
    var form_data = {
        delivery: $('input[name=delivery]:checked').val(),
        username: $('#username').val(),
        surname: $('#surname').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        city: $('#city').val(),
        street: $('#street').val(),
        house: $('#house').val(),
        flat: $('#flat').val(),
        quantity: $('#quantity input').val(),
        payment: $('#payment input').val()
      };
    prev_activ_step = $('.head-block').find('a.active');
    // Проверка полей на 1 шаге
    if (prev_activ_step.hasClass('step-1')) {
      is_err = validate_step1();
      if (is_err) {
        return;
      }
    }
    // Проверка полей на 2 шаге
    if (prev_activ_step.hasClass('step-2')) {
      is_err = validate_step2();
      if (is_err) {
        return;
      }
    }
    $(arr_steps).removeClass('active');
    $(steps).fadeOut(0);
    if ($(this).hasClass('step-1')) {
      $(step1).fadeIn(300);
      $(arr_step1).addClass('active');
    }
    if ($(this).hasClass('step-2')) {
      $(step2).fadeIn(300);
      $(arr_step2).addClass('active');
    }
    if ($(this).hasClass('step-3') || $(this).hasClass('submit')) {
      $(step3).fadeIn(300);
      $(arr_step3).addClass('active');
      var sum = $('input[name=quantity]').val() * 200;
      $('.summa').html('<strong>\u0421\u0443\u043c\u043c\u0430:</strong> ' + sum + ' \u0433\u0440\u043d');
    }
    if ($(this).hasClass('submit')) {
      is_err_1 = validate_step1();
      is_err_2 = validate_step2();
      is_err_3 = validate_step3();
      if (is_err_1) {
        alert('\u041e\u0448\u0438\u0431\u043a\u0430 \u0432\u0432\u043e\u0434\u0430 \u043d\u0430 \u043f\u0435\u0440\u0432\u043e\u043c \u0448\u0430\u0433\u0435: ' + is_err_1);
      }
      if (is_err_2) {
        alert('\u041e\u0448\u0438\u0431\u043a\u0430 \u0432\u0432\u043e\u0434\u0430 \u043d\u0430 \u0432\u0442\u043e\u0440\u043e\u043c \u0448\u0430\u0433\u0435');
      }
      if (is_err_3) {
        alert('\u041e\u0448\u0438\u0431\u043a\u0430 \u0432\u0432\u043e\u0434\u0430 \u043d\u0430 \u0442\u0440\u0435\u0442\u044c\u0435\u043c \u0448\u0430\u0433\u0435: ' + is_err_3);
      }
      if (!is_err_1 && !is_err_2 & !is_err_3) {
        // alert( location.hostname);
        var script = '/wp-content/themes/parasol/ajax_send_order.php';
        $.post(script, form_data, onAjaxSuccess);
      }
    }
    function onAjaxSuccess(data) {
      // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
      alert(data);
      $(order_form_popup).fadeOut(300);
    }
    function validate_step2() {
      var regsObj = {
          EMAIL: /^[a-z0-9](?:[a-z0-9_\.-]*[a-z0-9])*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])*\.)+[a-z]{2,4}$/i,
          TEL: /^[0-9 \,\;\-\+\(\)\[\]]+$/i,
          EN_RU: /^[a-zA-Zа-яА-ЯёЁ _-]+$/i,
          EN_RU_D: /^[a-zA-Zа-яА-ЯёЁ0-9 _-]+$/i
        };
      var is_err = false;
      $('#step-2 span.err').hide();
      if (!regsObj.EN_RU.test(form_data.username)) {
        $('label[for=username] span.err').show();
        is_err = true;
      }
      if (!regsObj.EN_RU.test(form_data.surname)) {
        $('label[for=surname] span.err').show();
        is_err = true;
      }
      if (!regsObj.EMAIL.test(form_data.email)) {
        $('label[for=email] span.err').show();
        is_err = true;
      }
      if (!regsObj.TEL.test(form_data.phone)) {
        $('label[for=phone] span.err').show();
        is_err = true;
      }
      if (!regsObj.EN_RU.test(form_data.city)) {
        $('label[for=city] span.err').show();
        is_err = true;
      }
      if (!regsObj.EN_RU.test(form_data.street)) {
        $('label[for=street] span.err').show();
        is_err = true;
      }
      if (!regsObj.EN_RU_D.test(form_data.house)) {
        $('label[for=house] span.err').show();
        is_err = true;
      }
      if (!regsObj.EN_RU_D.test(form_data.flat)) {
        $('label[for=flat] span.err').show();
        is_err = true;
      }
      return is_err;
    }
    function validate_step1() {
      var is_err = false;
      $('#step-1 span.err').hide();
      if (!form_data.delivery) {
        is_err = '\u041d\u0435 \u0432\u044b\u0431\u0440\u0430\u043d\u0430 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0430';
        $('#step-1 span.err').show();
      }
      return is_err;
    }
    function validate_step3() {
      var is_err = false;
      if (!form_data.quantity) {
        is_err = '\u041d\u0435 \u0432\u044b\u0431\u0440\u0430\u043d\u043e \u043a\u043e\u043b\u0438\u0447\u0435\u0441\u0442\u0432\u043e. ';
      }
      if (!form_data.payment) {
        is_err += '\u041d\u0435 \u0432\u044b\u0431\u0440\u0430\u043d \u0441\u043f\u043e\u0441\u043e\u0431 \u043e\u043f\u043b\u0430\u0442\u044b.';
      }
      return is_err;
    }
  };
  var get_sum = function (event) {
    event.preventDefault();
    var sum = $(this).text() * 200;
    $('.summa').html('<strong>\u0421\u0443\u043c\u043c\u0430:</strong> ' + sum + ' \u0433\u0440\u043d');
  };
  /*
  */
  $(document).ready(function () {
  }).on('click', 'a.buy-card', order_form).on('click', '.popup-order-form .control .x-close', function (event) {
    event.preventDefault();
    $(order_form_popup).fadeOut(300);
  }).on('click', 'a.steps', steps_nav).on('mouseup', '.drop-down#quantity ul li', get_sum);
});