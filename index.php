<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ледмаге | лента новостей</title>
    <link rel="stylesheet" href="data/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;family=Montserrat:wght@400;700&amp;display=swap"
          rel="stylesheet">
    <link rel="shortcut icon" href="/data/favicon.ico" type="image/x-icon">

</head>
<body>
<div class="header">
    <div class="header__inner">
        <div class="header__logo">
            <a href="index.php">Ледмаге</a>
            <img src="data/favicon.ico" alt="Лента для Марины Геннадьевны">
            <a href="index.php">Лента новостей</a>
        </div>
        <div class="header__search">
            <input type="search" placeholder="Статья c котиками, автомобилями...">
        </div>
        <div class="header__link">
            <a href="registry.php">Регистрация</a>
            <a href="authorization.php">Войти</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="container__inner">
        <div class="menu__category">
            <ul class="menu__category__inner">
                <li class="menu__category__item active">
                    <div class="menu__category__item__image">
                        <img src="data/image/lenta.png" alt="">
                    </div>
                    <div class="menu__category__item__name">
                        Лента
                    </div>
                </li>
                <hr>
                <li class="menu__category__item">
                    <div class="menu__category__item__image">
                        <img src="data/image/star.svg" alt="">
                    </div>
                    <div class="menu__category__item__name">
                        кино
                    </div>
                </li>
                <li class="menu__category__item">
                    <div class="menu__category__item__image">
                        <img src="data/image/star.svg" alt="">
                    </div>
                    <div class="menu__category__item__name">
                        путешествия
                    </div>
                </li>
                <li class="menu__category__item">
                    <div class="menu__category__item__image">
                        <img src="data/image/star.svg" alt="">
                    </div>
                    <div class="menu__category__item__name">
                        наука
                    </div>
                </li>
            </ul>

        </div>
        <div class="posts">
            <div class="posts__inner">
                <div class="posts__item item_1"></div>
                <div class="posts__item item_2"></div>
                <div class="posts__item item_1"></div>
                <div class="posts__item item_1"></div>
                <div class="posts__item item_1"></div>
                <div class="posts__item item_2"></div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="data/js/script.js"></script>
</html>
