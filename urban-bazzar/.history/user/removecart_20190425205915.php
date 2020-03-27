<?php 
include 'app/call.php';
$product_id = $_GET['ref'];
if(removecart($conn,$prodct_id)){
	redirection('cart.php');
}
?>