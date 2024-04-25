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

        // выводим результат в виде таблицы
        $output = '<table border="1">';
        $output .= '<tr><th>ID</th><th>ФИО</th><th>Процент вознаграждения</th><th>Телефон</th><th>Email</th></tr>';
        foreach ($realtors as $realtor) {
            $output .= '<tr>';
            $output .= '<td>' . $realtor['Realtor_ID'] . '</td>';
            $output .= '<td>' . $realtor['Full_Name'] . '</td>';
            $output .= '<td>' . $realtor['Commission_Percentage'] . '</td>';
            $output .= '<td>' . $realtor['Phone'] . '</td>';
            $output .= '<td>' . $realtor['Email'] . '</td>';
            $output .= '</tr>';
        }
        $output .= '</table>';

        // возвращаем результат в виде строки
        return $output;
    } catch (PDOException $e) {
        // если произошла ошибка при выполнении SQL-запроса, выводим сообщение об ошибке и завершаем работу скрипта
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>