<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO user (user, pass, status) 
    VALUES (:user, :pass, :status)");

    /*For Update*/
    $stmt = $conn->prepare("UPDATE user SET user=:user, pass=:pass, status=:status";


    $stmt->bindParam(':user', $username);
    $stmt->bindParam(':pass', $password);
    $stmt->bindParam(':status', $stats);

    /*
     $stmt = $conn->prepare("INSERT INTO user (user, pass, status) 
    VALUES (?, ?, ?)");
    $stmt->bindParam(1, $username, PDO::PARAM_STR, 100);
    $stmt->bindParam(2, $password, PDO::PARAM_STR, 100);
    $stmt->bindParam(3, $stats, PDO::PARAM_INT);
    */


    // insert a row
    $username = "John";
    $password = "Doe";
    $stats = 1;
    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>