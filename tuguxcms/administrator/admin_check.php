<?php 
session_start();
if (isset($_SESSION["admin"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 

// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$admin = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);// filter everything but numbers and letters
	$pass=md5($password);
    // Connect to the MySQL database  
 include_once"../scripts/connect_to_mysql.php";
    $sql = mysqli_query($myConnection, "SELECT id FROM admin WHERE username='$admin' AND password='$pass' LIMIT 1") or die (mysqli_error($myConnection)); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------//
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["admin"] = $admin;
		 $_SESSION["pass"] = $pass;
		 header("location: index.php");
         exit();
    } else {
		echo '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/delete.png" width="90" height="87"><br />
Operation uncompleted.Login information is incorrect.<br />
<a href="index.php">Click Here to go back</a></div>';
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Log In </title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<table align="center">
  <tr>
    <td><form action="admin_check.php" method="post" target="_self">
      <div style="width:500px; height:300px; margin:auto; font-family:Arial, Helvetica, sans-serif; background-image:url(images/admin_loginbg.png); color:#FFF; font-weight:bold; background-repeat:no-repeat">
        <table width="487" height="299" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="82" style="padding-left:10px; font-size:21px;">Admin Login</td>
            <td height="82" colspan="2" align="right"><img style="margin-right:5px;" src="images/logo.png" alt="Logo" /></td>
          </tr>
          <tr>
            <td width="186" height="55" align="right">Username</td>
            <td width="173" align="right"><input type="text" name="username" id="username" /></td>
            <td width="128">&nbsp;</td>
          </tr>
          <tr>
            <td height="55" align="right">Password</td>
            <td align="right"><input type="password" name="password" id="password" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="44" colspan="3" align="center"><input type="submit"  size="200px" value="Log in" /></td>
          </tr>
          <tr>
            <td height="56" colspan="3" align="center"><font color="#FF0000"></font></td>
          </tr>
        </table>
      </div>
    </form></td>
  </tr>
</table>
<br />
<br />
</body>