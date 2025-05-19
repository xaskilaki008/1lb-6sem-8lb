function tocheckcontact(formId) {
  var contactForm = document.getElementById(formId);

  contactForm.addEventListener('submit', function (event) {
    event.preventDefault();

    var nameInput = getInput('name');
    var phoneInput = getInput('phone');
    var ageInput = getInput('age');
    var emailInput = getInput('email');
    var commentInput = getInput('comment');
    var genderInput = contactForm.elements['gender'];

    console.log(ageInput);
    console.log(ageInput.value);

    if (!validateInput(nameInput) || !validateInput(phoneInput) || !validateInput(emailInput) || !validateInput(commentInput) || !validateInput(genderInput) || !validateInput(ageInput)) {
      return;
    }

    if (!validateName(nameInput.value)) {
      showError(nameInput, 'Пожалуйста, введите Фамилию Имя Отчество в формате "Фамилия Имя Отчество".');
      return;
    }

    if (!validatePhone(phoneInput.value)) {
      showError(phoneInput, 'Пожалуйста, введите корректный номер телефона.');
      return;
    }
  });
}

function toCheckTest(formId) {
  var testForm = document.getElementById(formId);

  testForm.addEventListener('submit', function (event) {
    event.preventDefault();

    var q2Input = document.getElementById('question2');
    var q3Input = document.getElementById('question3');
    var nameInput = document.getElementById('name');
    var groupInput = document.getElementById('group');

    if (!isAnyCheckboxSelected('question1') || !validateInput(q2Input) || !validateInput(q3Input) || !validateInput(nameInput) || !validateInput(groupInput)) {
      return;
    }

    if (!validateName(nameInput.value)) {
      showError(nameInput, 'Пожалуйста, введите Фамилию Имя Отчество в формате "Фамилия Имя Отчество".');
      return;
    }
  });
}

function isAnyCheckboxSelected(checkboxName) {
  var checkboxes = document.getElementsByName(checkboxName);
  var checkboxCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checkboxCount++;
    }
  }

  if (checkboxCount < 3) {
    showError(checkboxes[0], 'Выберите как минимум три варианта ответа.');
    return false;
  }

  return true;
}

function validateInput(input) {
  if (!input.value) {
    showError(input, 'Пожалуйста, заполните это поле.');
    return false;
  }

  return true;
}

function validateName(name) {
  var namePattern = /^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/;
  return namePattern.test(name);
}

function validatePhone(phone) {
  var phonePattern = /^(\+7|\+3)\d{9,11}$/;
  return phonePattern.test(phone);
}

function showError(input, message) {
  alert(message);
  input.classList.add('error');
  input.focus();
}
