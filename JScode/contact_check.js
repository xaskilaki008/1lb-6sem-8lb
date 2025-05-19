
function tocheckcontact(formId) {
    document.getElementById(formId).addEventListener('submit', function (event) {
        var nameInput = document.getElementById('name');
        var phoneInput = document.getElementById("phone");
        var ageInput = document.getElementById('age');
        var emailInput = document.getElementById('email');
        var commentInput = document.getElementById('comment');
        var contact_form = document.getElementById(formId);
        var genderInput = contact_form.elements["gender"];
        console.log(ageInput);
        console.log(ageInput.value);

        if (!nameInput.value || !phoneInput.value || !emailInput.value || !commentInput.value || !genderInput.value || !ageInput.value) {
            event.preventDefault();
            alert('Укажите полную информацию');

            if (!nameInput.value) {
                nameInput.focus();
                return;
            } else if (!phoneInput.value) {
                phoneInput.focus();
                return;
            } else if (!genderInput.value) {
                genderInput.focus();
                return;
            } else if (!ageInput.value) {
                ageInput.focus();
                return;
            } else if (!emailInput.value) {
                emailInput.focus();
                return;
            } else {
                commentInput.focus();
                return;
            }
        }
        if (!validateName(nameInput.value)) {
            event.preventDefault();
            alert('Пожалуйста, введите Фамилию Имя Отчество в формате "Фамилия Имя Отчество".');
            nameInput.classList.add('error');
            nameInput.focus();
            return;
        } else {
            nameInput.classList.remove('error');
        }

        if (!validatePhone(phoneInput.value)) {
            event.preventDefault();
            alert('Пожалуйста, введите корректный номер телефона.');
            phoneInput.classList.add('error');
            phoneInput.focus();
            return;
        } else {
            phoneInput.classList.remove('error');
        }
    });
}

function validateName(name) {
    var namePattern = /^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/;
    return namePattern.test(name);
}

function validatePhone(phone) {
    var phonePattern = /^(\+7|\+3)\d{9,11}$/;
    return phonePattern.test(phone);
}