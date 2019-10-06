//анимация заголовка
var typed = new Typed('.title', {
  strings: ["Забронируйте номер прямо сейчас", "Проведите лучший отпуск в нашем отеле"],
  typeSpeed: 60,
  loop: true,
  loopCount: Infinity,
  showCursor: false
});

//обработка формы
'use strict';
$(function() {
  $("form").submit(function (event) {
    event.preventDefault();

    const data = $(this).serializeArray();
    $.post('api/', { data }).done(function (res) {
      alert('Ваша заявка принята');
    }).fail(function () {
      alert('Произошла ошибка');
    }); 
  })
})

