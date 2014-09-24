<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
			
	        	<div class="inner-title-content">
		        	<h2 style = "text-transform:capitalize;">
					<?PHP
						echo $_SESSION["ses_user_name"];
					?>
					</h2>
		        	<div class="pull-right">
					<?PHP
					if($frm_name!="resume"){
					?>
			            <div><a href="template.php"><button id="nextPage" name="next" class="pull-right btn">Template <i class="fa fa-book"></i></button></a></div>
			         <?PHP
					 }
					 else
					 {
					 ?>
					 <div>
					 
						<a href="template.php"><button id="nextPage" name="next" class="pull-right btn">Template <i class="fa fa-book"></i></button></a>
						
						
						<div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Save</a></li>
										  <li class="divider"></li>
                                          <li><a href="#">Convert PDF</a></li>
                                          <li><a href="#">Convert DOC</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Mail to..</a></li>
                                        </ul>
                                      </div><!-- btn-group -->
								&nbsp;&nbsp;&nbsp;	  
					 </div>
					 <?PHP
					 }
					 ?>
		          	</div>
	          	</div>
			
					        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-40"></div>