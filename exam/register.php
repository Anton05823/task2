
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