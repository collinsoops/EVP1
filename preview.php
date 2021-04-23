<?php
	require_once('session.php');
	include('conn.php');
?>
<html>
<head>
<title>Preview</title>
<link rel="icon" type="image/png" href="favicon.png" />
<link href="css/prev.css" rel="stylesheet">
</head>
<body>

<form id="msform" action="post.php" method="POST">
<input type="hidden" value="<?php echo $_SESSION['voter']; ?>" name="idnum" />
<input type="hidden" value="<?php echo $_POST['election'];?>" name="election" />
<?php
$resultasa = $conn->prepare("SELECT * FROM positions WHERE election_id='".$_POST['election']."' ");
$resultasa->execute();


for($i=0; $rowasa = $resultasa->fetch(); $i++){
$exrxrxrx=$rowasa['position_description'];

?>
<h2 class="fs-title"><?php echo $exrxrxrx ?></h2>





<?php   if (!empty($_POST[$exrxrxrx])) {   


?>


<input type="hidden" value="<?php echo $_POST[$exrxrxrx] ?>" name="votes[]" />


					<?php
					
					$a = $_POST[$exrxrxrx];
											
		$results1 = $conn->prepare("SELECT * FROM users WHERE user_id= :a");
			$results1->bindParam(':a',$a);
			 		$results1->execute();
					$row2 = $results1->fetch(PDO::FETCH_ASSOC);
					
		
						$results12 = $conn->prepare("SELECT * FROM candidates WHERE user_id= :a");
			$results12->bindParam(':a',$a);
			 		$results12->execute();
					$row21 = $results12->fetch(PDO::FETCH_ASSOC);
					
					
					
					?>



<?php echo $row2['firstname'] ;?> <?php echo  $row2['lastname']; ?><br>


<input type="hidden" value="<?php  
echo $row21['position_id']; ?>" name="vot[]" />

<br>
<?php
}
 else {  

    echo "Not Voted";
	?>
	<br/>
	<br/>
	
	<?php
	
	
	
}

}
?>
<a href="home.php" id="sub">Cancel</a>
<input type="submit" value="Submit" id="submit">

</form>
</body>
</html>