
<?php
	global $site_config;
	//define("LOCAL",true);
	
	$site_config['action'] = "save";
	$site_config['SITEPATH'] = "http://localhost/Coceniro/admin";
	$site_config['COMPANYNAME'] = "Coceniro [Choose your own]";
	$site_config['COMPANY_ADDRESS'] = "173, Kalki Nagar, Peelamedu";
	$site_config['COMPANY_PHONE'] = "77080 22113";
	$site_config['ADMINEMAIL'] = "clustersacademy2007@gmail.com";
	$site_config['DATABASE_SERVER'] = "localhost";
	$site_config['DATABASE_USERNAME'] = "root";
	$site_config['DATABASE_PASSWORD'] = "";
	$site_config['DATABASE_NAME'] = "coceniro";
	$site_config['DEBUG'] = "0";	
	

	
	/**** Calendar *****/
	define("TIME_DISPLAY_FORMAT", "12hr");
	define("WEEK_START", 0);
	define("CURR_TIME_OFFSET", 0);
	define("MAX_TITLES_DISPLAYED", 5);
	define("TITLE_CHAR_LIMIT", 37);
?>