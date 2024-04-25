<?php
include ('../ShadrinaMM_Web2/Secret.php');

$user = $userr; // Убедитесь, что переменные $userr и $passs существуют в файле Secret.php
$pass = $passs;

try {
    $db = new PDO("mysql:host=localhost;dbname=$user", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['query'])) {
        $query = $_POST['query'];

        if ($query == 1) {
            $sql = "SELECT * FROM Apartments WHERE Rooms_Count = 3 AND Street = 'Садовая'";
            $stmt = $db->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $row) {
                    echo "ID: " . $row["Apartment_ID"] . " - Street: " . $row["Street"] . " - Rooms Count: " . $row["Rooms_Count"] . "<br>";
                }
            } else {
                echo "0 results";
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$db = null; // Закрываем соединение с базой данных
?>