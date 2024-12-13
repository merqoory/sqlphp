<?php
require_once '../database.php'; // подключение
$sql = "SELECT students.name AS student_name, groups.name AS group_name 
        FROM students 
        LEFT JOIN groups ON students.group_id = groups.id";
$stmt = $pdo->query($sql); // подготовка запросов
$data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлечение
?>
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
