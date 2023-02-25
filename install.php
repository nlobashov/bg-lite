<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS boardgames CHARACTER SET = 'utf8'";
    $pdo->exec($sql);
    echo "База данных 'boargames' успешно создана.<br>";
    $pdo->exec($sql);
    $queryCreateTable = "
        CREATE TABLE IF NOT EXISTS boardgames.players (
        id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname varchar(30) NOT NULL,
        lastname varchar(30) NOT NULL,
        nickname varchar(30) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
    $pdo->exec($queryCreateTable);
    echo "Таблица 'players' создана.<br>";
    die('Удалите файл <b>install.php</b> в корне проекта для продолжения..');
} catch (PDOException $e) {
    echo $e->getMessage() . '<br>';
} finally {
    $conn = null;
}