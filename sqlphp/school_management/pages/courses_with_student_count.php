<?php
require_once '../database.php'; // подключение
$sql = "SELECT courses.name AS course_name, COUNT(student_courses.student_id) AS student_count
        FROM courses 
        LEFT JOIN student_courses ON courses.id = student_courses.course_id 
        GROUP BY courses.name";
$stmt = $pdo->query($sql); // после подсчета и группировки выполняет объект pdo метода query и записывает в stmt
$data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлекает строки
?>
<table>
    <tr>
        <th>Курс</th>
        <th>Студент</th>
    </tr> 
    <?php foreach ($data as $row): ?> 
        <tr>
            <td><?= $row['course_name'] ?></td>
            <td><?= $row['student_count'] ?></td> 
        </tr> 
    <?php endforeach; ?>
</table>