<?php include 'layouts/header.php';
$message_id= $_GET['ref'];
if(deleteMessage($conn,$message_id))
{  
    showMsg(' Message deleted.','success');
    redirection('messages.php');
}