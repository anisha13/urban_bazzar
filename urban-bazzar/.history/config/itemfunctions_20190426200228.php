<?php
 function insertItem($conn,$data)
 {
 	$stmt = $conn->prepare("INSERT INTO tbl_item(`product_name`, `product_price`, `product_quantity`, `product_photo`, `product_description`, `category_id`, `brand_id`, `product_status`)
 								VALUES(:product_name, :product_price, :product_quantity, :product_photo, :product_description,  :category_id, :brand_id, :product_status)");
 
 	$stmt->bindParam(':product_name',$data['product_name']);
 	$stmt->bindParam(':product_price',$data['product_price']);
 	$stmt->bindParam(':product_quantity',$data['product_quantity']);
 	$stmt->bindParam(':product_photo',$data['product_photo']);
 	$stmt->bindParam(':product_description',$data['product_description']);
    $stmt->bindParam(':category_id',$data['category_id']);
    $stmt->bindParam(':brand_id',$data['brand_id']);
    $stmt->bindParam(':product_status',$data['product_status']);
 	if($stmt->execute())
 		return true;

 	return false;
 								
 }
 function updateItem($conn,$data,$img)
{
	if(isset($data['product_photo']))
	{
		$stmt = $conn->prepare("UPDATE tbl_item SET product_name=:product_name, product_price=:product_price, product_quantity=:product_quantity,product_photo=:product_photo, product_description=:product_description, category_id=:category_id,  brand_id=:brand_id, product_status=:product_status WHERE product_id=:product_id");
		$stmt->bindParam(':product_name',$data['product_name']);
 	$stmt->bindParam(':product_price',$data['product_price']);
 	$stmt->bindParam(':product_quantity',$data['product_quantity']);
 	$stmt->bindParam(':product_photo',$img);
 	$stmt->bindParam(':product_description',$data['product_description']);
    $stmt->bindParam(':category_id',$data['category_id']);
    $stmt->bindParam(':brand_id',$data['brand_id']);
    $stmt->bindParam(':product_status',$data['product_status']);
 	$stmt->bindParam(':product_id',$data['product_id']);
	}
	else
	{
		$stmt = $conn->prepare("UPDATE tbl_item SET product_name=:product_name, product_price=:product_price,product_quantity=:product_quantity,  product_description=:product_description, category_id=:category_id,  brand_id=:brand_id, product_status=:product_status WHERE product_id=:product_id");
	$stmt->bindParam(':product_name',$data['product_name']);
 	$stmt->bindParam(':product_price',$data['product_price']);
 	$stmt->bindParam(':product_quantity',$data['product_quantity']);
 	
 	$stmt->bindParam(':product_description',$data['product_description']);
    $stmt->bindParam(':category_id',$data['category_id']);
    $stmt->bindParam(':brand_id',$data['brand_id']);
    $stmt->bindParam(':product_status',$data['product_status']);
 	$stmt->bindParam(':product_id',$data['product_id']);
	}	
	

	if($stmt->execute())
		return true;


	return false;
}


function getAllItems($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_item");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();

	return false;
}
function getItemById($conn,$id)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_item WHERE product_id=:product_id");
	$stmt->bindParam(':product_id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();

	return false;	
}


function deleteitem($conn,$id)
{
	$info = getItemById($conn,$product_id);
	$stmt= $conn->prepare("DELETE FROM tbl_item WHERE product_id=:product_id");
	$stmt->bindParam(':product_id',$id);
	if($stmt->execute())
	{
		@unlink('uploads/'.$info['product_photo']);
		return true;
	}	


	return false;
}

function getOrders($conn)
{
	$stmt= $conn->prepare("SELECT * FROM tbl_item a JOIN tbl_custlogin b on a.cust_id=b.cust_id");
	$stmt->execute();
	if($stmt->rowCount()>0)
		// return $stmt->fetchAll();
	print_r($stmt->fetchAll());
	exit();
	return false;
}