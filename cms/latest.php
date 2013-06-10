<?php 

require_once "scripts/connect_to_mysql.php";
if (!$_GET['nid']){
  $nid='nid';
}else{
  $nid=ereg_replace("[^0-9]","",$_GET['nid']);
}


//------------------------------------------------
$sqlCommand = "SELECT modulebody FROM module WHERE showing='1' AND name='footer' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$footer = $row["modulebody"];
	}
mysqli_free_result($query);
//------------------------------------------------



$sqlCommand = "SELECT modulebody FROM module WHERE showing='1' AND name='custummodule' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$custom1 = $row["modulebody"];
	}
mysqli_free_result($query);

//------------------------------------------------
$sqlCommand = "SELECT modulebody FROM module WHERE showing='1' AND name='ads' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$ads = $row["modulebody"];
	}
mysqli_free_result($query);
//------------------------------------------------

//build menu and gather data
$sqlCommand = "SELECT id, linklabel FROM pages WHERE showing='1' ORDER BY pageorder ASC";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
$menuDisplay = '';
while($row = mysqli_fetch_array($query)){
	$pid = $row["id"];
	$linklabel = $row["linklabel"];

	$menuDisplay .= '<a href="page.php?pid=' . $pid . '">' . $linklabel . '</a> | ';

	}
mysqli_free_result($query);
//------------------------------------------------
//------------------------------------------------
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "admincontrolers/slides/news/image_01.jpg";
	$default_pic = "admincontrolers/slides/news/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\"  />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\" />"; // forces default picture to be 100px wide and no more
	}



//news
if (isset($_GET['nid'])){
	$nid=$_GET['nid'];
$sql=mysqli_query($myConnection,"SELECT id, title, date, admin, news FROM news WHERE id='$nid' LIMIT 1") or die (mysqli_error($myConnection));
$latestnews='';
while($row=mysqli_fetch_array($sql)){
	$nid=$row["id"];
	$date=$row["date"];
	$admin=$row["admin"];
	$title=$row["title"];
	$body=$row["news"];
	$latestnews ='
   <h1 style="font-weight:bold; color:#09F">' . $title . '</h1>
   ' . $body . '
   '
   ;
}
mysqli_free_result($sql);
//
$comments='';
$sql2 = mysqli_query($myConnection,"SELECT * FROM comments WHERE topic_id='$nid' ORDER BY date DESC") or die (mysqli_error($myConnection));
$commentCount = mysqli_num_rows($sql2);
if ($commentCount > 0){
while($row = mysqli_fetch_array($sql2)){
	$date=$row["date"];
	$name=$row["name"];
	$comment=$row["comment"];
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
   <br/>
   ';
 }
 mysqli_free_result($sql2);
} else {
	$comments='<br/>No comment added';
	}
}
//mysql_close($myClonnection);
?>

<?php

if (isset($_POST['submit1'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
    $comment=$_POST['comment'];
	$topic_id=$_POST['topic_id'];
	include_once"scripts/connect_to_mysql.php";
	$sql=mysqli_query($myConnection, "INSERT INTO comments (topic_id, name, email, comment) VALUES ('$topic_id','$name','$email','$comment')") or die (mysqli_error($myConnection));
	if($sql){
$sucessMsg='Your comment has been added.<br/>';
	header("location:latest.php?nid=$topic_id");
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-Uk" xmlns="http://www.w3.org/1999/xhtml" lang="en-Uk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<!--Style sheets starts-->
<link href="tugux_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
 <link href="js/facebox/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.png" type="image"/>
  <script src="js/facebox/lib/jquery.js" type="text/javascript"></script>
  <script src="js/facebox/src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'js/facebox/src/loading.gif',
        closeImage   : 'js/facebox/src/closelabel.png'
      })
    })
  </script>
<!---vallidate form-->
<script type="text/javascript">
 function validate_form(){
	 valid = true;
	 if (document.form.name.value == ""){
		     alert ("You have not filled the name.");
		     valid = false;
		 }else if (document.form.email.value == ""){
			 alert ("You have not filled the email.");
			 valid = false;
	     }else if  (document.form.comment.value == ""){
		     alert ("You have not entered the comment");
		     valid = false;
		 }return valid;
	 }
</script>

<!--Style sheets ends--> 
<script type="text/javascript">
var newwindow;
function poptastic(url)
{
	newwindow=window.open(url,'name','width=600');
	if (window.focus) {newwindow.focus()}
}
</script>
<script type="text/javascript">
var newwindow;
function poptastic2(url)
{
	newwindow=window.open(url,'name','height=320,width=340');
	if (window.focus) {newwindow.focus()}
}
</script>
<!--Style sheets ends--> 
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body background="images/bg.jpg" style="background-repeat:repeat-x; margin-top:0px;" onload="MM_preloadImages('icons/normals/001_50.png','icons/normals/001_54.png','images/readmore2.png','images/shortcut_website_hover.jpg','images/shortcut_graphics_hover.jpg','images/shortcut_contact_hover.jpg')" >
<!--Body wrapper starts-->
<div class=" body_wrapper">
<!--Header starts-->
<?php include_once"header_main.php"; ?>
<!--Header ends -->
<!--slider starts -->
<div id="slider-wrapper">
       
       
                <?php echo $pagepic; ?>
                
        
</div>

 

<!--slider ends -->

<!-- content starts-->
<div class="content">
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0" style="  margin-bottom:5px; color:#8C8C8C; font-size:10px">
<tr >
<td valign="top"><a href="javascript:poptastic('page_text.php?nid=<?php echo $nid; ?>');" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','images/printButton.png',1)"><img src="images/printButton.png" alt="print" name="Image15" width="14" height="14" border="0" id="Image15" /></a> <a href="all_news.php">View All News</a></td><td align="right">
<img   src="images/icon-date.gif" width="16" height="16" />Date Created:<?php echo $date; ?><br/><img  src="images/icon-user.gif" width="16" height="16" />Posted by:<?php echo $admin; ?>
</td></tr>
  </table>
  <?php echo $latestnews; ?>
  <br/>
  <br/><br/>
  <div style=" -moz-border-radius:5px;
  border-radius:5px; background:#09F; color:#FFF; padding:5px; font-size:16px; font-weight:bold; z-index: auto;">
 Total Comments added:<?php echo $commentCount; ?>
  </div>
  <?php echo $sucessMsg; ?>
  <a href="comments.php?nid=<?php echo $nid; ?>" rel="facebox"><input type="image" src="images/comment.png"  value="Add Comment" id="submit1" /></a>
<!--<form  action="latest.php?nid=<?php echo $nid; ?>" method="post" id="contactform" name="form" onsubmit="return validate_form();">
 Name:<br/>
 <input name="name" class="text" id="name" /><br/>
  Email:
  <br/>

 <input name="email" class="text" id="email" /><br/>
  Comment:
  <br/>

 <textarea name="comment" class="text" id="comment"></textarea>
 <br/>
 <input type="hidden" name="topic_id" id="topic_id" value="<?php echo $nid; ?>" />
<input type="submit" name="submit1"  value="Submit" id="submit1" />
 </form>-->
 <br/>
 <?php echo $comments; ?>
</div>
<!-- content ends-->

<!-- content menu starts-->
<?php include_once"admincontrolers/menu.php" ?>
<!-- content menu ends-->
<div class="footer"><?php echo $footer; ?>
<a href="#"></a></div>
</div>
<!--Body wrapper ends -->

</body>
</html>