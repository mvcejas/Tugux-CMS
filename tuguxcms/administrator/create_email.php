<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}

?>
<?php 
$error="";
$resendemail="";
$resendmsg="";
if (isset($_GET['resendid'])){
	$id=$_GET['resendid'];
	include_once"../scripts/connect_to_mysql.php";
	$mysql=mysqli_query($myConnection, "SELECT * FROM sent_emails WHERE id='$id' LIMIT 1") or die (mysqli_error($myConnection));
	$my_count=mysqli_num_rows($mysql);
	if ($my_count > 0){
		while ($row = mysqli_fetch_array($mysql)){
		$id=$row["id"];
		$email=$row["sent_to"];
		$message=$row["message"];
		$subject=$row["subject"];
		$resendemail .='' . $email .'';
		$resendmsg .='
		' . $message . '
		
		';}
	}
	
}
?>
<?php 
$error="";
$replyemail="";
$replymsg="";
if (isset($_GET['replyid'])){
	$id=$_GET['replyid'];
	include_once"../scripts/connect_to_mysql.php";
	$mysql=mysqli_query($myConnection, "SELECT * FROM email WHERE id='$id' LIMIT 1") or die (mysqli_error($myConnection));
	$my_count=mysqli_num_rows($mysql);
	if ($my_count > 0){
		while ($row = mysqli_fetch_array($mysql)){
		$id=$row["id"];
		$email=$row["email"];
		$name=$row["name"];
		$company=$row["company"];
		$message=$row["message"];
		$subject=$row["subject"];
		$replyemail .='' . $email .'';
		$replymsg .='
		Hi,<br/> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mr/Mrs <b>"' . $name . '"</b>
		<br/>
		<br/>
		<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanks,<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION["admin"] . '<br/>
		<img src="../images/logo.png" /><br/>
		<strong>Office</strong>:info@tugux.com<br/>
		<strong>Personal</strong>:yousaf@tugux.com<br/><br/>
		*******************Original Message*********************
		<br/>
		<b>First name:</b>' . $name . '<br/>
		<b>company:</b>' . $company . '<br/>
		<b>email:</b>' . $email . '<br/>
		<b>Subject:</b>' . $subject . '<br/>
		<b>Message:</b>' . $message .' <br/>
		********************************************************
		';}
	}
	
}
?>
<?php
$error_send='';
$sent='';
if (isset($_POST['send_btn'])){
	$webmaster=$_POST['webmaster'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$email=$_POST['email'];
	if ($webmaster && $subject && $message && $email){
		if (strstr($webmaster, "@") && strstr ($webmaster, ".")){
			$header="From: Tugux Studios <$webmaster>";
			mail($email, $subject, $message, $header);
			$sent='Your email has been sent';
			
		}
	}else{
		$error_send='You didnot enter the entire form';
	}
}

?>
<?php 
if (isset($_POST['send_btn'])){
	$webmaster=$_POST['webmaster'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$email=$_POST['email'];
	include_once"../scripts/connect_to_mysql.php";
	$mysql=mysqli_query($myConnection, "INSERT INTO sent_emails (webmaster, subject, message, sent_to) VALUES			    ('$webmaster','$subject','$message','$email')") or die (mysqli_error($myConnection));
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
<!--include editor-->
	<!-- 
			Include the WYSIWYG javascript files
		-->
		<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<!-- 
			Attach the editor on the textareas
		-->
		<script type="text/javascript">
			// Use it to attach the editor to all textareas with full featured setup
			//WYSIWYG.attach('all', full);
			
			// Use it to attach the editor directly to a defined textarea
		
			WYSIWYG.attach('message'); // default setup // full featured setup
		
			
			// Use it to display an iframes instead of a textareas
			//WYSIWYG.display('all', full);  
		</script>

<!--validate form-->
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
<div style=" background-color: #E1E1E1">
<table width="300px;" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    	<td align="center">
		 
		</td>
	</tr>
	<tr>
    	<td align="center">
		<?php print "$confirm"; ?> <?php print "$read"; ?> <?php print "$error"; ?><?php print "$error_send"; ?><?php print "$sent"; ?>
		</td>
	</tr>
</table>
<table border="0"  align="center" style=" padding:10px;">
<form id="form" name="form" method="post" action="create_email.php?replyid=<?php print '' . $_GET['replyid'] . ''; ?>" > 
<tr>
<td align="right" >Admin email</td>
<td ><font color="#FF0000">
  <input type="text" name="webmaster"  id="webmaster" size="86" />
</font></td>
</tr>

<tr>
  <td align="right" >Recipient email:</td>
  <td><label>
  
    <input type="text" name="email"  id="email" size="86" value="<?php print "$replyemail"; ?><?php print "$resendemail"; ?>" />
  </label></td>
</tr>
<tr>
  <td align="right" >Subject</td>
  <td><input type="text" name="subject"  id="subject" size="86"  value="" /></td>
</tr>
<tr>
  <td align="right" valign="top" >Message</td>
  <td><label>
    <textarea name="message" id="message"  cols="87" rows="5"><?php print "$replymsg"; ?><?php print "$resendmsg"; ?></textarea>
  </label></td>
</tr>

<tr>
  <td  valign="top">&nbsp;</td>
  <td>
  	<input type="submit" name="send_btn" id="send_btn" value="Send" />
  	 
	
  </td>
</tr>
</form>
</table>
</div>
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