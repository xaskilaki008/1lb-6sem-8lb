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
            alert('Пожалуйста, заполните все поля формы.');
            
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

function tochecktest(formId) {
    document.getElementById(formId).addEventListener('submit', function (event) {
 
        var q2Input = document.getElementById('question2');
        var q3Input = document.getElementById('question3');

        var nameInput = document.getElementById('name');
        var groupInput = document.getElementById('group');

        if (!isAnyCheckboxSelected() || !q2Input.value || !q3Input.value || !nameInput.value || !groupInput.value) {
            event.preventDefault();

            alert('ЗАПОЛНИТЕ ВСЕ ПОЛЯ!');

            if (!q2Input.value) {
                s
                q2Input.focus();
            } else if (!q3Input.value) {
                q3Input.focus();
            } else if (!nameInput.value) {
                nameInput.focus();
            } else {
                groupInput.focus();
            }
        }

        if (!validateName(nameInput.value)) {
            event.preventDefault();
            alert('ФИО должно быть в формате "Фамилия Имя Отчество".');
            nameInput.focus();
            return;
        }

        if (!checkCheckboxCount('question1')) {
            event.preventDefault();
            alert("ВЫБЕРИТЕ В ПЕРВОМ ЗАПРОСЕ БОЛЕЕ ТРЁХ ПУНКТОВ, ПОЖАЛУЙСТА!");
            q1Input.focus();
            return;
        }
    });
}

function isAnyCheckboxSelected() {
    var checkboxes = document.getElementsByName("question1");

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            return true; // Возвращаем true, если найден выбранный чекбокс
        }
    }

    return false; // Возвращаем false, если ни один чекбокс не выбран
}

function validateName(name) {
    var namePattern = /^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/;
    return namePattern.test(name);
}

function validatePhone(phone) {
    var phonePattern = /^(\+7|\+3)\d{9,11}$/;
    return phonePattern.test(phone);
}

function checkCheckboxCount(checkboxName) {
    var checkboxCount = 0;

    // Перебираем все элементы checkbox с указанным именем
    var checkboxes = document.getElementsByName(checkboxName);
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxCount++;
        }
    }

    return checkboxCount < 3;
}