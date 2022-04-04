<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список пользователей</title>
</head>
<body>
<div>
    <h1>Список пользователей</h1>
    <table>
        <thead>
        <tr>
            <th>Логин</th>
            <th>Пароль</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['login'] ?></td>
                <td><?= $user['password'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="/welcome">Вернуться</a> на главную.</p>
</div>
</body>
</html>