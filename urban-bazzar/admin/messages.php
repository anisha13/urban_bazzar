
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
						<li><i class="fa fa-th-list"></i>BOOKINGS</li>
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
                                 <th><i class=""></i> Name</th>
                                 <th><i class=""></i> Email</th>
                                 <th><i class=""></i> Phone </th>
                                <th><i class=""></i> Message </th>
                                <th><i class=""></i> Status </th>
                                <th><i class=""></i> Action </th>
                              </tr>
                               <?php 
                               $getallcustomer =  getMessage($conn); 
													  foreach ($getallcustomer as $k => $info):
													
													?>	
                              <tr>
                                  <td>
                                      <?php echo ++$k; ?>
                                  </td>
                                 <td><?php echo $info['name']; ?></td>
                                 <td><?php echo $info['email']; ?></td>
                                 <td><?php echo $info['phone']; ?></td>
                                 <td><?php echo $info['message']; ?></td>
                                 <td><?php if($info['message_status']==1)echo "Read"; else echo "Unread"; ?></td>
                                 <td style="padding-right:0px"><a class="btn btn-success"  href="readmessage.php?ref=<?php echo $info['message_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')" href="deletemessage.php?ref=<?php echo $info['message_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                 
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
