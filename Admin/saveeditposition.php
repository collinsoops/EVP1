<?php
// configuration
include('../conn.php');

// new data
$id = $_POST['memids'];
$a = $_POST['position'];
// query
$sql = "UPDATE positions 
        SET position_description=?
		WHERE position_id=?";
$q = $conn->prepare($sql);
$q->execute(array($a,$id));
header("location: positions.php");

?>