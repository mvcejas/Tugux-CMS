<?php
// Parsing section for the member picture... only runs if they attempt to upload or replace a picture
if ($_POST['id'] == "$id"){

        if (!$_FILES['image']['tmp_name']) { 
		
            $error_msg = '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/delete.png" width="90" height="87"><br />
Operation uncompleted.Please select an image to upload<br />
<a href="index.php">Click Here to go back</a></div>';
			
        } else {

            $maxfilesize = 409600; // 409600 bytes equals 400kb
            if($_FILES['image']['size'] > $maxfilesize ) { 

                        $error_msg = '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/delete.png" width="90" height="87"><br />
Operation uncompleted.Image is too big....!!<br />
<a href="index.php">Click Here to go back</a></div>';
                        unlink($_FILES['image']['tmp_name']); 

            } else if (!preg_match("/\.(gif|jpg|png)$/i", $_FILES['image']['name'] ) ) {

                        $error_msg = '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/delete.png" width="90" height="87"><br />
Operation uncompleted.Unaccepted image format.<br />
<a href="index.php">Click Here to go back</a></div>';
                        unlink($_FILES['image']['tmp_name']); 

            } else { 

                        $newname = "image_01.jpg";
                        $place_file = move_uploaded_file( $_FILES['image']['tmp_name'], "slides/$id/".$newname);
                        $success_msg = '<div style=" width:300px; margin:auto; border:1px solid #BBB; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center">
<img src="images/check.png" width="90" height="87"><br />
Operation completed.Your image has been uploded.<br />
<a href="index.php">Click Here to go back</a></div>';
            }

        } // close else that checks file exists

} // close the condition that checks the posted "parse_var" value for image upload or replace
?>
<html>
<head>
</head>
<body>
<table align="center">
<tr><td>
<?php print "$error_msg"; ?><?php print "$success_msg"; ?>
</td></tr>
</table>
</body>
</html>