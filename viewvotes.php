<?php
	require_once('session.php');
	include('conn.php');
	
	
   //$id=$_SESSION['electionid'];
   
	
	
?>
<html>
<head>
<title>Your votes</title>
<link rel="icon" type="image/png" href="favicon.png" />
<link href="css/prev.css" rel="stylesheet">

</head>
<body>
<?php include 'head.php'; ?>
<form id="msform" action="congratulation.php" method="POST">
<input type="hidden" value="<?php echo $_SESSION['voter']; ?>" name="idnum" />

<h3 style="background-color:#00FF33" class="text-center"> You Voted for the following Candidates</h3>
<?php

	$sql = "SELECT * FROM votes WHERE user_id = '".$_SESSION['voter']."' AND election_id ='".$_SESSION['electionid']."' ";
		$query = $conn->prepare($sql);
		$query ->execute();
		
		for($i=0; $voter = $query->fetch(PDO::FETCH_ASSOC); $i++){


	//$user=$voter['user_id'];
			
			
			
			$sql4 = "SELECT * FROM `candidates` WHERE `user_id` ='".$voter['candidate_id']."'";
			$query4 = $conn->prepare($sql4);
			$query4->execute();
			//$row = $query->rowCount();
			$fetch4 = $query4->fetch();

			
			$sql1 = "SELECT * FROM `users` WHERE `user_id` ='".$fetch4['user_id']."'";
			$query1 = $conn->prepare($sql1);
			$query1->execute();
			//$row = $query->rowCount();
			$fetch = $query1->fetch();
			
	
			
			
			
				$sql = "SELECT * FROM positions WHERE position_id = '".$fetch4['position_id']."'";
		$query2 = $conn->prepare($sql);
		$query2 ->execute();
		$position = $query2->fetch(PDO::FETCH_ASSOC);
			
			
			
?>

<center><strong><h2 class="fs-title"><?php  echo $position['position_description']?></h2></strong>



<img class="w-20 h-20 rounded-full mx-auto" src="img/candidate/<?php echo $fetch['photo']; ?>" alt="" width="400" height="680">


<?php echo $fetch['firstname'] ;?> <?php echo  $fetch['lastname']; ?><br>


<br>


	<br/>
	
	<?php
	


}
?>
<input type="submit" value="Back" id="submit">

</center>
</form>
</body>
</html>