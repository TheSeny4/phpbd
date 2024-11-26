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
            <h1 class="hero__title">Зарегистрируйтесь!</h1>
            <form class="hero__inputs" method="post">
                <input type="text" class="hero__input" name="login" placeholder="Введите логин">
                <input type="text" class="hero__input" name="email" placeholder="Введите E-mail">
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
</style>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $login = $_POST['login'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $bd = Database();

   $ress = $bd->prepare("INSERT INTO users (username, Email, password) VALUES (?,?,?)");
   $ress->bind_param("sss", $login, $email, $password);
   $ress->execute();
}


function Database()
{
    $bd = new mysqli("192.168.199.13", "learn", "learn", "learn_deryabichev364");
    return $bd;
}

?>