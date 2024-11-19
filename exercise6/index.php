<?php

require_once 'db.php';

$db = new Db('store');
$pdo = $db->getPdo();

$typeCode = $_GET['typeCode'] ?? '';

$sql = 'SELECT * FROM product_types WHERE code = :typeCode';
$stmt = $pdo->prepare($sql);
$stmt->execute(['typeCode' => $typeCode]);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);

?>