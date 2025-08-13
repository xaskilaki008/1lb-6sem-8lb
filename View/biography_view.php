<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Персональная страничка </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JScode/date_viewer.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1; /* основная часть растягивается */
        }

        footer {
            background-color: #1e3a8a;
            color: #fff;
            text-align: center;
            padding: 15px 0;
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
            font-family: DejaVu Sans Mono;
        }

        .head_nav ul li {
            margin: 0 12px;
            font: bold 3em/2em Arial, sans-serif;
            font-size: 16px;
             overflow: hidden; /* обрезает текст */
            text-overflow: ellipsis; /* добавляет "..." если текст обрезан (работает с white-space: nowrap) */
            white-space: nowrap;
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

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 0px 10px 10px 80px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
        }

        .biography p {
            margin-bottom: 16px;
        }

        #clock {
            color: #ffffff;
            margin-left: auto;
            padding-right: 20px;
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
                <li><a href="../interests" class="dropdown-toggle">Интересы</a></li>
                <li><a href="../education">Учёба</a></li>
                <li><a href="../photo">Фотоальбом</a></li>
                <li><a href="../contact">Контакт</a></li>
                <li><a href="../test">Тест</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="biography">               
            <h1>АВТОБИОГРАФИЯ</h1>
            <p>Я <?php echo $biography->getName(); ?> а вот год рождегния это - <?php echo $biography->getBirthdate(); ?>, но место так и быть скажу - <?php echo $biography->getBirthplace(); ?>.</p>
            <p>С рождения я увлекался программированием, когда папа купил ноутбук я поставил на него Shadow Fight в играх ВКонтакте и был очень счастлив.</p>
            <p>Я с ранних лет очень любил люстры и не упускал возможностей сфотографироваться с невероятными творениями людей.</p>
            <p>В 2022 году поступил и учился в <?php echo $biography->getEducation(); ?>.</p> 
            <p>Семейное положение — <?php echo $biography->getFamilyStatus(); ?>.</p>
            <p>Я всегда немного был заинтересован историей великих людей, меня волновало не то что они сделали, а как добились своих высот, как они сделали то что не удавалось другим?</p>
            <p>Что ими двигало когда все были против них? Отличный пример дедушка Ленин, который перевернул страну с головы на ноги!</p>
            <p>Мобильные телефоны: <?php echo $biography->getContact(); ?></p>
        </div>
    </main>
    
</div>
    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>
</body>
</html>
