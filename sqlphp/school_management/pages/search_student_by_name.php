<?php
require_once '../database.php'; // подключение
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_student'])) { // проверка
    $student_name = $_POST['student_name']; // значения
    $sql = "SELECT students.name AS student_name, groups.name AS group_name 
            FROM students 
            LEFT JOIN groups ON students.group_id = groups.id 
            WHERE students.name LIKE :student_name";
    $stmt = $pdo->prepare($sql); // подготовка запросов
    $stmt->execute(['student_name' => "%$student_name%"]); // выполнение
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлечение
}
?>
<form method="POST">
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required>
    <button type="submit" name="search_student">Search</button>
</form>
<?php if (!empty($data)): ?>
<table>
    <tr>
        <th>Имя Студента</th>
        <th>Группа</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['group_name'] ?: 'No Group' ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>