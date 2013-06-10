<?php
session_start ();
$_SESSION = array();
//delete the session cookies
echo '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed. Loggedout successfully...<br />
<a href="index.php">Click Here to login again</a></div>';

exit();

?>