<?php
	require_once('session.php');
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//session_start();
	include 'conn.php';


		$sql = "SELECT * FROM votes WHERE (user_id = '".$_SESSION['voter']."') AND (election_id='".$id."')";
		$query = $conn->prepare($sql);
		$query ->execute();
		$voter = $query->fetch(PDO::FETCH_ASSOC);
	    $row = $query->rowCount();
		

			if($row > 0) {
				$_SESSION['alreadyvote'] = 'You have already voted';
			
				header("location: congratulation.php");
				
			} 


?>



</body>
</html>
