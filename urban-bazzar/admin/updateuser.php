<!-- Header Here -->
<?php include 'layouts/header.php';
$userId = $_GET['ref'];
$user = getAdminById($conn,$userId);

 if(isset($_POST['savebtn']))
 {
 	if(!empty($_FILES['file']['name']))
 	{
 		$_POST['photo'] = uploadFile('uploads',$_FILES['file']);
 		@unlink('uploads/'.$user['photo']);
 	}
  else
  {
    $_POST['photo'] = $user['photo'];
  }

 	if(updateAdmin($conn,$_POST))
 	{
    $_SESSION['photo']=$image;
 		showMsg('User Updated Successfully.','success');
 		redirection('manageuser.php');
 	}
 }
?>
 <!--sidebar start-->
      <?php include 'layouts/sidebar.php';?> 
      <!--sidebar end-->
  


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">Update user
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" method="POST" id="adminform" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">First name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="f_name" name="f_name"value="<?php echo $user['f_name']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Last name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="l_name" name="l_name"value="<?php echo $user['l_name']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="email" name="email"value="<?php echo $user['email']; ?>" >
                                      </div>
                                  </div>
                                  <?php if(!empty($user['photo'])): ?>
									<div class="space-4"></div>

									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Existing Image  </label>

									<div class="col-sm-9">
										<img width="300" src="uploads/<?php echo $user['photo']; ?>">
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
                                          <input type="text" class="form-control" id="address" name="address"value="<?php echo $user['address']; ?>">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Contact</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="contact" name="contact"value="<?php echo $user['contact']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Role</label>
                                      <div class="col-sm-10">
                                        <select class="form-control input-m m-bot15" id="role" name="role">
                                            <option value= "">--Select Role--</option>  
                                            <option value="admin" <?php if($user['role']=='admin') echo 'selected="selected"';  ?>>Admin</option>
												<option <?php if($user['role']=='user') echo 'selected="selected"';  ?> value="user">User</option>
                                          
                                          </select>
                                      </div>
                                  </div>
                                  
                                  
                                  
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                      <div class="col-sm-10">
                                        <select class="form-control input-m m-bot15" id="status" name="status">
                                            <option value="">--Select Status--</option>  
                                            <option value="active" <?php if($user['status']=='active') echo 'selected="selected"';  ?>>Active</option>
											<option value="in_active" <?php if($user['status']=='in_active') echo 'selected="selected"';  ?>>In-Active</option>
								
                                          </select>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                  <div class="col-sm-2 control-label">
                                  	<input type="hidden" name="id" value="<?php  echo $user['id']; ?>">

                                      <button align="center" type="submit" class="btn btn-primary" name="savebtn">Submit</button>
                                  </div>
                                 
                                      <div class="col-sm-2 control-label">
                                          <button type="reset" class="btn btn-danger" name="restorebtn">Restore</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                      
                      
      <!--main content end-->
      <div class="text-right">
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            
        </div>
    </div>
  </section>
  <!-- container section end -->
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
        $('#adminform').submit(function()
        {
            var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var number= /[0-9 -()+]+$/;
            var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;  
            var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;

            var f_name = $('#f_name').val();
            var l_name = $('#l_name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var address = $('#address').val();
            var contact = $('#contact').val();
            var role = $('#role').val();
            var status = $('#status').val();



            if(!alpha.test(f_name))
            {
               $("#f_name").css({"border": "1px solid red"});
               $('#f_name').focus();
               setTimeout(function() 
               {
                   $('#f_name').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }


        if(!alpha.test(l_name))
        {
           $("#l_name").css({"border": "1px solid red"});
           $('#l_name').focus();
           setTimeout(function()
            {
               $('#l_name').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }


        if(!filter.test(email))
        {
           $("#email").css({"border": "1px solid red"});
           $('#email').focus();
           setTimeout(function() 
            {
               $('#email').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }


        if(!alpha.test(password))
        {
           $("#password").css({"border": "1px solid red"});
           $('#password').focus();
           setTimeout(function() 
            {
               $('#password').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }
         if(!alpha.test(address))
            {
               $("#address").css({"border": "1px solid red"});
               $('#address').focus();
               setTimeout(function() 
               {
                   $('#address').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }

          if(!number.test(contact))
            {
               $("#contact").css({"border": "1px solid red"});
               $('#contact').focus();
               setTimeout(function() 
               {
                   $('#contact').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }

      
                if(role=='')
            {
           $("#role").css({"border": "1px solid red"});
           setTimeout(function()
            {
               $('#role').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
        }

        if(status=='')
        {
           $("#status").css({"border": "1px solid red"});
           setTimeout(function() 
            {
               $('#status').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
            }

         else
        {
            $('#adminform').submit();
        }








        });
  </script>

