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
<script type="text/javascript" language="javascript" src="../js/tooltip/script.js"></script>
<link rel="stylesheet" type="text/css" href="../js/tooltip/style.css" />
<link rel="stylesheet" type="text/css" href="javascript/jquery/ui/themes/ui-lightness/ui.all.css" />
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
    if ( document.form2.pid.value == "" ) { 
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
<?php include_once "header.php"; ?>
<div class=" body_wrapper">
  <!--Header starts-->
  
  <!--Header ends -->
  <!-- content starts-->
  <div class="content">

<table width="710" border="0" align="center" cellpadding="0" cellspacing="7" style=" text-align:center;" >
<tr align="center"><td width="166" align="center" valign="middle" style=" text-align:center"><img src="images/toolbar-3-trans.png" width="90" height="87" alt="creat new" /></td>
  <td width="174" align="center" ><img src="images/toolbar-1-trans.png" width="87" height="90" /></td>
  <td width="180" align="center" style=" text-align:center"><img src="images/delete.png" width="90" height="87" alt="delete" /></td>
  <td width="155" align="center" style=" text-align:center"><img src="images/toolbar-6-trans.png" width="83" height="90" alt="news" /></td>
</tr>
<tr>
  <td>
  <a href="create.php">Create new page</a></td>
  <td valign="middle" style=" text-align:center">
  <form id="form1" name="form1" method="post" action="edit.php" onsubmit="return validate_form1 ();">
    <label>
    <span class="hotspot" onmouseover="tooltip.show('Enter the id of the page to edit');" onmouseout="tooltip.hide();">
       <input name="pid" type="text" class="formFields" id="pid" size="8" maxlength="11" /></span>
    </label><br />
    <input name="button2" type="submit"  id="button2" value="Edit" />
  </form></td>
  <td><form id="form2" name="form2" method="post" action="delete_page_parse.php" onsubmit="return validate_form2 ();">
      
     <span class="hotspot" onmouseover="tooltip.show('Enter the id of the page to delete');" onmouseout="tooltip.hide();">
     
      <input name="pid" type="text" class="formFields" id="pid" size="8" maxlength="11" /></span>
      <br />
      <input name="button" type="submit" class="greyColor" id="button" value="Delete" />
      <br />
    </form></td>
  <td><p><a href="email_man.php">Email Manegment</a></p></td>
</tr>
<tr>
  <td><img src="images/edit_footer.png" width="90" height="87" alt="edit_footer" /></td>
  <td valign="middle" style=" text-align:center"><img src="images/46.png" width="64" height="64" /></td>
  <td><img src="images/edit_contact_info.png" width="90" height="87" /></td>
  <td><img src="images/120.png" width="64" height="64" alt="Home" /></td>
</tr>
<tr>
  <td><a href="edit_footer.php">Edit Footer</a></td>
  <td valign="middle" style=" text-align:center"><a href="edit_custom.php">Edit custom module</a></td>
  <td><a href="edit_contact.php">Edit your contact info</a></td>
  <td><a href="edit_home.php">Edit Home page</a></td>
</tr>
<tr>
  <td><img src="images/38.png" width="64" height="64" alt="settings" /></td>
  <td valign="middle" style=" text-align:center"><img src="images/3.png" width="64" height="64" alt="file editor" /></td>
  <td><img src="images/news.png" width="64" height="64" /></td>
  <td><img src="images/1.png" width="64" height="64" /></td>
</tr>
<tr>
  <td><a href="settings.php"> Setttings</a></td>
  <td valign="middle" style=" text-align:center"><a href="fileed.php">File Editor</a></td>
  <td><a href="news_man.php">News Management</a></td>
  <td><a href="pages.php">Pages</a></td>
</tr>
<tr>
  <td colspan="4">&nbsp;</td>
</tr>
</table>


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