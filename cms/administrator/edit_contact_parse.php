<?php 
// post form data firts
$email=$_POST['email'];
$adress=$_POST['adress'];
$mobile=$_POST['mobile'];
$telefone=$_POST['telefone'];
$city=$_POST['city'];
$country=$_POST['country'];
$aboutcompany=$_POST['aboutcompany'];
//now connect to my database 
include_once"../scripts/connect_to_mysql.php";
//make query to upsate data in database
$query = mysqli_query($myConnection, "UPDATE contact SET email='$email', adress='$adress', mobile='$mobile', telefone='$telefone', city='$city', country='$country', aboutcompany='$aboutcompany' WHERE id ='1'") or die (mysqli_error($myConnection));
// if evry thing goes right tha show success message
echo'<table align="center">
<tr><td>
<div style=" width:360px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your Contact information has been successfully edited.<br />
<a href="index.php">Go back</a>
</div>
</td></tr>
</table>';
?>