<?php 
///post form data
$topictitle=$_POST['topictitle'];
$topicbody=$_POST['topicbody'];
$admin=$_POST['admin'];

///////////////////////////////////////////////////////////////////////
include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "INSERT INTO news (title, news, admin) 
        VALUES('$topictitle','$topicbody','$admin')") or die (mysqli_error($myConnection));

echo '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.New topic has been created.<br />
<a href="index.php">Click Here to go back</a></div>';
exit();
?>
