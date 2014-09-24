<?PHP
include_once("includes/code_header.php");

		$username = $_REQUEST["userid"];
		$password = $_REQUEST["password"];
	
		//echo $username;
		//echo $password;
		$_SESSION["ses_user_id"] = "";
		$_SESSION["ses_user_name"] = "";
		$res = mysql_query("SELECT * FROM `registration` WHERE `emailid` = '".$username."' and `password` = '".$password."'");
		//var_dump($res);
		$rcount = mysql_num_rows($res);
		//echo $rcount;
		if($rcount > 0 )
		{
			$_SESSION["ses_user_id"] = mysql_result($res, 0);
			//echo "user id".$_SESSION["ses_user_id"];
			$_SESSION["ses_user_name"] = mysql_result($res, 0 ,1);
			//echo "username ".$_SESSION["ses_user_name"];
			$redirect_url = "personal.php";		
			$redirect_page = 1;
		}
		else
		{
			$redirect_page = 0;
			$error_msg ="Invalid User Name / Password";								
			echo "Invalid User Name / Password";								
		}
	
if($redirect_page == 1)
{
	header("location:$redirect_url");
	exit();
}


?>