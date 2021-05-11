<?php
	include('../conn.php');
	$id=$_GET['id'];
	

	
	$result = $conn->prepare("DELETE FROM users WHERE user_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	
		$sql = "SELECT * FROM candidates WHERE user_id=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($id));
			$row = $query->rowCount();
			
                        
			if($row > 0) {
	
	$result1 = $conn->prepare("DELETE FROM candidates WHERE user_id= :memid");
	$result1->bindParam(':memid', $id);
	$result1->execute();
	
	}

?>