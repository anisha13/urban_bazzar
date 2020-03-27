<?php include 'layouts/header.php';
$message_id= $_GET['ref'];
$read=$conn->prepare('UPDATE tbl_contact SET message_status="1" WHERE message_id='.$message_id.'');

if($read->execute())
{  
    showMsg(' Message Read.','success');
    redirection('messages.php');
}