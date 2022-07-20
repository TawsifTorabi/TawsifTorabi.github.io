<?php
	include('../common/fyd_connect_db.php');
	mysqli_set_charset($conn,"utf8");

	//get requests for id
		if(isset($_GET['id'])){

			$projectlistid = (int)$_GET['id'];
			$projectlist=mysqli_query($con, "SELECT * FROM `fyd_projectlist` WHERE `id`='$projectlistid'");
			while($projectlistrows = mysqli_fetch_array($projectlist, MYSQLI_ASSOC)){
					
					$projecttableid = $projectlistrows['tableid'];
					$projecttable = mysqli_query($con, "SELECT * FROM `fyd_exhibitions` WHERE `id`='$projecttableid'");
						
						if($projecttablerow = mysqli_fetch_array($projecttable, MYSQLI_ASSOC)){
							$projectname = $projecttablerow['name'];
							$projectimg = $projecttablerow['coverimg'];
							$projectshortdescription = $projecttablerow['shortdescription'];
							$projectdescription = $projecttablerow['description'];
							$projectschedule = $projecttablerow['schedule'];
							
							$startDate = $projecttablerow['startdate'];
							$endDate = $projecttablerow['enddate'];
							$newstartDate = date("d-m-Y", strtotime($startDate));
							$newendDate = date("d-m-Y", strtotime($endDate)); 
							$projecttime = 'Started from '.$projecttablerow['starttime'].', '.$newstartDate.'<b> to </b>'.$projecttablerow['endtime'].', '.$newendDate;
							
						}


?>


<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title><?php echo $projectname; ?> - <?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='title'"))['metadata']; ?></title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="../css/colorbox.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>




	<div class="body-inner">

		
	<!-- Header start -->
		<?php include '../common/other_html_header.php'; ?>
	<!--/ Header end -->
  

  <div id="banner-area" class="banner-area" style="background-image:url(../images/projects/<?php echo $projectimg; ?>)">
      <div class="banner-text">
         <div class="container">
            <div class="row" style="background-color: rgba(0, 0, 0, 0.87);box-shadow: 4px 0px 11px 12px #0000005e;">
               <div class="col-xs-12">
                  <div style=" color: white;" class="banner-heading">
                     <h1 class="banner-title"><?php echo $projectname; ?></h1>
                     <ol class="breadcrumb">
                        <li><a href="../">Home</a></li>
                        <li><a href="../exhibitions">Exhibitions All</a></li>
                        <li><a href="#"><?php echo $projectname; ?></a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


  <section id="main-container" class="main-container">
      <div class="container">
         <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12">
               <div class="sidebar sidebar-left">
                  <div class="widget">
                     <h3 class="widget-title">Solutions</h3>
                     <ul class="nav nav-tabs nav-stacked service-menu">
                        <li><a href="service-single.html">Home Construction</a></li>
                        <li class="active"><a href="service-single.html">Building Remodels</a></li>
                        <li><a href="#">Interior Design</a></li>
                        <li><a href="#">Exterior Design</a></li>
                        <li><a href="#">Renovation</a></li>
                        <li><a href="#">Safety Management</a></li>
                     </ul>
                  </div><!-- Widget end -->

                  <div class="widget">
                     <div class="quote-item quote-border">
                        <div class="quote-text-border">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        </div>

                        <div class="quote-item-footer">
                           <img class="testimonial-thumb" src="images/clients/testimonial1.png" alt="testimonial">
                           <div class="quote-item-info">
                              <h3 class="quote-author">Weldon Cash</h3>
                              <span class="quote-subtext">CEO, First Choice Group</span>
                           </div>
                        </div>
                    </div><!-- Quote item end -->

                  </div><!-- Widget end -->

               </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

            <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="content-inner-page">

                   <h1 class="column-title mrt-0"><?php echo $projectname; ?></h1>
					<p><b><?php echo $projecttime; ?></p></b></br>
                   <h2 class="column-title mrt-0">AT A GLANCE</h2>

                  <div class="row">
                     <div class="col-md-12">
                        <p><?php echo $projectshortdescription; ?></p>
                     </div><!-- col end -->
                  </div><!-- 1st row end-->

                  <div class="gap-40"></div>

                  <div id="page-slider" class="owl-carousel owl-theme page-slider page-slider-small">
                     <div class="item">
                        <img src="../images/projects/project2.jpg" alt="" />
                     </div>

                     <div class="item">
                        <img src="../images/projects/project2.jpg" alt="" />
                     </div>
                  </div><!-- Page slider end -->

                  <div class="gap-40"></div>

                  <div class="row">
                     <div class="col-md-6">
                        <h3 class="column-title-small">Description</h3>
                        <p><?php echo $projectdescription; ?></p>
						</br>
						</br>

                     </div>

                     <div class="col-md-6">
                        <h3 class="column-title-small">You Should Know</h3>

                        <div class="panel-group panel-classic" id="accordion">
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title"> 
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Do You Support Collaborative Communication</a> 
                                  </h4>
                               </div>
                               <div id="collapseOne" class="panel-collapse collapse in">
                                 <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>
                                 </div>
                               </div>
                           </div><!--/ Panel 1 end-->

                           <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">What is the Budget &amp; Cost Development</a>
                                 </h4>
                               </div>
                               <div id="collapseTwo" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>
                                 </div>
                               </div>
                           </div><!--/ Panel 2 end-->


                           <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">What About Schedule Development</a>
                                 </h4>
                               </div>
                               <div id="collapseThree" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>
                                 </div>
                               </div>
                           </div><!--/ Panel 3 end-->

                        </div><!--/ Accordion end -->
                     </div>
                  </div><!--2nd row end -->

                  <div class="gap-40"></div>

							<h3 class="column-title-small">Schedule</h3>
							<p><?php echo $projectschedule; ?></p>
                  <div class="call-to-action classic">
                     <div class="row">
                        <div class="col-md-9">

						   <div class="call-to-action-text">
                              <h3 class="action-title">Interested with this service.</h3>
                           </div>
                        </div><!-- Col end -->
                        <div class="col-md-3">
                           <div class="call-to-action-btn">
                              <a class="btn btn-primary" href="#">Get a Quote</a>
                           </div>
                        </div><!-- col end -->
                     </div><!-- row end -->
                  </div><!-- Action end -->

               </div><!-- Content inner end -->
            </div><!-- Content Col end -->


         </div><!-- Main row end -->
      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	



<?php }} ?>


   	

  		<?php include '../common/other_html_footer.php'; ?>
		<!-- Footer end -->

  <!-- Javascript Files
================================================== -->

  <!-- initialize jQuery Library -->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <!-- Bootstrap jQuery -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- Owl Carousel -->
  <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
  <!-- Color box -->
  <script type="text/javascript" src="../js/jquery.colorbox.js"></script>
  <!-- Isotope -->
  <script type="text/javascript" src="../js/isotope.js"></script>
  <script type="text/javascript" src="../js/ini.isotope.js"></script>


  <!-- Google Map API Key-->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <!-- Google Map Plugin-->
  <script type="text/javascript" src="../js/gmap3.js"></script>

 <!-- Template custom -->
 <script type="text/javascript" src="../js/custom.js"></script>

</div><!-- Body inner end -->
</body>

</html>



