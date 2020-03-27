
     
      
     <?php include 'layouts/header.php'; ?>
    
       <!-- Sidebar Here -->
       <?php include 'layouts/sidebar.php'; ?>

    <?php
      $dashboardData=$conn->prepare("SELECT count(order_id) FROM tbl_orders");
      $dashboardData->execute();
      $dashboardData=$dashboardData->fetch();
      $totalOrders=$dashboardData['count(order_id)'];




      $dashboardData=$conn->prepare("SELECT count(cust_id) FROM tbl_custlogin");
      $dashboardData->execute();
      $dashboardData=$dashboardData->fetch();
      $totalCust=$dashboardData['count(cust_id)'];


      $dashboardData=$conn->prepare("SELECT count(product_id),sum(product_quantity) FROM tbl_item");
      $dashboardData->execute();
      $dashboardData=$dashboardData->fetch();
      $totalProducts=$dashboardData['count(product_id)'];
      $totalStock=$dashboardData['sum(product_quantity)'];

      $dashboardData=$conn->prepare("SELECT * FROM tbl_item ORDER BY product_id DESC LIMIT 3");
      $dashboardData->execute();
      $latestProducts=$dashboardData->fetchAll(PDO::FETCH_ASSOC);
      
    ?>
 
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>	
                        <h4 style="color: blue; font-size:20px;"><?php echo $msg; ?></h4>
					</ol>
				</div>
			</div>
              
        <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<div class="title"><p align="center" style="color: white; font-size:20px;">Welcome to the admin module of the Urban Bazzar</p> </div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<!--/.col-->
				
			</div><!--/.row-->
		
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="fa fa-users"></i>
            <div class="count"><?php echo $totalCust;  ?></div>
            <div class="title">Customers</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box brown-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count"><?php echo $totalProducts;  ?></div>
            <div class="title">Products</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="fas fa-box-open"></i>
            <div class="count"><?php echo $totalOrders;  ?></div>
            <div class="title">Order</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-cubes"></i>
            <div class="count"><?php echo $totalStock;  ?></div>
            <div class="title">Stock</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
      </div><!--/.row-->
    
      
      <div class="row">
        <div class="info-box blue-bg" style="margin-bottom: 5px;padding-bottom: 5px;min-height: 50px;">
            <div class="title"><p align="center" style="color: white; font-size:20px;padding:">Latest Products</p> </div>           
          </div>
      <div class="col-lg-12 col-md-12">
          <?php
            if($latestProducts):
              foreach($latestProducts as $key=>$data):
              ?>
          <div class="col-lg-4 col-md-12">
              <img src="uploads/<?php echo $data['product_photo']; ?>" style="width:100%; height:300px">
              <label style="text-align: center;margin:5px;width:100%;color:black;font-size: 16px;"> <?php echo $data['product_name']; ?> </label>
          </div>
          <?php endforeach;endif;?>
      </div>
      </div>
              
       
    </div>  
            
			 
            
		  <iframe src="../user/index.php" width=100%></iframe>
		  <!-- Today status end -->
			
              
				
	
              <!-- project team & activity end -->

          </section>
          <div class="text-right">
          <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/"></a> <a href="https://bootstrapmade.com/"></a>
            </div>
        </div>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

  </body>
</html>
