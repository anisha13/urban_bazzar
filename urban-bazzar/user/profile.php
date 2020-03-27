
  <!-- Header -->
  <?php include'layouts/header.php';

  
  $userId = $_GET['ref'];
  $user = getProfileById($conn);



   if(isset($_POST['savebtn']))
   {
  
    if(!($_FILES['file']['error']!="0"||empty($_FILES['file']['name'])))
    {
      
      $image=uploadFile('uploads',$_FILES['file']);
      $_POST['cust_photo'] = $image;
      @unlink('uploads/'.$user['photo']);
          
    }
     else
  {
    $_POST['cust_photo'] = $user['cust_photo'];
  }

    if(updateProfile($conn,$_POST))
    {
       $_SESSION['cust_photo']=$image; 
      showMsg('Profile Updated Successfully.','success');
      redirection('index.php');
    } 
    else{
      echo "No updated";
    } 
   }
 ?>

  <!-- Title Page -->
  <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
    <h2 class="l-text2 t-center">
      Update Profile
    </h2>
  </section>

  <!-- Cart -->
  <section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
      <!-- Cart item -->
      <form class="form-horizontal" method="POST" id="adminform" enctype="multipart/form-data">
        <div class="form-group">
        <label class="col-sm-2 control-label">First name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="f_name" name="cust_fname" value="<?php echo $user['cust_fname']; ?>">
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Last name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="l_name" name="cust_lname"value="<?php echo $user['cust_lname']; ?>">
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="cust_email"value="<?php echo $user['cust_email']; ?>" >
        </div>
        </div>
        <?php if(!empty($user['cust_photo'])): ?>
        <div class="space-4"></div>

        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Existing Image  </label>

          <div class="col-sm-9">
            <img width="300" src="uploads/<?php echo $user['cust_photo']; ?>">
          </div>
        </div>
        <?php endif; ?>

        <div class="form-group">
        <label class="col-sm-2 control-label">Photo</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="photo" name="file" >
        </div>
        </div>
        

        <div class="form-group">
        <label class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="address" name="cust_address"value="<?php echo $user['cust_address']; ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="phone" name="cust_phone"value="<?php echo $user['cust_phone']; ?>">
        </div>
        </div>
        
        <div class="form-group">
        <div class="col-sm-2 control-label">
          <input type="hidden" name="id" value="<?php  echo $user['cust_id']; ?>">

          <button align="center" type="submit" class="btn btn-primary" name="savebtn">Update</button>
        </div>

        <div class="col-sm-2 control-label">
          <button type="reset" class="btn btn-danger" name="restorebtn">Restore</button>
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
            $('#custform').submit();
        }








        });
    </script>




    
</body>
</html>


<!-- end document-->