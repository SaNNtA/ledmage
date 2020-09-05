<?php ob_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="data/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;family=Montserrat:wght@400;700&amp;display=swap"
          rel="stylesheet">
</head>
<body>
<?php
session_start();
echo "Ваш токен: " . $_SESSION["token"];
?>
</body>
</html>
<?php ob_end_flush(); ?>
