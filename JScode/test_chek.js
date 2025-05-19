function tochecktest(formId) {
    document.getElementById(formId).addEventListener('submit', function (event) {
        var test_form = document.getElementById(formId);

        //var q1Input = test_form.elements["question1"];
        var q2Input = document.getElementById('question2');
        var q3Input = document.getElementById('question3')

        var nameInput = document.getElementById('name');
        var groupInput = document.getElementById('group');

        if (!isAnyCheckboxSelected() || !q2Input.value || !q3Input.value || !nameInput.value || !groupInput.value) {
            event.preventDefault();

            alert('Пожалуйста, заполните все поля формы.');

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
            alert('Пожалуйста, введите Фамилию Имя Отчество в формате "Фамилия Имя Отчество".');
            nameInput.focus();
            return;
        }

        if (!checkCheckboxCount('question1')) {
            event.preventDefault();
            alert("Вопрос 1!!! Вы можете выбрать менее трех флажков!");
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

