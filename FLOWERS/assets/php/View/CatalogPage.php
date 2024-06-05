<?php 
include "../connection.php";
$result = mysqli_query($connect, "SELECT * FROM `TOVAR`");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<style>


body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

header {
    background-color: #f8f9fa;
    padding: 20px;
    text-align: center;
}

.catalog {
    display: flex;
    margin-left:40px;
    /* grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); */
    /*gap: auto;*/ 
    justify-content: start;
    padding: 20px;
    flex-direction: row;
    flex-wrap: wrap;
}

.catalog-item {
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.catalog-item img {
    width: 100%;
    height: auto;
}

.catalog-item.info {
    padding: 15px;
    text-align: center;
}

.catalog-item.info h3 {
    margin: 0;
    font-size: 18px;
}

.catalog-item.info p {
    font-size: 14px;
    color: #333;
}
.img-indent {
	width: 150px;
    height:150px;
	float:left;
	margin:5px 10px 0 0;
}
footer {
    background-color: #f8f9fa;
    padding: 20px;
    text-align: center;
}
</style>
<header>
    <nav style="display: flex; align-items: center;justify-content: space-evenly;">
    <li><a href="http://flowers/assets/php/View/CatalogPage.php">Каталог</a>
  <li><a href="http://flowers/assets/php/View/AddPage.php">Добавить</a>
  <li><a href="http://flowers/assets/php/View/TOVARIADMIN.php">Товары</a>
    </nav>
</header>

<main>
    <section class="catalog">
    <?php
                                $i = 0;
                                    while($ln = mysqli_fetch_assoc($result)){
                                        ?>
                                            <div class="grid_7 alpha">
                                                <div class="wrapper">
                                                    <img src="img\<?php echo $ln['Photo']; ?>" alt="" class="img-indent">
                                                    <dl class="extra-wrap def-list-1">
                                                        <dt>
                                                        <?php echo $ln['Name']; ?>
                                                        </dt>
                                                        <dd style="margin-inline-start:0px;">
                                                        <?php echo $ln['Price']; ?> rubzov
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                    <?php
                                    $i = $i + 1;
                                    if($i % 3 == 0){
                                        ?>
                                        <br>
                                        <?php
                                    }
                                }
                                ?>
    </section>
</main>

<footer>
    <!-- Подвал сайта -->
</footer>

</body>
</html>
