<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
    <style>
        body {
            margin-top: 50px;
            margin-left: 20px;
            padding: 0;
            font-family: sans-serif;
            background-color: rgb(247, 247, 247);
        }

        table {
            margin: 0 auto;
            border-spacing: 0;
            width: 800px;
            color: #050408;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #050408;
        }

        form {
            margin-top: 25px;
            color: #050408;
            width: 400px;
        }

        input[type="text"] {
            padding: 10px 5px 10px 5px;
            border: 1px solid rgb(178, 178, 178);
            box-sizing : content-box;
            border-radius: 3px;
            margin: 5px 0;
            width: 100%;
        }

        input[type="submit"] {
            padding: 5px;
            margin: 5px 0;
            cursor: pointer;
            background: rgb(61, 157, 179);
            padding: 8px 5px;
            border: 1px solid rgb(28, 108, 122);
            border-radius: 3px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background: rgb(74, 179, 198);
        }

        .grid{
          margin-top: 50px;
          display: grid;
          grid-template-columns: repeat(3, 1fr);
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "exam"; 

    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) 
    { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    $sql = "SELECT id_user, fam, imya, otch FROM users";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table><tr><th>ID</th><th>full_name</th><th>faculty_id</th><th>course</th></tr>"; 
        while($row = $result->fetch_assoc()) 
        { 
            echo "<tr><td>".$row["id_user"]."</td><td>".$row["fam"]."</td><td>".$row["imya"]."</td><td>".$row["otch"]."</td></tr>"; 
        } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 

        // Форма редактирования и удаления 
        echo "<div class='grid'><div>";
        echo "<form action='insert_data.php' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name'><br>"; 
        echo "ID Факультета: <input type='text' name='faculty_id'><br>"; 
        echo "Курс: <input type='text' name='course'><br>"; 
        echo "<input type='submit' value='Добавить'><br>"; 
        echo "</form></div>";
        
        echo "<div><form action='update_data.php' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name'><br>"; 
        echo "ID Факультета: <input type='text' name='faculty_id'><br>"; 
        echo "Курс: <input type='text' name='course'><br>";       
        echo "ID: <input type='text' name='id'>";  echo "<input type='submit' value='Редактировать'>"; 
        echo "</form></div>"; 

        echo "<div><form action='delete_data.php' method='post'>"; 
        echo "ID: <input type='text' name='id'>"; 
        echo "<input type='submit' value='Удалить'>"; 
        echo "</form></div></div>"; 

        $conn->close(); 
    ?>
</body>

</html>