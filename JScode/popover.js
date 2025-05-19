function showPopover(element, message) {
    var $popover = $('#popover');
    $popover.html(message);
    $popover.css({
        display: 'block',
        left: (element.offsetLeft + element.offsetWidth) - 5 + 'px',  // Позиция всплывающей подсказки
        top: element.offsetTop - 23 + 'px'  // Позиция всплывающей подсказки
    });
    setTimeout(hidePopover, 3000);  // Автоматическое скрытие через 5 секунд
}

function hidePopover() {
    var $popover = $("#popover");
    $popover.css({ "display": "none" });
}

$(document).ready(function() {
    // Для поля "ФИО"
    $("#fullName").mouseover(function() {
        showPopover(this, "Введите Фамилию Имя Отчество. Например: Павлов Павел Павлович" );
    });
    $("#fullName").mouseout(function() {
        hidePopover();
    });

    // Для поля "Телефон"
    $("#phone").mouseover(function() {
        showPopover(this, "Введите номер телефона. Напиример: +79781112233");
    });
    $("#phone").mouseout(function() {
        hidePopover();
    });

    // Для поля "Дата рождения"
    $("#birthday").mouseover(function() {
        showPopover(this, "Выберите свою дату рождения");
    });
    $("#birthday").mouseout(function() {
        hidePopover();
    });

    // Для поля "Возраст"
    $("#age").mouseover(function() {
        showPopover(this, "Выберите свой возраст");
    });
    $("#age").mouseout(function() {
        hidePopover();
    });

    // Для поля "Email"
    $("#email").mouseover(function() {
        showPopover(this, "Введите свою почту. Нарпример: asdf@gmail.com");
    });
    $("#email").mouseout(function() {
        hidePopover();
    });

    // Для поля "Сообщение"
    $("#message").mouseover(function() {
        showPopover(this, "Введите любое сообщение");
    });
    $("#message").mouseout(function() {
        hidePopover();
    });
});