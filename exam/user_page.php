<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <style>
            body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(#141e30, #243b55);
            color: white;
        }

        .panel {
            background-color: #1c262e;
            padding: 20px;
            text-align: center;
        }

        .table {
            margin-top: 20px;
            padding: 20px;
            background-color: #1c262e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: white;
        }

        th {
            background-color: #48525e;
        }

        .contacts {
            background-color: #48525e;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <script>alert('Добро пожаловать!')</script>

<div class="panel">
    <h1>Дисциплина</h1>
</div>
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
    $sql = "SELECT id, name, department_id FROM discipline";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table><tr><th>ID</th><th>name</th><th>department_id</th></tr>"; 
        while($row = $result->fetch_assoc()) 
        { 
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["department_id"]; 
        } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 
    $conn->close(); 
?>

<div class="contacts">
    <h3>Контакты факультета</h3>
    <p>Телефон: 123-456</p>
    <p>Email: example@faculty.com</p>
</div>

</body>
</html>
