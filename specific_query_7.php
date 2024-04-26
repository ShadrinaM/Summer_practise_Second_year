<?php
header('Content-Type: application/json; charset=UTF-8');

include ('../ShadrinaMM_Web2/Secret.php'); // Убедитесь, что указан правильный путь к Secret.php
$user = userr; // Укажите ваше реальное имя пользователя
$pass = passs; // Укажите ваш реальный пароль

try {
    $db = new PDO(
        "mysql:host=localhost;dbname=$user",
        $user,
        $pass,
        [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $query = "SELECT Rooms_Count, AVG(Area) AS Average_Area
    FROM Apartments
    GROUP BY Rooms_Count;";
    $stmt = $db->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    die();
}
?>