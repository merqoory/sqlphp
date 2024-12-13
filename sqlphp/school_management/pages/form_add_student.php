<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) { // проверка
    $name = $_POST['name']; // значения
    $sql = "INSERT INTO students (name) VALUES (:name)"; // запрос на ввод
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['name' => $name]); // выполнение
    echo "Студент добавлен успешно!"; // успешно
}
?>
<form method="POST">
    <label for="name">Имя Студента:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" name="add_student">Добавить Студента</button>
</form>