<?php
include "..\connection.php";
$result = mysqli_query($connect, "SELECT * FROM `TOVAR`");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
    height: 240px;
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
    <img src="logo.jpg" alt="Логотип компании" width="150">
    <h1>Девиз компании</h1>
    <div>
   
     <form action="http://flowers/main.php">
     <button>Выйти из аккаунта</button>
     </form>
     <form action="http://flowers/assets/php/View/ZakaziPage.php">

      <button>Заказы</button>

     </form>

    </div>
  </div>
<div>
  <a href="http://flowers/assets/php/View/Korzzina.php">Корзина</a>
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
                                                        <form method="POST" action="http://flowers/assets/php/add_Korzina.php">
                                                        <button type="submit" name="korz" value="<?php echo $ln['id']; ?>">
                                                        Добавить в корзину 
                                                        </button>
                                                    </form>
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
                            </div>
  </div>
  
</div>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    if (message) {
        if (message === 'exists') {
            alert('Товар уже в корзине');
        } else if (message === 'added') {
            alert('Товар добавлен в корзину');
        } else if (message === 'error') {
            alert('Ошибка при добавлении товара');
        }
    }
    }, 100);
});

</script>
</body>
</html>
