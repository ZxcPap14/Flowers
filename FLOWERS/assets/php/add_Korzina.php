<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_COOKIE['user_idd'];
    $tovar_id = $_POST['korz'];
    $countt = 1;

    $check_sql = "SELECT * FROM `Korzina` WHERE `id_user` = '$user_id' AND `id_tovara` = '$tovar_id'";
    $check_result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        header("Location: http://flowers/assets/php/View/TOVARI.php?message=exists");
    } else {
        $insert_sql = "INSERT INTO `Korzina` (`id_user`, `id_tovara`, `count`) VALUES ('$user_id', '$tovar_id', '$countt')";
        $insert_result = mysqli_query($connect, $insert_sql);

        if ($insert_result) {
            header("Location: http://flowers/assets/php/View/TOVARI.php?message=added");
        } else {
            header("Location: http://flowers/assets/php/View/TOVARI.php?message=error");
        }
    }
    exit();
}
?>
