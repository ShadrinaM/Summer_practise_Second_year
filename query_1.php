<?php
include ('../ShadrinaMM_Web2/Secret.php');
$user = userr;
$pass = passs;
$db = new PDO(
    "mysql:host=localhost;dbname=$user",
    $user,
    $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    if ($query == 1) {
        $sql = "SELECT * FROM Apartments WHERE Rooms_Count = 3 AND Street = 'Садовая'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["Apartment_ID"] . " - Street: " . $row["Street"] . " - Rooms Count: " . $row["Rooms_Count"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}

$conn->close();
?>