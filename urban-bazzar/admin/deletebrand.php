<?php 
include '../config/call.php';
$infoId = $_GET['ref'];

if(deleteBrand($conn,$infoId)){
	showmsg('Brand Deleted Successfully','success');
	redirection('manageBrand.php');
}
else{
	showmsg('Failed to delete brand! [Maybe items of this brand is in use]','danger');
	redirection('manageBrand.php');
}
?>