<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ледмаге | регистрация</title>
    <link rel="stylesheet" href="data/css/style.css">
    <link rel="shortcut icon" href="/data/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="registryArea">
    <div class="registryArea__inner">
        <div class="registryArea__title">Регистрация</div>
        <div class="registryArea__form">
            <form method="post">
                <input type="email" name="login" required placeholder="Почта" value="<?php echo $_POST['login']; ?>"><br>
                <input type="text" name="name" pattern="^[A-Za-zА-Яа-я]+$" required placeholder="Имя" value="<?php echo $_POST['name']; ?>"><br>
                <input type="text" name="surname" pattern="^[A-Za-zА-Яа-я]+$" placeholder="Фамилия" value="<?php echo $_POST['surname']; ?>"><br>
                <label>Дата рождения </label><br>
                <input type="date" name="age" max="<?php echo date("Y-m-d");?>" value="<?php echo $_POST['age']; ?>"><br>
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

            if (isset($_POST['registryButton'])) {
                require_once 'data/php/connection.php';
                require_once 'data/php/reg/except.php';
                $link = new mysqli($sqli_host, $sqli_user, $sqli_password, $sqli_database) or die("Ошибка " . mysqli_error($link));
                $dataBase = $link->query("SELECT COUNT(*) as exist FROM `users` WHERE `login` = '" . $_POST['login'] ."'");
                $dataArr = $dataBase->fetch_assoc();


                $registryCheck = new RegistryExc();
                $registryCheck->checkEmail($_POST['login'], "Неверно введена почта.");
                $registryCheck->checkName($_POST['name'], "В имени разрешено использовать только русские, латинские буквы и цифры.");
                //$registryCheck->checkPhone($_POST['phone'], "Неверно введден номер телефона.");
                $registryCheck->checkAge($_POST['age'], "Неверно указан возраст");
                $registryCheck->checkPassword($_POST['password'], $_POST['passwordCheck'], "Пароль должен состоять как минимум из 8 имволов.", "В пароле использованы недопустимые символы.", "Пароли не совпадают.");
                $registryCheck->checkExistence($dataArr['exist'], "Данные ваших реквизитов уже зарегистрированы.");

                if (!$registryCheck->getExceptions()) {
                    if ($link->query("INSERT INTO users(login, password, name, surname, age, at_created)
                            VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['password'], false) . "', '" . $_POST['name'] . "', '" . $_POST['surname'] . "',  '" . $_POST['age'] . "', '".date("Y-m-d H:i:s")."')")) {
                        session_start();
                        $_SESSION["registerFlag"] = true;
                        header('Location: authorization.php');
                    }
                    else {
                        echo "<div class='error'>Не удалось зарегистрироваться.</div>";
                    }
                }
            }
            ?>
        <p><a class="personalArea__register" href="authorization.php">Уже зарегистрированы?</a></p>
        </div>
    </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
