<?php
require_once '../database.php'; // подключение
$sql = "SELECT * FROM students"; // запрос на выбор
$stmt = $pdo->query($sql); // запись в stmt
$students = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлекает строки
?>
<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
        </tr>
    <?php endforeach; ?> 
</table>
