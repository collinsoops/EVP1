<?php
	include('../conn.php');
	$id=$_GET['id'];
	$result = $conn->prepare("DELETE FROM positions WHERE position_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>