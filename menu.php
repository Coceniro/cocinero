<body>
	<div class="body-inner">
	<!-- Header start -->
	<header id="header" class="navbar-fixed-top main-nav" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<div style="height:30px; clear:both;"> 
				
				</div>
						
					<!-- Logo start -->
					<div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <a class="navbar-brand" href="index.php">
					    	<img class="img-responsive" src="images/logo.png" alt="logo">
					    </a>                    
					</div><!--/ Logo end -->

					<nav class="collapse navbar-collapse clearfix" role="navigation">
						<ul class="nav navbar-nav navbar-right">
	                        <li class="active"><a href="index.php">Home</a></li>
	                       	<li><a href="about.php">About</a></li>
	                        <li><a href="contact.php">Contact</a></li>
							<?PHP
							if($_SESSION["ses_user_id"]=="")
							{
							?>
	                       	<li class="dropdown">
	                       		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login | Register<i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
		                            <li><a href="login.php">Login</a></li>
		                            <li><a href="register.php">Register</a></li>
		                        </ul>
	                       	</li>
							
							<?PHP } else { ?>							
							 <li class="search dropdown"><a href = "" class="dropdown-toggle" data-toggle="dropdown">Profile</a>
							 <ul class="dropdown-menu">
		                            <li><a href="login.php">Profile</a></li>
		                            <li><a href="register.php">Logout</a></li>
		                     </ul>
							 
							 </li>
							<?PHP 
							}
							?>
	                        <!--li class="search"><button class="fa fa-search"></button></li-->
	                    </ul>
					</nav><!--/ Navigation end -->
					
					<div class="site-search">
						<div class="container">
							<input type="text" placeholder="type what you want and enter">
							<span class="close">&times;</span>
						</div>
					</div>
				</div><!--/ Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->
	<?PHP
	
	if($frm_name!="index")
	{
	?>
	<div id="inner-header">
		<img src="images/banner/banner4.jpg" alt ="" />
	</div>
	<?PHP
	}
	?>
