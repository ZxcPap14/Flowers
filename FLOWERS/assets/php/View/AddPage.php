<?php  
include "../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$destination = __DIR__ . '\img\\' . $name;
if (move_uploaded_file($tmp_name, $destination)) {
    echo "Файл успешно загружен.";
} else {
    echo "Ошибка при загрузке файла.";
}
    $naz = $_POST["name"];
    $cena = $_POST["price"];
    $strana = $_POST["country"];
    $zxc = $_POST["vid"];
    $cvet = $_POST["color"];
    $kol = $_POST["ccount"];
    $sql = mysqli_query($connect, "INSERT INTO `TOVAR` (`Photo`, `Name`, `Price`,`Country`,`Vid`,`Color`,`Count`) VALUES ('$name', '$naz', '$cena','$strana','$zxc','$cvet','$kol')");
    echo $name;
    echo $naz;
    echo $cena;
    echo $strana;
    echo $zxc;
    echo $cvet;
    if ($sql == TRUE){
       echo "заебись";
    }
    
      

    else{echo "error";}
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление товара</title>
    <style>
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Добавление нового товара</h2>

<form method="POST" enctype="multipart/form-data">
    <label for="photo">Фото:</label><br>
    <input type="file" id="photo" name="photo"><br>
    <label for="name">Имя:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="price">Цена:</label><br>
    <input type="number" id="price" name="price"><br>
    <label for="country">Страна:</label><br>
    <input type="text" id="country" name="country"><br>
    <label for="type">Вид:</label><br>
    <input type="text" id="vid" name="vid"><br>
    <label for="color">Цвет:</label><br>
    <input type="text" id="color" name="color"><br>
    <label for="color">Колличество:</label><br>
    <input type="text" id="ccount" name="ccount"><br>
    <input type="submit" value="Добавить товар"><li><a href="http://flowers/assets/php/View/TOVARIADMIN.php">назад</a><li><a href="http://flowers/assets/php/View/CatalogPage.php">Каталог</a>
</form>

</body>
</html>
