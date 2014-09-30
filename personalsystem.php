<?PHP

	include_once("includes/code_header.php");

	$sessionuserid = $_SESSION["ses_user_id"];

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$emailid = $_POST['emailid'];
	$address = $_POST['address'];
	$landmark = $_POST['landmark'];
	$city  = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zipcode = $_POST['zipcode'];
	$nationality = $_POST['nationality'];
	$religion = $_POST['religion'];
	$mobile = $_POST['mobile'];
	$blood = $_POST['blood'];
	$language = $_POST['language'];
	$lang_read = $_POST['lang_read'];
	$lang_write = $_POST['lang_write'];
	$lang_speak = $_POST['lang_speak'];
	
	$martial = $_POST['martial'];
	
	//$userid = $_SESSION["ses_user_id"];

	/*echo $firstname;
	echo $lastname;
	echo $dob;
	echo $gender;
	echo $emailid;
	echo $address;
	echo $landmark;
	echo $city;
	echo $state;
	echo $country;
	echo $zipcode;
	echo $nationality;
	echo $religion;
	echo $mobile;
	echo $blood;
	//echo $language;
	/*echo $lang_read;
	echo $lang_write;
	echo $lang_speak;*/
	//echo $martial;
	
	foreach($language as $a => $b){ 
		//echo $a+1;
	
	
	if($lang_read[$a]=="")  $r = "";
	else $r = "R";
	
	if($lang_write[$a]=="") $w = "";
	else $w = "W";
	
	if($lang_speak[$a]=="") $s = "";
	else $s = "S";
	
	$languagear[$a] =  $language[$a]." - ".$r.",".$w.",".$s."#";
	echo "<br>";
	}
	
	foreach($language as $a => $b){ 
	echo $languagear[$a];
	}
	
	$newccAddress = implode($languagear);
	
	$res = mysql_query("SELECT * FROM `personal` WHERE `registration_fk` = '".$sessionuserid."'");
	$rcount = mysql_num_rows($res);
	
	if($rcount>0)
	{
		
	}	
	else{	
	 $sql = "INSERT INTO `personal`(`registration_fk`, `firstname`, `lastname`, `dob`, `gender`, `emailid`, `address`, `landmark`, `country`, `zipcode`, `city`, `state`, `nationality`, `religion`, `mobilenumber`, `bloodgroup`, `languageknown`, `martialstatus`, `created_date`, `modified_date`, `active_status`, `delete_status`) VALUES ($sessionuserid,'$firstname','$lastname','$dob','$gender','$emailid','$address','$landmark','$country','$zipcode','$city','$state','$nationality','$religion','$mobile','$blood','$language','$martial',NOW(),NOW(),1,0)";
	mysql_query($sql);
	}	
	header("location:qualification.php");		
	
?>
 
 
 