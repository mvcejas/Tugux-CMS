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
if (isset($_GET['deleteid'])){
		$confirm='<div style=" padding:10px; height:60px;  width:300px; background-color: #ACCBFD; margin-bottom:20px;"><img src="images/65.png" style="float:left;" width="64 " height="64" alt="info" />Do you really want to delete this Email? <br/>
		<a href="inbox.php?yesdelete= ' . $_GET['deleteid'] . '"><input type="image" src="images/yes.png" width="20" height="20" /></a> or <a href="inbox.php"><input type="image" src="images/no.png" width="20" height="20" /></a></div>';

}
		
if (isset($_GET['yesdelete'])){
	
		$id_to_delete= $_GET['yesdelete'];
		include_once "../scripts/connect_to_mysql.php";
		$query=mysqli_query($myConnection, "DELETE FROM email WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error($myConnection));
		
	}
?>
<?php 
$error='';
$read='';
if(isset($_GET['readid'])){
		$read_id=$_GET['readid'];
		include_once"../scripts/connect_to_mysql.php";
		$sql=mysqli_query($myConnection, "Select * FROM email WHERE id='$read_id' LIMIT 1") or die(mysqli_error($myConnection));
		$readcount=mysqli_num_rows($sql);
		if ($readcount > 0){
			while($row=mysqli_fetch_array($sql)){
		$id = $row["id"];
		$name=$row["name"];
		$email=$row["email"];
		$company=$row["company"];
		$subject=$row["subject"];
		$message=$row["message"];
		$name=$row["name"];
		$date=$row["date"];
			$read='<table  align="center" style="background-color: #ACCBFD; padding:10px;">
<form id="form" name="form" method="post" action="users_list.php" > 
<tr>
<td >&nbsp;</td>
<td ><font color="#FF0000"></font></td>
</tr>
<tr>
  <td align="right" >Firstname:</td>
  <td ><input type="text" name="username" readonly="readonly" id="username" size="50"  value="' . $name . '" /></td>
</tr>
<tr>
  <td align="right" >Email:</td>
  <td><label>
  
    <input type="text" name="email" readonly="readonly" id="email" size="50" value="' . $email . '" />
  </label></td>
</tr>
<tr>
  <td align="right" >Company</td>
  <td><input type="text" name="compnay" readonly="readonly" id="company" size="50"  value="' . $company . '" /></td>
</tr>
<tr>
  <td align="right" >Subject</td>
  <td><input type="text" name="subject" readonly="readonly" id="subject" size="50"  value="' . $subject . '" /></td>
</tr>
<tr>
  <td align="right" valign="top" >Message</td>
  <td><label>
    <textarea name="textarea" id="textarea" readonly="readonly" cols="47" rows="5">' . $message . '</textarea>
  </label></td>
</tr>

<tr>
  <td  valign="top">&nbsp;</td>
  <td>
  	<a href="create_email.php?replyid=' . $id . '"><input type="submit" name="button" id="button" value="Reply" /></a> or 
	<a href="inbox.php"><input type="button" value="Close"/></a>
  </td>
</tr>
</form>
</table>';}
			}else{
				$error='<div style=" padding:10px; color:red;   width:300px; background-color: #ACCBFD; margin-bottom:20px;">Sorry this user doesnot exits..!</div>';
				}
}
?>
<?php 
//initialize variables first 
$mails="";
//connect to mysql
include_once"../scripts/connect_to_mysql.php";
$sql= "SELECT * FROM email ORDER BY date DESC";
$query=mysqli_query($myConnection,$sql) or die (mysqli_error());
$userCount=mysqli_num_rows($query);
if ($userCount > 0){
	while($row = mysqli_fetch_array($query)){
		$id = $row["id"];
		$name=$row["name"];
		$email=$row["email"];
		$company=$row["company"];
		$subject=$row["subject"];
		$message=$row["message"];
		$name=$row["name"];
		$date=$row["date"];
		$mails .='
		<tr style="background-color:#D8D8D8;"> 
			<td align="center">
			 ' . $date . ' 
			</td>
			<td align="center">
			 ' . $name . ' 
			</td>
			<td align="center">
			' . $subject . '
			</td>
			<td align="center">
			' . $email . '
			</td>
			<td align="center">
			<a href="inbox.php?readid=' . $id . '">Read</a>
			</td>
			<td align="center">
			<a href="inbox.php?deleteid=' . $id . '"><input type="image" src="images/no.png" width="20" height="20" /></a>
			</td>
		</tr>
		';
	}
}else{
	$mails = '<tr><td colspan="6" align="center"><h3>You have no mails in your Tugux Inbox..!!</h3></td></tr>';
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugux Studios Administration Panel</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/tooltip/script.js"></script>
<link rel="stylesheet" type="text/css" href="../js/tooltip/style.css" />
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

</head>

<body style="margin:0px;">

<?php include_once"header.php"; ?>
<!--Body wrapper starts-->
<div class=" body_wrapper">
<!--Header starts-->

<!--Header ends -->
<!-- content starts-->
<div class="content">
<?php include_once"email_menu.php"; ?>
<table width="300px;" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    	<td align="center">
		 
		</td>
	</tr>
	<tr>
    	<td align="center">
		<?php print "$confirm"; ?> <?php print "$read"; ?> <?php print "$error"; ?>
		</td>
	</tr>
</table>
<table width="940"  border="0" align="center" cellpadding="0" cellspacing="3" >
	<tr style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px; background-color: #177CF9; color:#ffffff;">
    	<td width="147" align="center">
        	Date
    	</td>
        <td width="113" align="center">
       	    Name
    	</td>
        <td width="257" align="center">
        	Subject
    	</td>
         <td width="205" align="center">
        	Sender's Email
    	</td>
         <td width="105" align="center">
        	Read
    	</td>
         <td width="92" align="center">
        	Delete
    	</td>
    </tr>
     <?php print "$mails"; ?>
    
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