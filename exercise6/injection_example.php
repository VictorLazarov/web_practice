<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=store';
$username = 'root';
$password = '';

$pdo = new PDO($dsn, $username, $password);

$typeCode = $_GET['typeCode'] ?? '';

$sql = "SELECT * FROM product_types WHERE code = '$typeCode'";
// pass parameter 
// ' OR '1'='1 
// to the URL to see the SQL injection
$stmt = $pdo->query($sql);

// Fetch all rows
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);

?>
