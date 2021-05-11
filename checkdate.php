
<?php  //session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
	include 'conn.php';
	
		$sql1 = "SELECT * FROM election WHERE election_id= '".$_SESSION['electionid']."' ";
		$query1 = $conn->prepare($sql1);
		$query1 ->execute();
		$date = $query1->fetch(PDO::FETCH_ASSOC);
		
		
		$start_date1=$date['election_start_date'];
		$start_time=$date['election_start_time'];


 $expected=strtotime($start_date1.'  '.$start_time);
 

 $datetime1 = time();

if( $datetime1 < $expected){


  $remaining = $datetime1 - $expected;
    $days_remaining = floor($remaining / 86400);
    $hours_remaining = floor(($remaining % 86400) / 3600);
    $minutes_remaining = floor(($remaining % 3600) / 60);
    $seconds_remaining = ($remaining % 60);
	$_SESSION['err']= '
   <p>'.$days_remaining.' <span style="font-size:.6em;">days</span> '.$hours_remaining.' <span style="font-size:.6em;">hours</span> '.$minutes_remaining.' <span style="font-size:.6em;">minutes</span> '.$seconds_remaining.' <span style="font-size:.6em;">seconds</span></p>

	';
	header("location: evphome.php");
}

?>
</body>
</html>
