
	<!-- Header -->
	<?php include'layouts/header.php'; 	
	$Item =  getOrderItems($conn); ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/vart.jpg);">
		<h2 class="l-text2 t-center">
			My Orders
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<form method="POST">
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Product</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-6">Status</th>
							</tr>

							<div class="row">
							<?php

								foreach ($Item as $k => $info):
							?>
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="../admin/uploads/<?php echo $info['product_photo']; ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2"><?php echo $info['product_name']; ?></td>
								<td class="column-3"><input type="text" value="<?php echo $info['product_price']; ?>" readonly></td>
								<td class="column-4"><input type="text" value="<?php echo $info['product_amount']; ?> Piece" readonly></td>
								<td class="column-5"><input style="color:green;" type="text" value="Rs <?php echo $info['product_price']*$info['product_amount']; ?>" readonly></td>
								<td class="column-6"><input type="text" value="<?php echo $info['order_status']; ?>" readonly></td>
								

							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>

				<!-- Total -->
				<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total: (Rs)
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							<strong><input type="text" id="total" value=""></strong>
						</span>
					</div>
				</div>
			</form>
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
	<script src="js/main.js"></script>

		
	<script>
			let v = [...document.querySelectorAll('.column-5 input')];
total.value = v.reduce((a,c)=> +c.value.replace(/Rs /,'')+a, 0);
</script>
</body>
</html>
