<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $bd = Database();
        $ress = $bd->prepare("INSERT INTO posts (user_id, title, content) values (?,?,?)");
        $ress->bind_param("iss", $user_id, $_POST['title'], $_POST['content']);
        $ress->execute(); 
    }
    else {
        echo 'Войдите в аккаунт';
    }

}

function Database() {
    $bd = new mysqli("151.248.115.10", "root", "Kwuy1mSu4Y", "DeryabichevAO-is64");
    return $bd;
}
?>
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
            <h1 class="hero__title">Оставьте заголовок</h1>
            <form class="hero__inputs" method="post">
                <input type="text" class="hero__input" name="title" placeholder="Заголовок поста">
                <textarea type="password" class="hero__textarea" name="content">Текст</textarea>
                <input type="submit" class="hero__btn" name="button">
            </form>
        </div>
    </section>
    <section class="links">
        <a href="/index.php" class="links__link">Зарегистрироваться</a>
        <a href="/login.php" class="links__link">Войти</a>
        <a href="/posts.php" class="links__link">Создать пост</a>
        <a href="/allposts.php" class="links__link">Все посты</a>
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
    .hero__textarea{
        width: 700px;
        height: 200px;
        padding: 20px;
        border-radius: 20px;
    }
</style>
