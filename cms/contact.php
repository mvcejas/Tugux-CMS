<?php 
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
// contact info
$sqlCommand = "SELECT mobile, telefone, aboutcompany, city, country, adress, email FROM contact WHERE showing='1' AND id='1'";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysql_error());
while ($row=mysqli_fetch_array($query)){
	$email=$row['email'];
	$mobile=$row['mobile'];
	$telefone=$row['telefone'];
	$country=$row['country'];
	$city=$row['city'];
	$adress=$row['adress'];
	$aboutcompany=$row['aboutcompany'];
	}
	mysqli_free_result($query);
//mysql_close($myConnection);
?>
<?php 
$sucess='';
if (isset($_POST['name'])){
	$name=stripslashes($_POST['name']);
	$email=stripslashes($_POST['email']);
	$company=stripslashes($_POST['company']);
	$subject=stripslashes($_POST['subject']);
	$message=stripslashes($_POST['message']);
	include_once"scripts/connect_to_mysql.php";
	$sql=mysqli_query($myConnection, "INSERT INTO email (name, email, company, subject, message) VALUES ('$name','$email','$company','$subject','$message')")or die(mysqli_error($myConnection));
	if ($sql){
		$sucess='<div align="center" style=" padding:5px; border:1px solid #B0B0B0; width:350px; margin-left:400px; "><img src="administrator/images/check.png" width="90" height="87" /><br/>
		Thank you..!! <b>Mr/Mrs.' .$name. '</b><br/> Your email has been sent successfully.<br/>We will reply you as soon as possible on your email as below<br/><b>Email:</b>' . $email . '<br/>
		<a href="contact.php">Click Here</a> to send another email
		</div>';
		}
}
?>
<?php 
if (isset($_POST['yes'])){
	//connect to database
	include_once"scripts/connect_to_mysql.php";
	$email=$_POST['email'];
	$sql=mysqli_query($myConnection, "INSERT INTO client_email (email) VALUES ('$email')") or die (mysqli_error($myConnection));
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-Uk" xmlns="http://www.w3.org/1999/xhtml" lang="en-Uk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugux Studios-The best webdesign/design studios</title>
<!--Style sheets starts-->
<link href="tugux_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
<!---vallidate form-->
<script type="text/javascript">
function validate_form(){
	valid=true;
	if(document.form.name.value == ""){
		 $("#nameerror").text("You have not entered firstname").show().fadeOut(7000); 
		 valid = false;
		}
		else if(document.form.email.value == ""){
		$("#emailerror").text("You have not entered email").show().fadeOut(7000); 
		 valid = false;
		}else if(document.form.subject.value == ""){
		$("#subjecterror").text("You have not entered Subject").show().fadeOut(7000); 
		 valid = false;
		}
		else if(document.form.message.value == ""){
		$("#messageerror").text("You have not entered Message").show().fadeOut(7000); 
		 valid = false;
		}return valid;
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

<body background="contact/images/bg.jpg" style="background-repeat:repeat-x; margin-top:0px;" onload="MM_preloadImages('contact/icons/normals/001_50.png','contact/icons/normals/001_54.png','contact/images/readmore2.png','contact/images/shortcut_website_hover.jpg','contact/images/shortcut_graphics_hover.jpg','contact/images/shortcut_contact_hover.jpg')" >

<!--Body wrapper starts-->
<div class="body_wrapper">
<!--Header starts-->
<?php include_once"header_main.php"; ?>
<!--Header ends -->
<!--slider starts -->
<div id="slider-wrapper">
        
    <img src="images/slides/contact_head.jpg" width="950" height="303" alt="graphics" style=" margin-left:25px; margin-top:30px" />
</div>

    <script type="text/javascript" src="js/slider/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="js/slider/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

<!--slider ends -->

<!-- content starts-->
<div class="content" style=""> 
<div class="services_wrapper_1">
<div class="sevices_top">
</div>
<div class="sevices_middle">
<div class="servi_text">
  <span class="heading1">Contact Details</span>
<p><?php echo $aboutcompany; ?></p>
<p><strong>Office</strong> : <?php echo $telefone; ?><br />
  <strong>Cell</strong> : <?php echo $mobile; ?><br />
  <strong>Email</strong> <?php echo $email; ?></p>
<span class="heading1">Aditional info</span>
<p><strong>Country</strong> : <?php echo $country; ?><br />
  <strong>City</strong>
   :<?php echo $city; ?><br />
  <strong>Adress</strong>: <?php echo $adress; ?><br />
</p>
<br><br>
</div>
</div>
<div class="sevices_end">
</div>
</div>
<?php print "$sucess";?>
<div style="margin:auto; width:400px;">
<form action="contact.php" method="post" id="contactform" name="form" onsubmit="return validate_form();">
  <p>
  <div id="nameerror" style=" color:#F00;"></div>
    <label for="name">Name<span style="color:red ">*</span></label>
    
    <input id="name" name="name" class="text" />
    <label for="email">Your email <span style="color:red">*</span></label>
      <div id="emailerror" style=" color:#F00;"></div>
    <input id="email" name="email" class="text" />
    <label for="company">Company</label>
    <input id="company" name="company" class="text" />
    <label for="subject">Subject <span style="color:red">*</span></label>
    <div id="subjecterror" style=" color:#F00;"></div>
    <input id="subject" name="subject" class="text" />
    <label for="message">Message <span style="color:red">*</span></label>
    <div id="messageerror" style=" color:#F00;"></div>
    <textarea id="message" name="message" rows="6" cols="50"></textarea>
    <input name="yes"   type="checkbox" id="yes" value="yes" checked="checked" /> Subscribe to our newsletter
    </p>
  <p>
   <input type="image" name="imageField" id="imageField" src="images/send.gif" class="send" />
    </p>
</form>
</div>
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