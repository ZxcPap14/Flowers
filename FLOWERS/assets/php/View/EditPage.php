<!DOCTYPE html>
<html lang="ru">
<?php
include "../connection.php";

// Проверка, что страница загружена с параметром `id`
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Получение текущих данных товара из базы данных
    $result = mysqli_query($connect, "SELECT * FROM `TOVAR` WHERE `id` = $id");
    $tovar = mysqli_fetch_assoc($result);
}

// Обработка данных формы при отправке
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $destination = __DIR__ . '/img/' . $name;

    if (!empty($name) && move_uploaded_file($tmp_name, $destination)) {
        echo "Файл успешно загружен.";
    } else {
        $name = $tovar['Photo']; // Если новое фото не загружено, оставляем старое
    }

    $naz = $_POST["name"];
    $cena = $_POST["price"];
    $strana = $_POST["country"];
    $zxc = $_POST["vid"];
    $cvet = $_POST["color"];

    $sql = mysqli_query($connect, "UPDATE `TOVAR` SET `Photo` = '$name', `Name` = '$naz', `Price` = '$cena', `Country` = '$strana', `Vid` = '$zxc', `Color` = '$cvet' WHERE `id` = $id");

    if ($sql == TRUE) {
        echo "Товар успешно обновлен.";
    } else {
        echo "Ошибка при обновлении товара.";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
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

<h2>Редактирование товара</h2>

<form method="POST" enctype="multipart/form-data">
    
    <?php echo"<img style='width:240px' src='../View/img/".$tovar["Photo"]."'>" ?>
    <br>
    <input type="file" id="photo" name="photo" ><br>
    <label for="name">Имя:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $tovar['Name']; ?>"><br>
    <label for="price">Цена:</label><br>
    <input type="number" id="price" name="price" value="<?php echo $tovar['Price']; ?>"><br>
    <label for="country">Страна:</label><br>
    <input type="text" id="country" name="country" value="<?php echo $tovar['Country']; ?>"><br>
    <label for="type">Вид:</label><br>
    <input type="text" id="vid" name="vid" value="<?php echo $tovar['Vid']; ?>"><br>
    <label for="color">Цвет:</label><br>
    <input type="text" id="color" name="color" value="<?php echo $tovar['Color']; ?>"><br>
    <input type="submit" value="Обновить товар">
    <li><a href="http://flowers/assets/php/View/TOVARIADMIN.php">Назад</a></li>
    <li><a href="http://flowers/assets/php/View/CatalogPage.php">Каталог</a></li>
</form>

</body>
</html>