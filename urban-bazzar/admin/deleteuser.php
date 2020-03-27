<?php 
include '../config/call.php';
$userId = $_GET['ref'];
if(deleteAdmin($conn,$userId)){
	showmsg('User Deleted Successfully','success');
	redirection('manageuser.php');
}
?>