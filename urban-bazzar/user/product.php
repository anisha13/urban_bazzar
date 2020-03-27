

	<!-- Header -->
	<?php include'layouts/header.php'; 
	$Item =  getAllProducts($conn); ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/product.jpg);">
		<h2 class="l-text2 t-center">
			CATEGORIES
		</h2>
		<p class="m-text13 t-center">
			Shop At Urban Bazzar
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				

				<div class="col-sm-6 col-md-8 col-lg-12 p-b-50">
					<!--  -->
					
					<!-- Product -->
					<div class="row">
						<?php
						foreach ($Item as $k => $info):
					?>
						<div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								     <img style="width: 100% ;height: 400px;" src="../admin/uploads/<?php echo $info['product_photo']; ?>"alt="IMG-PRODUCT">
								     <div class="block2-overlay trans-0-4">
										<div class="block2-btn w-size1 trans-0-4" >
											<!-- Button -->
											<a align="center"  href="product-detail.php?ref=<?php echo $info['product_id']; ?>">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												VIEW
											</button>
										</a>
										</div>
									</div>
								
									<div class="block2-txt p-t-20">
									<a href="product-detail.php" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $info['product_name'];?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										Rs <?php echo $info['product_price'];?>
									</span>
								</div>
							</div>
						</div>

						<?php endforeach; ?>

						
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
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
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
