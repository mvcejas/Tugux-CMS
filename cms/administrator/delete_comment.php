<?php 

if (isset($_POST['did'])){
	    $topic_id=$_POST['topic_id'];
		$id_to_delete= $_POST['did'];
		include_once "../scripts/connect_to_mysql.php";
		$query=mysqli_query($myConnection, "DELETE FROM comments WHERE id='$id_to_delete' LIMIT 1") or die (mysqli_error($myConnection));
		if ($query){
		header("location:edit_topic.php?eid=$topic_id");
		}
}

?>
