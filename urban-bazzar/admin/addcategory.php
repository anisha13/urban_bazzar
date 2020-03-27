<?php include 'layouts/header.php';
$msg ='';
if(isset($_POST['savebtn']))
{
          if(insertCategory($conn,$_POST))
            {
              showMsg('Category Added Successfully.','success');
              redirection('manageCategory.php');
            } 

            else
              showMsg('Category already exist.','fail');
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
                          <header class="panel-heading">
                             Add Category  <?php if(isset($_SESSION['showmsg'])) echo $_SESSION['showmsg']; unset($_SESSION['showmsg']);  ?>
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" method="POST" id="itemform" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Category name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="category_name" name="category_name">
                                      </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                  <div class="col-sm-2 control-label">
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
        $('#itemform').submit(function()
        {
            var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var number= /[0-9 -()+]+$/;
            var alpha= /^[a-zA-Z0-9!-”$%&’()*\+,\/;\[\\\]\/\s^_.`{|}~]+$/;  
            var phone_no=/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/;

            var category_name = $('#category_name').val();
            


            if(!alpha.test(category_name))
            {
               $("#category_name").css({"border": "1px solid red"});
               $('#category_name').focus();
               setTimeout(function() 
               {
                   $('#category_name').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }

        
         else
        {
            $('#adminform').submit();
        }








        });
  </script>



