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
<title>Tugux Email Panel</title>
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
<table width="710" border="0" align="center" cellpadding="0" cellspacing="7" style=" text-align:center;" >
<tr align="center"><td width="166" align="center" valign="middle" style=" text-align:center"><img src="images/75.png" width="64" height="64" /></td>
  <td width="174" align="center" ><img src="images/73.png" width="64" height="64" /></td>
  <td width="180" align="center" style=" text-align:center"><img src="images/1.png" width="64" height="64" /></td>
  <td width="155" align="center" style=" text-align:center"><img src="images/74.png" width="64" height="64" /></td>
</tr>
<tr>
  <td>
  <a href="inbox.php">Read Mails</a></td>
  <td valign="middle" style=" text-align:center"><a href="create_email.php">Create New</a></td>
  <td><a href="clients_email_list.php">Clients List</a></td>
  <td><p><a href="send_news_letter.php">Send News Letter</a><a href="#"></a></p></td>
</tr>
<tr align="center">
  <td width="166" align="center" valign="middle" style=" text-align:center"><img src="images/71.png" width="64" height="64" /></td>
  <td width="174" align="center" >&nbsp;</td>
  <td width="180" align="center" style=" text-align:center">&nbsp;</td>
  <td width="155" align="center" style=" text-align:center">&nbsp;</td>
</tr>
<tr>
  <td>
  <a href="sentbox.php">Sent box</a></td>
  <td valign="middle" style=" text-align:center">&nbsp;</td>
  <td>&nbsp;</td>
  <td><p>&nbsp;</p></td>
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