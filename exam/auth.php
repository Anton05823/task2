<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ekzamen"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  session_start();
  $_SESSION['username'] = $username;
  
  if($row['role_id'] == 1){
    header('Location: index.php');
  } else {
    header('Location: user_page.php');
  }
} else {
  echo "Ошибка: неверное имя пользователя или пароль.";
}

$conn->close();
?>



















































<!-- registrationAuthorization -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="free-icon-web-3178162.png">
<link rel="stylesheet" href="style.css">
<title>Site</title>
</head>
<body>
<div class="container">
    <h1>Авторизация/Регистрация</h1>
    <button onclick="toggleForm('login')" class="vibor">Авторизация</button>
    <button onclick="toggleForm('register')" class="vibor">Регистрация</button>
    <div id="registerForm" class="form">
        <h2>Регистрация</h2>
        <form action="register.php" method="post">
            <div class="avto">
                <input type="email" id="username" name="username" required>
                <label for="username">Логин</label>
            </div>
            <div class="avto">
                <input type="text" id="fio" name="fio" required>
                <label for="username">ФИО</label>
            </div>
            <div class="avto">
                <input type="password" id="password" name="password" required>
                <label for="password">Пароль</label>
            </div>            
                <input type="submit" class="vibori" value="Зарегистрироваться">
        </form>
    </div>
</div>
<script>
    function toggleForm(formName) {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        if (formName === 'login') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        } else if (formName === 'register') {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }
    }
</script>
<div id="loginForm" class="form" style="display:none;">
    <h2>Авторизация</h2>
    <form action="auth.php" method="post">
        <div class="container-login"> 
            <div class="avto">
                <input type="text" name="username" required>
                <label for="username"><b>Логин</b></label>                   
            </div> 
            <div class="avto">
                <input type="password" name="password" required>
                <label for="password"><b>Пароль</b></label>
            </div>
            <input type="submit" class="vibori" value="Войти">
            </div>
    </form>
</div>
</body>
</html>
<!-- auth.php -->
<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ekzamen"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  session_start();
  $_SESSION['username'] = $username;
  
  if($row['role_id'] == 1){
    header('Location: index.php');
  } else {
    header('Location: user_page.php');
  }
} else {
  echo "Ошибка: неверное имя пользователя или пароль.";
}

$conn->close();
?>
<!-- register.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ekzamen"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка при подключении: " . $conn->connect_error);
}

$username = $_POST['username'];
$fio = $_POST['fio'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "Такой логин уже занят";
} else {
    $sql = "INSERT INTO users (username, fio, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $fio, $password);

    if ($stmt->execute()) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>
<button onclick="goBack()">Вернуться на страницу авторизации</button>

<script>
function goBack() {
window.history.back();
}
</script>
</body>
</html>