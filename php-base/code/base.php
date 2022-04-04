<?php

function redirect()
{
    header('Location: /auth');
}

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

if (isset($_COOKIE['userId']) && $_COOKIE['userId']) {
    switch ($_SERVER['REQUEST_URI']) {
        case '/users':
            $statement = "SELECT * FROM `users`;";
            $bindings = [];
            $query = $pdo->prepare($statement);
            $query->execute($bindings);
            $users = $query->fetchAll();
            break;
        case '/logout':
            setcookie('userId', null, -1, '/'); //значение куки - null, время удаляется (потому что -1)
            redirect();
            exit();
        default:
            $statement = "
                SELECT `login`
                FROM `users`
                WHERE `id` = ?
            ;";
            $bindings = [$_COOKIE['userId']];
            $query = $pdo->prepare($statement);
            $query->execute($bindings);
            $userLogin = $query->fetchColumn();
            break;
    }
} else {
    redirect();
    exit();
}

switch ($_SERVER['REQUEST_URI']) {
    case '/users':
        include('./users.php');
        break;
    default:
        include('./frontend.php');
        break;
}

include('./footer.php');
