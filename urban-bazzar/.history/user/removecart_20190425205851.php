<?php 
include 'app/call.php';
$userId = $_GET['ref'];
if(removecart($conn,$userId)){
	redirection('cart.php');
}
?>