<?php
header('Content-Type: text/html; charset=UTF-8');

include ('../ShadrinaMM_Web2/Secret.php');
$user = userr;
$pass = passs;
$db = new PDO(
    "mysql:host=localhost;dbname=$user",
    $user,
    $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$query = "SELECT * FROM mytable";
$stmt = $db->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);