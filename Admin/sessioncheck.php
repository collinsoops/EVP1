<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
</head>

<body>
    <?php

	
	include '../conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['admin']."'";
		$query = $conn->prepare($sql);
		$query ->execute();
		$voter = $query->fetch(PDO::FETCH_ASSOC);
	}
	else{
		header('location: index.php');
		exit();
	}

?>
</body>

</html>