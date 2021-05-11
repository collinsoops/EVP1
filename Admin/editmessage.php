<?php
// configuration
include('../conn.php');

// new data
$id=$_GET['id'];
	
$a = 'read';
// query
$sql = "UPDATE positions 
        SET complain_status=?
		WHERE complain_id=?";
$q = $conn->prepare($sql);
$q->execute(array($a,$id));


?>