<?php 

session_start();
require_once "scripts/connect_to_mysql.php";

if (!$_GET['pid']){
  $pageid='pid';
}else{
  $pageid=ereg_replace("[^0-9]","",$_GET['pid']);
}
//------------------------------------------------
$sqlCommand = "SELECT * FROM home WHERE showing='1' AND linklabel='Home' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$body = $row["pagebody"];
	$admin=$row["admin"];
	$date=$row["date"];
	}
mysqli_free_result($query);
//------------------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="tugux_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="slider.css" type="text/css" media="screen" />

</head>

<body>
<div class="content" style=" width:500px;"> 
<table width="490" border="0" align="center" cellpadding="0" cellspacing="0" style="  margin-bottom:5px; color:#8C8C8C; font-size:10px">
<tr >
<td valign="top"><a href="javascript:window.print()" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','images/printButton.png',1)"><img src="images/printButton.png" alt="print" name="Image15" width="14" height="14" border="0" id="Image15" /></a>

  </td><td align="right">
<img   src="images/icon-date.gif" width="16" height="16" />Date Created:<?php echo $date; ?><br/><img  src="images/icon-user.gif" width="16" height="16" />Posted by:<?php echo $admin; ?>
</td></tr>
  </table>
<?php echo $body; ?>
</div>
<!-- content ends-->



<!--Body wrapper ends -->
</body>
</html>