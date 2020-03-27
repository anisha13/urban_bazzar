
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
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-table"></i>View Table</li>
						<li><i class="fa fa-th-list"></i>CUSTOMERS</li>
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
                                 <th><i class=""></i> Customer ID</th>
                                 <th><i class=""></i> Firstname</th>
                                 <th><i class=""></i> Lastname </th>
                                  <th><i class=""></i> Email </th>
                                 <th><i class=""></i> Address</th>
                                 <th><i class=""></i> Contact </th>
                                 <th><i class=""></i> Photo</th>
                              </tr>
                               <?php 
                               $getallcustomer =  getUser($conn); 
													  foreach ($getallcustomer as $k => $info):
													
													?>	
                              <tr>
                                  <td>
                                      <?php echo ++$k; ?>
                                  </td>
                                 <td><?php echo $info['cust_id']; ?></td>
                                 <td><?php echo $info['cust_fname']; ?></td>
                                 <td><?php echo $info['cust_lname']; ?></td>
                                 <td><?php echo $info['cust_email']; ?></td>
                                 <td><?php echo $info['cust_address']; ?></td>
                                 <td><?php echo $info['cust_phone']; ?></td>
                                 <td><img src="../user/uploads/<?php echo $info['cust_photo']; ?>" height="100" width="100"></td>
                              </tr>
                               <?php endforeach; ?>
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
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">© URBAN BAZZAR</a> <a href="https://bootstrapmade.com/"></a>
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
