<?php 
include '../config/call.php';
$product_id = $_GET['ref'];
if(removecart($conn,$product_id)){
	redirection('cart.php');
}
?>