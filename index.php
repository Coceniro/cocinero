<?PHP
/*Index file */
//Created by
//Date :
	include "includes/code_header.php";
	include_once("header.php");
	$frm_name = "index";
	include_once("menu.php");
	
	
?>

	<!-- Slider start -->
	<section id="home">	
		<!-- Carousel -->
    	<div id="main-slide" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#main-slide" data-slide-to="0" class="active"></li>
			    <li data-target="#main-slide" data-slide-to="1"></li>
			    <li data-target="#main-slide" data-slide-to="2"></li>
			</ol><!--/ Indicators end-->

			<!-- Carousel inner -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                    		<h2 class="animated2">
                        		<span>Welcome to <strong>Cocinero</strong></span>
                        	</h2>
                            <h3 class="animated3">
                            	<span>The ultimate aim of your business</span>
                            </h3>
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			    <div class="item">
			    	<img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h2 class="animated4">
                                <span><strong>Cocinero</strong> for the highest</span>
                            </h2>
                            <h3 class="animated5">
                            	<span>The Key of your Success</span>
                            </h3>		
                            <p class="animated6"><a href="#" class="slider btn btn-primary">Buy Now</a></p>	     
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			    <div class="item">
			    	<img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h2 class="animated7">
                                <span>The way of <strong>Success</strong></span>
                            </h2>
                            <h3 class="animated8">
                            	<span>Why you are waiting</span>
                            </h3>		
                            <div class="">
                                <a class="animated4 slider btn btn-primary btn-min-block" href="#">Get Now</a><a class="animated4 slider btn btn-default btn-min-block" href="#">Live Demo</a>
                            </div>     
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
			</div><!-- Carousel inner end-->

			<!-- Controls -->
			<a class="left carousel-control" href="#main-slide" data-slide="prev">
		    	<span><i class="fa fa-angle-left"></i></span>
			</a>
			<a class="right carousel-control" href="#main-slide" data-slide="next">
		    	<span><i class="fa fa-angle-right"></i></span>
			</a>
		</div><!-- /carousel -->    	
    </section>
    <!--/ Slider end -->


    <!-- Newsletter start -->
    <div id="newsletter" class="wow slideInLeft">
    	<div class="container">
    		<div class="row">
				<form class="form-inline" role="form">
                      <div class="form-group col-lg-9 col-md-8 col-sm-7 col-xs-7">
                         <input type="text" class="form-control" placeholder="Want to be update with our latest offer?" >
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Join Our Newsletter</button>
                 </form>
    		</div>
    	</div>
    </div>
    <!-- Newsletter end -->
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
	</div>
</body>
</html>