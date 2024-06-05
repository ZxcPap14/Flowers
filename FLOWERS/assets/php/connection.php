<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zxcpepega";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$connect) {
        die('Ошибка соединения: '.mysqli_connect_error());
    }
?>