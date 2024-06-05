<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр заказов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .order-container {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
}

.product-info {
    margin-left: 20px;
}

.count {
    font-weight: bold;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Просмотр заказов</h1>
        <form action="http://flowers/assets/php/View/TOVARI.php">

        <button>Вернутся</button>

        </form>
        <table>
        
            <tbody>
            <?php
include "../connection.php";

// Проверка подключения
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT Z.NomerZakaza, Z.id_user AS IDISHKA , U.name AS UserName, U.surname AS Fama, U.patronymic AS Otch , T.Name AS ProductName, Z.count, Z.Status
        FROM Zakazi Z
        INNER JOIN Users U ON Z.id_user = U.id 
        INNER JOIN TOVAR T ON Z.id_tovar = T.id
        ORDER BY Z.NomerZakaza";
$result = $connect->query($sql);

$prevOrderNumber = null;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       
            if ($row["NomerZakaza"] !== $prevOrderNumber) {
                if ($prevOrderNumber !== null) {
                    echo "</div>";
                }
                echo "<div class='order-container'>
                        <p><strong>Номер заказа:</strong> " . $row["NomerZakaza"]. "</p>
                        <p><strong>ФИО получателя:</strong> " . $row["Fama"]. " " . $row["UserName"]. " " . $row["Otch"]. "</p>";
                    echo "<p><strong>Статус:</strong> " . $row["Status"]. " </p>";
                    
                    if($row["Status"]=="В обработке"){
                    echo "<form action='http://flowers/assets/php/OtkazPage.php' method='POST'>
                        <input type='hidden' name='zak' id='zak' value='" . $row["NomerZakaza"] . "' >
                        <input name='prichina' id='prichina' placeholder='Введите причину'>
                        <button type='submit'>Отказать</button> 
                      </form>";
                      echo "<form action='http://flowers/assets/php/Priniatie.php' method='POST'>
                        <input type='hidden' name='zak' id='zak' value='" . $row["NomerZakaza"] . "' >
                        <button type='submit'>Подтвердить</button> 
                      </form>";
                    }

                    
            }
            echo "<div class='product-info'>
                    <p><strong>Товар:</strong> " . $row["ProductName"]. " <span class='count'>(" . $row["count"]. ")</span></p>
                  </div>";
            $prevOrderNumber = $row["NomerZakaza"];
        
    }
    echo "</div>";
} else {
    echo "<div class='no-orders'>Нет заказов</div>";
}
$connect->close();
?>


            </tbody>
        </table>
    </div>
</body>
</html>
