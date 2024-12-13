<?php
require_once '../database.php'; // подключение 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_group'])) { // проверка
    $group_id = $_POST['group_id']; // значения
    $sql = "SELECT * FROM students WHERE group_id = :group_id"; // запрос на выбор
    $stmt = $pdo->prepare($sql); // подготовка
    $stmt->execute(['group_id' => $group_id]); // выполнение
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // извлекает строки
}
?>
<form method="POST">
    <label for="group_id">Группа ID:</label>
    <input type="number" id="
