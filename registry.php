<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ледмаге — лента публикаций</title>
    <link rel="stylesheet" href="data/css/style.css">
</head>
<body>
<div class="registryArea">
    <div class="registryArea__inner">
        <div class="registryArea__title">Регистрация</div>
        <div class="registryArea__form">
            <form method="post">
                <input type="email" name="login" required placeholder="EMail">
                <input type="text" name="name" pattern="^[A-Za-zА-Яа-я]+$" required placeholder="Имя">
                <input type="text" name="surname" pattern="^[A-Za-zА-Яа-я]+$" placeholder="Фамилия">
                <input type="text" name="phone" pattern="^8([0-9]{10})$ | ^+7([0-9]{10})$" required
                       placeholder="Номер телефона"><br>
                <label>Возраст </label><br>
                <input type="number" name="age" min="0" max="99"><br>
                <label>Пароль </label><br>
                <input type="password" name="password" required><br>
                <label>Повторите пароль </label><br>
                <input type="password" name="passwordCheck" required><br>
                <label>Создавая аккаунт вы соглашаетесь с <a href="license.html">лицензионным соглашением</a> нашей
                    компании</label><br>
                <input class="check" type="checkbox" name="license" required>
                <label>Я принимаю условия лицензионного соглашения</label><br>
                <input type="submit" name="registerButton" value="Зарегистрироваться"><br>
                <a class="personalArea__register" href="authorization.php">Уже зарегистрированы?</a>
            </form>
            <?php
            require_once 'data/php/connection.php';
            $link = new mysqli($sqli_host, $sqli_user, $sqli_password, $sqli_database) or die("Ошибка " . mysqli_error($link));
            $dataBase = $link->query("SELECT COUNT(*) as exist FROM `user` WHERE `login` = '" . $_POST['login'] . "' OR `phone` = '" .$_POST['phone']. "'");
            $dataArr = $dataBase->fetch_assoc();
            if ($dataArr['exist']) {
                echo "Данные ваших реквизитов уже зарегистрированы";
                exit;
            }
            else if ($_POST['password'] != $_POST['passwordCheck']) {
                echo "Введенные пароли не совпадают";
                exit;
            }
            else if ($link->query("INSERT INTO `user`(`login`, `password`, `phone`, `name`, `surname`, `age`)
                    VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['password'], false) . "', '" . $_POST['phone'] . "', '" . $_POST['name'] . "', '" . $_POST['surname'] . "',  " . $_POST['age'] . ")")) {
                session_start();
                $_SESSION["login"] = $_POST['login'];
                header('Location: userPage.php');
            }
            else {
                echo "Не удалось зарегистрироваться";
            }

            ?>
        </div>

    </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>

<?php
//
//
//$nickNameDataBase = $link->query("SELECT `login` FROM `user` WHERE `login` = '" . $_POST['login'] . "'");
//$nicknameArr = $nickNameDataBase->fetch_assoc();
//if (!empty($nicknameArr['login'])) {
//    echo "<h1>Данная почта уже занята</h1>";
//    echo "<h2><a href='../../registry.php'>Заполнить показания заново<a></h2>";
//    $phoneDataBase = $link->query("SELECT `phone` FROM `user` WHERE `login` = '" . $_POST['phone'] . "'");
//    $phoneArr = $nickNameDataBase->fetch_assoc();
//} else if (!empty($phoneArr['phone'])) {
//    echo "<h1>Данный телефон уже занят</h1>";
//    echo "<h2><a href='../../registry.php'>Заполнить показания заново<a></h2>";
//} else if ($_POST['password'] != $_POST['passwordCheck']) {
//    echo "<h1>Пароли не совпадают</h1>";
//    echo "<h2><a href='../../registry.php'>Заполнить показания заново<a></h2>";
//} else if ($link->query("INSERT INTO `user`(`login`, `password`, `phone`, `name`, `surname`, `age`)
//    VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['password'], false) . "', '" . $_POST['phone'] . "', '" . $_POST['name'] . "', '" . $_POST['surname'] . "',  " . $_POST['age'] . ")")) {
//    echo "<h1>Регистрация прошла успешно</h1>";
//    echo "<h2><a href = '../../authorization.php'>Войти в аккаунт</a></h2>";
//} else {
//    echo "<h2>Не удалось зарегистрироваться</h2>";
//}
//
//mysqli_close($link);
//?>
