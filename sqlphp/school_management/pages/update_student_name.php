<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_name'])) { // проверка
    $student_id = $_POST['student_id']; // значения
    $new_name = $_POST['new_name']; // значения
    $sql = "UPDATE students SET name = :new_name WHERE id = :student_id"; // запрос на обновление
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['new_name' => $new_name, 'student_id' => $student_id]); // выполнение
    echo "Студент успешно обновлён!"; // успешно
}
?>
<form method="POST">
    <label for="student_id">Студент ID:</label>
    <input type="number" id="student_id" name="student_id" required>
    <label for="new_name">Новое Имя:</label>
    <input type="text" id="new_name" name="new_name" required>
    <button type="submit" name="update_name">Обновить Имя</button>
</form>
