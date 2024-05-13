<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="free-icon-web-3178162.png">
    <title>Site</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ekzamen";

$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) 
{ 
    die("Connection failed: " . $conn->connect_error); 
} 

$id = $_POST['id'];

$sql = "DELETE FROM student WHERE id = $id";

if ($conn->query($sql) === TRUE) 
{
    echo "Запись успешна удалена";
} 
else 
{
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>
<button onclick="goBack()">Вернуться назад</button>

<script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>