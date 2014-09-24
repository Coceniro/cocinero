<?PHP
include_once("header.php");
$frm_name = "userhome";
include_once("menu.php");
include_once("breadcrumb.php");
?>


		<!-- Content start -->
	<section id="blog-page">
		<div class="container">
			<div class="row">
	
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				
				<!-- Blog category start -->
						<?PHP
					include_once("leftsidemenu.php");
				?>					
				</div>		
						<!-- Blog start -->
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<!-- Blog post start -->
					<section class="blog-post">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="contact-form">
						<h3>Field Work</h3>
						<div class="form-box" id="login-box">
						<form name="fieldwork_form" action="hobbies.php" method="post">
							<div>
								<div class="form-group">
									<label> Company Name </label>
									<input type="text" name="companyname" class="form-control" placeholder="Company Name"/>
								</div>
								<div class="form-group">
									<label> Project Title </label>
									<input type="text" name="projecttitle" class="form-control" placeholder="Project Title"/>
								</div>         
								<div class="form-group">
									<label> Start date </label>
									<input type="date" name="startdate" class="form-control" placeholder="Start Date"/>
								</div>
								<div class="form-group">
									<label> End date </label>
									<input type="text" name="enddate" class="form-control" placeholder="End Date"/>
								</div>
								<div class="form-group">
									<label> Project Description </label>
									<input type="text" name="projectdescription" class="form-control" placeholder="Project Description"/>
								</div>
								<div class="form-group">
									<label> Platform </label>
									<input type="text" name="platform" class="form-control" placeholder="Platform"/>
								</div>
								<div class="form-group">
									<label> Field </label>
									<input type="text" name="field" class="form-control" placeholder="Field"/>
								</div>
																<div class="form-group">
									<div>
										<button id="nextPage" name="next" class="pull-right btn">Next <i class="fa fa-arrow-circle-right"></i></button>
									</div>
									<div>
										<button id="previousPage" name="previous" class="pull-left btn"><i class="fa fa-arrow-circle-left"></i> Previous</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div><!-- Contact form end -->	
							</div>
						</div>
					</section><!-- Blog post end -->

						</div>
				
				<!-- display details division -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<?PHP
							$jobtitle = $_POST['jobtitle'];
							$companyname = $_POST['companyname'];
							$joiningdate = $_POST['joiningdate'];
							$quitdate = $_POST['quitdate'];
							$description = $_POST['description'];
							$refferername = $_POST['refferername'];
							$refferercontact = $_POST['refferercontact'];
							
													
							echo $jobtitle."<br>";
							echo $companyname."<br>";
							echo $joiningdate."<br>";
							echo $quitdate."<br>";
							echo $description."<br>";
							echo $refferername."<br>";
							echo $refferercontact."<br>";
							
						?>
					</div>
	
			</div>
		</div>
	</section>
<?PHP
include_once("footer.php");
?>

<!-- Javascript Files
	================================================== -->
	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<!-- PrettyPhoto -->
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<!-- Bxslider -->
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<!-- Wow Animation -->
	<script type="text/javascript" src="js/wow.min.js"></script>
	<!-- SmoothScroll -->
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<!-- Animated Pie -->
	<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>