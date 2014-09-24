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
	
$qry = mysql_query("SELECT * FROM `admin` WHERE `admin_sk` = '1'");
$res = mysql_fetch_object($qry);
$email_id = $res->admin_email;
$username = $res->admin_username;	
	
	
$error_msg = "";
$emailreg = '/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/';
if(isset($_REQUEST["action"]))
{
	$f=0;
	$oldpassword = $_REQUEST["txtOldPassword"];
	$newpassword = $_REQUEST["txtNewPassword"];
	$confirmpassword = $_REQUEST["txtConfirmPassword"];
	$email_id = $_REQUEST["txtEmail"];
	
	$res = mysql_query("SELECT * FROM `admin` WHERE `admin_password` = '".$oldpassword."' and admin_sk='1'");
	$rcount = mysql_num_rows($res);
	
	if($rcount==0)
	{
		$error_msg = "Old Password is Incorrect";
		$f=1;
	}
	else if($newpassword != $confirmpassword)
	{
		$error_msg = "Password Mismatch";
		$f=1;
	}
	else if(!preg_match($emailreg,$email_id))
	{
		$error_msg = "Invalid Email Id";
		$f=1;
	}
	else
	{
		$error_msg="";
		$f=0;
	}
	if($f==0)
	{
		$cires = mysql_query("UPDATE `admin` set `admin_password`='".$newpassword."', `admin_email` = '".$email_id."' where admin_sk='1'");
		header("Location:edit_profile.php?from=edit&msg=yes");
		exit();
	}
			
}
?>	

		 <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li>Profile Settings</li>
                                </ul>
                                <h4>Profile Settings</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
		
		<div class="contentpanel">
                        
                        <div class="row">
                            <div class="col-md-12">
							  <?php include "error_message.php"; ?>
              <?php if(strlen($error_msg) > 0) { ?> <div style="color:#F00; font-weight:normal; text-align:center; margin:5px;"><?php echo $error_msg; ?></div> <?php } ?>
							<form action="" method="post" name="profile" id="basicForm" enctype="multipart/form-data">                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h4 class="panel-title">Edit Profile</h4>
                                        <p>Change your admin password here</p>
                                    </div><!-- panel-heading -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Admin <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    	<?php echo $username; ?>
                                                </div>
                                            </div><!-- form-group -->
                                          
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Old Password <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                   
													
													<input type="password" name="txtOldPassword" id="txtOldPassword" class="form-control"  style="width:320px;" value="<?php echo $oldpassword; ?>" required>
													
                                                </div>
                                            </div><!-- form-group -->
                                          
										  <div class="form-group">
                                                <label class="col-sm-3 control-label">New Password <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="txtNewPassword" id="txtNewPassword" class="form-control"  style="width:320px;" value="<?php echo $newpassword; ?>" required>
                                                </div>
                                            </div><!-- form-group -->
                                          
										  <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="form-control"  style="width:320px;" value="<?php echo $confirmpassword; ?>" required>
                                                </div>
                                        </div><!-- form-group -->
                                          
										  
										                   
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                                            <div class="col-sm-9">
                                               <input type="text" name="txtEmail" id="txtEmail" class="form-control"  style="width:320px;" value="<?php echo $email_id; ?>" disabled> 
                                                </div>
                                        </div><!-- form-group -->
                                          
										  
                                   
                                        </div><!-- row -->
                                    </div><!-- panel-body -->
                                    <div class="panel-footer">
                                      <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">                                            
											<button type="submit" class="btn btn-primary mr5">Save</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                      </div>
                                    </div><!-- panel-footer -->  
                                </div><!-- panel -->
                                </form>
                                
                            </div><!-- col-md-6 -->
					</div>
			</div>
		</div>
		</div>
	 </section>
 
	 <?PHP 
 include "script.php"; 
 ?>
     <script>
            jQuery(document).ready(function(){
              
                // Basic Form
                jQuery("#basicForm").validate({
                    highlight: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-error');
                    }
                });
				});
	</script>		
     </body>
</html>
