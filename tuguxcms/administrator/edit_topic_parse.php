<?php 
///post form data
$id=$_POST['id'];
$title=$_POST['title'];
$content=$_POST['content'];
$admin=$_POST['admin'];
//save data in database
include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "UPDATE news SET title='$title', news='$content', admin='$admin' WHERE id='$id'") or die (mysqli_error($myConnection));
//sussecc message
echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your topic has been edited.<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
exit();
?>