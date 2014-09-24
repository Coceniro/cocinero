<?PHP
include_once("includes/code_header.php");


$username = $_POST['username'];
$emailid = $_POST['emailid'];
$password = $_POST['password'];

$sql = "INSERT INTO `registration`(`username`, `emailid`, `password`, `created_date`, `active_status`, `delete_status`, `modify_date`) VALUES ('$username','$emailid','$password',NOW(),1,0,NOW())";
mysql_query($sql);
header("Location:personal.php");

?>