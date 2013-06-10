<?php 
///post form data
$id=$_POST['pid'];
 
 $pic1 = ("slides/$id/image_01.jpg");
	 if (file_exists($pic1)) {
		    unlink($pic1);
    }
 $dir = "slides/$id";
    rmdir($dir);

include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "DELETE FROM pages WHERE id='$id' ") or die (mysqli_error($myConnection));
echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your page has been DELETED.<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
exit();
?>
