<?php 
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $ima = $_POST["name"];
    $fam = $_POST["surname"];
    $otch = $_POST["patronymic"];
    $telefon = $_POST["phone_number"];
    $po4ta = $_POST["email"];
    $llog = $_POST["login"];
    $parol = $_POST["password"];
    $roles = "user";
    $sql = mysqli_query($connect, "INSERT INTO `Users` (`name`, `surname`, `patronymic`,`phone_number`,`email`,`login`,`password`,`role`) VALUES (`$ima`, `$fam`, `$otch`,`$telefon`,`$po4ta`,`$llog`,`$parol`,`$roles`)");

    if ($sql == TRUE){
       echo "ujas";
    }
    
      

    else{echo "error";}
}


?>