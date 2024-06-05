<?php

include "../connection.php";
$result = mysqli_query($connect, "SELECT * FROM `TOVAR` ");

if(isset($_GET['del']) && !empty($_GET['del'])) {

    $id_to_delete = $_GET['del'];
    
    $delete_query = "DELETE FROM `TOVAR` WHERE `id` = $id_to_delete";
    
    $delete_result = mysqli_query($connect, $delete_query);
    
    if ($delete_result == TRUE)
    {
        header('Location: http://flowers/assets/php/View/TOVARIADMIN.php ');
    }
    else
    {
    
    echo "not work";
    
    }
    
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Страница "О нас"</title>
<link rel="stylesheet" href="css/style.css">
<style>
 .container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
  }

 .logo-container {
    text-align: center;
  }
 .slider {
    display: flex;
    overflow-x: scroll;
    scrollbar-width: thin;
    scrollbar-color: #888 #f9f9f9;
    height: 280px;
  }
 .slider::-webkit-scrollbar {
    width: 8px;
  }

 .slider::-webkit-scrollbar-track {
    background: #f9f9f9;
  }

 .slider::-webkit-scrollbar-thumb {
    background: #888;
  }

 .product-item {
    flex: 0 0 auto;
    min-width: 250px;
    margin-right: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
  }

 .product-item img {
    width: 100%;
    height: auto;
  }

 .product-item h3 {
    margin: 10px 0;
    color: #333;
  }
  .img-indent {
	width: 150px;
    height:150px;
	float:left;
	margin:5px 10px 0 0;
}
</style>
</head>
<body>

<div class="container">
  <div class="logo-container">
    <img src="assets/img/logo.jpg" alt="Логотип компании" width="150">
    <h1>Девиз компании</h1>
  </div>
  <div style="display:flex;justify-content:space-around;">
  <li><a href="http://flowers/main.php">Выход</a>
  <li><a href="http://flowers/assets/php/View/CatalogPage.php">Каталог</a>
  <li><a href="http://flowers/assets/php/View/AddPage.php">Добавить</a>
  <li><a href="http://flowers/assets/php/View/AdminZakazi.php">Заказы</a>
</div>
  
  <div class="slider">
  <div style="display:flex;justify-content:space-between;" class="wrapper indent-bot">
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
                                                    <form method="get">
                                                    <button type="submit" name="del" href="http://flowers/assets/php/View/TOVARIADMIN.php" value="<?php echo $ln['id']; ?>">
                                                        Удалить
                                                    </button>
                                                    </form>
                                                    <form action="http://flowers/assets/php/View/EditPage.php" method="get" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?php echo $ln['id']; ?>">
                                                        <button type="submit">Редактировать</button>
                                                    </form>
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
                            </div>
  </div>
  
</div>

</body>
</html>
