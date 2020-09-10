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

    echo "Ваш токен: " . $_SESSION["token"];
?>

</body>
</html>
<?php ob_end_flush(); ?>
