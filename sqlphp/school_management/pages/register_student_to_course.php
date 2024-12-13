<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_course'])) { // проверка
    $student_id = $_POST['student_id']; // значения
    $course_id = $_POST['course_id']; // значения
    $sql = "INSERT INTO student_courses (student_id, course_id) VALUES (:student_id, :course_id)"; // запрос на ввод
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['student_id' => $student_id, 'course_id' => $course_id]); // выполнение
    echo "Студент успешно зарегистрирован на курсе"; // успешно
}
?>
<form method="POST">
    <label for="student_id">Студент ID:</label>
    <input type="number" id="student_id" name="student_id" required>
    <label for="course_id">Курс ID:</label>
    <input type="number" id="course_id" name="course_id" required>
    <button type="submit" name="register_course">Register</button>
</form>
