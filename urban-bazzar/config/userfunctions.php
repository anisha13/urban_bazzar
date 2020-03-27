<?php
function insertAdmin($conn,$data,$image)
{
	$data['password'] = isset($data['password'])? md5($data['password']):'';
	$stmt = $conn->prepare("INSERT INTO tbl_admin(`f_name`, `l_name`, `email`, `password`, `photo`,`address`, `contact`, `role`, `status`) VALUES (:f_name, :l_name, :email, :password, :photo, :address, :contact, :role, :status)");
	$stmt->bindParam(':f_name',$data['f_name']);
	$stmt->bindParam(':l_name',$data['l_name']);
	$stmt->bindParam(':email',$data['email']);
	$stmt->bindParam(':password',$data['password']);
	$stmt->bindParam(':photo',$data['photo']);
	$stmt->bindParam(':address',$data['address']);
	$stmt->bindParam(':contact',$data['contact']);
	
	$stmt->bindParam(':role',$data['role']);
	$stmt->bindParam(':status',$data['status']);
try
    {    	
    
	if($stmt->execute())
		return true;
	throw new customException($data['email']);
    }
    catch(Exception $e)
    {
    	$_SESSION['error']="Failed to register!(Email might already be in used)";
    }


	return false;
}

function updateAdmin($conn,$data)
{
	if(!empty($data['photo']))
	{
		$stmt = $conn->prepare("UPDATE tbl_admin SET f_name=:f_name, l_name=:l_name, email=:email,photo=:photo, address=:address, contact=:contact,  role=:role, status=:status WHERE id=:id");
		$stmt->bindParam(':f_name',$data['f_name']);
		$stmt->bindParam(':l_name',$data['l_name']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':photo',$data['photo']);
		$stmt->bindParam(':address',$data['address']);
		$stmt->bindParam(':contact',$data['contact']);
		
		$stmt->bindParam(':role',$data['role']);
		$stmt->bindParam(':status',$data['status']);
		$stmt->bindParam(':id',$data['id']);
	}
	else
	{
		$stmt = $conn->prepare("UPDATE tbl_admin SET f_name=:f_name, l_name=:l_name, email=:email, address=:address, contact=:contact, role=:role, status=:status WHERE id=:id");
		$stmt->bindParam(':f_name',$data['f_name']);
		$stmt->bindParam(':l_name',$data['l_name']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':address',$data['address']);
		$stmt->bindParam(':contact',$data['contact']);
		$stmt->bindParam(':role',$data['role']);
		$stmt->bindParam(':status',$data['status']);
		$stmt->bindParam(':id',$data['id']);	
	}
	

	if($stmt->execute())
		return true;


	return false;
}

function changeAdminPassword($conn,$data)
{
		$stmt = $conn->prepare("UPDATE tbl_admin SET password=:password WHERE email=:email");
		
		
		$stmt->bindParam(':password',$data['password']);
		$stmt->bindParam(':email',$data['email']);
	
	

	if($stmt->execute())
		return true;


	return false;
}
function changeCustomerPassword($conn,$data)
{
		$stmt = $conn->prepare("UPDATE tbl_custlogin SET cust_password=:cust_password WHERE cust_email=:cust_email");
		
		
		$stmt->bindParam(':cust_password',$data['cust_password']);
		$stmt->bindParam(':cust_email',$data['cust_email']);
	
	

	if($stmt->execute())
		return true;


	return false;
}


function getAllAdmins($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_admin");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();

	return false;
}

function getAdminById($conn,$id)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_admin WHERE id=:id");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();

	return false;	
}


function deleteAdmin($conn,$id)
{
	$user = getAdminById($conn,$id);
	$stmt= $conn->prepare("DELETE FROM tbl_admin WHERE id=:id");
	$stmt->bindParam(':id',$id);
	if($stmt->execute())
	{
		@unlink('uploads/'.$user['photo']);
		return true;
	}	


	return false;
}
function getuser($conn)
 {
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_custlogin");
    $stmtSelect->execute();
    return $info = $stmtSelect->fetchAll();
 }
 