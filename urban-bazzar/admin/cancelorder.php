<?php include 'layouts/header.php';
$product_id= $_GET['ref'];
if(cancelOrder($conn,$product_id))
{  
    showMsg(' Order canceled.','success');
    redirection('viewOrders.php');
}