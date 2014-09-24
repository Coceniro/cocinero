<?PHP
$frm_name = "personal";
include_once("includes/code_header.php");
if($_SESSION["ses_user_id"]=="")
{
	header("location:login.php");
}
include_once("header.php");
include_once("menu.php");
include_once("breadcrumb.php");

?>
	 <link href="css/jquery.tagsinput.css" rel="stylesheet" />

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
						<h3>Personal Information</h3>
						<div class="form-box" id="login-box">
						<form name="personal_form" action="personalsystem.php" method="post">
							<div>
								<div class="form-group">
									<label> First Name </label>
									<input type="text" name="firstname" class="form-control" placeholder="First Name" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="25" 
										data-bv-stringlength-message="The First Name must be more than 3 and less than 25 characters long" 
										pattern="^[a-zA-Z]+$"/>
								</div>
								<div class="form-group">
									<label> Last Name </label>
									<input type="text" name="lastname" class="form-control" placeholder="Last Name" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="25" 
										data-bv-stringlength-message="The Last Name must be more than 3 and less than 25 characters long" 
										pattern="^[a-zA-Z]+$"/>
								</div>
								       
								<div class="form-group">
									<label> Date of Birth </label>
									<input type="date" name="dob" class="form-control" placeholder="Start Date" />
								</div>
								<div class="form-group">
									<label> Gender </label>
									<select class="form-control" name="gender" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="25" 
										data-bv-stringlength-message="The Gender must be Selected" 
										pattern="^[a-zA-Z]+$"/>
										<option value="select">Select...</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="others">Others</option>
									</select>
								</div>
								<div class="form-group">
									<label> Email ID </label>
									<input type="mail" name="emailid" class="form-control" placeholder="Email Address" maxlength="50" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="50" 
										data-bv-stringlength-message="The Email Address must be more than 3 and less than 50 characters long" 
										/>
								</div>
								<div class="form-group">
									<label> Address </label>
									<input type="text" name="address" class="form-control" placeholder="Address" maxlength="75" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="75" 
										data-bv-stringlength-message="The Address must be more than 3 and less than 75 characters long" 
										/>
								</div>
								<div class="form-group">
									<label> Landmark | 2nd Line </label>
									<input type="text" name="landmark" class="form-control" placeholder="Landmark" maxlength="40" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="40" 
										data-bv-stringlength-message="The Land Mark must be more than 3 and less than 40 characters long" 
										/>
								</div>
								<div class="form-group">
									<label> Country </label>									
									<input list="country" name = "country"  placeholder="Country" class="form-control">
								<?PHP
									$result = $GLOBALS['db_con_obj']->fetch_flds(country,"*", "1=1");
									if($result[1]==0)
									{}
									else
									{
								?>
								
									<datalist id = "country">
									<?PHP
										while($row = mysql_fetch_array($result[0]))
										{
											
									?>
									<option value="<?PHP echo $row['country_name']; ?>"><?PHP  echo $row['country_name']; ?></option>
										<?PHP
										}
										?>
									</datalist>
									<?PHP
										}
									?>
								</div>
								<div class="form-group">
									<label> Zip Code </label>
									<input type="text" name="zipcode" class="form-control" placeholder="Zipcode"/>
								</div>
								<div class="form-group">
									<label> City </label>
									<input type="text" name="city" class="form-control" placeholder="City" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="3" 
										data-bv-stringlength-max="25" 
										data-bv-stringlength-message="The City must be more than 3 and less than 25 characters long" 
										pattern="^[a-zA-Z]+$"/>
								</div>
								<div class="form-group">
									<label> State </label>
									<input type="text" name="state" class="form-control" placeholder="State" maxlength="25" required 
										data-bv-notempty-message="The Field is required and cannot be empty" 
										data-bv-stringlength-min="4" 
										data-bv-stringlength-max="25" 
										data-bv-stringlength-message="The State must be more than 3 and less than 25 characters long" 
										pattern="^[a-zA-Z]+$"/>
								</div>
								
								<div class="form-group">
									<label> Nationality </label>
									<input type="text" name="nationality" class="form-control" placeholder="Nationality"/>
								</div>
								
								<div class="form-group">
									<label> Religion </label>
									<select class="form-control" name="religion" data-bv-notempty data-bv-notempty-message="The Religion is required">
										<option value="select">Select...</option>
										<option value="hindu">Hindu</option>
										<option value="muslim">Muslim</option>
										<option value="christian">Christian</option>
										<option value="others">Others</option>
									</select>
								</div>
								<div class="form-group">
									<label>Mobile Number</label>
									<input name="mobile" id="tags" class="form-control" value="" placeholder="Add 1 r More" />
								</div>
								<!--div class="form-group">
									<label> Mobile Number </label>
									<input type="text" name="mobile" class="form-control" placeholder="Mobile Number"/>
								</div-->
								<div class="form-group">
									<label> Blood Group </label>
									<select class="form-control" name="blood" data-bv-notempty data-bv-notempty-message="The Blood Group is required">
										<option value="select">Select...</option>
										<option value="A +ve">A +ve</option>
										<option value="B +ve">B +ve</option>
										<option value="A -ve">A -ve</option>
										<option value="B -ve">B -ve</option>
										<option value="AB -ve">AB -ve</option>
										<option value="O +e">O +e</option>
									</select>
								</div>
								<div class="form-group row2">
									<label>Language Known</label>
									
									<div class="form-group">
										<input class="pull-right btn" type="button" value="Remove" onClick="deleteRow('dataTable')"  /> 
										<input class="pull-left btn" type="button" value="Add" onClick="addRow('dataTable')" /> 
										
									</div>	
									<br><br>
									
										<table id="dataTable" class="form" border="0">
										  <tbody>
											<tr>
												<td width="30"><input type="checkbox" required="required" name="chk[]" checked="checked" class="form-control" /></td>
												<td width="220">													
													<input type="text" required="required" name="language[]" Placeholder="Language" class="form-control">
												</td>
												<td width="60">
												</td>
												<td width="60">
													<input type = "checkbox" Value = "Read" name = "lang_read[]"> Read
												</td>
												<td width="60">
													<input type = "checkbox" Value = "Write" name = "lang_write[]"> Write
												</td>
												<td width="60"> 
													<input type = "checkbox" Value = "Speak" name = "lang_speak[]"> Speak
												</td>
												
												
													
											</tr>
											</tbody>
										</table>
										<div class="clear"></div>
            
								</div>
								<div class="form-group">
									<label> Martial Status </label>
									<select class="form-control" name="martial" data-bv-notempty data-bv-notempty-message="The Religion is required">
										<option value="select">Select...</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
									</select>
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

	<!-- Input Tags -->
	<script src="js/jquery.tagsinput.min.js"></script>

	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
	
	<!-- Dynamic Field -->
	<script type="text/javascript" src="js/script.js"></script>
	
	<script>
            jQuery(document).ready(function() {
                
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});
				
				 // Tags Input
                jQuery('#tags1').tagsInput({width:'auto'});
                 
                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
                // Spinner
                var spinner = jQuery('#spinner').spinner();
                spinner.spinner('value', 0);
                
                // Form Toggles
                jQuery('.toggle').toggles({on: true});
                
                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                // Input Masks
                jQuery("#date").mask("99/99/9999");
                jQuery("#phone").mask("(999) 999-9999");
                jQuery("#ssn").mask("999-99-9999");
                
                // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
                // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
			    jQuery(colpkr).fadeIn(500);
                            return false;
			},
			onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
			},
			onChange: function (hsb, hex, rgb) {
			    jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
			    jQuery('#colorpicker').val('#'+hex);
			}
                    });
                }
  
                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                
                
            });
        </script>
	

</body>
</html>