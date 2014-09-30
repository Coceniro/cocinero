<?PHP
$frm_name = "certificate";
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
						<h3>Certification</h3>
						<?PHP
						
							$res = $GLOBALS['db_con_obj']->fetch_flds(certificate,"*","registration_fk = '".$sessionuserid."'");
							$res_row = mysql_fetch_array($res[0]);
						
						?>
						<div class="form-box" id="login-box">
						<form action="#" method="post" id="sign-up_area" role="form">
								<div id="entry1" class="clonedInput">
								<h2 id="reference" name="reference" class="heading-reference">Entry #1</h2>
									<div class="form-group">
										<label> Subject | Name</label>
										<input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo $res_row['subject']; ?>"/>
									</div>
									<div class="form-group">
										<label> Institution </label>
										<input type="text" name="institution" class="form-control" placeholder="Institution" value="<?php echo $res_row['institution']; ?>"/>
									</div>         
									<div class="form-group">
										<label> Company </label>
										<input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $res_row['company']; ?>"/>
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
						$degree1 = $_POST['degree1'];
						$institution1 = $_POST['institution1'];
						$startyear1 = $_POST['startyear1'];
						$endyear1 = $_POST['endyear1'];
						$percentage1  = $_POST['percentage1'];
						
						$degree2 = $_POST['degree2'];
						$institution2 = $_POST['institution2'];
						$startyear2 = $_POST['startyear2'];
						$endyear2 = $_POST['endyear2'];
						$percentage2  = $_POST['percentage2'];
						
						$degree3 = $_POST['degree3'];
						$institution3 = $_POST['institution3'];
						$startyear3 = $_POST['startyear3'];
						$endyear3 = $_POST['endyear3'];
						$percentage3  = $_POST['percentage3'];
						
						$degree4 = $_POST['degree4'];
						$institution4 = $_POST['institution4'];
						$startyear4 = $_POST['startyear4'];
						$endyear4 = $_POST['endyear4'];
						$percentage4  = $_POST['percentage4'];
						
						echo $degree1."<br>";
						echo $institution1."<br>";
						echo $startyear1."<br>";
						echo $endyear1."<br>";
						echo $percentage1."<br>";
						
						echo $degree2."<br>";
						echo $institution2."<br>";
						echo $startyear2."<br>";
						echo $endyear2."<br>";
						echo $percentage2."<br>";
						
						echo $degree3."<br>";
						echo $institution3."<br>";
						echo $startyear3."<br>";
						echo $endyear3."<br>";
						echo $percentage3."<br>";
						
						echo $degree4."<br>";
						echo $institution4."<br>";
						echo $startyear4."<br>";
						echo $endyear4."<br>";
						echo $percentage4."<br>";
						
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