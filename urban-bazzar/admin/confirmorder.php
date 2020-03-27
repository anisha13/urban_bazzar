<?php include 'layouts/header.php';
$product_id= $_GET['ref'];
if(updateOrder($conn,$product_id))
{  
    showMsg(' Order confirmed.','success');
    redirection('viewOrders.php');
}