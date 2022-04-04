<?php

function redirect()
{
    header('Location: /welcome');
}

if (
    isset($_POST['login'])
    && $_POST['login']
    && isset($_POST['password'])
    && $_POST['password']
) {

    // $host = 'lpo-microservices.loc';
    $host = 'mysql';
    $database = 'lpo_microservices';
    $user = 'root';
    $password = 'root-secret-pw';
    $charset = 'utf8';

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
    $pdo = new PDO($dsn, $user, $password, $options);

    $statement = "
        SELECT `id`
        FROM `users`
        WHERE
            `login` = ?
            AND `password` = ?
    ;";
    $bindings = [$_POST['login'], $_POST['password']];
    $query = $pdo->prepare($statement);
    $query->execute($bindings);
    $userId = $query->fetchColumn();
    if ($userId) {
        setcookie('userId', $userId, time() + 3600, '/'); //куки хранится 1 час
    }
}

if (
    (isset($_COOKIE['userId']) && $_COOKIE['userId'])
    || (isset($userId) && $userId)
) {
    redirect();
    exit();
}

include('./frontend.php');
include('./footer.php');