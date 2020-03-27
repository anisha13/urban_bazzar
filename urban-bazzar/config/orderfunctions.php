
<?php
function getOrders($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_orders a JOIN tbl_custlogin b on b.cust_id=a.cust_id");
	$stmt->execute();
	return $ans = $stmt->fetchAll();
}
function updateOrder($conn,$data)
{

	
	$stmt = $conn->prepare("UPDATE tbl_orders SET order_status='Confirmed' WHERE product_id=:product_id");

	
	$stmt->bindParam(':product_id',$data);	

	if($stmt->execute())
		return true;

	return false;
}
function cancelOrder($conn,$data)
{

	
	$stmt = $conn->prepare("UPDATE tbl_orders SET order_status='cancel' WHERE product_id=:product_id");

	
	$stmt->bindParam(':product_id',$data);	

	if($stmt->execute())
		return true;

	return false;
}
