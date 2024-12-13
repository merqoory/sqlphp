<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_course'])) { // проверка
    $course_id = $_POST['course_id']; //значения
    $sql = "DELETE FROM courses WHERE id = :course_id"; // запрос на удаление
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['course_id' => $course_id]); // выполнение
    echo "Курс успешно удалён!"; // успешно
}
?>
<form method="POST">
    <label for="course_id">Курс ID:</label>
    <input type="number" id="course_id" name="course_id" required>
    <button type="submit" name="delete_course">Delete Course</button>
</form>