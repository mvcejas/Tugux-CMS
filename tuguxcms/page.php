<?php 
session_start();
require_once "scripts/connect_to_mysql.php";
if (!$_GET['pid']){
  $pageid='pid';
}else{
  $pageid=ereg_replace("[^0-9]","",$_GET['pid']);
}

//------------------------------------------------
$sqlCommand = "SELECT modulebody FROM module WHERE showing='1' AND name='footer' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$footer = $row["modulebody"];
	}
mysqli_free_result($query);
//------------------------------------------------

//------------------------------------------------
$sqlCommand="SELECT lastmodified FROM pages WHERE id='$pageid' LIMIT 1";
$query=mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row=mysqli_fetch_array($query)) {
      $date = $row["lastmodified"];
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
$sqlCommand = "SELECT pagebody, pagetitle FROM pages WHERE showing='1' AND id='$pageid' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$body = $row["pagebody"];
	$pagetitle = $row["pagetitle"];
	}
mysqli_free_result($query);
//------------------------------------------------
$sqlCommand = "SELECT admin FROM pages WHERE showing='1' AND id='$pageid' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while($row = mysqli_fetch_array($query)){
	$admin = $row["admin"];
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
$sqlCommand = "SELECT linklabel FROM pages WHERE id='$pageid' LIMIT 1"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error()); 
while ($row = mysqli_fetch_array($query)) { 

	$linklabel = $row["linklabel"];
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "administrator/slides/$pageid/image_01.jpg";
	$default_pic = "administrator/slides/Default/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\"  />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\" />"; // forces default picture to be 100px wide and no more
	}
} 

mysqli_free_result($query); 
//mysql_close($myClonnection);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-Uk" xmlns="http://www.w3.org/1999/xhtml" lang="en-Uk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $pagetitle; ?></title>
<!--Style sheets starts-->
<link href="tugux_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
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

<body style="background-repeat:repeat-x; margin-top:0px;" onload="MM_preloadImages('icons/normals/001_50.png','icons/normals/001_54.png','images/readmore2.png','images/shortcut_website_hover.jpg','images/shortcut_graphics_hover.jpg','images/shortcut_contact_hover.jpg')" >
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
<td valign="top"><a href="javascript:poptastic('page_text.php?pid=<?php echo $pageid; ?>');" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','images/printButton.png',1)"><img src="images/printButton.png" alt="print" name="Image15" width="14" height="14" border="0" id="Image15" /></a></td><td align="right">
<img   src="images/icon-date.gif" width="16" height="16" />Date Created:<?php echo $date; ?><br/><img  src="images/icon-user.gif" width="16" height="16" />Posted by:<?php echo $admin; ?>
</td></tr>
  </table>
  <?php echo $body; ?>
  
 
</div>
<!-- content ends-->

<!-- content menu starts-->
<!-- content menu ends-->
<div class="footer"><?php echo $footer; ?>
<a href="#"></a></div>
</div>
<!--Body wrapper ends -->

</body>
</html>