<?php 
include '../config/call.php';
$infoId = $_GET['ref'];
if(deleteItem($conn,$infoId)){
	showmsg('Item Deleted Successfully','success');
	redirection('manageitem.php');
}
?>