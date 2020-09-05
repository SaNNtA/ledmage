<?php ob_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ледмаге — лента публикаций</title>
    <link rel="stylesheet" href="data/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;family=Montserrat:wght@400;700&amp;display=swap"
          rel="stylesheet">
</head>
<body>
<div class="personalArea">
    <div class="personalArea__inner">
        <div class="personalArea__title">Личный кабинет</div>
        <div class="personalArea__form">
            <form method="post">
                <input type="email" name="login" placeholder="Введите логин" required value="<?php echo $_POST['login']?>"><br>
                <input type="password" name="password" placeholder="Введите пароль" required"><br>
                <input type="submit" name="submit" value="Вход">
            </form>
        </div>
        <?php
        require_once 'data/php/connection.php';
        if (isset($_POST['submit']) && isset($_POST['login'])) {
            $login = $_POST['login'];
            $password = hash('md5', $_POST['password'], false);

            if (!empty($login) && !empty($password)) {
                $link = new mysqli($sqli_host, $sqli_user, $sqli_password, $sqli_database)
                or die("Ошибка " . mysqli_error($link));

                $result = $link->query("SELECT * FROM `user` WHERE `login` = '" . $login . "' AND `password`= '" . $password . "'");
                $result = $result->fetch_assoc();

                if (!empty($result)) {
                    session_start();
                    //Генерирую токен ключ для входи и вношу его в бд
                    $token = bin2hex(random_bytes(50));
                    $link->query("UPDATE `user` SET `token`='".$token."' WHERE `id` = ".$result['id']);
                    $_SESSION["token"] = $token;

                    header('Location: userPage.php');
                } else {
                    echo "<div class='error'>Некорректно введены данные</div>";
                }

                mysqli_close($link);
            }
        }
        ?>
        <a class="personalArea__register" href="registry.php">Зарегистрироваться</a>
    </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
