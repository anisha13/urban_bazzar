
<?php
include '../config/call.php';
$msg ='';
$succ='<script language="javascript">
            alert("Record inserted successfully");
            top.location.href = "login.php"; //the page to redirect
        </script>';
if(isset($_POST['savebtn']))
{$oldName = $_FILES['cust_photo']['name'];
  $temp = explode('.', $oldName);
    $folder ='uploads/';
    if(!is_dir($folder))
      mkdir($folder,777); 
      if(move_uploaded_file($_FILES['cust_photo']['tmp_name'],$folder.$oldName))
        {
  
          if(insertuser($conn,$_POST,$oldName))
          {
              echo $succ;
          }
          else $msg=$_SESSION['error'];
        }
}   
 ?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sign Up</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/signupmain.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Signup Form    
                      
                    </h2>
                    <br>
                </div>
                <div class="card-body">


                    <form method="POST" enctype="multipart/form-data">
                      <label><?php echo $msg; ?>
 </label>
                    <div class="form-row">
                            <div class="name">First name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="cust_fname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Last name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="cust_lname">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="cust_email" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Photo </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="file" name="cust_photo" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="Password" name=" cust_password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Repeat Password </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="Password" name=" cust_confirm_password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Address </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name=" cust_address" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Phone </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name=" cust_phone" >
                                </div>
                            </div>
                        </div>
                        
                        
                        
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit"name="savebtn">Sign Up</button>
                     <button class="btn btn--radius-2 btn--blue-2" type="reset"name="restorebtn">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom checkbox & radio-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!--custom switch-->
    <script src="js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="js/jquery.tagsinput.js"></script>
    
    <!-- colorpicker -->
   
    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <!-- ck editor -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- custom form component script for this page-->
    <script src="js/form-component.js"></script>
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>

    <script type="text/javascript">
        $('#custform').submit(function()
        {
            var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var number= /[0-9 -()+]+$/;
            var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;  
            var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;

            var cust_fname = $('#cust_fname').val();
            var cust_lname = $('#cust_lname').val();
            var cust_email = $('#cust_email').val();
            var cust_password = $('#cust_password').val();
            var cust_confirm_password = $('#cust_confirm_password').val();
            var cust_address = $('#cust_address').val();
            var cust_phone = $('#cust_phone').val();



            if(!alpha.test(cust_fname))
            {
               $("#cust_fname").css({"border": "1px solid red"});
               $('#cust_fname').focus();
               setTimeout(function() 
               {
                   $('#cust_fname').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }


        if(!alpha.test(cust_lname))
        {
           $("#cust_lname").css({"border": "1px solid red"});
           $('#cust_lname').focus();
           setTimeout(function()
            {
               $('#cust_lname').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }


        if(!filter.test(cust_email))
        {
           $("#cust_email").css({"border": "1px solid red"});
           $('#cust_email').focus();
           setTimeout(function() 
            {
               $('#cust_email').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }


        if(!alpha.test(cust_password))
        {
           $("#cust_password").css({"border": "1px solid red"});
           $('#cust_password').focus();
           setTimeout(function() 
            {
               $('#cust_password').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }

       if(!alpha.test(cust_confirm_password) || cust_password!=cust_confirm_password)
        {
           $("#cust_confirm_password").css({"border": "1px solid red"});
           $("#cust_password").css({"border": "1px solid red"});
           $('#cust_confirm_password').focus();
           setTimeout(function()
            {
               $('#cust_password').css({"border": "1px solid #ddd"});
               $('#cust_confirm_password').css({"border": "1px solid #ddd"});
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


        if(!phone_no.test(cust_lname))
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
            $('#custform').submit();
        }








        });
    </script>




<!-- end document-->