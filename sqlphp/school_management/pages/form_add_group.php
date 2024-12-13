<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_group'])) { // проверка
    $name = $_POST['name']; // значения
    $sql = "INSERT INTO groups (name) VALUES (:name)"; // запрос на ввод
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['name' => $name]); // выполнение
    echo "Группа добавлена успешно!"; // успешно
}
?>
<form method="POST">
    <label for="group_name">Группа:</label>
    <input type="text" id="group_name" name="name" required>
    <button type="submit" name="add_group">Добавить группу</button>
</form>
