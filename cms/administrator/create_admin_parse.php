<?php 
//post form data
$username=$_POST['username'];
$pass1=$_POST['pass1'];
$type=$_POST['type'];
$db_password=md5($pass1);
//conect to mysql
include_once "../scripts/connect_to_mysql.php";
$mysql_query=mysqli_query($myConnection, "INSERT INTO admin (username, password, account_type) VALUES ('$username', '$db_password', '$type')")or die (mysqli_error($myConnection));
echo '<table align="center"><tr> <td><div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.New admin has been created.<br />
<a href="index.php">Click Here to go back</a></div></td></tr></table>';
?>