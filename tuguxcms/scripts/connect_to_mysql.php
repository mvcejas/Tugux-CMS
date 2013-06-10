 <?php 
// Place db host name. Sometimes "localhost" but 
// sometimes looks like this: >>      ???mysql??.someserver.net
$db_host = "127.0.0.1";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = "vertrigo"; 
// Place the name for the MySQL database here
$db_name = "tugux_cms";

// Run the connection here  
$myConnection = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or die ("could not connect to mysql"); 
// Now you can use the variable $myConnection to connect in your queries     
?>