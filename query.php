<?php
include ('../ShadrinaMM_Web2/Secret.php');
$user = 'userr';
$pass = 'passs';

$query = $_POST['query'];

try {
    $db = new PDO("mysql:host=localhost;dbname=$user", $user, $pass, [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($query == 1) {
    $sql = "SELECT * FROM Apartments WHERE Rooms_Count = 3 AND Street = 'Садовая'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<table><tr><th>ID</th><th>Улица</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь</th><th>Количество комнат</th><th>Цена</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row["Apartment_ID"] . "</td><td>" . $row["Street"] . "</td><td>" . $row["House_Number"] . "</td><td>" . $row["Apartment_Number"] . "</td><td>" . $row["Floor"] . "</td><td>" . $row["Area"] . "</td><td>" . $row["Rooms_Count"] . "</td><td>" . $row["Price"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

$db = null;
?>