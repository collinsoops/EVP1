<?php
	include('../conn.php');
	$id=$_GET['id'];
	$u=3;
	
			 	$result1 = $conn->prepare("SELECT * FROM candidates WHERE candidate_id= :user");
						$result1->bindParam(':user', $id);
						$result1->execute();
						$row1 = $result1->fetch();
						
						$id1=$row1['user_id'];
	
	
	
	
	
	$sql1 = "UPDATE users
        SET usertype_id=?
		WHERE user_id=?";
$q1 = $conn->prepare($sql1);
$q1->execute(array($u,$id1));
	
	
	
	$result = $conn->prepare("DELETE FROM candidates WHERE candidate_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	
	

?>