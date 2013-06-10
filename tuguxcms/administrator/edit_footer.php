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
$sqlCommand = "SELECT modulebody FROM module WHERE showing='1' AND name='footer' LIMIT 1"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());

while ($row = mysqli_fetch_array($query)) { 
    $footer = $row["modulebody"];
} 
mysqli_free_result($query); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit your site footer</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
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
 function validate_form(){
	 valid=true;
	 if (document.form.footer.value == ""){
		     alert ("You have not filled the Footer.");
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
<div class="content">

Be sure to fill in all fields, they are all required.<br>
<table width="711" height="95" align="center">
<form id="form" name="form" method="post" action="edit_footer_parse.php" onsubmit="return validate_form();"> 
<tr>
<td height="49" ><div  style="width:100px">Footer:</div>

</td>
<td ><label>
  <input type="text" name="footer" id="footer" size="100" width="500px" value="<?php echo $footer; ?>" />
</label></td>
</tr>
<tr>
  <td height="38" colspan="2" ><label>
      <input type="submit" name="button" id="button" value="Save footer" />
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