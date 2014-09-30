<?PHP

echo "hai";

include_once("includes/code_header.php");

	$sessionuserid = $_SESSION["ses_user_id"];

	$degree = $_POST['degree'];
	$institution = $_POST['institution'];
	$startyear = $_POST['startyear'];
	$endyear = $_POST['endyear'];
	$percentage = $_POST['percentage'];
	
	
	 foreach($degree  as $a => $b){ 
echo $degree[$a];
	echo $institution[$a];
	echo $startyear[$a];
	echo $endyear[$a];
	echo $percentage[$a];
	
	$sql = "INSERT INTO `qualification`(`registration_fk`, `course`, `institution`, `startyear`, `endyear`,`percentage`,`created_date`, `modified_date`, `active_status`, `delete_status`) VALUES ($sessionuserid,'$degree[$a]','$institution[$a]','$startyear[$a]','$endyear[$a]','$percentage[$a]',NOW(),NOW(),1,0)";
		var_dump($sql); 
		echo "<br>";
	 mysql_query($sql);
	
	} 
	
	
	header("location:certificate.php");	
	//$d = mysql_query($sql);
	
		
	

?>