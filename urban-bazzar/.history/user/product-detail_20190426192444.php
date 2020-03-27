<?php 
	include '../user/app/call.php';
	$product_id=$_GET['ref'];
	$cust_id=$_SESSION['cust_id'];
	$Info =getSingleItem($conn,$product_id); 
	if(isset($_POST['cartbtn']))
	{
		if(cart($conn,$_POST,$product_id,$cust_id))
		{
			redirect('cart.php');
		};
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<?php include'layouts/header.php'?>

	<!-- breadcrumb -->
		<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					
					<div class="slick3">
						<div class="item-slick3" data-thumb="images/thumb-item-01.jpg">
							<div class="wrap-pic-w">
								<img style="width: 100% ;height: 100%;" src="../admin/uploads/<?php echo $Info['product_photo']; ?>" height="300" width="300" alt="IMG-PRODUCT">
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<strong><?php echo $Info['product_name'];?></strong>
				</h4>


				<div class="p-b-45">
					<span class="s-text8 m-r-35">Rs<?php echo $Info['product_price'];?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $Info['product_description'];?>
						</p>
					</div>
				</div>
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="product-detail-name p-b-13 m-text19">
						Available on stock
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="m-text14">
							<input type="text" value="<?php echo $Info['product_quantity'];?>" id="check">
						</p>
					</div>
				</div>
				<div class="p-t-15 p-b-23">
				<form method="POST" enctype="multipart/form-data">				
					<div class="flex-w bo5 of-hidden w-size17">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" onclick="don()">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>
						<input class="size8 m-text18 t-center num-product" type="number" id="second" name="amount" value="1">
						<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" id="plus" onclick="don()">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>
					</div><hr>
					<button value="submit" href="cart.php" class="btn btn-primary" name="cartbtn"><i class="fas fa-shopping-cart"></i> ADD</button>
				</form>
				</div>
				
			</div>
			</div>
		</div>
	</div>


	
	<!-- Footer -->
	<?php include'layouts/footer.php'?>

	

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>


<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript">
        $('#adminform').submit(function()
        {
            var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;  
            var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;

            var cust_name = $('#cust_name').val();
            var cust_address = $('#cust_address').val();
            var cust_phone = $('#cust_phone').val();
           

            if(!alpha.test(cust_name))
            {
               $("#cust_name").css({"border": "1px solid red"});
               $('#cust_name').focus();
               setTimeout(function() 
               {
                   $('#cust_name').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }


        if(!alpha.test(cust_address))
        {
           $("#cust_address").css({"border": "1px solid red"});
           $('#cust_address').focus();
           setTimeout(function()
            {
               $('#cust_address').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }


        if(!phone_no.test(cust_phone))
        {
           $("#cust_phone").css({"border": "1px solid red"});
           $('#cust_phone').focus();
           setTimeout(function() 
            {
               $('#cust_phone').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }



         else
        {
            $('#adminform').submit();
        }








        });
		function don(){
			if(document.getElementById("second").value == (document.getElementById("check").value-1))
			{
				document.getElementById("plus").disabled = true;
				plus.style.backgroundColor="red";
			}
		}
		funtion son(){
			document.getElementById("plus").disabled = false;
		}
	</script>

</body>
</html>
