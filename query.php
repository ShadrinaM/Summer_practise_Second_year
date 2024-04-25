<?php
function getAllRealtors()
{
    include ('../ShadrinaMM_Web2/Secret.php');
    $host = 'localhost'; // хост базы данных
    $user = userr; // имя пользователя базы данных
    $password = passs; // пароль базы данных
    $dbname = $user; // имя базы данных
    
    try {
        // создаем соединение с базой данных
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // устанавливаем режим обработки ошибок PDO на исключения
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // создаем SQL-запрос для получения всех данных из таблицы Realtors
        $sql = "SELECT * FROM Realtors";

        // выполняем SQL-запрос и получаем результат
        $stmt = $conn->query($sql);
        $realtors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // закрываем соединение с базой данных
        $conn = null;

        // возвращаем массив со всеми данными из таблицы Realtors
        return $realtors;
    } catch (PDOException $e) {
        // если произошла ошибка при выполнении SQL-запроса, выводим сообщение об ошибке и завершаем работу скрипта
        echo "Error: " . $e->getMessage();
        exit();
    }
} ?>