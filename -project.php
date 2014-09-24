<?PHP
include_once("header.php");
$frm_name = "project";
include_once("menu.php");
?>
<section id="Contact-page">
		<div class="container">
			<div class="row">
				<!-- Contact form start -->
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<div class="contact-form">
						<h3>Sign In</h3>
						<div class="form-box" id="login-box">
						<form action="" method="post">
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
									<label> Internal Guide Name </label>
									<input type="text" name="iguidename" class="form-control" placeholder="Internal Guide Name"/>
								</div>
								<div class="form-group">
									<label> Internal Guide Contact </label>
									<input type="text" name="companyname" class="form-control" placeholder="Internal Guide Contact"/>
								</div>
								<div class="form-group">
									<label> External Guide Name </label>
									<input type="text" name="iguidename" class="form-control" placeholder="External Guide Name"/>
								</div>
								<div class="form-group">
									<label> External Guide Contact </label>
									<input type="text" name="companyname" class="form-control" placeholder="External Guide Contact"/>
								</div>
							</div>
						</form>
						</div>
					</div><!-- Contact form end -->	
				</div> <!-- Col end -->			
    		</div><!--/ row end -->
		</div><!--/ container end -->
	</section>
<?PHP
include_once("footer.php");
?>