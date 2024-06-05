<?php
include "connection.php";     
$id_korzina = $_GET['id_korzina'];
$verm = 0;
if($_GET['verh'] ) { // if $_POST['button1'] == true
    if($_GET['new_quantity']<$_GET['koll']){
        $new_quantity = $_GET['new_quantity']+1; 
        $sql = "UPDATE Korzina SET count = $new_quantity WHERE id_korzina = $id_korzina";
        if ($connect->query($sql) === TRUE) {
            echo "Количество товара успешно обновлено.";
            header("Location:http://flowers/assets/php/View/Korzzina.php");
        } 
        else {
            echo "Ошибка при обновлении количества товара: " . $connect->error;
        }
    }
} 
elseif($_GET['niz']  ){
    if($_GET['new_quantity']>1){
        $new_quantity = $_GET['new_quantity']-1;
        $sql = "UPDATE Korzina SET count = $new_quantity WHERE id_korzina = $id_korzina";
        if ($connect->query($sql) === TRUE) {
            echo "Количество товара успешно обновлено.";
            header("Location:http://flowers/assets/php/View/Korzzina.php");
        
        } 
        else {
            echo "Ошибка при обновлении количества товара: " . $connect->error;
        }
    }
}            
if($new_quantity = $_GET['new_quantity']==$_GET['koll']){
    header("Location:http://flowers/assets/php/View/Korzzina.php?message=max");
}
elseif($new_quantity = $_GET['new_quantity']==1 &&$_GET['niz']){
    header("Location:http://flowers/assets/php/View/Korzzina.php?message=min");
}
else {
    header("Location:http://flowers/assets/php/View/Korzzina.php");
}


// SQL-запрос для обновления количества товара в корзине

 

$connect->close();
?>