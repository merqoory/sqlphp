<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bind_student'])) { // проверка
    $student_id = $_POST['student_id']; // значения
    $group_id = $_POST['group_id']; // значения
    $sql = "UPDATE students SET group_id = :group_id WHERE id = :student_id"; // запрос для обновления
    $stmt = $pdo->prepare($sql); // подготовка запроса
    $stmt->execute(['group_id' => $group_id, 'student_id' => $student_id]); // заполняет параметры и выполняет
    echo "Студент успешно добавлен в группу!"; // успешно
}
?>
<form method="POST">
    <label for="student_id">Студент:</label>
    <input type="number" id="student_id" name="student_id" required>
    <label for="group_id">Группа ID:</label>
    <input type="number" id="group_id" name="group_id" required>
    <button type="submit" name="bind_student">Найти</button>
</form>
