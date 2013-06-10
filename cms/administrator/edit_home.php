<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 

// Query the body section for the proper page
include_once "../scripts/connect_to_mysql.php";
$sqlCommand = "SELECT pagebody FROM home WHERE showing='1' AND linklabel='Home' LIMIT 1"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());

while ($row = mysqli_fetch_array($query)) { 
    $textarea = $row["pagebody"];
} 
mysqli_free_result($query); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit your site home</title>
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
		
			WYSIWYG.attach('textarea'); // default setup // full featured setup
		
			
			// Use it to display an iframes instead of a textareas
			//WYSIWYG.display('all', full);  
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


<!--validate form-->

<script type="text/javascript">
 function validate_form(){
	 valid=true;
	 if (document.form.textarea.value == ""){
		     alert ("You have not filled the field of custom module.");
		     valid=false;
		 }return valid;
	 }
</script>

</head>

<body style="margin:0px;">

<?php include_once"header.php"; ?>
<!--Body wrapper starts-->
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content"><br/>

<table width="557" height="95" align="center">
<form id="form" name="form" method="post" action="edit_home_parse.php" onsubmit="return validate_form();"> 
<tr>
<td colspan="2" valign="top" >Edit Home Text here:</td>
</tr>
<tr>
  <td colspan="2" valign="top" ><textarea  name="textarea" id="textarea" cols="70" rows="10" width="500px" value="" ><?php echo $textarea; ?></textarea></td>
</tr>
<tr>
  <td height="38" >:</td>
  <td width="437" height="38" >
  <input type="hidden" name="admin" id="admin" value="<?php echo $_SESSION["admin"]; ?>" />
  <input type="submit" name="button" id="button" value="Save home text" /></td>
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