<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>User</th><th>Pass</th><th>Status</th></tr>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, user, pass, status FROM user"); 
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach($stmt->fetchAll() as $k=>$v) { 
        echo "<tr style='border: solid 1px black;'>";
        echo "<td>".$v['id']."</td>";
        echo "<td>".$v['user']."</td>";
        echo "<td>".$v['pass']."</td>";
        echo "<td>".$v['status']."</td>";
        echo "</tr>";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo $stmt->rowCount();
?>