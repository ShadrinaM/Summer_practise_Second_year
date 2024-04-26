<?php
header('Content-Type: application/json; charset=UTF-8');

$minAreaInput = isset($_GET['minAreaInput']) ? intval($_GET['minAreaInput']) : null;
$maxAreaInput = isset($_GET['maxAreaInput']) ? intval($_GET['maxAreaInput']) : null;

if ($minAreaInput !== null || $maxAreaInput !== null) {
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

        $query = "SELECT * FROM Apartments WHERE Rooms_Count = 2 AND Area BETWEEN $minAreaInput AND $maxAreaInput;";
        $stmt = $db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results);
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
        die();
    }
} else {
    echo "Ошибка: не указано количество комнат.";
}


?>