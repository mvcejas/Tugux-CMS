<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 
if (isset($_POST['submit'])){

	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)

	if (!$_FILES['file']['tmp_name']){
		 $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Please select an image to upload<br />
</div>';
		}else {
			
            if (!preg_match("/\.(jpg|png|gif)$/i", $_FILES['file']['name'] ) ) {

                        $error_msg = '<div style=" float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/no.png" style="float:left" width="20" height="20" />
Operation uncompleted.Unaccepted image format.<br />
</div>';
                        unlink($_FILES['file']['tmp_name']); 

            } else { 

                        $newname ="image_01.jpg";
                        $place_file = move_uploaded_file( $_FILES['file']['tmp_name'], "slides/news/".$newname);
                        $success_msg = '<div style="float:left; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/yes.png" style="float:left" width="20" height="20" />
Operation completed.Your image has been uplaoded.<br />
</div>';
	header("location:upload_news_image.php");
            }

        } // close else that checks file exists

} // close the condition
///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "slides/news/image_01.jpg";
	$default_pic = "slides/Default/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"600px\" style=\" margin-left:25px; margin-top:30px\"  />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"600px\" style=\" margin-left:25px; margin-top:30px\" />"; // forces default picture to be 100px wide and no more
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload File-tugux studios</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/tooltip/script.js"></script>
<link rel="stylesheet" type="text/css" href="../js/tooltip/style.css" />
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
  <table width="711" height="86" align="center">
  <form method="post" name="form" id="form" enctype="multipart/form-data" action="upload_news_image.php" > 

<tr>
<td width="139" height="23" ><div >Upload new image:</div>

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
  <td height="26" >&nbsp;</td>
  <td height="26" ><input type="submit" name="submit" id="submit" value=" Upload File " /></td>
</tr>
</form>
</table>
<?php echo $pagepic; ?>
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