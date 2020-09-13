<?php
    ob_start();
    session_start();
    require_once 'data/php/connection.php';
    $link = new mysqli($sqli_host, $sqli_user, $sqli_password, $sqli_database) or die("Ошибка " . mysqli_error($link));
    $token = $link->query("SELECT `token` FROM `users` WHERE `token` = '".$_SESSION['token']."'");
    $token = $token->fetch_assoc();
    echo "ТОКЕН: ".$token['token'];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php  ?></title>
   <link rel="stylesheet" href="data/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;family=Montserrat:wght@400;700&amp;display=swap"
          rel="stylesheet">
</head>
<body>

<?php
    require_once 'data/php/header.php';
?>
    <div class="mainPage">
<?php
    require_once 'data/php/container.php';
    //echo "Ваш токен: " . $_SESSION["token"];
?>
        <div class="userPage">
            <div class="userPage_header">
                <div class="userPage_userName">
                    <h1>UserName</h1>
                </div>
                <div class="userPage_profileSettings">
                    <a href="#">Настройки профиля</a>
                </div>
            </div>
            <div class="userPage_interests">
                <div class="userPage_topic">
                    <h2 class="userPage_topic_content">Интересы</h2>
                </div>
                <div class="userPage_contentBlock">
                    <p>В данный момент мы не знаем о ваших предпочтениях. Читайте публикации и тут обязательно появятся рекомендации.</p>
                </div>
            </div>
            <div class="userPage_activity">
                <div class="userPage_topic">
                    <h2 class="userPage_topic_content">Активность</h2>
                </div>
                <div class="userPage_contentBlock">
                    <p>Тут отображаются все ваши понравившиеся посты и комментарии.</p>
                </div>
                <div class="userPage_contentBlock">
                    <h3>Заголовок</h3>
                    <p>ТекстТекстТекстТекстТекстТекстТекст <a href="#">Ссылка</a> ТекстТекст ТекстТекстТекстТекстТекстТекстТекст.</p>
                    <a href="#">Ссылка</a>
                </div>
                <div class="userPage_contentBlock">
                    <p>Пользователь <a href="#">Геннадий Букин</a> оценил вашу <a href="#">публикацию</a>.</p>
                </div>
                <div class="userPage_contentBlock">
                    <p>Пользователь <a href="#">Геннадий Букин</a> оставил комментарии под вашей <a href="#">публикацией</a>.</p>
                </div>
                <div class="userPage_contentBlock">
                    <p>Пользователь <a href="#">Геннадий Букин</a> оставил комментарии под вашей <a href="#">публикацией</a>.</p>
                </div>
                <div class="userPage_contentBlock">
                    <p>Пользователь <a href="#">Геннадий Букин</a> оставил комментарии под вашей <a href="#">публикацией</a>.</p>
                </div>
                <div class="userPage_contentBlock">
                    <p>Пользователь <a href="#">Геннадий Букин</a> оставил комментарии под вашей <a href="#">публикацией</a> .</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php ob_end_flush(); ?>
