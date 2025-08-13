<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Тест по дисциплине</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="JScode/formreq.js"></script>
    <script src="JScode/date_viewer.js"></script>
    <script src="JScode/history.js"></script>
    <style>
        /* Общие стили для тела и шрифтов */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Контейнер контента */
        main {
            flex: 1;
            min-width: 800px;
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        /* Хедер и футер */
        header, footer {
            background-color: rgb(61, 85, 151);
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        /* Навигация */
        .head_nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .head_nav ul li {
            margin: 0 12px;
            font: bold 3em/2em Arial, sans-serif;
            font-size: 16px;
             overflow: hidden; /* обрезает текст */
            text-overflow: ellipsis; /* добавляет "..." если текст обрезан (работает с white-space: nowrap) */
            white-space: nowrap;
            position: relative;
        }

        .head_nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .head_nav ul li a:hover,
        .head_nav ul li a:focus {
            background-color: rgba(255,255,255,0.2);
        }

        .sitename {
            font-weight: bold;
            margin-right: auto;
            padding-left: 24px;
            color:rgb(170, 149, 120); /* яркий желтый акцент */
        }

        #clock {
            color: #ffffff;
            margin-left: auto;
            padding-right: 20px;
        }

        /* Дропдаун */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1e3a8a;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            border-radius: 4px;
            top: 100%;
            left: 0;
            z-index: 10;
        }

        .dropdown-content li {
            margin: 0;
        }

        .dropdown-content li a {
            padding: 10px 15px;
            display: block;
        }

        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            display: block;
        }

        /* Заголовки */
        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* Форма */
        form {
            max-width: 700px;
            margin: 0 auto;
        }

        form p {
            margin-bottom: 20px;
        }

        input[type="text"], select, textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #1e3a8a;
            outline: none;
        }

        textarea {
            resize: vertical;
        }

        /* Радио кнопки */
        input[type="radio"] {
            margin-right: 8px;
            vertical-align: middle;
        }

        label {
            font-size: 14px;
            vertical-align: middle;
            cursor: pointer;
        }

        /* Ошибки */
        .error {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }

        /* Кнопки */
        button {
            background-color: #1e3a8a;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        button:hover, button:focus {
            background-color: #153270;
            outline: none;
        }

        /* Уведомление */
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px 25px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            font-weight: 600;
        }

        .notification button {
            margin-left: 20px;
            background-color: transparent;
            color: #3c763d;
            border: none;
            font-weight: 700;
            cursor: pointer;
            font-size: 16px;
            vertical-align: middle;
            padding: 0;
        }

        /* Адаптив */
        @media (max-width: 768px) {
            .head_nav ul {
                flex-direction: column;
                align-items: center;
            }
            .head_nav ul li {
                margin: 6px 0;
            }
            main {
                margin: 20px;
                padding: 15px;
            }
            form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="head_nav" role="navigation" aria-label="Главное меню">
            <ul>
                <li class="sitename">Персональный сайт
                <li><a href="../index">Главная</a>
                <li><a href="../biography">Обо мне</a>
                <li><a href="../interests">Интересы</a>
                <li><a href="../education">Учёба</a>
                <li><a href="../photo">Фотоальбом</a>
                <li><a href="../contact">Контакт</a>
                <li><a href="../test">Тест</a>
                <li id="clock">
            </ul>
        </nav>
    </header>
    <main>
        <h1>Тест по дисциплине</h1>
        <h2>Физика</h2>

        <?php if (!empty($successMessage)): ?>
            <div class="notification" role="alert">
                <?php echo htmlspecialchars($successMessage); ?>
                <button id="close-notification" aria-label="Закрыть уведомление">×</button>
            </div>
        <?php endif; ?>

        <form id="test" method="post" action="">
            <p>
                Введите своё ФИО:<br />
                <input type="text" id="name" name="name" required />
                <?php if (!empty($errors['name'])): ?>
                    <?php foreach ($errors['name'] as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <p>
                Выберите свою группу:<br />
                <select name="group" id="group" required>
                    <optgroup label="1 курс">
                        <option value="IT221">ИТ/б-22-1-о</option>
                        <option value="IT222">ИТ/б-22-2-о</option>
                        <option value="IT223">ИТ/б-22-3-о</option>
                        <option value="IT224">ИТ/б-22-4-о</option>
                        <option value="IT225">ИТ/б-22-5-о</option>
                        <option value="IT226">ИТ/б-22-6-о</option>
                    </optgroup>
                    <optgroup label="2 курс">
                        <option value="IT221">ИТ/б-22-1-о</option>
                        <option value="IT222">ИТ/б-22-2-о</option>
                        <option value="IT223">ИТ/б-22-3-о</option>
                        <option value="IT224">ИТ/б-22-4-о</option>
                        <option value="IT225">ИТ/б-22-5-о</option>
                        <option value="IT226">ИТ/б-22-6-о</option>
                    </optgroup>
                </select>
                <?php if (!empty($errors['group'])): ?>
                    <?php foreach ($errors['group'] as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <p>
                Вопрос 1: Объясните принцип работы солнечных батарей с точки зрения физики.<br />
                <textarea id="question1" name="question1" rows="4" placeholder="Ваш ответ..."></textarea>
                <?php if (!empty($errors['question1'])): ?>
                    <?php foreach ($errors['question1'] as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <p>
                Вопрос 2: Какое из следующих явлений связано с фотоэффектом?<br />
                <input type="radio" id="option1" name="question2" value="option1" />
                <label for="option1">Выбивание электронов светом</label><br />
                <input type="radio" id="option2" name="question2" value="option2" />
                <label for="option2">Тепловое расширение</label><br />
                <input type="radio" id="option3" name="question2" value="option3" />
                <label for="option3">Электромагнитная индукция</label>
                <?php if (!empty($errors['question2'])): ?>
                    <?php foreach ($errors['question2'] as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <p>
                Вопрос 3: Какой процесс лежит в основе работы лазера?<br />
                <select id="question3" name="question3" required>
                    <option value="">-- Выберите ответ --</option>
                    <option value="A">Вынужденное излучение</option>
                    <option value="B">Теплопередача</option>
                    <option value="C">Дифракция света</option>
                </select>
                <?php if (!empty($errors['question3'])): ?>
                    <?php foreach ($errors['question3'] as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <div style="text-align:center; margin-top:30px;">
                <button type="submit">Отправить</button>
                <button type="reset">Очистить форму</button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>

    <script>
        $(document).ready(function() {
            <?php if (!empty($successMessage)): ?>
                $('.notification').fadeIn().delay(3000).fadeOut();
            <?php endif; ?>

            $('#close-notification').on('click', function() {
                $('.notification').fadeOut();
            });
        });
    </script>
</body>
</html>
