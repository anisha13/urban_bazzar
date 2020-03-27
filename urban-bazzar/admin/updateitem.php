<!-- Header Here -->
<?php include 'layouts/header.php';
$infoId = $_GET['ref'];
$info = getItemById($conn,$infoId);

 if(isset($_POST['savebtn']))
 {

 	if(!empty($_FILES['file']['name']))
 	{
    $_POST['product_photo'] = uploadFile('uploads',$_FILES['file']);
 		@unlink('uploads/'.$info['product_photo']);
 	}
  else
  {
    $_POST['product_photo'] = $info['product_photo'];
  }


 	if(updateItem($conn,$_POST,$_POST['product_photo']))
 	{
 		showMsg('Item Updated Successfully.','success');
 		redirection('manageItem.php');
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
                          <header class="panel-heading">Update Item
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" method="POST" id="adminform" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $info['product_name']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Price</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="product_price" name="product_price"value="<?php echo $info['product_price']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product Quantity</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="product_quantity" name="product_quantity"value="<?php echo $info['product_quantity']; ?>">
                                      </div>
                                  </div>
                                  
                                  <?php if(!empty($info['product_photo'])): ?>
									<div class="space-4"></div>

									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Existing Image  </label>

									<div class="col-sm-9">
										<img width="300" src="uploads/<?php echo $info['product_photo']; ?>">
									</div>
									</div>
									<?php endif; ?>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Photo</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control" id="product_photo" name="file" >
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Product description</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="product_description" name="product_description"value="<?php echo $info['product_description']; ?>">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Category</label>
                                      <div class="col-sm-10">
                                        <select class="form-control input-m m-bot15" id="category_id" name="category_id">
                                          <option value="">--Select categories--</option>
                                          <?php $category  = getAllCategories($conn);
                                          foreach ($category as $key => $categories):?>
                                            <option value="<?php echo $categories['category_id']; ?>"><?php echo  $categories['category_name']; ?></option>  
                                          <?php endforeach; ?>  
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Brand</label>
                                      <div class="col-sm-10">
                                        <select class="form-control input-m m-bot15" id="brand_id" name="brand_id">
                                          <option value="">--Select brand--</option>
                                          <?php $brand  = getAllBrands($conn);
                                          foreach ($brand as $key => $brands):?>
                                            <option value="<?php echo $brands['brand_id']; ?>"><?php echo  $brands['brand_name']; ?></option>  
                                          <?php endforeach; ?>  
                                          </select>
                                      </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label"> Product Status</label>
                                      <div class="col-sm-10">
                                        <select class="form-control input-m m-bot15" id="product_status" name="product_status">
                                            <option value="">--Select Status--</option>  
                                            <option value="available" <?php if($info['product_status']=='available') echo 'selected="selected"';  ?>>Available</option>
											<option value="unavailable" <?php if($info['product_status']=='unavailable') echo 'selected="selected"';  ?>>Unavailable</option>
								
                                          </select>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                  <div class="col-sm-2 control-label">
                                  	<input type="hidden" name="product_id" value="<?php  echo $info['product_id']; ?>">

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

           var product_name = $('#product_name').val();
            var product_price = $('#product_price').val();
             
            var product_description = $('#product_description').val();
            var category_id = $('#category_id').val();
            var brand_id = $('#brand_id').val();





            if(!alpha.test(product_name))
            {
               $("#product_name").css({"border": "1px solid red"});
               $('#product_name').focus();
               setTimeout(function() 
               {
                   $('#product_name').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }

        if(!alpha.test(product_description))
            {
               $("#product_description").css({"border": "1px solid red"});
               $('#product_description').focus();
               setTimeout(function() 
               {
                   $('#product_description').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }
        if(!number.test(product_price))
            {
               $("#product_price").css({"border": "1px solid red"});
               $('#product_price').focus();
               setTimeout(function() 
               {
                   $('#product_price').css({"border": "1px solid #ddd"});
                }, 5000);
            return false;
        }


       

        if(category_id=='')
        {
           $("#category_id").css({"border": "1px solid red"});
           setTimeout(function() 
            {
               $('#category_id').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
            }
             if(brand_id=='')
        {
           $("#brand_id").css({"border": "1px solid red"});
           setTimeout(function() 
            {
               $('#brand_id').css({"border": "1px solid #ddd"});
           }, 5000);
                return false;
            }


         else
        {
            $('#adminform').submit();
        }








        });
  </script>

