<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добро пожаловать!</title>
</head>
<body>
<div>
    <h1>Добро пожаловать!</h1>
    <p>Привет, <?= $userLogin ?>!</p>
    <div>
        <h2>Список пользователей</h2>
        <p>Список пользователей доступен по <a href="/users">этой</a> ссылке.</p>
    </div>
    <div>
        <h2>Выйти</h2>
        <p>Чтобы выйти перейди по <a href="/logout">этой</a> ссылке.</p>
    </div>
</div>
</body>
</html>