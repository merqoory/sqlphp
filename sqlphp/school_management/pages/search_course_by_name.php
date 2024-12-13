<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_course'])) { // проверка
    $course_name = $_POST['course_name']; // значения
    $sql = "SELECT students.name AS student_name 
            FROM students
            JOIN student_courses ON students.id = student_courses.student_id
            JOIN courses ON student_courses.course_id = courses.id
            WHERE courses.name LIKE :course_name";
    $stmt = $pdo->prepare($sql); // подготовка запросов
    $stmt->execute(['course_name' => "%$course_name%"]); // выполнение
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлечение
}
?>
<form method="POST">
    <label for="course_name">Курс:</label>
    <input type="text" id="course_name" name="course_name" required>
    <button type="submit" name="search_course">Поиск</button>
</form>
<?php if (!empty($data)): ?>
<table>
    <tr>
        <th>Имя Студента</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['student_name'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>