<?php
include_once("header.php");
?>
<body class="signin">       
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="images/logo-primary.png" alt="Chain Logo" >
                    </div>
                    <br />
                    <h3 class="text-center mb5">Sign in now</h3>
					   <form action="" method="post">
                    <input type="hidden" name="action" value="login">
        <?php if(strlen($error_msg) > 0) { ?> <div style="color:#F00; font-weight:normal; text-align:center; margin:5px;"><?php echo $error_msg; ?></div> <?php } ?>
            
                    
                    <div class="mb30"></div>
                    
                 
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name = "txtUserName" required>
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" id = "txtPassword" name="txtPassword" required>
                        </div><!-- input-group -->                        
                         
					<div class="clearfix">                          
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Sign In <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div> 
						 
                    </form>
                    
                </div><!-- panel-body -->              
            </div><!-- panel -->
            
        </section>
		<?PHP  
		
		include_once("script.php");
		
		?>
		 </body>
</html>
