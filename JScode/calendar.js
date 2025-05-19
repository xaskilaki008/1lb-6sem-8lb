// Функция для настройки календаря
function setupCalendar() {
  // Выбираем элемент ввода даты
  const $dateInput = document.querySelector("#birthday");
  let $monthSelect;
  let $yearSelect;

  // Массив месяцев
  const months = [
    "Январь",
    "Февраль",
    "Март",
    "Апрель",
    "Май",
    "Июнь",
    "Июль",
    "Август",
    "Сентябрь",
    "Октябрь",
    "Ноябрь",
    "Декабрь",
  ];

  // Функция для получения количества дней в месяце
  function getDaysInMonth(inputDate) {
    const date = new Date(inputDate);
    date.setMonth(date.getMonth() + 1);
    date.setDate(0);
    return date.getDate();
  }

  // Функция для получения дня недели первого дня месяца
  function getFirstDay(inputDate) {
    const date = new Date(inputDate);
    date.setDate(1);
    return date.getDay();
  }

  // Функция для получения "пустых" дат в начале месяца
  function getFreeDates(inputDate) {
    let res = "";
    for (let i = 0; i < getFirstDay(inputDate); i++) {
      res += `<div class="calendar_date calendar_date-empty"></div>`;
    }
    return res;
  }

  // Функция для получения всех дат месяца
  function getDates(month, year) {
    const date = new Date();
    date.setMonth(month);
    date.setFullYear(year);
    console.log(date);
    const free = getFreeDates(date);
    let remain = "";
    for (let i = 1; i < getDaysInMonth(date) + 1; i++) {
      remain += `<div class="calendar_date">${i}</div>`;
    }
    return free + remain;
  }

  // Функция для получения списка месяцев
  function getMonths() {
    return `${months.map((item) => {
      return `<option>${item}</option>`;
    })}`;
  }

  // Создаем элемент календаря и добавляем его на страницу
  const $calendar = document.createElement("div");
  document.body.appendChild($calendar);
  $calendar.className = "calendar";

  // Заполняем календарь содержимым
  $calendar.innerHTML = `
        <main_content class="calendar_head">
            <select id="month-select">
                ${getMonths()}
            </select >
            <input id="year-select"/>
        </main_content>
        <div class="calendar_body">
            <div class="calendar_days">
                <div class="calendar_day">Пн</div>
                <div class="calendar_day">Вт</div>
                <div class="calendar_day">Ср</div>
                <div class="calendar_day">Чт</div>
                <div class="calendar_day">Пт</div>
                <div class="calendar_day">Сб</div>
                <div class="calendar_day">Вс</div>
            </div> 
            <div class="calendar_dates">
                ${getDates(new Date().getMonth(), new Date().getFullYear())}
            </div> 
        </div>
    `;

  // Выбираем элементы календаря
  $dates = $calendar.querySelector(".calendar_dates");
  $monthSelect = $calendar.querySelector("#month-select");
  $yearSelect = $calendar.querySelector("#year-select");

  // Функция для обновления дат в календаре
  const renderDates = (month, year) => {
    $dates.innerHTML = `
            ${getDates(month, year)}
        `;
  };

  // Обработчик событий для обновления дат при изменении месяца или года
  const handleSelect = (Element) => {
    const month = months.indexOf($monthSelect.value);
    const year = $yearSelect.value;
    renderDates(month, year);
  };

  // Функция для сброса выбора месяца и года
  const resetSelects = () => {
    const date = new Date();
    const month = months[date.getMonth()];
    const year = date.getFullYear();
    $yearSelect.value = year;
    $monthSelect.value = month;
    handleSelect();
  };

  // Обработчик событий для показа календаря
  $dateInput.addEventListener("focus", (Element) => {
    $calendar.classList.add("calendar-active");
    const MARGIN = 10;
    const inputHeight = Element.target.getBoundingClientRect().height;
    const x = Element.target.offsetLeft;
    const y = Element.target.offsetTop + inputHeight + MARGIN;
    $calendar.style.left = x + "px";
    $calendar.style.top = y + "px";
  });

  // Функция для закрытия календаря
  const close = () => {
    $calendar.classList.remove("calendar-active");
  };

  // Обработчик событий для закрытия календаря
  const handleBlur = (Element) => {
    if (clickedSelect) {
      clickedSelect = false;
      return;
    }
    close();
    clickedSelect = false;
  };

  // Обработчик событий для закрытия календаря при клике вне его
  const handleClickDocument = (Element) => {
    if (
      Element.target === $dateInput ||
      Element.target === $calendar ||
      $calendar.contains(Element.target)
    ) {
      return;
    }
    close();
  };

  // Функция для установки значения поля ввода даты
  const setValue = (date) => {
    const month = months.indexOf($monthSelect.value) + 1;
    const year = $yearSelect.value;
    $dateInput.value = `${date < 10 ? `0${date}` : date}.${month < 10 ? `0${month}` : month
      }.${year}`;
  };

  // Добавляем обработчик событий для закрытия календаря при клике вне его
  document.addEventListener("mousedown", handleClickDocument);

  // Добавляем обработчик событий для закрытия календаря, когда поле ввода теряет фокус
  $dateInput.addEventListener("blur", handleBlur);

  // Добавляем обработчики событий для обновления дат при изменении месяца или года
  $monthSelect.addEventListener("change", handleSelect);
  $yearSelect.addEventListener("change", handleSelect);

  // Флаг для отслеживания, был ли клик по выбору месяца или года
  let clickedSelect = false;

  // Добавляем обработчик событий для календаря
  $calendar.addEventListener("mousedown", (Element) => {
    // Если клик был по выбору месяца или года, устанавливаем флаг clickedSelect в true
    if (Element.target === $yearSelect || Element.target === $monthSelect) {
      clickedSelect = true;
    } else {
      // Иначе предотвращаем стандартное поведение события
      Element.preventDefault();
    }
    // Если клик был по дате (не пустой), устанавливаем выбранную дату в поле ввода,
    // убираем фокус с поля ввода и закрываем календарь
    if (Element.target.classList.contains("calendar_date") && !Element.target.classList.contains("calendar_date--empty")) {
      setValue(Element.target.textContent);
      $dateInput.blur();
      close();
      return;
    }
    // Предотвращаем всплытие события
    Element.stopPropagation();
  });

  // Сбрасываем выбор месяца и года
  resetSelects();

  // Возвращаем календарь
  return $calendar;
}

// Создаем и настраиваем календарь
const $calendar = setupCalendar();
