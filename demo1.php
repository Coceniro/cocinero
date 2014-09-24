<!DOCTYPE html>
<html lang="it">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Ferro Menu :: ferro's jQuery Plugins</title>
		
  		<link rel="stylesheet" href="menu/style.css" />
  		<link rel="stylesheet" href="menu/jquery.ferro.ferroMenu.css" />
  		<link rel="stylesheet" href="menu/demos.css" />
  		<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.css" />
  		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
		<script src="menu/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="menu/jquery.ferro.ferroMenu-1.1.min.js" type="text/javascript"></script>
		<script src="menu/jquery.transit.min.js" type="text/javascript"></script>
		
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


		
		<script type="text/javascript">
			var currentIndex = 0;
			var currentId = "camera";
			$(document).ready(function() {
				$("#nav").ferroMenu({
					position 	: "left-center",
					delay 		: 50,
					rotation 	: 720,
					margin		: 20
				});
			});
			
			var colors = {
					"camera" : {
						"background" : "#D06503",
						"index" : 0
					},
					"user" : {
						"background" : "#E9931A",
						"index" : 1
					},
					"mapmarker" : {
						"background" : "#1691BE",
						"index" : 2
					},
					"music" : {
						"background" : "#166BA2",
						"index" : 3
					},
					"commentalt" : {
						"background" : "#1B3647",
						"index" : 4
					},
					"moon" : {
						"background" : "#152836",
						"index" : 5
					}
					
			};
			
			function goTo(id){
				var obj = eval("colors."+id);
				
				$("body").css("background",obj.background);
				$("#ferromenu-controller,#nav li a").css("color",obj.background);
				if(obj.index > currentIndex){
					$(".active").addClass("off");
					$(".active").transition({
						x : -100,
						opacity : 0,
						zIndex : 0
					},600);
					
					$("#"+currentId).removeClass("active");
					
					$("#"+id).addClass("active");
					$("#"+id).transition({
						x : 400
					},0,function(){
						$("#"+id).removeClass("off");
						$("#"+id).transition({
							x : 0,
							opacity : 1,
							zIndex : 2
						},600);
					});
				}else if(obj.index < currentIndex){
					$(".active").addClass("off");
					$(".active").transition({
						x : 100,
						opacity : 0,
						zIndex : 0
					},600);
					$("#"+currentId).removeClass("active");
					
					
					$("#"+id).addClass("active");
					$("#"+id).transition({
						x : -400
					},0,function(){
						$("#"+id).removeClass("off");
						$("#"+id).transition({
							x : 0,
							opacity : 1,
							zIndex : 2
						},600);
					});
				}
				currentIndex = obj.index;
				currentId = id;
				
			}
		</script>
	</head>
	<body>
		<ul id="nav">
			<li><a href="javascript:goTo('camera');"><i class="icon-camera"></i></a></li>
			<li><a href="javascript:goTo('user');"><i class="icon-user"></i></a></li>
			<li><a href="javascript:goTo('mapmarker');"><i class="icon-map-marker"></i></a></li>
			<li><a href="javascript:goTo('music');"><i class="icon-music"></i></a></li>
			<li><a href="javascript:goTo('commentalt');"><i class="icon-comment-alt"></i></a></li>
			<li><a href="javascript:goTo('moon');"><i class="icon-moon"></i></a></li>
		</ul>
		<section id="content">
			<article id="camera" class="active">
				<i class="icon-camera"></i>
				<h1>Camera</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.More script and css style
: <a href="http://www.htmldrive.net/" title="HTML DRIVE - Free DHMTL Scripts,Jquery plugins,Javascript,CSS,CSS3,Html5 Library">www.htmldrive.net </a>

				</div>
			</article>
			<article id="user" class="off">
				<i class="icon-user"></i>
				<h1>User</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.More script and css style
: <a href="http://www.htmldrive.net/" title="HTML DRIVE - Free DHMTL Scripts,Jquery plugins,Javascript,CSS,CSS3,Html5 Library">www.htmldrive.net </a>

				</div>
			</article>
			<article id="mapmarker" class="off">
				<i class="icon-map-marker"></i>
				<h1>Marker</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.
				</div>
			</article>
			<article id="music" class="off">
				<i class="icon-music"></i>
				<h1>Music</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.
				</div>
			</article>
			<article id="commentalt" class="off">
				<i class="icon-comment-alt"></i>
				<h1>Comment</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.
				</div>
			</article>
			<article id="moon" class="off">
				<i class="icon-moon"></i>
				<h1>Moon</h1>
				<div class="cnt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh libero, tempor eget nunc eget, dapibus lacinia augue. Praesent ut feugiat sapien. Mauris facilisis varius urna vel ullamcorper. Donec a ipsum magna. In scelerisque enim dolor, sit amet fringilla magna ultricies in. In nulla nisi, ornare ut placerat vel, sollicitudin ut sem. Aliquam eleifend lectus a orci fermentum, a gravida lorem ornare. Etiam purus dui, dignissim vitae laoreet ut, elementum at orci. Duis vitae luctus tortor. Phasellus risus orci, pulvinar quis dignissim id, scelerisque quis metus. Nulla facilisi. Maecenas semper lorem id eros ultricies vestibulum. Sed dapibus laoreet scelerisque. Sed suscipit ante sit amet lacus ultrices, ut faucibus justo malesuada. Curabitur id tristique enim. Phasellus nec dapibus ipsum.
					<br/><br/>
					Sed in lectus aliquet, iaculis turpis ac, scelerisque ante. Nullam nec quam ac neque porttitor semper at eget neque. Maecenas auctor dolor felis, id tempus dui mollis in. Duis bibendum nunc augue, eu ornare dolor dapibus sed. In nec facilisis purus. Nulla at tincidunt velit. Quisque arcu lorem, pulvinar rutrum lectus vel, feugiat interdum ligula. Sed in placerat nisl, nec dictum risus. Curabitur eleifend commodo purus, quis tempor odio. Suspendisse ullamcorper augue sit amet urna varius aliquam. Morbi nibh dolor, sollicitudin in blandit id, tempus eget magna. Phasellus sem leo, luctus a tortor ac, auctor bibendum massa. Sed quis enim ultricies mi feugiat mattis eu nec nunc. Pellentesque consectetur risus vel adipiscing luctus. Vivamus iaculis gravida odio sit amet scelerisque. Phasellus nec nisi orci.
				</div>
			</article>
		</section>
	</body>
</html>
