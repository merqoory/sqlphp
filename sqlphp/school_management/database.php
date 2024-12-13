<?php
$host = 'localhost';
$dbname = 'school_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // соединение с базой данных
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // установка режима ошибок
    echo "Connection successful!"; // при успешном соединении
} catch (PDOException $e) { // перехват исключений
    echo "Connection failed: " . $e->getMessage(); //неудачное подключение
}
?>