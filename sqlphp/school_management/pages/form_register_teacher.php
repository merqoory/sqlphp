<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //проверка
    $name = $_POST['name']; // получаем значения и присваем переменным
    $email = $_POST['email']; // получаем значения и присваем переменным
    $subject = $_POST['subject']; // получаем значения и присваем переменным

    try { // попытка запроса
        $sql = "INSERT INTO teachers (name, email, subject) VALUES (:name, :email, :subject)";
        $stmt = $pdo->prepare($sql); // подготовка
        $stmt->execute([ // выполнение со значениями
            'name' => $name,
            'email' => $email,
            'subject' => $subject
        ]);
        echo "Teacher registered successfully!"; // успешном
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // ошибка
    }
}
?>
