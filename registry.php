<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="data/css/style.css">
</head>
<body>
<div class="registryArea">
    <div class="registryArea__inner">
        <div class="registryArea__title">Регистрация</div>
        <div class="registryArea__form">
            <form method="post">текст
                <input type="email" name="login" required placeholder="Почта" value="<?php echo $_POST['login']; ?>">
                <input type="text" name="name" pattern="^[A-Za-zА-Яа-я]+$" required placeholder="Имя" value="<?php echo $_POST['name']; ?>">
                <input type="text" name="surname" pattern="^[A-Za-zА-Яа-я]+$" placeholder="Фамилия" value="<?php echo $_POST['surname']; ?>">
                <input type="text" name="phone" pattern="^8([0-9]{10})$ | ^+7([0-9]{10})$" required
                       placeholder="Номер телефона" value="<?php echo $_POST['phone']; ?>"><br>
                <label>Возраст </label><br>
                <input type="number" name="age" min="0" max="99" value="<?php echo $_POST['age']; ?>"><br>
                <label>Пароль </label><br>
                <input type="password" name="password" required><br>
                <label>Повторите пароль </label><br>
                <input type="password" name="passwordCheck" required><br>
                <label>Создавая аккаунт вы соглашаетесь с <a class="personalArea__register" href="license.html">лицензионным соглашением</a> нашей
                    компании.</label><br>
                <input class="check" type="checkbox" name="license" required>
                <label>Я принимаю условия лицензионного соглашения.</label><br>
                <input type="submit" name="registryButton" value="Зарегистрироваться"><br>

            </form>
            <?php
            require_once 'data/php/connection.php';
            $link = new mysqli($sqli_host, $sqli_user, $sqli_password, $sqli_database) or die("Ошибка " . mysqli_error($link));
            $dataBase = $link->query("SELECT COUNT(*) as exist FROM `user` WHERE `login` = '" . $_POST['login'] . "' OR `phone` = '" .$_POST['phone']. "'");
            $dataArr = $dataBase->fetch_assoc();
            if (isset($_POST['registryButton'])) {
                if ($dataArr['exist']) {
                    echo "<div class='error'>Данные ваших реквизитов уже зарегистрированы.</div>";
                }
                else if ($_POST['password'] != $_POST['passwordCheck']) {
                    echo "<div class='error'>Введенные пароли не совпадают.</div>";
                }
                else if ($link->query("INSERT INTO `user`(`login`, `password`, `phone`, `name`, `surname`, `age`)
                        VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['password'], false) . "', '" . $_POST['phone'] . "', '" . $_POST['name'] . "', '" . $_POST['surname'] . "',  " . $_POST['age'] . ")")) {
                    session_start();
                    $_SESSION["login"] = $_POST['login'];
                    header('Location: userPage.php');
                }
                else {
                    echo "<div class='error'>Не удалось зарегистрироваться.</div>";
                }
            }
            ?>
        <p><a class="personalArea__register" href="index.php">Уже зарегистрированы?</a></p>
        </div>
    </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
