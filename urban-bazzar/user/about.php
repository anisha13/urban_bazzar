<!DOCTYPE html>
<html lang="en">
<head>
	<title>About</title>
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

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/contact.jpg);">
		<h2 class="l-text2 t-center">
			About
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="uploads/Colorful-joothis-available-at-Nehru-Bazaar.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Our story
					</h3>

					<p class="p-b-28">
						Urban Bazzar is home to Nepal’s largest and the most fabulous collection of products of all types. Kathmandu, famous for jewellery and clothes, is visited the most by people who love both. There are many markets in Kathmandu selling precious stones, gems, semi-precious stones, and jewelry with a limited warranty. And Urban Bazaar is one of the earliest Kathmandu shopping places where you can buy all these. The plethora of choices and amazing designs makes it one of the best places to shop in Kathmandu and also, it will leave you spellbound, especially the wonderful handmade, delicate jewelry.
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
							Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
						</p>

						<span class="s-text7">
							- Steve Job’s
						</span>
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
	<script src="js/main.js"></script>

</body>
</html>
