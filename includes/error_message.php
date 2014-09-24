<?php error_reporting(0); ?>
<?php if(strlen($_SESSION['ses_msg_str']) > 0) { ?>
<table width=100% border=0 cellpadding=3 cellspacing=3>
  <tr> 
    <td align="center"><span class="<?php echo stripslashes($_SESSION['ses_msg_cls_str']); ?>"><?php echo stripslashes($_SESSION['ses_msg_str']); ?></span></td>
  </tr>
</table>
<?php 
  	$_SESSION['ses_msg_str'] = "";
  	$_SESSION['ses_msg_cls_str'] = "";
  } 
?>