<?PHP

	include_once("includes/code_header.php");

	$sessionuserid = $_SESSION["ses_user_id"];

	$subject = $_POST['subject'];
	$institution = $_POST['institution'];
	$company = $_POST['company'];
	
	
	$userid = $_SESSION["ses_user_id"];

	/*
	echo $subject;
	echo $institution;
	echo $company;
	
	*/
	
	$res = mysql_query("SELECT * FROM `certificate` WHERE `registration_fk` = '".$sessionuserid."'");
	$rcount = mysql_num_rows($res);
	
	if($rcount>0)
	{
		
	}	
	else{	
	 $sql = "INSERT INTO `certificate`(`registration_fk`, `subject`, `created_date`, `modified_date`, `active_status`, `delete_status`, `institution`, `company`) VALUES ($userid,'$subject',NOW(),NOW(),1,0,'$institution','$company')";
	 	 
	mysql_query($sql);
	}	
	header("location:skills.php");		
	

?>
 
 

