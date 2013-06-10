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
if (isset($_GET['did'])){
	$did=$_GET['did'];
	$confirm='<div align="center" style=" padding:10px; height:60px;  width:300px; background-color: #ACCBFD; margin-bottom:20px;"><img src="images/65.png" style="float:left;" width="64 " height="64" alt="info" />Do you really want to delete this News? <br/>
		<a href="topic_list.php?yesdelete= ' . $_GET['did'] . '"><input type="image" src="images/yes.png" width="20" height="20" /></a> or <a href="topic_list.php"><input type="image" src="images/no.png" width="20" height="20" /></a></div>';	
}
if (isset($_GET['yesdelete'])){
	
		$id_to_delete= $_GET['yesdelete'];
		include_once "../scripts/connect_to_mysql.php";
		$query=mysqli_query($myConnection, "DELETE FROM news WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error($myConnection));
		
	}
?>
<?php 
//initialize variables first 
$topics='';
//connect to mysql
include_once"../scripts/connect_to_mysql.php";
$sql= "SELECT * FROM news ORDER BY date DESC";
$query=mysqli_query($myConnection,$sql) or die (mysqli_error());
$userCount=mysqli_num_rows($query);
if ($userCount > 0){
	while( $row = mysqli_fetch_array($query)){
		$id = $row["id"];
		$title= $row["title"];
		$date= $row["date"];
		$topics .='
		<tr style="background-color:#D9D9D9 ;"> 
			<td align="center">
			 ' . $date . ' 
			</td>
			<td align="center">
			 ' . $title . ' 
			</td>
			<td align="center">
			<a href="topic_list.php?did=' . $id . '"><input type="image" src="images/no.png" width="20" height="20" /></a>
			</td>
			
			<td align="center">
			<a href="edit_topic.php?eid=' . $id . '"><input type="image" src="images/edit.png" width="20" height="20" /></a>
			</td>
		</tr>
		';
	}
}else{
	$topics = '<tr><td colspan="6" align="center"><h3>You have no post published in your Tugux News Management..!!</h3></td></tr>';
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
<?php include_once"news_menu.php"; ?>
<table width="300px;" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    	<td align="center">
		 
		</td>
	</tr>
	<tr>
    	<td align="center">
		<?php print "$confirm"; ?>
		</td>
	</tr>
</table>

<table width="300px;" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    	<td align="center" >
		 
		</td>
	</tr>
	<tr>
    	<td align="center">

		</td>
	</tr>
</table>
<table width="940"  border="0" align="center" cellpadding="0" cellspacing="3" >
	<tr style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px; background-color: #177CF9; color:#ffffff;">
    	<td width="218" height="16" align="center">
        	Date created
    	</td>
        <td width="450" align="center">
       	    Topic Title
    	</td>
        <td width="137" align="center">
        	Delete
    	</td>
       
         <td width="120" align="center">
        	Edit
    	</td>
        
    </tr>
     <?php print "$topics"; ?>
    
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