	<?php 
	include'layouts/header.php';
	$msg="";
	 if(isset($_POST['passwordChangeBtn']))
    {         
        if($_POST['cust_password']!=$_POST['password2'])
        {
            showMsg("Password don't match! Please try again.","fail");
        }  
        elseif(getCustPasswordCheck($conn,array('cust_email'=>$_SESSION['cust_email'],'cust_password'=>$_POST['oldPassword'])))
        {
            if(changeCustomerPassword($conn,array('cust_email'=>$_SESSION['cust_email'],'cust_password'=>md5($_POST['cust_password']))))
                showMsg("Password Changed Successfully!","success");
            else
            {
                showMsg($_SESSION['error_msg'],"fail");
            }
        }
        else
        {
            showMsg("Wrong password!","fail");
        }
        unset($_POST);
    }

	
?>




	
              
    <div class="container" style="margin-top:50px;">
  
          <!-- Slide1 -->
	<section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Change Password</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                        <li><i class="fa fa-laptop"></i>Change Password</li>  
                        <h4 style="color: blue; font-size:20px;"><?php echo $msg; ?></h4>
                    </ol>
                </div>
            </div>
          <!-- Today status end -->
          <?php
              displayMsg();
          ?>
            
              <form method="POST" >
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName1">Current Password *</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control required"  name="oldPassword" type="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="password1"> New Password </label>
                                                        <div class="col-lg-10">
                                                            <input id="password1"  type="password" name="cust_password" class="required form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="confirm1">Confirm Password </label>
                                                        <div class="col-lg-10">
                                                            <input id="confirm1" type="password" name="password2" class="required form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        
                                                    </div>
                                                                                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"></label>
                                                        <div class="col-md-10">
                                                            <span class="input-group-btn">
                                                                    <button type="reset" class="btn waves-effect waves-light btn-danger" style="margin-right:10px;">Reset </button>
                                                                    <button type="submit" class="btn waves-effect waves-light btn-primary" name="passwordChangeBtn">Save </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form>
      
</section></section></div>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="about.php" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php include'layouts/footer.php'?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
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
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
