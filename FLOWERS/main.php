
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <style>
        body {
            display:flex;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;

        }
       .container {
        margin-left:650px;
        max-width: 400px;
    margin-top: 100px;
    padding: 20px;
    border-radius: 10px;
    align-items: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: white;
    display: grid;
    justify-items: center;
        }
        h2 {
            color: #007bff;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-left:-10px;
        }
        button.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        button.btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        <p>Введите свою почту и пароль.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Введите Логин</label>
                <input type="text" name="login" class="form-control"  />
            </div>    
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <input type="submit" name="auth_submit" class="btn btn-primary" value="Войти">
            </div>
            <p>Нет аккаунта? <a href="http://flowers/assets/php/View/RegistrationPage.php">Создайте его за минуту</a>.</p>
        </form>
        <p>
        <?php 
            require_once('assets/php/connection.php');
            if (isset($_POST['auth_submit'])) {
                $login = $_POST['login'];
                $pass = $_POST['password'];
                
                //проверка на существуществование пользователя
                $sql = "SELECT * FROM Users WHERE login = '$login' and password = '$pass'";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "Пользователь с такими данными не зарегистрирован";
                }
                else {
                    $sql = "SELECT role FROM Users WHERE login = '$login'";
                    $sql2= "SELECT id FROM Users WHERE login = '$login'";
                    $result = mysqli_query($connect, $sql);
                    $result2 = mysqli_query($connect, $sql2);
                    $role = mysqli_fetch_assoc($result)["role"]; //получение роли пользователя
                    $user_idd = mysqli_fetch_assoc($result2)["id"]; // Ваш идентификатор пользователя
                    setcookie('user_idd', $user_idd, time() + (86400 * 30), "/"); // куки сохраняются на 30 дней
                    if ($role == "admin") {
                        header("Location: http://flowers/assets/php/View/TOVARIADMIN.php");
                    }
                    if ($role == "user") {
                        session_start();
                        $_SESSION['user_login'] = $login;
                        header("Location: http://flowers/assets/php/View/TOVARI.php");                        
                    }     
                    
                }
            }
        ?>
        </p>
    </div>
</body>
</html>
