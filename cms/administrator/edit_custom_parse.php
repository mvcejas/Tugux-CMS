<?php 
// edit footer parse
$custom1=$_POST['custom1'];
//connect to my data base first
include_once "../scripts/connect_to_mysql.php";
// update footer data in database for footer
$query = mysqli_query($myConnection,"UPDATE module SET modulebody='$custom1' WHERE name='custummodule'") or die (mysqli_error($myConnection));
echo '<table align="center">
<tr><td>
<div style=" width:360px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your Custom module has been edited.<br/>
<a href="index.php">Go back</a>
<br />
</div>
</td></tr>
</table>';

?>


