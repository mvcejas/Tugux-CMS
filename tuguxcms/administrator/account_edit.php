<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}
?>
<?php 
$editusername=$_GET['editusername'];
include_once"../scripts/connect_to_mysql.php";
$sql=mysqli_query($myConnection, "SELECT * FROM admin WHERE username='$editusername' LIMIT 1") or die (mysqli_error($myConnection));
while ($row=mysqli_fetch_array($sql)){
	$username=$row["username"];
	$id=$row["id"];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit your account</title>
<link href="../tugux_style.css" rel="stylesheet" type="text/css" />

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
	 valid = true;
	 if (document.form.username.value == ""){
		     alert ("You have not filled the username.");
		     valid = false;
		 }else if (document.form.pass1.value == ""){
			 alert ("You have not filled the password.");
			 valid = false;
		 }return valid;
	 }
</script><!--validate form-->


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
<form id="form" name="form" method="post" action="account_edit_parse.php" onsubmit="return validate_form();"> 
<tr>
<td > </td>
<td ><font color="#FF0000"></font></td>
</tr>
<tr>
  <td ><div  style="width:100px">Username:</div></td>
  <td ><input type="text" name="username" id="username" size="86"  value="<?php echo $username; ?>" /></td>
</tr>
<tr>
  <td >Password:</td>
  <td><label>
    <input type="password" name="pass1" id="pass1" size="86" value="" />
  </label></td>
</tr>

<tr>
  <td  valign="top"> </td>
  <td><label>
  <input type="hidden" name="id" id="id" size="86" value="<?php echo $id; ?>" />
    <input type="submit" name="button" id="button" value="save settings" />
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