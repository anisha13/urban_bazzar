
<?php
function getMessage($conn)
 {
 	$stmtSelect = $conn->prepare("SELECT * FROM tbl_contact");
 	$stmtSelect->execute();
 	return $msg = $stmtSelect->fetchAll();
 }
 function deleteMessage($conn,$id)
{

	$stmt= $conn->prepare("DELETE FROM tbl_contact WHERE message_id=:message_id");
	$stmt->bindParam(':message_id',$id);
	try
	{if($stmt->execute())		
		return true;
		throw(false);
	}
	catch(Exception $e )
	{		
	return false;
	}
}
function getContact($conn)
{
    $stmtmessage=$conn->prepare("SELECT * FROM tbl_contact WHERE message_status='0'");
    $stmtmessage->execute();
    return $datas= $stmtmessage->fetchAll();
}
