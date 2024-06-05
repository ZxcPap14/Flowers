<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_FILES['test1']['name'];
$tmp_name = $_FILES['test1']['tmp_name'];
move_uploaded_file($tmp_name, "C:\ospanel\domains\FLOWERS\assets\php\View\img\\$name");
    $naz = $_POST["name"];
    $cena = $_POST["price"];
    $strana = $_POST["country"];
    $zxc = $_POST["vid"];
    $cvet = $_POST["color"];

    $sql = mysqli_query($connect, "INSERT INTO `TOVAR` (`Photo`, `Name`, `Price`,`Country`,`Vid`,`Color`) VALUES ('$name', '$naz', '$cena','$strana','$zxc','$cvet')");
    echo $name;
    echo $naz;
    echo $cena;
    echo $strana;
    echo $zxc;
    echo $cvet;
    if ($sql == TRUE){
       echo "ujas";
    }
    
      

    else{echo "error";}
}
