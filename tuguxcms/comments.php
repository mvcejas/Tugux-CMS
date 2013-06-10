<?php 

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
	$comments .='
   <div style="background:#09F; color:#FFF; padding:5px; font-size:12px;">Posted by ' . $name . ' on ' . $date . '</div>
   <br/>
   ' . $comment . '
   <br/><br/>
   ';
 }
 mysqli_free_result($sql2);
} else {
	$comments='No comment added';
	}
}
//mysql_close($myClonnection);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
All the fields are required.
<form  action="latest.php?nid=<?php echo $nid; ?>" method="post" id="contactform" name="form" onsubmit="return validate_form();">
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
 </form>
</body>
</html>