<!DOCTYPE html>
<?php
include '../config/call.php'; 
//if(checkcustLogin())
{
  //  redirect('index.php');
}
$msg='';
if(isset($_POST['loginbtn']))
{
    $cust_email = $_POST['email'];
    $cust_password = md5($_POST['password']);
    $stmtLogin = $conn->prepare("SELECT * FROM tbl_custlogin WHERE cust_email=:cust_email AND cust_password=:cust_password");
    $stmtLogin->bindParam(':cust_email',$cust_email);
    $stmtLogin->bindParam(':cust_password',$cust_password);
    if($stmtLogin->execute())
    {

        $stmtLogin->setFetchMode(PDO::FETCH_ASSOC); 
        //dd($stmtLogin);
        if($stmtLogin->rowCount()>0)
        {
            $custUser = $stmtLogin->fetch();
            session_start();
            $_SESSION['cust_email'] =$custUser['cust_email'];
            $_SESSION['cust_password'] =$custUser['cust_password'];
            $_SESSION['cust_id']=$custUser['cust_id'];
            $_SESSION['cust_name'] =$custUser['cust_fname']." ".$custUser['cust_lname'];
            $_SESSION['cust_photo'] = $custUser['cust_photo'];
            
			redirect('index.php');
		         }
        else
        {
            $msg= "Inavlid Username or Password";
        }
    }
}

if(isset($_POST['signup']))
{
    redirect('signup.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Urban Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util1.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit" name="loginbtn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>