
      <?php include 'layouts/header.php';?>
      <!--header end-->

      <!--sidebar start-->
     <?php include 'layouts/sidebar.php';?>
              <!-- sidebar menu end-->
         
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-table"></i>View Table</li>
						<li><i class="fa fa-th-list"></i>PRODUCTS</li>
					</ol>
				</div>
			</div>
              <h2><?php if(isset($_SESSION['showmsg'])) echo $_SESSION['showmsg']; unset($_SESSION['showmsg']); ?></h2>
              <!-- page start-->
               <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Route Info
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                  <th>S.No</th>
                                 <th><i class=""></i> Product Name</th>
                                 <th><i class=""></i> Product Price</th>
                                 <th><i class=""></i> Product Quantity</th>

                                 <th><i class=""></i> Product Photo </th>
                                 <th><i class=""></i> Product Description</th>
                                 <th><i class=""></i> Product Category</th>
                                 <th><i class=""></i> Product Brand</th>
                                 <th><i class=""></i> Status</th>
                                 <th> Action</th>
                              </tr>

                               <?php $getAllItem = getAllItems($conn);
                               if($getAllItem ){
                            foreach ($getAllItem as $k => $info):
                          ?>  

                              <tr>
                                  <td>
                                      <?php echo ++$k; ?>
                                  </td>
                                  <td><?php echo $info['product_name'];?></td>
                                 <td><?php echo $info['product_price']; ?></td>
                                 <td><?php echo $info['product_quantity']; ?></td>
                                 <td><img src="uploads/<?php echo $info['product_photo']; ?>" height="50" width="50"></td>
                                 <td><?php echo $info['product_description']; ?></td>
                                 <td><?php echo $info['category_id']; ?></td>
                                 <td><?php echo $info['brand_id']; ?></td>
 
                                 <td><?php if($info['product_status']=='available'): ?>
                                <span class="label label-sm label-success">Available</span>
                                <?php else: ?>  
                                  <span class="label label-sm label-danger">Unavailable</span>
                                <?php endif; ?> </td>
                                
                                
                                  <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="updateitem.php?ref=<?php echo $info['product_id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')" href="deleteitem.php?ref=<?php echo $info['product_id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                  </div>
                                  </td>
                              </tr>
                                  
                               <?php  endforeach; } ?>
                             </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
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
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
