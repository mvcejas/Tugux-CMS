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
<title>Create a new page</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
<!--include editor-->
	<!-- 
			Include the WYSIWYG javascript files
		-->
		<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<!-- 
			Attach the editor on the textareas
		-->
		<script type="text/javascript">
			// Use it to attach the editor to all textareas with full featured setup
			//WYSIWYG.attach('all', full);
			
			// Use it to attach the editor directly to a defined textarea
		
			WYSIWYG.attach('pagebody'); // default setup // full featured setup
		
			
			// Use it to display an iframes instead of a textareas
			//WYSIWYG.display('all', full);  
		</script>

<!--validate form-->
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

<!--validate form-->

<script type="text/javascript">
 function validate_form(){
	 valid = true;
	 if (document.form.pagetitle.value == ""){
		     alert ("You have not filled the page title.");
		     valid = false;
		 }else if (document.form.linklabel.value == ""){
			 alert ("You have not filled the linklabel.");
			 valid = false;
	     }else if  (document.form.pagebody.value == ""){
		     alert ("You have not entered the Page content");
		     valid = false;
		 }return valid;
	 }
</script>


</head>

<body style="margin:0px;">

<!--Body wrapper starts--><?php include_once"header.php"; ?>
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content">

Be sure to fill in all fields, they are all required.<br>
<table width="711" height="329" align="center">
<form id="form" name="form" method="post" action="new_page_parse.php" onsubmit="return validate_form();"> 
<tr>
<td ><div  style="width:100px">Page Title:</div>

</td>
<td ><label>
  <input type="text" name="pagetitle" id="pagetitle" size="86" width="500px" value="<?php echo $pagetitle; ?>" />
</label></td>
</tr>
<tr>
  <td >Link Label:</td>
  <td><label>
    <input type="text" name="linklabel" id="linklabel" size="86" value="<?php echo $linklabel; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Page Content:</td>
  <td><label>
    <textarea name="pagebody" id="pagebody" style="width:80%;height:200px;"  ><?php echo $pagebody; ?></textarea>
  </label></td>
</tr>
<tr>
  <td  valign="top">&nbsp;</td>
  <td><label>
  <input type="hidden" name="admin" id="admin" size="86" value="<?php echo $_SESSION["admin"]; ?>" />
    <input type="submit" name="button" id="button" value="Create page" />
  </label></td>
</tr>
</form>
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