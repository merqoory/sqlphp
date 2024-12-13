<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_course'])) { // проверка
    $course_name = $_POST['course_name']; // значения
    $sql = "INSERT INTO courses (name) VALUES (:course_name)"; // запрос на ввод
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['course_name' => $course_name]); // выполнение
    echo "Курс добавлен успешно!"; // успешно
}
?>
<form method="POST">
    <label for="course_name">Курс:</label>
    <input type="text" id="course_name" name="course_name" required>
    <button type="submit" name="add_course">Add Course</button>
</form>