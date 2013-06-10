<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["admin"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["pass"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include_once"../scripts/connect_to_mysql.php";
$sql = mysqli_query($myConnection, "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' AND account_type='a' LIMIT 1") or die (mysqli_error($myConnection)); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/delete.png" width="90" height="87"><br />
Your login session is not on record in database or you have not acess to this section. Sorry..!!<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
     exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create admin account</title>
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
<form id="form" name="form" method="post" action="create_admin_parse.php" onsubmit="return validate_form();"> 
<tr>
<td >&nbsp;</td>
<td ><font color="#FF0000"></font></td>
</tr>
<tr>
  <td ><div  style="width:100px">Username:</div></td>
  <td ><input type="text" name="username" id="username" size="86"  value="<?php echo $username; ?>" /></td>
</tr>
<tr>
  <td >Password:</td>
  <td><label>
    <input type="password" name="pass1" id="pass1" size="86" value="<?php echo $pass1; ?>" />
  </label></td>
</tr>
<tr>
  <td >Admin Type</td>
  <td>
    <label>
      <select id="type" name="type">
      <option>Select Admin Type</option>
      <option value="a">Super Admin</option>
      <option value="b">Ass.Admin</option>
      </select>
    </label></td>
</tr>

<tr>
  <td  valign="top">&nbsp;</td>
  <td><label>
    <input type="submit" name="button" id="button" value="Create Admin Account" />
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