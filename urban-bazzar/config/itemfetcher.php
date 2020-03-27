<?php
function insertuser($conn,$data,$image)
 {
 	$data['cust_password'] = isset($data['cust_password'])? md5($data['cust_password']):'';
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
    try
    {    	
    if($stmtInsert->execute())
        return true;
    	throw new customException($data['cust_email']);
    }
    catch(Exception $e)
    {
    	$_SESSION['error']="Failed to register!(Email might already be in used)";
    }

    return false;
                                
 }
 
function getAllProducts($conn)
 {
 	$stmtSelect = $conn->prepare("SELECT * FROM tbl_item WHERE NOT product_quantity=0 AND product_status='available'");
 	$stmtSelect->execute();
 	return $adminUsers = $stmtSelect->fetchAll();
 }
 function getCartItems($conn)
 {
	$cust_id=$_SESSION['cust_id'];
    $stmtSelect1 = $conn->prepare("SELECT * FROM tbl_cart a JOIN tbl_item b on a.product_id=b.product_id WHERE cust_id=:cust_id");
    $stmtSelect1->bindParam('cust_id',$cust_id);
    $stmtSelect1->execute();
	return $product_id= $stmtSelect1->fetchAll();
}
function getOrderItems($conn)
 {
	$cust_id=$_SESSION['cust_id'];
    $stmtSelect1 = $conn->prepare("SELECT * FROM tbl_orders a JOIN tbl_item b on a.product_id=b.product_id WHERE cust_id=:cust_id");
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
 	$stmtOrder->bindParam(':cust_id',$_SESSION['cust_id']);
 	if($stmtOrder->execute())
 	{
		$stmt = $conn->prepare("DELETE FROM tbl_cart WHERE cust_id=:cust_id");
		$stmt->bindParam(':cust_id',$_SESSION['cust_id']);
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


 
function cart($conn,$data,$product_id,$cust_id,$old_Amt=0)
 {
 	$data['amount']=$data['amount']+$old_Amt;
 	if($old_Amt==0)
 		$stmt = $conn->prepare("INSERT INTO tbl_cart(`product_id`,`cust_id`,`product_amount`)VALUES(:product_id,:cust_id,:product_amount)");
 	else
 		$stmt = $conn->prepare("UPDATE tbl_cart SET `product_amount`=:product_amount WHERE `product_id`=:product_id AND `cust_id`=:cust_id");
	$stmt->bindParam(':product_id',$product_id);
	$stmt->bindParam(':cust_id',$cust_id);
	$stmt->bindParam(':product_amount',$data['amount']);
 	if($stmt->execute())
 	{
		$stmtupdt = $conn->prepare("UPDATE tbl_item SET product_quantity = product_quantity-:product_amount WHERE product_id=:product_id;");
		$stmtupdt->bindParam(':product_id',$product_id);
		$stmtupdt->bindParam(':product_amount',$data['amount']);
		if($stmtupdt->execute())
		{	
			$stmtupdt = $conn->prepare("UPDATE tbl_item SET product_status='unavailable' WHERE product_quantity<1");
			$stmtupdt->execute();
					return true;			
		}



		return false;
	}

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
	$stmt1 = $conn->prepare("SELECT product_amount FROM tbl_cart WHERE product_id=:product_id");
	$stmt1->bindParam(':product_id',$product_id);
	$stmt1->execute();
	$count = $stmt1->fetchColumn();
	$stmtupdt = $conn->prepare("UPDATE tbl_item SET product_quantity = product_quantity+:returnamount WHERE product_id=:product_id;");
	$stmtupdt->bindParam(':product_id',$product_id);
	$stmtupdt->bindParam(':returnamount',$count);
	If($stmtupdt->execute())
	{
		$stmt = $conn->prepare("DELETE FROM tbl_cart WHERE product_id=:product_id");
		$stmt->bindParam(':product_id',$product_id);
		if($stmt->execute())
		return true;
	}
	return false;
}
function getProfileById($conn)
{
	$usr_id= $_SESSION['cust_id'];
	$stmt= $conn->prepare("SELECT * FROM tbl_custlogin WHERE cust_id=:cust_id");
	$stmt->bindParam(':cust_id',$usr_id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();

	return false;	
}
function updateProfile($conn,$data)
{

	if(isset($data['cust_photo']))
	{
		$stmt = $conn->prepare("UPDATE tbl_custlogin SET cust_fname=:cust_fname, cust_lname=:cust_lname, cust_email=:cust_email,cust_photo=:cust_photo,cust_password=md5(:cust_password), cust_address=:cust_address, cust_phone=:cust_phone WHERE cust_id=:cust_id");
		$stmt->bindParam(':cust_fname',$data['cust_fname']);
		$stmt->bindParam(':cust_lname',$data['cust_lname']);
		$stmt->bindParam(':cust_email',$data['cust_email']);
		$stmt->bindParam(':cust_photo',$data['cust_photo']);
		$stmt->bindParam(':cust_password',$data['cust_password']);
		$stmt->bindParam(':cust_address',$data['cust_address']);
		$stmt->bindParam(':cust_phone',$data['cust_phone']);
		$stmt->bindParam(':cust_id',$_SESSION['cust_id']);
	}
	else
	{
		$stmt = $conn->prepare("UPDATE tbl_custlogin SET cust_fname=:cust_fname, cust_lname=:cust_lname, cust_email=:cust_email,cust_password=md5(:cust_password), cust_address=:cust_address, cust_phone=:cust_phone WHERE cust_id=:cust_id");
		$stmt->bindParam(':cust_fname',$data['cust_fname']);
		$stmt->bindParam(':cust_lname',$data['cust_lname']);
		$stmt->bindParam(':cust_email',$data['cust_email']);
		$stmt->bindParam(':cust_password',$data['cust_password']);
		
		$stmt->bindParam(':cust_address',$data['cust_address']);
		$stmt->bindParam(':cust_phone',$data['cust_phone']);
		$stmt->bindParam(':cust_id',$_SESSION['cust_id']);
	}
		
	

	if($stmt->execute())
		return true;


	return false; 
}



 

