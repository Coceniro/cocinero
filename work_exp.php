<?PHP
$frm_name = "work_exp";
include_once("includes/code_header.php");
if($_SESSION["ses_user_id"]=="")
{
	header("location:login.php");
}
include_once("header.php");
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
						<h3>Work Experience</h3>
						<div class="form-box" id="login-box">
						<form action="#" method="post" id="sign-up_area" role="form">
								<div id="entry1" class="clonedInput">
								<h2 id="reference" name="reference" class="heading-reference">Entry #1</h2>
									<div class="form-group">
										<label> Job Title | Position </label>
										<input type="text" name="jobtitle" class="form-control" placeholder="Job title"/>
									</div>
									<div class="form-group">
										<label> Company Name </label>
										<input type="text" name="companyname" class="form-control" placeholder="Company Name"/>
									</div>        
									<div class="form-group">
										<label> Joining date </label>
										<input type="date" name="joiningdate" class="form-control" placeholder="Start Date"/>
									</div>
									<div class="form-group">
										<label> Quit date </label>
										<input type="text" name="quitdate" class="form-control" placeholder="End Date"/>
									</div>
									<div class="form-group">
										<label> Description </label>
										<input type="text" name="projectdescription" class="form-control" placeholder="Description"/>
									</div>
									<div class="form-group">
										<label> Refferer Name </label>
										<input type="text" name="refferername" class="form-control" placeholder="Refferer Name"/>
									</div>
									<div class="form-group">
										<label> Refferer Contact </label>
										<input type="text" name="refferercontact" class="form-control" placeholder="Refferer Contact"/>
									</div>
								</div><!-- end #entry1 -->
								<!-- Button (Double) -->
								<p>
								<button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add section</button>
								  <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove section above</button>
								</p>
								<!-- Button -->

								<div class="form-group">
									<div>
										<button id="nextPage" name="next" class="pull-right btn">Next <i class="fa fa-arrow-circle-right"></i></button>
									</div>
									<div>
										<button id="previousPage" name="previous" class="pull-left btn"><i class="fa fa-arrow-circle-left"></i> Previous</button>
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
							$extra = $_POST['extra'];
							
													
							echo $extra."<br>";
							
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

	<!-- Jquery Min File -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Cloning -->
	<script type="text/javascript" src="js/clone-form-td.js"></script>
	
	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>