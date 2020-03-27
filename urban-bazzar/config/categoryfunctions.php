<?php
 function insertCategory($conn,$data)
 {
 	$stmt = $conn->prepare("INSERT INTO tbl_category (`category_name`)	VALUES(:category_name)");
 	 	
 	$stmt->bindParam('category_name',$data['category_name']);
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


 function updateCategory($conn,$data)
{

	
	$stmt = $conn->prepare("UPDATE tbl_category SET category_name=:category_name WHERE category_id=:category_id");

	$stmt->bindParam(':category_name',$data['category_name']);
	$stmt->bindParam(':category_id',$data['id']);	

	if($stmt->execute())
		return true;

	return false;
}



function getAllCategories($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_category");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();

	return false;
}


function getCategoryById($conn,$id)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_category WHERE category_id=:category_id");
	$stmt->bindParam(':category_id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();

	return false;	
}


function deleteCategory($conn,$id)
{

	$info= getCategoryById($conn,$id);
	$stmt= $conn->prepare("DELETE FROM tbl_category WHERE category_id=:category_id");
	$stmt->bindParam(':category_id',$id);
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
