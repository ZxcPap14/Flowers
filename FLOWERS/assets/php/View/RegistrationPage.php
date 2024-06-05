
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
       .container {
            width: 80%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="tel"], input[type="email"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: -10px;
        }
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            border-top: none;
            margin-left: -10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Имя" >
        <input type="text" name="surname" placeholder="Фамилия" >
        <input type="text" name="patronymic" placeholder="Отчество" >
        <input type="tel" name="phone_number" placeholder="Номер телефона" >
        <input type="email" name="email" placeholder="Email" >
        <input type="text" name="login" placeholder="Логин" >
        <input type="password" name="password" placeholder="Пароль" >
        <button type="submit" name="auth_submit" >Регистрация</button>
        <li><a href="http://flowers/main.php">назад</a>
    </form>
    <p>
    <?php 
require_once('..\connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['auth_submit'])) 
    {
        //echo "zxc"; 
        $ima = $_POST["name"];
        $fam = $_POST["surname"];
        $otch = $_POST["patronymic"];
        $telefon = $_POST["phone_number"];
        $po4ta = $_POST["email"];
        $llog = $_POST["login"];
        $parol = $_POST["password"];
        $roles = "user";
        $sql = mysqli_query($connect, "INSERT INTO `Users` (`name`, `surname`, `patronymic`,`phone_number`,`email`,`login`,`password`,`role`) VALUES ('$ima', '$fam', '$otch','$telefon','$po4ta','$llog','$parol','$roles')");

        if ($sql == TRUE)
        {
            echo "zbc";
        }
        else
        {
            printf("Ошибка при добавлении данных: ".mysqli_error($connect));
        }   
    }
}
?>
    </p>
</div>

</body>
</html>
