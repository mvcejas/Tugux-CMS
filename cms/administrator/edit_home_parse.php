<?php 
//post form data///////////////////////////////////////
$textarea=$_POST['textarea'];
$admin=$_POST['admin'];
//connect database
include_once"../scripts/connect_to_mysql.php";

$query = mysqli_query( $myConnection, "UPDATE home SET pagebody='$textarea', admin='$admin' WHERE linklabel='Home' LIMIT 1") or die (mysqli_error($myConnection));

echo '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your page has been edited.<br />
<a href="index.php">Click Here to go back</a></div>';
exit();
?>