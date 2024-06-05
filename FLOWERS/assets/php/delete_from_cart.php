<?php
include "connection.php";

// Проверка подключения
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Получите идентификатор товара в корзине из запроса
$id_korzina = $_POST['id_korzina'];
$id_user = $_COOKIE['user_idd'];

// SQL-запрос для удаления товара из корзины
$sql = "DELETE FROM Korzina WHERE id_korzina = $id_korzina AND id_user = $id_user";

if ($connect->query($sql) === TRUE) {
    echo "Товар успешно удален из корзины.";
    header("Location: http://flowers/assets/php/View/Korzzina.php");

} else {
    echo "Ошибка при удалении товара из корзины: " . $connect->error;
}

$connect->close();
?>