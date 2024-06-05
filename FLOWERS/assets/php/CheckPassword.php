<?php
error_reporting(E_ALL);

// Подключаемся к базе данных
include "connection.php";

// Получаем id пользователя из запроса
$user_id = $_COOKIE['user_idd'];

// Проверяем, есть ли пользователь с таким id в базе данных
$query = mysqli_query($connect, "SELECT `password` FROM `Users` WHERE `id` = '$user_id'");
if ($query) {
    // Получаем пароль пользователя
    $row = mysqli_fetch_assoc($query);
    $password_from_db = $row['pass'];
    
    // Проверяем введенный пароль с паролем из базы данных
    if ($_POST['pass'] === $password_from_db) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Неверный пароль']);
    }
} else {
    // Ошибка запроса
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при выполнении запроса']);
}
?>