<?PHP
include "includes/code_header.php";
include_once("header.php");
include_once("menu.php");
?>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2>Contact</h2>
		        	<ul class="breadcrumb">
			            <li> <a href="#">Home </a></li>
			            <li><a href="#"> Contact</a></li>
		          	</ul>
	          	</div>
	        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-40"></div>


	<!-- Contact page start -->
	<section id="Contact-page">
		<div class="container">
			<div class="row">

				<!-- Map start here -->
				<div class="map" id="map"></div>
				<!-- Map end here -->

				<!-- Contact form start -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="contact-form">
						<h3>Contact us</h3>
						<form action="http://themewinter.com/html/dart/contact-form.php" method="post" role="form">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name</label>
									<input class="form-control" name="name" id="name" placeholder="" type="text" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name="email" id="email" 
										placeholder="" type="email" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Subject</label>
										<input class="form-control" name="subject" id="subject" 
										placeholder="" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message" id="message" placeholder="" rows="8" required></textarea>
							</div>
							<div><br>
							<button class="btn btn-primary" type="submit">Send Message</button> 
							</div>
						</form>
					</div><!-- Contact form end -->	
				</div> <!-- Col end -->

				<!-- sidebar start -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="contact-info">
		    		<h3>Contact Info</h3>
		    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget erat magna. Pellentesque justo ante</p>
		    		<br>
		    		<p><i class="fa fa-home"></i>  1102 Saint Marys, Junction City, KS </p>
					<p><i class="fa fa-phone"></i>  +(785) 238-4131 </p>
					<p><i class="fa fa-envelope-o"></i>  info@dartdesign.com</p>
					<p><i class="fa fa-globe"></i>  www.dart.com</p>
		    		</div>
				</div><!-- sidebar end -->
    		</div><!--/ row end -->
		</div><!--/ container end -->
	</section>
	<!-- Faq page end -->

	<div class="gap-40"></div>

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
	<!-- Google Map API Key Source -->
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<!-- For Google Map -->
	<script type="text/javascript" src="js/gmap3.js"></script>
	<!-- Doc http://www.mkyong.com/google-maps/google-maps-api-hello-world-example/ -->

	<script type="text/javascript">
      $(function() {
        $("#map").gmap3({
          map:{
            options:{
              zoom: 14,
            }
          },
          getlatlng:{
            address:  "121 King Street, Melbourne Victoria 3000 Australia",
            callback: function(results) {
              if ( !results ) return;
              $(this).gmap3('get').setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
              $(this).gmap3({
                marker:{
                  latLng:results[0].geometry.location,
                  options:{
                	  	icon: new google.maps.MarkerImage(
						"../../../gmap3.net/skin/gmap/magicshow.png",
						new google.maps.Size(32, 37, "px", "px")
						)
              		}
                }
              });
            }
          }

        });

        });
    </script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>


</body>
</html>


