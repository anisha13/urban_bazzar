<?php 
include '../config/call.php';
$infoId = $_GET['ref'];

if(deleteCategory($conn,$infoId)){
	showmsg('Category Deleted Successfully','success');
	redirection('manageCategory.php');
}
else{
	showmsg('Failed to delete category! [Maybe items of this category is in use]','danger');
	redirection('manageCategory.php');
}
?>