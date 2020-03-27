<?php

function getLoginDetail($conn,$data)
{
	$data['password'] = md5($data['password']);
	$stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email=:email AND password=:password AND status='active'");
	$stmt->bindParam(':email',$data['email']);
	$stmt->bindParam(':password',$data['password']);
	if($stmt->execute())
	{
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		if($stmt->rowCount()>0)
		{
			$info = $stmt->fetch();
			$_SESSION['email'] = $info['email'];
			$_SESSION['role'] = $info['role'];
			$_SESSION['photo'] = $info['photo'];

		return true;
	
		}
			}

	return false;
}
function getCustLoginDetail($conn,$data)
{
	$data['cust_password'] = md5($data['cust_password']);
	
	$stmt = $conn->prepare("SELECT * FROM tbl_custlogin WHERE cust_email=:cust_email AND cust_password=:cust_password ");
	$stmt->bindParam(':cust_email',$data['cust_email']);
	$stmt->bindParam(':cust_password',$data['cust_password']);
	if($stmt->execute())
	{
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		if($stmt->rowCount()>0)
		{
			$info = $stmt->fetch();
			$_SESSION['cust_email'] = $info['cust_email'];
			
			$_SESSION['cust_photo'] = $info['cust_photo'];

		return true;
	
		}
			}

	return false;
}

function getCustPasswordCheck($conn,$data)
{
	$data['cust_password'] = md5($data['cust_password']);
	$stmt = $conn->prepare("SELECT * FROM tbl_custlogin WHERE cust_email=:cust_email AND cust_password=:cust_password ");
	//dd($data);exit();
	$stmt->bindParam(':cust_email',$data['cust_email']);
	$stmt->bindParam(':cust_password',$data['cust_password']);
	if($stmt->execute())
	{
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($stmt->rowCount()>0)
		{
			$info = $stmt->fetch();

		return true;
	
		}
			}

	return false;
}



function checkAdminLogin()
{
	if(isset($_SESSION['email'])&& isset($_SESSION['role']))
		return true;

	return false;
}

function logout(){

	session_destroy();
	return true;
}