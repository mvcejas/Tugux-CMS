<?php 
///post form data
$pagetitle=$_POST['pagetitle'];
$linklabel=$_POST['linklabel'];
$pagebody=$_POST['pagebody'];
$admin=$_POST['admin'];

///////////////////////////////////////////////////////////////////////
include_once "../scripts/connect_to_mysql.php";
$query = mysqli_query($myConnection, "INSERT INTO pages (pagetitle, linklabel, pagebody, admin) 
        VALUES('$pagetitle','$linklabel','$pagebody','$admin')") or die (mysqli_error($myConnection));
 $sql=mysqli_query($myConnection, "SELECT id FROM pages WHERE linklabel='$linklabel'")or die (mysqli_error($myConnection));
	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)
  while($row = mysqli_fetch_array($sql)){
	  $id=$row["id"];
  mkdir("slides/$id", 0755);
 }

echo '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.New page has been created.<br />
<a href="index.php">Click Here to go back</a></div>';
exit();
?>
