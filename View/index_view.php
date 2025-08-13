<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Персональная страничка</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JScode/date_viewer.js"></script>
    <script src="../JScode/history.js"></script>
    <script src="../JScode/drop_menu.js"></script>
    <style>
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

        main {
            flex: 1;
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        header, footer {
            background-color: rgb(61, 85, 151);
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
        }

        .head_nav ul li {
            margin: 0 12px;
            font-size: 16px;
            font-family: DejaVu Sans Mono;
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
        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 30px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #e0e7ff;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.15);
            min-width: 180px;
            z-index: 1;
            border-radius: 4px;
            top: 100%;
        }

        .dropdown-content li {
            margin: 0;
        }

        .dropdown-content li a {
            color: #1e3a8a;
            padding: 10px 12px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .avatar {
            position: relative;
            display: inline-block;
        }

        .avatar img {
            width: 300px;
            height: auto;
            object-fit: cover;
            border-radius: 10%;
            border: 8px solid #1e3a8a;
            transition: all 0.6s ease 0.2s;
            position: relative;
        }
        .avatar img:hover {
            border: 1px solid #A52A2A;
            border-radius: 5% 50% 50% 50%;
            transform: rotate(360deg);
            padding-left: 150px;
        }
        .avatar-text {
            position: absolute;
            left: 0%;
            top: 20%;
            opacity: 0;
            margin-left: 20px;
            white-space: nowrap;
            transition: all 0.3s ease 0.2s;
        }
        .avatar:hover .avatar-text {
            opacity: 1;
            position: absolute;
        }
        .main_content h1 {
            font-size: 28px;
            margin: 10px 0 5px;
            color: #1e3a8a;
            text-align: center;
        }

        .main_content h2 {
            font-size: 20px;
            color: #555;
            margin: 0 0 10px;
            text-align: center;
        }

        .main_content p {
            font-size: 16px;
            color: #444;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .head_nav ul {
                flex-direction: column;
                align-items: center;
            }

            .head_nav ul li {
                margin: 5px 0;
            }

            main {
                margin: 20px;
            }

            .avatar img {
                width: 150px;
                height: 150px;
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
                <li><a href="../photo">Фотоальбом</a></li>
                <li><a href="../contact">Контакт</a></li>
                <li><a href="../test">Тест</a></li>
                <li><a href="../tutctuc">Тыц</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Главная</h1>
        <div class="avatar">
            <img src="example/1.jpg" alt="Моя аватарка">
            <span class="avatar-text">Шпаков Пётр <br> студент 3 курса,<br>в будующем веб<br>не разработчик</span>
        </div>
        <div class="main_content">
            <h1><?php echo $user->getName(); ?></h1>
            <h2><?php echo $user->getGroup(); ?></h2>
            <p>Лабораторная №1</p>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>
</body>
</html>