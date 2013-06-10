<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 
if (isset($_POST['upload'])){
	$v=$_POST['ver'];
	include_once"../scripts/connect_to_mysql.php";
	$myCommand=mysqli_query($myConnection, "INSERT INTO version (tug) VALUES ($v)") or die (mysqli_error($myConnection));
	mkdir("uploads/$version", 0755);
	
	if (!$_FILES['file']['tmp_name']){
		 $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Please select an image to upload<br />
</div>';
		}else {
			
            $maxfilesize = 409600; // 409600 bytes equals 400kb
            if($_FILES['file']['size'] > $maxfilesize ) { 

                        $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Image is too big....!!<br />
';
                        unlink($_FILES['file']['tmp_name']); 

            } else if (!preg_match("/\.(zip|rar|tar)$/i", $_FILES['file']['name'] ) ) {

                        $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Unaccepted image format.<br />
</div>';
                        unlink($_FILES['file']['tmp_name']); 

            } else { 

                        $newname ="tugux_cms.zip";
                        $place_file = move_uploaded_file( $_FILES['file']['tmp_name'], "uploads/$version/".$newname);
                        $success_msg = '<div style="float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/yes.png" style="float:left" width="20" height="20" />
Operation completed.Your image has been uploded.<br />
</div>';
            }

        } // close else that checks file exists

} // close the condition
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

</head>

<body style="margin:0px">
<?php include_once"header.php"; ?>
<!--Body wrapper starts-->
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content">

Be sure to fill in all fields, they are all required.<br>
<table width="711" height="146" align="center">
<tr>
<td width="139" height="23" ><div >Version:</div>
<form method="post" enctype="multipart/form-data" action="upload_file.php" > 
</td>
<td width="560" >
  <label>
    <input type="text" name="ver" id="ver" value=""/>
  </label>
</td>
</tr>

<tr>
<td width="139" height="23" ><div >Upload new version:</div>

</td>
<td width="560" ><label>
  <input type="file" name="file" id="file" size="80" width="450px"  />
</label><br/></td>
</tr>
<tr>
  <td width="139" height="24" >&nbsp;</td>
  <td ><?php print "$error_msg"; ?><?php print "$success_msg"; ?></td>
</tr>
<tr>
  <td height="38" >&nbsp;</td>
  <td height="38" ><input type="submit" name="upload" id="upload" value=" Upload File " /></td>
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