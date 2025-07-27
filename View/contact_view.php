<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контакт</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/JScode/date_viewer.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        header, footer {
            background-color: rgb(61, 85, 151); /* яркий синий */
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        .head_nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
            font-family: DejaVu Sans Mono;
        }

        .head_nav ul li {
            margin: 0 12px;
            font-size: 16px;
        }

        .head_nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .head_nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
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

        main {
            flex: 1;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
        }

        .error {
            color: red;
            font-size: 0.8em;
        }

        .input-error {
            border-color: red;
        }

        .question {
            margin-bottom: 20px;
        }

        .question input,
        .question textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"], .openModalButton {
            background-color: #1e3a8a;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="submit"]:hover, .openModalButton:hover {
            background-color: #3b5998;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 6px;
            max-width: 400px;
            margin: 100px auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            text-align: center;
        }

        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 10;
        }

        .modal {
            z-index: 11;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
        }

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
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="head_nav">
            <ul>
                <li class="sitename">Персональный сайт</li>
                <li><a href="../index">Главная</a></li>
                <li><a href="../biography">Обо мне</a></li>
                <li><a href="../interests">Интересы</a></li>
                <li><a href="../education">Учёба</a></li>
                <li><a href="../photo">Фотоальбом</a></li>
                <li><a href="../test">Тест</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Контакт</h1>
        <div class="main_content">
            <form id="contactForm" method="post" action="" class="test">
                <p>Здесь вы можете связаться со мной! <br></p>

                <div class="question">
                    <label for="fullName">Введите своё ФИО: </label><br>
                    <input type="text" 
                           id="fullName" 
                           name="fullName" 
                           class="<?= !empty($errors['fullName']) ? 'input-error' : '' ?>" 
                           value="<?= htmlspecialchars($_POST['fullName'] ?? '') ?>">
                    <?php if (!empty($errors['fullName'])): ?>
                        <span class="error"><?= implode(', ', $errors['fullName']) ?></span>
                    <?php endif; ?><br>
                </div>

                <div class="question">
                    <label for="phone">Телефон: </label><br>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           class="<?= !empty($errors['phone']) ? 'input-error' : '' ?>" 
                           value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                    <?php if (!empty($errors['phone'])): ?>
                        <span class="error"><?= implode(', ', $errors['phone']) ?></span>
                    <?php endif; ?><br>
                </div>

                <div class="question">
                    <label for="birthday">Дата рождения: </label><br>
                    <input type="date" 
                           id="birthday" 
                           name="birthday" 
                           class="<?= !empty($errors['birthday']) ? 'input-error' : '' ?>" 
                           value="<?= htmlspecialchars($_POST['birthday'] ?? '') ?>">
                    <?php if (!empty($errors['birthday'])): ?>
                        <span class="error"><?= implode(', ', $errors['birthday']) ?></span>
                    <?php endif; ?><br>
                </div>
                
                <div class="question">
                    <label for="gender">Ваш гендер: </label><br>
                    <input type="radio" name="gender" value="male" <?= (($_POST['gender'] ?? '') === 'male') ? 'checked' : '' ?>> Мужской
                    <input type="radio" name="gender" value="female" <?= (($_POST['gender'] ?? '') === 'female') ? 'checked' : '' ?>> Женский
                    <br>
                    <?php if (!empty($errors['gender'])): ?>
                        <span class="error"><?= implode(', ', $errors['gender']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="question">
                    <label for="email">Email: </label><br>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="<?= !empty($errors['email']) ? 'input-error' : '' ?>" 
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <?php if (!empty($errors['email'])): ?>
                        <span class="error"><?= implode(', ', $errors['email']) ?></span>
                    <?php endif; ?><br>
                </div>

                <div class="question">
                    <label for="message">Введите сообщение: </label><br>
                    <textarea id="message" 
                              name="message" 
                              rows="7" 
                              cols="50" 
                              class="<?= !empty($errors['message']) ? 'input-error' : '' ?>"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    <?php if (!empty($errors['message'])): ?>
                        <span class="error"><?= implode(', ', $errors['message']) ?></span>
                    <?php endif; ?>
                </div>

                <input type="submit" value="Отправить" id="submit">
                <input type="button" value="Очистить форму" id="openModalButton" class="openModalButton">
            </form>

            <div id="modal" class="modal" style="display:none;">
                <div class="modal-content">
                    <span id="text-from-modal">Действительно очистить форму? <br><br></span>
                    <button id="clearForm">Очистить форму</button>
                    <button id="closeModal">Отменить</button>
                </div>
            </div>
            <div id="overlay" class="overlay" style="display:none;"></div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>
    <script>
        $(document).ready(function() {
            $('#openModalButton').click(function() {
                $('#modal').show();
                $('#overlay').show();
            });

            $('#closeModal').click(function() {
                $('#modal').hide();
                $('#overlay').hide();
            });

            $('#clearForm').click(function() {
                $('#contactForm')[0].reset();
                $('.error').remove();
                $('#modal').hide();
                $('#overlay').hide();
            });
        });
    </script>
</body>
</html>
