<?php
@ob_start();
@session_id();
@session_start();
error_reporting(0);


include("includes/config_settings.php");
require_once("includes/functions.php");
require_once("classes/logger.class.php");
require_once("classes/connections.class.php");

include "includes/tables.php";

$sitePath=$GLOBALS['site_config']['SITEPATH'];

global $logger_obj, $db_con_obj;

$logger_obj = new logger();
$db_con_obj = new database_manipulation();


if(file_exists("includes/logincheck.php"))
require_once("includes/logincheck.php");

/*if($GLOBALS['in_admin'] == 1 && $_SESSION['ses_admin_id'] <= 0 && $frm_page != "login")
{
	frame_notices("Please login to continue!");
	header("location:index.php");
	exit();
}
*/

$star ="<font class='redfont'>*</font>";
//login check for admin section - End


?>
<?php /*?><script src="<?php echo $GLOBALS['site_config']['site_path'];?>scripts/script.js" type="text/javascript"></script><?php */?>
<?php /*?><script language="javascript">
function display_error(){
return true;
}
window.onerror=display_error
</script><?php */?>
