<?php
include "../connection.php";

// Проверка подключения
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// SQL-запрос для получения данных из таблицы Korzina
$id_user = $_COOKIE['user_idd'];

$sql = "SELECT k.id_korzina, t.Name, t.Price, k.count,t.Count
        FROM Korzina k
        INNER JOIN TOVAR t ON k.id_tovara = t.id
        WHERE k.id_user = $id_user";
$result = $connect->query($sql);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
    </style>
</head>
<body>
    <h1>Корзина</h1>
    <form action="http://flowers/assets/php/View/TOVARI.php">
     <button>Вернутся</button>
     </form>
    <table>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Действия</th>
        </tr>
        <?php
        // Проверка наличия данных и их вывод
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $koli4estvo = $row["count"];
                echo "<tr>
                        <td style='width:80px'>" . $row["Name"]. "</td>
                        <td style='width:30px'>" . $row["Price"]. "</td>
                        <td style='width:80px'>
                            <form action='/assets/php/update_quantity.php' method='get'>
                                <input type='hidden' name='koll' value='" . $row["Count"] . "'>
                                <input type='hidden' name='id_korzina' value='" . $row["id_korzina"] . "'>
                                <input readonly type='number' name='new_quantity' value='" . $koli4estvo  . "' min='1' max='" . $row["Count"] . "' style='width: 30px;'>
                                <input type='submit' name='verh' id='verh' value='+'>
                                <input type='submit' name='niz' id ='niz' value='-'>
                            </form>
                        </td>
                        <td style='width:10px'>
                            <form action='/assets/php/delete_from_cart.php' method='post'>
                                <input type='hidden' name='id_korzina' value='" . $row["id_korzina"] . "'>
                                <input type='submit' value='Удалить'>
                            </form>
                            
                        </td>
                        <td style='width:80px' >
                        
                        <p >Всего на складе: " . $row["Count"]. "</p>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Нет товаров в корзине</td></tr>";
        }
        ?>
    </table>
    <form  action="/assets/php/AddZakaz.php" method="post">
    <button type="submit">Занести информацию из корзины в таблицу заказов</button>
    </form>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const message = urlParams.get('message');
        if (message) {
            if (message === 'max') {
                alert('Достигнут максимум товаров');
            } else if (message === 'min') {
                alert('Нельзя выбрать меньше одного товара');
            } 
        }
    }, 100);
});
</script>
</body>
</html>