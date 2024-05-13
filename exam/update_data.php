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

if(isset($_POST['id']) && isset($_POST['full_name']) && isset($_POST['faculty_id']) && isset($_POST['course'])){ 
    $id = $_POST['id']; 
    $full_name = $_POST['full_name']; 
    $faculty_id = $_POST['faculty_id']; 
    $course = $_POST['course']; 

    $sql = "UPDATE student SET full_name='$full_name', faculty_id='$faculty_id', course='$course' WHERE id='$id'"; 
    if ($conn->query($sql) === TRUE) {  
        echo "Record updated successfully";  
    } else {  
        echo "Error updating record: " . $conn->error;  
    } 
} 

if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
    $sql = "SELECT * FROM student WHERE id='$id'"; 
    $result = $conn->query($sql);  

    if ($result->num_rows > 0)  
    {  
        $row = $result->fetch_assoc(); 
        echo "<form action='' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name' value='".$row['full_name']."'>
";  
        echo "ID Факультета: <input type='text' name='faculty_id' value='".$row['faculty_id']."'>
";  
        echo "Курс: <input type='text' name='course' value='".$row['course']."'>
";  
        echo "<input type='hidden' name='id' value='".$id."'>"; 
        echo "<input type='submit' value='Сохранить'>
";  
        echo "</form>";  
    }  
    else  
    {  
        echo "ID не найден"; 
    }  
} 
$conn->close();  
?> 