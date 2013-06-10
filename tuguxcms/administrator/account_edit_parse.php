<?php 
///post form data

$uid=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['pass1'];
$pass=md5($password);
//save data in database
include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "UPDATE admin SET username='$username', password='$pass' WHERE id='$uid'") or die (mysqli_error($myConnection));

echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your acount has been edited.<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
exit();
?>
