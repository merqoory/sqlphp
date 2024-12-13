<?php
require_once '../database.php'; // подключение
$sql = "SELECT * FROM students WHERE group_id IS NULL"; // запрос на выбор
$stmt = $pdo->query($sql); // запись в stmt
$data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлечение
?>
<table>
    <tr>
        <th>ID</th>
        <th>Имя</th>
    </tr>
    <?php foreach ($data as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
