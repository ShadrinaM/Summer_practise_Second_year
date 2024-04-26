<?php
header('Content-Type: application/json; charset=UTF-8');

include ('../ShadrinaMM_Web2/Secret.php');
$user = userr;
$pass = passs;

try {
    $db = new PDO(
        "mysql:host=localhost;dbname=$user",
        $user,
        $pass,
        [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $query = "SELECT * FROM Realtors WHERE Full_Name LIKE 'И%' AND Commission_Percentage > 10;";
    $stmt = $db->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
?>