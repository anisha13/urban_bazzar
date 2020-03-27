<?php
 function insertBrand($conn,$data)
 {
 	$stmt = $conn->prepare("INSERT INTO tbl_brand (`brand_name`)	VALUES(:brand_name)");
 	 	
 	$stmt->bindParam('brand_name',$data['brand_name']);
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
 function updateBrand($conn,$data)
{

	
	$stmt = $conn->prepare("UPDATE tbl_brand SET brand_name=:brand_name WHERE brand_id=:brand_id");

	$stmt->bindParam(':brand_name',$data['brand_name']);
	$stmt->bindParam(':brand_id',$data['id']);	

	if($stmt->execute())
		return true;

	return false;
}


function getAllBrands($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_brand");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();

	return false;
}
function getBrandById($conn,$id)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_brand WHERE brand_id=:brand_id");
	$stmt->bindParam(':brand_id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();

	return false;	
}


function deleteBrand($conn,$id)
{

	$info= getBrandById($conn,$id);
	$stmt= $conn->prepare("DELETE FROM tbl_brand WHERE brand_id=:brand_id");
	$stmt->bindParam(':brand_id',$id);
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
