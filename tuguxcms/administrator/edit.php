<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 
if (isset($_GET['editid'])){
	$editid=$_GET['editid'];
	include_once "../scripts/connect_to_mysql.php";
$sqlCommand = "SELECT id, pagetitle, linklabel, pagebody FROM pages WHERE id='$editid' LIMIT 1"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error()); 
while ($row = mysqli_fetch_array($query)) {
	$id=$row["id"];
    $pagetitle = $row["pagetitle"];
	$linklabel = $row["linklabel"];
	$pagebody = $row["pagebody"];
	$pagebody = str_replace("<br />", "", $pagebody);
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "slides/$id/image_01.jpg";
	$default_pic = "slides/Default/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"500px\" />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"500px\" />"; // forces default picture to be 100px wide and no more
	}
} 

}
?>
<?php 
// You should put an if condition here to check that the posted $pid variable is present first thing, I did not do that
$pid = ereg_replace("[^0-9]", "", $_POST['pid']); // filter everything but numbers for security
// Query the body section for the proper page
include_once "../scripts/connect_to_mysql.php";
$sqlCommand = "SELECT id, pagetitle, linklabel, pagebody FROM pages WHERE id='$pid' LIMIT 1"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error()); 
while ($row = mysqli_fetch_array($query)) {
	$id=$row["id"];
    $pagetitle = $row["pagetitle"];
	$linklabel = $row["linklabel"];
	$pagebody = $row["pagebody"];
	$pagebody = str_replace("<br />", "", $pagebody);
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "slides/$id/image_01.jpg";
	$default_pic = "slides/Default/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"500px\" />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"500px\" />"; // forces default picture to be 100px wide and no more
	}
} 

mysqli_free_result($query); 
?>
<?php
// Parsing section for the member picture... only runs if they attempt to upload or replace a picture
if ($_POST['upid'] == "$id"){

        if (!$_FILES['image']['tmp_name']) { 
		
            $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Please select an image to upload<br />
</div>';
			
        } else {

            $maxfilesize = 409600; // 409600 bytes equals 400kb
            if($_FILES['image']['size'] > $maxfilesize ) { 

                        $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Image is too big....!!<br />
';
                        unlink($_FILES['image']['tmp_name']); 

            } else if (!preg_match("/\.(gif|jpg|png)$/i", $_FILES['image']['name'] ) ) {

                        $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Unaccepted image format.<br />
</div>';
                        unlink($_FILES['image']['tmp_name']); 

            } else { 

                        $newname = "image_01.jpg";
                        $place_file = move_uploaded_file( $_FILES['image']['tmp_name'], "slides/$id/".$newname);
                        $success_msg = '<div style="float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/yes.png" style="float:left" width="20" height="20" />
Operation completed.Your image has been uploded.<br />
</div>';
            }

        } // close else that checks file exists

} // close the condition that checks the posted "parse_var" value for image upload or replace
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit an existing page</title>
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

<!--validate form-->
<script type="text/javascript">
 function validate_form(){
	 valid=true;
	 if (document.form.pagetitle.value == ""){
		     alert ("You have not filled the page title.");
		     valid=false;
		 }else if (document.form.linklabel.value == ""){
			 alert ("You have not filled the linklabel.");
			 valid=false;
	     }else if (document.form.pagebody.value == ""){
		     alert ("You have not entered the Page content");
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
<table width="711" height="329" align="center">
<form action="edit_page_parse.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form();"> 
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
    <input type="text" name="linklabel" id="linklabel" size="86" width="500px" value="<?php echo $linklabel; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Page Content:</td>
  <td><label>
    <textarea name="pagebody" id="textarea" cols="72" rows="15" ><?php echo $pagebody; ?></textarea>
  </label></td>
</tr>
<tr>
  
  
<tr>
  <td  valign="top">&nbsp;</td>
  <td>
    <input type="hidden" name="admin" id="admin" size="86" value="<?php echo $_SESSION["admin"]; ?>" />
  <input name="pid" type="hidden" value="<?php echo $pid; ?>" />    
  <input type="submit" name="button" id="button" value="Save Changes" /></td>
</tr>
</form>
</table>
<table width="716" border="0" align="center" cellpadding="3" cellspacing="0" style="margin:30px">
<form action="edit.php?editid=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
<tr>
  <td valign="top">Upload image:</td>
  <td valign="top"><input type="file" name="image" size="70" width="500" id="image" /></td>
</tr>
<tr>
  <td>
    
  </td>
</tr>
<tr><td rowspan="2">&nbsp;</td>
  <td><input name="upid" type="hidden" value="<?php echo $id; ?>" /><input type="submit" value="Upload image" /></td>
</tr>
<tr>
  <td><?php print "$error_msg"; ?><?php print "$success_msg"; ?></td>
</tr>
</form>
</table>
<table width="723" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php echo $pagepic; ?></td>
  </tr>
  </table>
<p>&nbsp;</p>
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