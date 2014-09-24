<?PHP
$frm_page = "home";
include "includes/code_header.php";
if($_SESSION['ses_admin_id']=="")
{
	header("location:index.php");
}
include "header.php";
include "top.php";
?>
 <section>
    <div class="mainwrapper">
	<?PHP
		include "left.php";
	?>
	   <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Dashboard</li>
                                </ul>
                                <h4>Dashboard</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
		</div>
		</div>
		
 </section>
 <?PHP 
 include "script.php"; 
 ?>
     </body>
</html>
