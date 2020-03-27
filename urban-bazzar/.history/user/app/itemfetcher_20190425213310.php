<?php
function insertuser($conn,$data,$image)
 {
    $stmtInsert = $conn->prepare("INSERT INTO tbl_custlogin 
                                (`cust_fname`, `cust_lname`, `cust_email`, `cust_photo`,`cust_password`, `cust_address`, `cust_phone`)
                                VALUES(:cust_fname, :cust_lname, :cust_email, :cust_photo,:cust_password,:cust_address,:cust_phone)");
 
    $password = md5($data['cust_password']);
    $stmtInsert->bindParam('cust_fname',$data['cust_fname']);
    $stmtInsert->bindParam('cust_lname',$data['cust_lname']);
    $stmtInsert->bindParam('cust_email',$data['cust_email']);
    $stmtInsert->bindParam('cust_photo',$image);
    $stmtInsert->bindParam('cust_address',$data['cust_address']);
    $stmtInsert->bindParam('cust_phone',$data['cust_phone']);
    $stmtInsert->bindParam('cust_password',$password);
    if($stmtInsert->execute())
        return true;

    return false;
                                
 }

function getAllItems($conn)
 {
 	$stmtSelect = $conn->prepare("SELECT * FROM tbl_item WHERE product_status='available' ");
 	$stmtSelect->execute();
 	return $adminUsers = $stmtSelect->fetchAll();
 }
 function getCartItems($conn)
 {
	// $cust_id=$_SESSION['cust_id'];
    // $stmtSelect1 = $conn->prepare("SELECT product_id FROM tbl_cart WHERE cust_id=:cust_id");
    // $stmtSelect1->bindParam('cust_id',$cust_id);
    // $stmtSelect1->execute();
	// $product_id= $stmtSelect1->fetchAll();

	// foreach($product_id as $productid) {
    //     $stmtactive = $conn->prepare("SELECT * FROM tbl_item WHERE product_id=:products_id");
    //     $stmtactive->bindParam(':products_id',$productid['product_id']);
	// 	$stmtactive->execute();
	// 	 $datas = $stmtactive->fetchAll();
	// 	 print_r($datas);
	// 	 exit();
	// }

	$cust_id=$_SESSION['cust_id'];
    $stmtSelect1 = $conn->prepare("SELECT * FROM tbl_cart a JOIN tbl_item b on a.product_id=b.product_id WHERE cust_id=:cust_id");
    $stmtSelect1->bindParam('cust_id',$cust_id);
    $stmtSelect1->execute();
	return $product_id= $stmtSelect1->fetchAll();
}

 function getSingleItem($conn,$id)
 {
 	$stmtSelect = $conn->prepare("SELECT * FROM tbl_item WHERE product_id=:product_id");
 	$stmtSelect->bindParam('product_id',$id);
 	$stmtSelect->execute();
 	return $adminUsers = $stmtSelect->fetch();
 }

 function order($conn)
 {
 	$stmtOrder = $conn->prepare("INSERT INTO tbl_orders 
 	(`product_id`, `cust_id`, `product_amount`) SELECT * FROM tbl_cart WHERE cust_id=:cust_id");
 	$stmtOrder->bindParam('product_id',$product_id);
 	$stmtOrder->bindParam(':cust_id',$_SESSION['cust_id']);
 	$stmtOrder->bindParam('product_amount',$data['product_amount']);
 	if($stmtOrder->execute())
 	{
		$stmt = $conn->prepare("DELETE FROM tbl_cart WHERE cust_id=$_SESSION['cust_id']");
		if($stmt->execute())
		return true;
		return false;
	}

 	return false;
 }


 function registerMessager($conn,$data)
 {
 	$stmtInsert = $conn->prepare("INSERT INTO tbl_contact 
 								(`name`, `phone`,`email`, `message`)
 								VALUES(:name, :phone, :email,:message)");
 
 	$stmtInsert->bindParam('name',$data['name']);
 	$stmtInsert->bindParam('phone',$data['phone']);
 	$stmtInsert->bindParam('message',$data['message']);
    $stmtInsert->bindParam('email',$data['email']);
 	if($stmtInsert->execute())
 		return true;

 	return false;
 }


 
function cart($conn,$data,$product_id,$cust_id)
 {
 	$stmt = $conn->prepare("INSERT INTO tbl_cart(`product_id`,`cust_id`,`product_amount`)VALUES(:product_id,:cust_id,:product_amount)");
	$stmt->bindParam(':product_id',$product_id);
	$stmt->bindParam(':cust_id',$cust_id);
	$stmt->bindParam(':product_amount',$data['amount']);
 	if($stmt->execute())
 		return true;

 	return false;
 								
 }
function countcart($conn)
{
	$stmt = $conn->prepare("SELECT COUNT(*) FROM tbl_cart WHERE cust_id=:cust_id");
	$stmt->bindParam(':cust_id',$_SESSION['cust_id']);
	$stmt->execute();
	return $count = $stmt->fetchColumn();
}
function removecart($conn,$product_id)
{
	$stmt = $conn->prepare("DELETE FROM tbl_cart WHERE product_id=:product_id");
	$stmt->bindParam(':product_id',$product_id);
	if($stmt->execute())
	return true;
	return false;
}

 function logout(){

    session_destroy();
    return true;
}

