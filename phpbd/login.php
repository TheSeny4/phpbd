<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="hero">
        <div class="hero__info">
            <h1 class="hero__title">Войдите в аккаунт!</h1>
            <form class="hero__inputs" method="post">
                <input type="text" class="hero__input" name="login" placeholder="Введите логин">
                <input type="password" class="hero__input" name="password" placeholder="Введите Пароль">
                <input type="submit" class="hero__btn" name="button">
            </form>
        </div>
    </section>
</body>

</html>

<style>
    .hero__title {
        font-size: 42px;
    }

    .hero__info {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin-top: 200px;
    }

    .hero__inputs {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .hero__input {
        width: 700px;
        height: 50px;
        padding-left: 20px;
        border-radius: 20px;
    }

    .hero__btn {
        width: 400px;
        height: 50px;
        border-radius: 15px;
        background-color: blue;
        color: white;
    }
    .center{
        text-align: center;
    }
</style>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $bd = Database();

    $ress = $bd->prepare("Select * from users where username = ? and password = ?");
    $ress->bind_param("ss", $login, $password);
    $ress->execute();
    $result = $ress->get_result();
    $res = $result->fetch_assoc();
    if ($res) {
        echo "<p class='center'>Вы успешно вошли в аккаунт</p>";
    } else {
        echo "<p class='center'>У вас нет аккаунта, зарегистрируйтесь <a href='index.php'>Зарегистрироваться</a></p>";
    }
}

function Database()
{
    $bd = new mysqli("192.168.199.13", "learn", "learn", "learn_deryabichev364");
    return $bd;
}

?>