<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include ('main.php');
    exit();
}

include ('../ShadrinaMM_Web2/Secret.php');
$user = userr;
$pass = passs;
$db = new PDO(
    "mysql:host=localhost;dbname=$user",
    $user,
    $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

if (isset($_POST['add_realtor_form'])) {
    // Обработка формы Add Realtor
    $errors = FALSE;
    if (empty($_POST['fullNameRealtor']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z\s-]{1,150}$/u', $_POST['fullNameRealtor'])) {
        $errors = TRUE;
    }
    if (empty($_POST['commissionPercentage']) || !preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $_POST['commissionPercentage'])) {
        $errors = TRUE;
    }
    if (empty($_POST['phoneRealtor']) || !preg_match('/^\+[0-9]{11}$/', $_POST['phoneRealtor'])) {
        $errors = TRUE;
    }

    if (empty($_POST['emailRealtor']) || !preg_match('/^([a-z0-9_-]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i', $_POST['emailRealtor'])) {
        $errors = TRUE;
    }

    include ('../ShadrinaMM_Web2/Secret.php');
    $user = userr;
    $pass = passs;
    $db = new PDO(
        "mysql:host=localhost;dbname=$user",
        $user,
        $pass,
        [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    if ($errors) {
        exit();
    }

    $stmt = $db->prepare("INSERT INTO Realtors (Full_Name, Commission_Percentage, Phone, Email) VALUES (:fullNameRealtor, :commissionPercentage, :phoneRealtor, :emailRealtor)");
    //создание запроса
    $stmt->bindParam(':fullNameRealtor', $fullNameRealtor);
    $stmt->bindParam(':commissionPercentage', $commissionPercentage);
    $stmt->bindParam(':phoneRealtor', $phoneRealtor);
    $stmt->bindParam(':emailRealtor', $emailRealtor);

    $fullNameRealtor = $_POST['fullNameRealtor'];
    $commissionPercentage = $_POST['commissionPercentage'];
    $phoneRealtor = $_POST['phoneRealtor'];
    $emailRealtor = $_POST['emailRealtor'];

    $stmt->execute(); //отправка
    $id = $db->lastInsertId();
} elseif (isset($_POST['add_apartment_form'])) {
    // Обработка формы Add Apartment
    $errors = FALSE;
    if (empty($_POST['street']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z\s-]{1,100}$/u', $_POST['street'])) {
        $errors = TRUE;
    }
    if (empty($_POST['houseNumber']) || !preg_match('/^[0-9]+$/', $_POST['houseNumber'])) {
        $errors = TRUE;
    }
    if (empty($_POST['apartmentNumber']) || !preg_match('/^[0-9]+$/', $_POST['apartmentNumber'])) {
        $errors = TRUE;
    }
    if (empty($_POST['floor']) || !preg_match('/^[0-9]+$/', $_POST['floor'])) {
        $errors = TRUE;
    }
    if (empty($_POST['area']) || !preg_match('/^[0-9]+$/', $_POST['area'])) {
        $errors = TRUE;
    }
    if (empty($_POST['roomsCount']) || !preg_match('/^[0-9]+$/', $_POST['roomsCount'])) {
        $errors = TRUE;
    }
    if (empty($_POST['price']) || !preg_match('/^[0-9]+$/', $_POST['price'])) {
        $errors = TRUE;
    }

    if ($errors) {
        exit();
    }

    $stmt = $db->prepare("INSERT INTO Apartments (Street, House_Number, Apartment_Number, Floor, Area, Rooms_Count, Price) VALUES (:street, :houseNumber, :apartmentNumber, :floor, :area, :roomsCount, :price)");
    //создание запроса
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':houseNumber', $houseNumber);
    $stmt->bindParam(':apartmentNumber', $apartmentNumber);
    $stmt->bindParam(':floor', $floor);
    $stmt->bindParam(':area', $area);
    $stmt->bindParam(':roomsCount', $roomsCount);
    $stmt->bindParam(':price', $price);

    $street = $_POST['street'];
    $houseNumber = $_POST['houseNumber'];
    $apartmentNumber = $_POST['apartmentNumber'];
    $floor = $_POST['floor'];
    $area = $_POST['area'];
    $roomsCount = $_POST['roomsCount'];
    $price = $_POST['price'];

    $stmt->execute(); //отправка
    $id = $db->lastInsertId();
} elseif (isset($_POST['add_buyer_form'])) {
    // Обработка формы Add Buyer
    $errors = FALSE;
    if (empty($_POST['fullNameBuyer']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z\s-]{1,100}$/u', $_POST['fullNameBuyer'])) {
        $errors = TRUE;
    }
    if (empty($_POST['budget']) || !preg_match('/^[0-9]+$/', $_POST['budget'])) {
        $errors = TRUE;
    }
    if (empty($_POST['preferences']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z0-9\s,-]{1,200}$/u', $_POST['preferences'])) {
        $errors = TRUE;
    }
    if (empty($_POST['phoneBuyer']) || !preg_match('/^\+[0-9]{11,14}$/', $_POST['phoneBuyer'])) {
        $errors = TRUE;
    }
    if (empty($_POST['emailBuyer']) || !preg_match('/^([a-z0-9_-]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i', $_POST['emailBuyer'])) {
        $errors = TRUE;
    }
    if (empty($_POST['passportData']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z0-9\s-]{1,100}$/u', $_POST['passportData'])) {
        $errors = TRUE;
    }

    if ($errors) {
        exit();
    }

    $stmt = $db->prepare("INSERT INTO Buyers (Full_Name, Budget, Preferences, Phone, Email, Passport_Data) VALUES (:fullNameBuyer, :budget, :preferences, :phoneBuyer, :emailBuyer, :passportData)");
    //создание запроса
    $stmt->bindParam(':fullNameBuyer', $fullNameBuyer);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':preferences', $preferences);
    $stmt->bindParam(':phoneBuyer', $phoneBuyer);
    $stmt->bindParam(':emailBuyer', $emailBuyer);
    $stmt->bindParam(':passportData', $passportData);

    $fullNameBuyer = $_POST['fullNameBuyer'];
    $budget = $_POST['budget'];
    $preferences = $_POST['preferences'];
    $phoneBuyer = $_POST['phoneBuyer'];
    $emailBuyer = $_POST['emailBuyer'];
    $passportData = $_POST['passportData'];

    $stmt->execute(); //отправка
    $id = $db->lastInsertId();
} elseif (isset($_POST['add_deal_form'])) {
    // Обработка формы Add Deal
    $dealDate = $_POST['dealDate'];
    $dealPrice = $_POST['dealPrice'];
    $apartmentId = $_POST['apartmentId'];
    $buyerId = $_POST['buyerId'];
    $realtorId = $_POST['realtorId'];

    // Проверяем, существуют ли покупатель, квартира и риэлтор с указанными ID
    $checkBuyerQuery = "SELECT * FROM Buyers WHERE Buyer_ID = :buyerId";
    $checkApartmentQuery = "SELECT * FROM Apartments WHERE Apartment_ID = :apartmentId";
    $checkRealtorQuery = "SELECT * FROM Realtors WHERE Realtor_ID = :realtorId";

    $checkBuyerStmt = $db->prepare($checkBuyerQuery);
    $checkApartmentStmt = $db->prepare($checkApartmentQuery);
    $checkRealtorStmt = $db->prepare($checkRealtorQuery);

    $checkBuyerStmt->bindParam(':buyerId', $buyerId);
    $checkApartmentStmt->bindParam(':apartmentId', $apartmentId);
    $checkRealtorStmt->bindParam(':realtorId', $realtorId);

    $checkBuyerStmt->execute();
    $checkApartmentStmt->execute();
    $checkRealtorStmt->execute();

    $buyerExists = $checkBuyerStmt->rowCount() > 0;
    $apartmentExists = $checkApartmentStmt->rowCount() > 0;
    $realtorExists = $checkRealtorStmt->rowCount() > 0;

    if (!$buyerExists || !$apartmentExists || !$realtorExists) {
        $error = "Один или несколько указанных ID не найдены в базе данных.";
        header('Location: ?save=0&error=' . urlencode($error));
        exit();
    }

    $query = "INSERT INTO Deals (Deal_ID, Deal_Date, Deal_Price, Apartment_ID, Buyer_ID, Realtor_ID)
              VALUES (NULL, :dealDate, :dealPrice, :apartmentId, :buyerId, :realtorId)";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':dealDate', $dealDate);
    $stmt->bindParam(':dealPrice', $dealPrice);
    $stmt->bindParam(':apartmentId', $apartmentId);
    $stmt->bindParam(':buyerId', $buyerId);
    $stmt->bindParam(':realtorId', $realtorId);

    try {
        $stmt->execute();
        $message = "Сделка успешно добавлена!";
        header('Location: ?save=1&message=' . urlencode($message));
    } catch (PDOException $e) {
        $error = "Ошибка при добавлении сделки: " . $e->getMessage();
        header('Location: ?save=0&error=' . urlencode($error));
    }
}

header('Location: ?save=1');
?>