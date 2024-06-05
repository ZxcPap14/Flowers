<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Prichina = $_POST['prichina'];
    $zak = $_POST['zak'];
    
    // Экранирование данных для предотвращения SQL-инъекций
    $Prichina = "Заказ подтвержден "." | ". date('d.m.Y');
    $zak = $connect->real_escape_string($zak);
    
    // SQL-запрос для обновления статуса заказа
    $query = "UPDATE `Zakazi` SET `Status` = '$Prichina' WHERE `NomerZakaza` = '$zak'";
    
    // Выполнение запроса
    if ($connect->query($query) === TRUE) {
        echo "Статус заказа успешно обновлен.";
    } else {
        echo "Ошибка обновления статуса: " . $connect->error;
    }
    header("Location:http://flowers/assets/php/View/AdminZakazi.php");
    // Закрытие соединения
    $connect->close();
    }
?>