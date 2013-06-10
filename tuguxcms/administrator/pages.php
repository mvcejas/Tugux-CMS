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
//initialize variables first 
$pages="";
//connect to mysql
include_once"../scripts/connect_to_mysql.php";
$sql= "SELECT * FROM pages ORDER BY lastmodified DESC";
$query=mysqli_query($myConnection,$sql) or die (mysqli_error());
$userCount=mysqli_num_rows($query);
if ($userCount > 0){
	while($row = mysqli_fetch_array($query)){
		$id = $row["id"];
		$linklabel=$row["linklabel"];
		$pagetitle=$row["pagetitle"];
		$date=$row["lastmodified"];
		$pages .='
		<tr style="background-color:#D9D9D9 ;"> 
			<td align="center">
			 ' . $date . ' 
			</td>
			<td align="center">
			 ' . $linklabel . ' 
			</td>
			<td align="center">
			' . $pagetitle . '
			</td>
			
			<td align="center">
			' . $id . '
			</td>
		</tr>
		';
	}
}else{
	$pages = '<tr><td colspan="6" align="center"><h3>You have no mails in your Tugux Inbox..!!</h3></td></tr>';
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
    	<td width="147" align="center">
        	Date craeted
    	</td>
        <td width="113" align="center">
       	    Link Label
    	</td>
        <td width="257" align="center">
        	Pagetitle
    	</td>
       
         <td width="105" align="center">
        	ID
    	</td>
        
    </tr>
     <?php print "$pages"; ?>
    
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