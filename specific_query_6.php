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

    $query = "SELECT r.Full_Name, d.Deal_Date, a.Price, r.Commission_Percentage, ROUND(a.Price * r.Commission_Percentage / 100, 2) AS Commission
    FROM Deals d
    JOIN Apartments a ON d.Apartment_ID = a.Apartment_ID
    JOIN Realtors r ON d.Realtor_ID = r.Realtor_ID;";
    $stmt = $db->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
?>