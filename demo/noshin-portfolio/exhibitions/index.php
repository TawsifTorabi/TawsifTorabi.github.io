<?php
	include('../common/fyd_connect_db.php');
	mysqli_set_charset($conn,"utf8");
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Exhibitions - <?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='title'"))['metadata']; ?></title>

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

   <div id="banner-area" class="banner-area" style="background-image:url(../images/banner/banner2.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Exhibitions</h1>
                     <ol class="breadcrumb">
                        <li><a href="../">Home</a></li>
                        <li><a href="#">Exhibitions All</a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


  
  
  
  
  	<section id="project-area" class="project-area solid-bg">
			<div class="container">

				<div class="row">
					<div class="isotope-nav" data-isotope-nav="isotope">
						<ul>
							<li><a href="#" class="active" data-filter="*">Show All</a></li>
							<?php
								$projecttypelist=mysqli_query($con, "SELECT * FROM `fyd_projecttypes` WHERE `id`='1' order by id desc limit 1");
								while($projecttypelistrows=mysqli_fetch_array($projecttypelist, MYSQLI_ASSOC)){
							?>
							<li><a href="#" data-filter=".<?php echo $projecttypelistrows['title']; ?>"><?php echo $projecttypelistrows['title']; ?></a></li>
							<?php } ?>
						</ul>
					</div><!-- Isotope filter end -->
			
			
	
					<?php
						$projectlist=mysqli_query($con, "SELECT * FROM `fyd_projectlist` WHERE `projecttype`='1' order by id desc limit 12");
						while($projectlistrows = mysqli_fetch_array($projectlist, MYSQLI_ASSOC)){
								
								$projecttypeid = $projectlistrows['projecttype'];
								$projecttype = mysqli_query($con, "SELECT * FROM `fyd_projecttypes` WHERE `id`='$projecttypeid'");
									
									if($projecttyperow = mysqli_fetch_array($projecttype, MYSQLI_ASSOC)){
										$projecttypetitle = $projecttyperow['title'];
									}

									if($projecttypetitle == 'Exhibition'){
										$databasename = "fyd_exhibitions";
									}

									if($projecttypetitle == 'Workshop'){
										$databasename = "fyd_workshops";
									}
									
									
								$projecttableid = $projectlistrows['tableid'];
								$projecttable = mysqli_query($con, "SELECT * FROM $databasename WHERE `id`='$projecttableid'");
									
									if($projecttablerow = mysqli_fetch_array($projecttable, MYSQLI_ASSOC)){
										$projectname = $projecttablerow['name'];
										$projectimg = $projecttablerow['coverimg'];
									}
									
							?>
							
							<div id="isotope" class="isotope">
								<div class="col-md-4 col-sm-6 col-xs-12 <?php echo $projecttypetitle;?> isotope-item">
									<div class="isotope-img-container">
										<a class="gallery-popup" href="../images/projects/<?php echo $projectimg; ?>">
											<img class="img-responsive" src="../images/projects/<?php echo $projectimg; ?>" alt="<?php echo $projectname; ?>">
											<span class="gallery-icon"><i class="fa fa-plus"></i></span>
										</a>
										<div class="project-item-info">
											<div class="project-item-info-content">
												<h3 class="project-item-title">
													<a href="details.php?id=<?php echo $projectlistrows['id'];?>&type=<?php echo $projecttypetitle;?>"><?php echo $projectname; ?></a>
												</h3>
												<p class="project-cat"><?php echo $projecttypetitle;?></p>
											</div>
										</div>
									</div>
								</div><!-- Isotope item 1 end -->
						
						
					<?php } ?>
					
					
					</br>
					</br>

				</div><!-- Content row end -->
			</div>
			<!--/ Container end -->
		</section><!-- Project area end -->
  
	

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