<?php
include '../ShadrinaMM_Web2/Secret.php';
$user = 'userr';
$pass = 'passs';

$query = $_POST['query'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($query == 1) {
    $sql = "SELECT * FROM Apartments WHERE Rooms_Count = 3 AND Street = 'Садовая'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Улица</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь</th><th>Количество комнат</th><th>Цена</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Apartment_ID"] . "</td><td>" . $row["Street"] . "</td><td>" . $row["House_Number"] . "</td><td>" . $row["Apartment_Number"] . "</td><td>" . $row["Floor"] . "</td><td>" . $row["Area"] . "</td><td>" . $row["Rooms_Count"] . "</td><td>" . $row["Price"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>