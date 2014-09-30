<?PHP
$frm_name = "qualification";
include_once("includes/code_header.php");
if($_SESSION["ses_user_id"]=="")
{
	header("location:login.php");
}

include_once("header.php");
?>
	<link href="css/bootstrap-override.css" rel="stylesheet">
<?PHP
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
						<h3>Qualification</h3>
						<div class="form-box" id="login-box">
										
							<form action="qualificationsystem.php" method="post" id="sign-up_area" role="form">
							
							
								<div id="entry1" class="clonedInput">
							
								<?PHP
								$i = 1;
								$sql = "SELECT * FROM qualification WHERE `registration_fk` = $sessionuserid";
								$a = mysql_query($sql);
								while($row = mysql_fetch_array($a))
								{								
								
								?>	<h2 id="reference" name="reference" class="heading-reference">Qualification <?PHP echo $i; ?></h2>
										<div class="form-group">
											<label> Degree </label>
											<input type="text" name="degree[]" class="form-control" placeholder="degree" value="<?PHP  echo $row['course']; ?>" />
										</div>
										<div class="form-group">
											<label> Institution </label>
											<input type="text" name="institution[]" class="form-control" placeholder="Institution" value="<?PHP  echo $row['institution']; ?>"/>
										</div>         
										<div class="form-group">
											<label> Start Year </label>
											<input type="date" name="startyear[]" class="form-control" placeholder="Start Year" value="<?PHP  echo $row['startyear']; ?>"/>
										</div>
										<div class="form-group">
											<label> End Year </label>
											<input type="text" name="endyear[]" class="form-control" placeholder="End Year" value="<?PHP  echo $row['endyear']; ?>"/>
										</div>
										<div class="form-group">
											<label> Percentage </label>
											<input type="text" name="percentage[]" class="form-control" placeholder="Percentage" value="<?PHP  echo $row['percentage']; ?>"/>
										</div>
								<?PHP
									$i++;											
								}		
								?>		
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
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<?PHP
					
						$userid = $_SESSION["ses_user_id"];
					
						$res = mysql_query("SELECT * FROM `personal` WHERE `registration_sk` =  $userid ");
					
						//var_dump($res);
						
						$rcount = mysql_num_rows($res);
						//echo $rcount;
						if($rcount > 0 )
						{
						
						
						?>
						<table>
						<?PHP
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Name </span></td><td>:</td><td>".mysql_result($res, 0 ,2)." ".mysql_result($res, 0 ,3)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Date of Birth </span></td><td>:</td><td>".mysql_result($res, 0 ,4)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Gender </span></td><td>:</td><td>".mysql_result($res, 0 ,5)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Email Address </span></td><td>:</td><td>".mysql_result($res, 0 ,6)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Address </span></td><td>:</td><td>".mysql_result($res, 0 ,7)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Landmark </span></td><td>:</td><td>".mysql_result($res, 0 ,8)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">City </span></td><td>:</td><td>".mysql_result($res, 0 ,11)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">State </span></td><td>:</td><td>".mysql_result($res, 0 ,12)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Country </span></td><td>:</td><td>".mysql_result($res, 0 ,9)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">ZipCode </span></td><td>:</td><td>".mysql_result($res, 0 ,10)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Nationality </span></td><td>:</td><td>".mysql_result($res, 0 ,13)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Religion </span></td><td>:</td><td>".mysql_result($res, 0 ,14)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Mobile Number </span></td><td>:</td><td>".mysql_result($res, 0 ,15)."</p></td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Blood Group </span></td><td>:</td><td>".mysql_result($res, 0 ,16)."</p></td>";
						echo "</tr>";						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Language Known </span></td><td>:</td><td>".mysql_result($res, 0 ,17)."</p></td>";
						echo "</tr>";						echo "<tr>";
						echo "<td><p> <span class=\"bold\">Martial Status </span></td><td>:</td><td>".mysql_result($res, 0 ,18)."</p></td>";
						echo "</tr>";					
						?>
						</table>
						
						<?PHP
							}
							else
							{
								echo "No Records Found";
							}
						?>
						
						</div>
	
			</div>
		</div>
	</section>
<?PHP
include_once("footer.php");
?>


<?PHP
/*
	insert into personal values(firstname,lastname,dob,gender,emailid,address,);
*/
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