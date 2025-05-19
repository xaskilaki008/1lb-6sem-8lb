<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Учёба - Персональная страничка</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JScode/date_viewer.js"></script>
    <script src="../JScode/history.js"></script>
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
            padding-left: 20px;
            color: #facc15;
        }

        #clock {
            color: #ffffff;
            margin-left: auto;
            padding-right: 20px;
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        h2, h3 {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #e0e7ff;
            color: #1e3a8a;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f1f5f9;
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

            table {
                font-size: 14px;
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
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Учёба</h1>
        <h2>Севастопольский Государственный университет</h2>
        <h3>Информационные системы</h3>

        <table>
            <tr>
                <th colspan="9">ПЛАН УЧЕБНОГО ПРОЦЕССА</th>
            </tr>
            <tr>
                <th rowspan="2">№</th>
                <th rowspan="2">Дисциплина</th>
                <th rowspan="2">Кафедра</th>
                <th colspan="6">Всего часов</th>
            </tr>
            <tr>
                <th>Всего</th>
                <th>Ауд</th>
                <th>Лк</th>
                <th>Лб</th>
                <th>ПР</th>
                <th>СРС</th>
            </tr>
            <?php foreach ($curriculum as $item): ?>
            <tr>
                <td><?php echo $item['number']; ?></td>
                <td><?php echo $item['discipline']; ?></td>
                <td><?php echo $item['department']; ?></td>
                <td><?php echo $item['total_hours']; ?></td>
                <td><?php echo $item['auditory_hours']; ?></td>
                <td><?php echo $item['lectures']; ?></td>
                <td><?php echo $item['labs']; ?></td>
                <td><?php echo $item['practicals']; ?></td>
                <td><?php echo $item['self_work']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>
</body>
</html>
