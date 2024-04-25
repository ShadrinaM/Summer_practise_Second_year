<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print ('Спасибо, результаты сохранены.');
    }
    include ('main.php');
    exit();
}

$errors = FALSE;
if (empty($_POST['fullNameRealtor']) || !preg_match('/^[а-яА-ЯёЁa-zA-Z\s-]{1,150}$/u', $_POST['fullNameRealtor'])) {
    print ('Заполните имя.<br/>');
    $errors = TRUE;
}
if (empty($_POST['commissionPercentage']) || !preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $_POST['commissionPercentage'])) {
    print ('Заполните процент вознаграждения.<br/>');
    $errors = TRUE;
}
if (empty($_POST['phoneRealtor']) || !preg_match('/^\+[0-9]{11}$/', $_POST['phoneRealtor'])) {
    print ('Заполните телефон.<br/>');
    $errors = TRUE;
}

if (empty($_POST['emailRealtor']) || !preg_match('/^([a-z0-9_-]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i', $_POST['emailRealtor'])) {
    print ('Заполните почту.<br/>');
    $errors = TRUE;
}

include ('../ShadrinaMM_Web2//Secret.php');
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

header('Location: ?save=1');
?>