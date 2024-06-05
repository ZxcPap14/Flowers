<?php
include "connection.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$id_user = $_COOKIE['user_idd'];

$sql = "SELECT id_korzina, id_tovara, count FROM Korzina WHERE id_user = $id_user";
$result = $connect->query($sql);

function generateRandomString($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $randomString = '';

    for ($i = 0; $i < 2; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    for ($i = 0; $i < $length - 2; $i++) {
        $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
    }

    return $randomString;
}
function checkOrderNumberExists($connect, $nomer_zakaza) {
    $sql = "SELECT COUNT(*) as count FROM Zakazi WHERE NomerZakaza = '$nomer_zakaza'";
    $result = $connect->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'] > 0; 
    }
    return false; 
}

do {
    $nomer_zakaza = generateRandomString(12);
} while (checkOrderNumberExists($connect, $nomer_zakaza));

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $id_tovar = $row["id_tovara"];
        $count = $row["count"];
        $status = "В обработке"; 

        $insert_sql = "INSERT INTO Zakazi (id_user, id_tovar, count, NomerZakaza, Status) VALUES ($id_user, $id_tovar, $count, '$nomer_zakaza', '$status')";
        if ($connect->query($insert_sql) === TRUE) {

            $delete_sql = "DELETE FROM Korzina WHERE id_korzina = " . $row["id_korzina"];
            $connect->query($delete_sql);
        } else {
            echo "Ошибка при добавлении в таблицу заказов: " . $connect->error;
        }
    }
    echo "Информация из корзины успешно занесена в таблицу заказов.";
} else {
    echo "Нет товаров в корзине для добавления в заказ.";
}

$connect->close();
?>
