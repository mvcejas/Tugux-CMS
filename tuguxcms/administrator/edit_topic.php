<?php 

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: admin_check.php"); 
    exit();
}
?>
<?php 
$title='';
$content='';
if (isset($_GET['eid'])){
	$eid=$_GET['eid'];
	include_once"../scripts/connect_to_mysql.php";
	$sql=mysqli_query($myConnection, "SELECT id, title, news FROM news WHERE id='$eid' ") or die (mysqli_error($myConnection));
	while($row = mysqli_fetch_array($sql)){
		$id =$row['id'];
		$title =$row['title'];
		$content =$row['news'];
		}
}
//commenst system
$comments='';
$sql2 = mysqli_query($myConnection,"SELECT * FROM comments WHERE topic_id='$eid' ORDER BY date DESC") or die (mysqli_error($myConnection));
$commentCount = mysqli_num_rows($sql2);
if ($commentCount > 0){
while($row = mysqli_fetch_array($sql2)){
	$cid=$row["id"];
	$date=$row["date"];
	$name=$row["name"];
	$comment=$row["comment"];
	$topic_id=$row["topic_id"];
	$comments .='<br/>
   <div style="  -webkit-border-radius:5px;
  -moz-border-radius:3px;
  border-radius:3px;
   background: #f2f2f2; color:#4d4d4d; padding:10px; border:1px solid #dedede; font-size:12px;"><b><u>' . $name . '</u></b> commented on ' . $date . '</div>
   <div style="  -webkit-border-radius:5px; border:3px solid rgba(0,0,0,0); border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px; padding:5px;  font-size:12px;">
   ' . $comment . '
   </div>
  
   <div align="right"> 
   <form method="post" action="delete_comment.php">
   <input type="hidden" value="' . $topic_id . ' " name="topic_id"/>
   <input type="hidden" value="' . $cid . ' " name="did" />
   <input type="submit" name="delete" value="Delete" />
   </form>
   </div>
   <br/>
   ';
 }
 mysqli_free_result($sql2);
} else {
	$comments='<br/>No comment added';
	}

//mysql_close($myClonnection);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create a new page</title>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/tooltip/script.js"></script>
<link rel="stylesheet" type="text/css" href="../js/tooltip/style.css" />
<link href="../js/facebox/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="../js/facebox/lib/jquery.js" type="text/javascript"></script>
  <script src="../js/facebox/src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../js/facebox/src/loading.gif',
        closeImage   : '../js/facebox/src/closelabel.png'
      })
    })
  </script>
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
		
			WYSIWYG.attach('content'); // default setup // full featured setup
		
			
			// Use it to display an iframes instead of a textareas
			//WYSIWYG.display('all', full);  
		</script>

<!--validate form-->
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

<!--validate form-->

<script type="text/javascript">
 function validate_form(){
	 valid = true;
	 if (document.form.topictitle.value == ""){
		     alert ("You have not filled the page title.");
		     valid = false;
		 }else if  (document.form.topicbody.value == ""){
		     alert ("You have not entered the Page content");
		     valid = false;
		 }return valid;
	 }
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
<?php include_once"news_menu.php"; ?>
<div style=" background-color: #E1E1E1">
<table width="711"  align="center">
<form id="form" name="form" method="post" action="edit_topic_parse.php" onsubmit="return validate_form();"> 
<tr>
  <td ><div  style="width:100px">Topic Title:</div>
    
  </td>
  <td ><label>
    <input type="text" name="title" id="title" size="86" width="500px" value="<?php echo $title; ?>" />
  </label></td>
</tr>
<tr>
  <td  valign="top">Topic Content:</td>
  <td><label>
    <textarea name="content" id="content" style="width:80%;height:200px;"  ><?php echo $content; ?></textarea>
  </label></td>
</tr>
<tr>
  <td  valign="top">&nbsp;</td>
  <td><label>
  <input type="hidden" name="id" id="id" size="86" value="<?php echo $id; ?>" />
  <input type="hidden" name="admin" id="admin" size="86" value="<?php echo $_SESSION["admin"]; ?>" />
    <input type="submit" name="button" id="button" value="Save Topic" /> 
    
  </label></td>

</tr>
</form>
</table>
</div>
<h1 style="color:#09F">All the Comments Added for this post.</h1>
<?php echo $confirm; ?><?php echo $comments ?>

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