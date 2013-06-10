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
$sqlCommand = "SELECT mobile, telefone, aboutcompany, city, country, adress, email FROM contact WHERE showing='1' AND id='1'"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysql_error());
while ($row=mysqli_fetch_array($query)){
	$email=$row['email'];
	$mobile=$row['mobile'];
	$telefone=$row['telefone'];
	$country=$row['country'];
	$city=$row['city'];
	$adress=$row['adress'];
	$aboutcompany=$row['aboutcompany'];
	$aboutcompany = str_replace("<br />", "", $aboutcompany);
} 
mysqli_free_result($query); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Contact info</title>
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

<!--validate form-->

<script type="text/javascript">
 function validate_form(){
	 valid=true;
	 if (document.form.email.value == ""){
		     alert ("You have not filled the email field.");
		     valid=false;
		 }else if (document.form.telefone.value == ""){
			 alert ("You have not filled the telefone field.");
			 valid=false;
	     }else if (document.form.mobile.value == ""){
		     alert ("You have not entered the mobile field");
		     valid=false;
		 }else if (document.form.adress.value == ""){
		     alert ("You have not entered the adress field");
		     valid=false;
		 }else if (document.form.city.value == ""){
		     alert ("You have not entered the city field");
		     valid=false;
		 }else if (document.form.country.value == ""){
		     alert ("You have not entered the country field");
		     valid=false;
		 }else if (document.form.aboutcompany.value == ""){
		     alert ("You have not entered the About company filed");
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
<table width="711" height="329" border="0" align="center" cellpadding="0" cellspacing="2">
<form id="form" name="form" method="post" action="edit_contact_parse.php" onsubmit="return validate_form();"> 
<tr>
<td ><div  style="width:100px">Email:</div>

</td>
<td ><label>
  <input type="text" name="email" id="email" size="86" width="500px" value="<?php echo $email; ?>" />
</label></td>
</tr>
<tr>
  <td >Telefone:</td>
  <td><label>
    <input type="text" name="telefone" id="telefone" size="86" width="500px" value="<?php echo $telefone; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Mobile:</td>
  <td><label>
    <input type="text" name="mobile" id="mobile" size="86" width="500px" value="<?php echo $mobile; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Adress:</td>
  <td><label>
    <input type="text" name="adress" id="adress" size="86" width="500px" value="<?php echo $adress; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">City:</td>
  <td><label>
    <input type="text" name="city" id="city" size="86" width="500px" value="<?php echo $city; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Country:</td>
  <td><label>
    <input type="text" name="country" id="country" size="86" width="500px" value="<?php echo $country; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">About company:</td>
  <td><textarea name="aboutcompany" id="textarea" cols="98" rows="15" ><?php echo $aboutcompany; ?></textarea></td>
</tr>
<tr>
  <td  valign="top">&nbsp;</td>
  <td><input type="submit" name="button" id="button" value="Save Changes" /></td>
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