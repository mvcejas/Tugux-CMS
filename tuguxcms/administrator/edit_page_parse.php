<?php 
///post form data

$pid=$_POST['pid'];
$pagetitle=$_POST['pagetitle'];
$linklabel=$_POST['linklabel'];
$pagebody=$_POST['pagebody'];
$admin=$_POST['admin'];
//save data in database
include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "UPDATE pages SET pagetitle='$pagetitle', linklabel='$linklabel', pagebody='$pagebody', admin='$admin' WHERE id='$pid'") or die (mysqli_error($myConnection));

echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your page has been edited.<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
exit();
?>
