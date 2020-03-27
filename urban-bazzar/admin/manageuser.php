
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
						<li><i class="fa fa-th-list"></i>Admins</li>
					</ol>
				</div>
			</div>
              <h2><?php if(isset($_SESSION['showmsg'])) echo $_SESSION['showmsg']; unset($_SESSION['showmsg']); ?></h2>
              <!-- page start-->
               <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                  <th>S.No</th>
                                 <th><i class="icon_profile"></i> Full Name</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="fas fa-map-marker-alt"></i> Address</th>
                                 <th><i class="icon_phone"></i> Contact</th>
                                 
                                 <th> Status</th>
                                 <th><i class="fa fa-user" aria-hidden="true"></i> Photo</th>
                                 <th> Action</th>
                              </tr>
                               <?php $adminUsers = getAllAdmins($conn); 
                            foreach ($adminUsers as $k => $info):
                          
                          ?>  
                              <tr>
                                  <td>
                                      <?php echo ++$k; ?>
                                  </td>
                                 <td><?php echo $info['f_name']." ".$info['l_name']; ?></td>
                                 <td><?php echo $info['email']; ?></td>
                                 <td><?php echo $info['address']; ?></td>
                                <td><?php echo $info['contact']; ?></td>
                                     <td><?php if($info['status']=='active'): ?>
                                <span class="label label-sm label-success">Active</span>
                                <?php else: ?>  
                                  <span class="label label-sm label-danger">Inactive</span>
                                <?php endif; ?> </td>
                                <td><img src="uploads/<?php echo $info['photo']; ?>" height="100" width="100"></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="updateuser.php?ref=<?php echo $info['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')" href="deleteuser.php?ref=<?php echo $info['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                  </div>
                                  </td>
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
