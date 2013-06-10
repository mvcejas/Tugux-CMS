<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
$confirm='';
if (isset($_GET['deleteid']) && (isset($_GET['deletename']))){
		$confirm='<div style=" padding:10px; height:60px;  width:300px; background-color: #ACCBFD; margin-bottom:20px;"><img src="images/65.png" style="float:left;" width="64 " height="64" alt="info" />Do you really want to delete the user with username of <b>' . $_GET['deletename'] . '</b>? <br/>
		<a href="users_list.php?yesdelete= ' . $_GET['deleteid'] . '">Yes</a> or <a href="users_list.php">No</a></div>';

}
		
if (isset($_GET['yesdelete'])){
	
		$id_to_delete= $_GET['yesdelete'];
		include_once "../scripts/connect_to_mysql.php";
		$query=mysqli_query($myConnection, "DELETE FROM admin WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error($myConnection));
		
	}
?>
<?php 
//initialize variables first 
$users_lists="";
//connect to mysql
include_once"../scripts/connect_to_mysql.php";
$sql= "SELECT * FROM admin WHERE account_type='b'";
$query=mysqli_query($myConnection,$sql) or die (mysqli_error());
$userCount=mysqli_num_rows($query);
if ($userCount > 0){
	while($row = mysqli_fetch_array($query)){
		$id = $row["id"];
		$username=$row["username"];
		$log_date=$row["last_log_date"];
		$users_lists .='
		<tr> 
			<td align="center">
			 ' . $log_date . ' 
			</td>
			<td align="center">
			 ' . $username . ' 
			</td>
			<td align="center">
			<a href="users_list.php?editid=' . $id . '"><input type="image" src="images/edit.png" width="20" height="20" /></a>
			</td>
			<td align="center">
			<a href="users_list.php?deleteid=' . $id . '&deletename=' . $username . '"><input type="image" src="images/no.png" width="20" height="20" /></a>
			</td>
		</tr>
		';
	}
}else{
	$users_lists = '<tr><td colspan="4" align="center">You have no users listed in your tugux admin yet</td></tr>';
	}

?>
<?php 
$error="";
$edit="";
if (isset($_GET['editid'])){
	$target_id=$_GET['editid'];
	include_once"../scripts/connect_to_mysql.php";
	$query=mysqli_query($myConnection, "SELECT * FROM admin WHERE id='$target_id' LIMIT 1")or die (mysqli_error($myConnection));
	$editCount=mysqli_num_rows($query);
	if ($editCount > 0){
		while ($row=mysqli_fetch_array($query)){
			$username=$row["username"];
			$id=$row["id"];
			$password=$row["password"];
		//	$pass=md5[]
			$edit=' <table  align="center" style="background-color: #ACCBFD; padding:10px;">
<form id="form" name="form" method="post" action="users_list.php" > 
<tr>
<td >&nbsp;</td>
<td ><font color="#FF0000"></font></td>
</tr>
<tr>
  <td align="right" >Username:</div></td>
  <td ><input type="text" name="username" id="username" size="50"  value="' . $username . '" /></td>
</tr>
<tr>
  <td align="right" >Password:</td>
  <td><label>
  
    <input type="password" name="password" id="password" size="50" value="" />
  </label></td>
</tr>

<tr>
  <td  valign="top">&nbsp;</td>
  <td><label>
  <input type="hidden" name="id" id="id" size="50" value="' . $id . '" />
    <a href="users_list.php"><input type="submit" name="button" id="button" value="Save changes to this Account" /></a> or 
	<a href="users_list.php"><input type="button" value="Cancel"/></a>
  </label></td>
</tr>
</form>
</table>';
		}
		}else{
			$error='<div style=" padding:10px; color:red;   width:300px; background-color: #ACCBFD; margin-bottom:20px;">Sorry this user doesnot exits..!</div>';
			}
	}
?>
<?php 
$error_msg='';
if (!isset($_POST['password'])){
	$error_msg='You have not entered your password';
	}
if (isset($_POST['username'])) {
	$id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pass=md5($password);
	include_once "../scripts/connect_to_mysql.php";
    $sql=mysqli_query($myConnection, "UPDATE admin SET username='$username', password='$pass' WHERE id='$id' ")or die(mysqli_error($myConnection));

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugux Studios Administration Panel</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
a {
	text-decoration:none;
	color:#2365E0;
	font-size:11px;
	font-family:Arial, Helvetica, sans-serif;
	}
a:hover {
	text-decoration:none;
	color:#1392CE;
	font-size:11px;
	font-family:Arial, Helvetica, sans-serif;
	}
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<!--java drop down menu -->

<!--java drop down menu -->
</head>

<body style="margin:0px;">
<?php include_once"header.php"; ?>
<!--Body wrapper starts-->
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content">
<table width="300px;" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    	<td align="center">
		 
		</td>
	</tr>
	<tr>
    	<td align="center">
		<?php print "$confirm"; ?> <?php print "$edit"; ?> <?php print "$error"; ?>
		</td>
	</tr>
</table>
<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px; color:#333;">
    	<td width="283" align="center">
        	Last Login/created date
    	</td>
        <td width="204" align="center">
        	Name
    	</td>
        <td width="169" align="center">
        	View/Edit
    	</td>
         <td width="144" align="center">
        	Delete
    	</td>
    </tr>
     <?php print "$users_lists"; ?>
    
</table>

</div>

<!-- content ends-->
<!-- content menu ends-->
<div class="footer">Powered by Tugux Studios</div>
</div>
<!--Body wrapper ends -->


</div>
<!--Body wrapper ends-->
</body>
</html>