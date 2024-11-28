<?php
function Database()
{
    $bd = new mysqli("151.248.115.10", "root", "Kwuy1mSu4Y", "DeryabichevAO-is64");
    return $bd;
}
$bd = Database();
$ress = $bd->query("select posts.title, posts.content, users.username from posts inner join users on posts.user_id = users.id");

$result = $ress->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="posts">
        <h1 class="posts__title">Все посты</h1>
        <?php foreach ($result as $value) { ?>
            <div class="post">
                <h1>Название: <?= $value['title'] ?></h1>
                <p>Автор: <?= $value['username'] ?></p>
                <p>Содержание: <?= $value['content'] ?></p>
            </div>
        <?php } ?>
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
    body {
        padding: 100px 300px;
    }
</style>