<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugux Studios Administration Panel</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function validate_form1 ( ) { 
    valid = true;
    if ( document.form1.pid.value == "" ) { 
	alert ( "Please enter the ID number for the page to be edited." ); 
	valid = false;
	} 
	return valid;
	}
	
function validate_form2 ( ) { 
    valid = true;
    if ( document.form2.linklabel.value == "" ) { 
	alert ( "Please enter the ID number for the page to be deleted." ); 
	valid = false;
	} 
	return valid;
	}	

</script>
<style type="text/css">
a {
	text-decoration:none;
	color:#2365E0;
	font-size:11px;
	font-family:Arial, Helvetica, sans-serif;
	}
a:hover {
	text-decoration:none;
	color:#1392CE;
	font-size:11px;
	font-family:Arial, Helvetica, sans-serif;
	}
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<!--java drop down menu -->

<!--java drop down menu -->
</head>

<body style="margin:0px;">

<!--Body wrapper starts-->
<?php include_once"header.php"; ?>
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content">
<div >
<table width="638" border="0" align="center" cellpadding="0" cellspacing="5" style=" text-align:center;" >

<tr>
  <td width="176"><img src="images/cle a molette.png" width="64" height="64" alt="settings" /></td>
  <td width="239" valign="middle" style=" text-align:center"><img src="images/95.png" width="64" height="64" alt="add admin" /></td>
  <td width="203"><img src="images/10.png" width="64" height="64" alt="users" /></td>
  </tr>
<tr>
  <td><a href="account_edit.php?editusername=<?php echo $_SESSION['admin'];?>">Account Setttings</a></td>
  <td valign="middle" style=" text-align:center"><a href="create_admin.php">Create admin</a></td>
  <td><a href="users_list.php">Users list</a></td>
  </tr>
</table>
</div>

</div>
<!-- content ends-->
<!-- content menu ends-->
<div class="footer">Powered by Tugux Studios</div>
</div>
<!--Body wrapper ends -->


</div>
<!--Body wrapper ends-->
</body>
</html>