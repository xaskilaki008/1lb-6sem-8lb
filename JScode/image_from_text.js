var menuItems = document.querySelectorAll('nav li > a');

menuItems.forEach(function (item) {
  if (!item.getAttribute('href').includes('interests.html')) {
    item.addEventListener('mouseover', handle);
    item.addEventListener('mouseout', handle);
  }
});

function handle(event) {
  if (event.type === 'mouseover') {
      // Получаем ссылку на изображение из атрибута данных блока
      let imageSrc = event.target.dataset.imageSrc;
      event.target.temp = event.target.innerText;

      // Проверяем, есть ли ссылка на изображение
      if (imageSrc) {
          // Создаем элемент изображения
          let image = document.createElement('img');

          // Устанавливаем атрибуты изображения
          image.src = imageSrc;
          image.alt = 'Описание изображения';

          // Заменяем содержимое блока изображением
          event.target.innerHTML = '';
          event.target.appendChild(image);
      }
  }

  if (event.type === 'mouseout') {
      // Возвращаем оригинальный текст
      event.target.innerText = event.target.temp;
  }
}