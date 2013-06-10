<?php 
session_start();
require_once "scripts/connect_to_mysql.php";
session_start();
require_once "scripts/connect_to_mysql.php";


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
	$check_pic = "administrator/slides/news/image_01.jpg";
	$default_pic = "administrator/slides/news/image_01.jpg";
	if (file_exists($check_pic)) {
    $pagepic = "<img src=\"$check_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\"  />"; // forces picture to be 100px wide and no more
	} else {
	$pagepic= "<img src=\"$default_pic\" width=\"950px\" style=\" margin-left:25px; margin-top:30px\" />"; // forces default picture to be 100px wide and no more
	}



//news

$sql=mysqli_query($myConnection,"SELECT id, title, date, admin, news FROM news ORDER BY date DESC") or die (mysqli_error($myConnection));
$all_news='';
$chracters=255;
while($row=mysqli_fetch_array($sql)){
	$nid=$row["id"];
	$date=$row["date"];
	$admin=$row["admin"];
	$title=$row["title"];
	$body=$row["news"];
	$new_body = substr($body,0,$chracters);
		$readmore='<a href="latest.php?nid= ' . $nid . '">Readmore</a>';

	$all_news .='
   <font style="font-weight:bold; font-size:21px; color:#09F;">' . $title . '</font>
    <div style="  margin-bottom:5px; color:#8C8C8C; font-size:10px">
  Date published:' . $date . ', Posted by: ' . $admin . ' 
  </div>
   ' . $new_body . '
   <div align="right">' . $readmore . '</div>
   <hr/>';
}
mysqli_free_result($sql);

//mysql_close($myClonnection);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-Uk" xmlns="http://www.w3.org/1999/xhtml" lang="en-Uk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugux Studios-The best webdesign/design studios</title>
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
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
<td valign="top">&nbsp;</td><td align="right">&nbsp;</td></tr>
  </table>
  <h1 style="">News Section</h1>
  <?php echo $all_news; ?>

 
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