<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $id=2;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE from user where id = :id"); 
   // $stmt->bindParam(1, $id,  PDO::PARAM_INT);
     $stmt->bindParam(":id", $id);
   
    $stmt->execute();
    $a=$stmt->errorInfo();
    echo $a[2];
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>