<?php
$frm_page = "login";
include "includes/code_header.php";
echo $firm_page;
$error_msg ="";
$redirect_page = 0;
include "header.php";

$action = "";
$_SESSION["ses_admin_id"] = "";
$_SESSION["ses_admin_name"] =  "";
if(isset($_REQUEST["action"]))
	$action = $_REQUEST["action"];
switch($action)
{		
	case "login":
		$redirect_page = 1;
		$username = $_REQUEST["txtUserName"];
		$password = $_REQUEST["txtPassword"];
	
		$res = mysql_query("SELECT * FROM `admin` WHERE `admin_username` = '".$username."' and `admin_password` = '".$password."'");
		$rcount = mysql_num_rows($res);
		
		if($rcount > 0 )
		{
			$_SESSION["ses_admin_id"] = mysql_result($res, 0);
			$_SESSION["ses_admin_name"] = mysql_result($res, 0 ,1);
			$redirect_url = "home.php";			
		}
		else
		{
			$redirect_page = 0;
			$error_msg ="Invalid User Name / Password";								
		}
	break;
}

if($redirect_page == 1)
{
	header("location:$redirect_url");
	exit();
}

include "login.php";
?>