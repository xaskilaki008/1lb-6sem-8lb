
const form = document.getElementById('contactForm');
const submitButton = document.getElementById('submit');

submitButton.disabled = true;

// Функция для проверки заполненности значения поля
function validateRequiredField(field) {
    return field.value.trim() !== "";
  }
  
  // Функция для проверки корректности заполнения поля имени
  function validateName(name) {
    var namePattern = /^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/;
    return namePattern.test(name);
  }
  
  // Функция для проверки корректности заполнения поля телефона
  function validatePhone(phone) {
    var phonePattern = /^(\+7|\+3)\d{9,11}$/;
    return phonePattern.test(phone);
  }

  // Функция для скрытия сообщения об ошибке
  function hideError(errorElement) {
    errorElement.style.display = "none";
  }
  
  // Функция для отображения сообщения об ошибке
  function showError(errorElement, errorMessage) {
    errorElement.textContent = errorMessage;
    errorElement.style.display = "block";
    errorElement.style.color = "red";
  }
  
  // Функция для проверки корректности заполнения поля при потере фокуса
  function validateField(field) {
    var errorElement = document.getElementById(field.id + "-error");
  
    if (!validateRequiredField(field)) {
      field.classList.remove("valid-input");
      field.classList.add("error-input");
      showError(errorElement, "Пожалуйста, заполните это поле.");
    } 
    else if (field.id === "fullName" && !validateName(field.value)) {
      field.classList.remove("valid-input");
      field.classList.add("error-input");
      showError(errorElement, "Пожалуйста, введите полное имя в формате: Фамилия Имя Отчество.");
    } 
    else if (field.id === "phone" && !validatePhone(field.value)) {
      field.classList.remove("valid-input");
      field.classList.add("error-input");
      showError(errorElement, "Пожалуйста, введите корректный номер телефона.");
    } 
    else {
      field.classList.remove("error-input");
      field.classList.add("valid-input");
      hideError(errorElement);
    }
  
    updateSubmitButtonState();
  }
  
  // Функция для проверки корректности заполнения всей формы
  function validateForm() {
    var fullNameInput = document.getElementById("fullName");
    var birthdayInput = document.getElementById("birthday");
    var emailInput = document.getElementById("email");
    var phoneInput = document.getElementById("phone");
    var messageInput = document.getElementById("message");
    var genderInput = document.querySelector('input[name="gender"]:checked');
    var ageSelect = document.getElementById("age");
  
    var isFullNameValid = validateRequiredField(fullNameInput) && validateName(fullNameInput.value);
    var isBirthdayValid = validateRequiredField(birthdayInput);
    var isEmailValid = validateRequiredField(emailInput);
    var isPhoneValid = validateRequiredField(phoneInput) && validatePhone(phoneInput.value);
    var isMessageValid = validateRequiredField(messageInput);
    var isGenderValid = genderInput !== null;
    var isAgeValid = validateRequiredField(ageSelect);

  
    if (isFullNameValid && isBirthdayValid && isEmailValid && isPhoneValid && isMessageValid && isGenderValid && isAgeValid) {
      submitButton.disabled = false;
    } else {
      submitButton.disabled = true;
    }
  }
  
  // Функция для обновления состояния кнопки "Отправить"
  function updateSubmitButtonState() {
    validateForm();
  }
  
  // Добавляем обработчики событий для полей формы
  document.getElementById("fullName").addEventListener("blur", function () {
    validateField(this);
  });

  document.getElementById("birthday").addEventListener("blur", function () {
    validateField(this);
  });
  
  document.getElementById("email").addEventListener("blur", function () {
    validateField(this);
  });
  
  document.getElementById("phone").addEventListener("blur", function () {
    validateField(this);
  });
  
  document.getElementById("message").addEventListener("blur", function () {
    validateField(this);
  });
  
  document.querySelectorAll('input[name="gender"]').forEach(function (radio) {
    radio.addEventListener("change", function () {
      validateField(this);
    });
  });
  
  document.getElementById("age").addEventListener("change", function () {
    validateField(this);
  });

  document.getElementById("age").addEventListener("blur", function () {
    validateField(this);
  });