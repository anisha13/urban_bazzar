   <?php 
   include 'layouts/header.php'; 
    
      // <!-- Sidebar Here -->
  include 'layouts/sidebar.php'; 


    if(isset($_POST['passwordChangeBtn']))
    {         
        if($_POST['password']!=$_POST['password2'])
        {
            showMsg("Password don't match! Please try again.","fail");
        }  
        elseif(getLoginDetail($conn,array('email'=>$_SESSION['email'],'password'=>$_POST['oldPassword'])))
        {
            if(changeAdminPassword($conn,array('email'=>$_SESSION['email'],'password'=>md5($_POST['password']))))
                showMsg("Password Changed Successfully!","success");
            else
            {
                showMsg($_SESSION['error_msg'],"fail");
            }
        }
        else
        {
            showMsg("Wrong password!","fail");
        }
        unset($_POST);
    }


?>
 
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Change Password</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                        <li><i class="fa fa-laptop"></i>Change Password</li>  
                        <h4 style="color: blue; font-size:20px;"><?php echo $msg; ?></h4>
                    </ol>
                </div>
            </div>
              
    <div class="container">
  
          
          <!-- Today status end -->
          <?php
              displayMsg();
          ?>
            
              <form method="POST" >
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName1">Current Password *</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control required"  name="oldPassword" type="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="password1"> New Password </label>
                                                        <div class="col-lg-10">
                                                            <input id="password1"  type="password" name="password" class="required form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="confirm1">Confirm Password </label>
                                                        <div class="col-lg-10">
                                                            <input id="confirm1" type="password" name="password2" class="required form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        
                                                    </div>
                                                                                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"></label>
                                                        <div class="col-md-10">
                                                            <span class="input-group-btn">
                                                                    <button type="reset" class="btn waves-effect waves-light btn-danger" style="margin-right:10px;">Reset </button>
                                                                    <button type="submit" class="btn waves-effect waves-light btn-primary" name="passwordChangeBtn">Save </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form>
                
            
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
