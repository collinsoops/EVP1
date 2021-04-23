<?php
	include('../conn.php');
	$id=$_GET['id'];
	$result = $conn->prepare("DELETE FROM complains WHERE complain_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>