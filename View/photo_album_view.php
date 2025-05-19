<?php
// View/photo_album_view.php
include_once '../mysite/Model/Photo.php';

$photos = Photo::PHOTOS;
$titles = Photo::TITLES;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фотоальбом - Персональная страничка</title>
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
            background-color:rgb(61, 85, 151);
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
            color: #facc15;
            margin-right: auto;
            padding-left: 20px;
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

        .photo-album {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* фиксированное количество колонок */
            gap: 20px;
            margin-top: 20px;
        }


        .cell {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cell:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .cell div {
            padding: 12px;
            text-align: center;
            color: #444;
            font-size: 14px;
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
                margin: 6px 0;
            }

            main {
                margin: 20px;
                padding: 15px;
            }

            .photo-album {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .photo {
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
                <li><a href="../education">Учёба</a></li>
                <li><a href="../contact">Контакт</a></li>
                <li><a href="../test">Тест</a></li>
                <li id="clock"></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Фотоальбом</h1>
        <div id="photo-album" class="photo-album">
            <?php foreach ($photos as $index => $photo): ?>
                <div class="cell">
                    <img class="photo" src="<?= $photo ?>" title="<?= $titles[$index] ?>" alt="<?= $titles[$index] ?>" />
                    <div><?= $titles[$index] ?></div>
                </div>  
            <?php endforeach; ?>
        </div>
    </main>
    <script src="../JScode/photo_album.js"></script>
    <footer>
        <p>&copy; 2025 Моя Персональная Страница</p>
    </footer>
</body>
</html>