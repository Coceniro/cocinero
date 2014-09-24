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
						<h3>Area of Interest</h3>
						<div class="form-box" id="login-box">
						<form name="area_form" action="exposure.php" method="post">
							<div>
								<div class="form-group">
									<label> Core | Tools </label>
									<input type="text" name="core" class="form-control" placeholder="Core"  maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="15" 
										data-bv-stringlength-message="The username must be more than 4 and less than 15 characters long" 
										pattern="^[a-zA-Z]+$"/>
								</div>
								<div class="form-group">
									<label> Name </label>
									<input type="text" name="name" class="form-control" placeholder="Name" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="15" 
										data-bv-stringlength-message="The username must be more than 4 and less than 15 characters long" 
										pattern="^[a-zA-Z]+$"/>
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
					$type = $_POST['type'];
					$skillname = $_POST['skillname'];
					
					echo $type."<br>";
					echo $skillname."<br>";
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