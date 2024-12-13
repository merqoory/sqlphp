<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_student'])) { // проверка
    $student_id = $_POST['student_id']; // значения
    $sql = "DELETE FROM students WHERE id = :student_id"; // запрос на удаление
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['student_id' => $student_id]); // выполнение
    echo "Студент успешно удалён!"; // успешно
}
?>
<form method="POST">
    <label for="student_id">Студент ID:</label>
    <input type="number" id="student_id" name="student_id" required>
    <button type="submit" name="delete_student">Delete Student</button>
</form>