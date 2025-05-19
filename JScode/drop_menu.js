var dropdownToggle = document.querySelector('.dropdown-toggle');
var dropdownMenu = document.querySelector('.dropdown-menu');
var dropdown = document.querySelector('.dropdown');

// Показываем выпадающее меню при наведении
dropdownToggle.addEventListener('mouseover', function() {
  dropdown.classList.add('open');
});

// Скрываем выпадающее меню при уходе курсора
dropdown.addEventListener('mouseout', function(e) {
  // Проверяем, не покидает ли курсор область пункта меню или его подменю
  if (!dropdown.contains(e.relatedTarget)) {
    dropdown.classList.remove('open');
  }
});

// Оставляем выпадающее меню открытым при щелчке на его элементах
dropdownMenu.addEventListener('click', function(e) {
  e.stopPropagation();
});
