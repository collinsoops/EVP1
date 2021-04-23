<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['voter']."'";
		$query = $conn->prepare($sql);
		$query ->execute();
		$voter = $query->fetch(PDO::FETCH_ASSOC);
		
		
		}
	else{
		header('location: index.php');
		exit();
	}
		
		
	
		$sql1 = "SELECT * FROM settings ";
		$query1 = $conn->prepare($sql1);
		$query1 ->execute();
		$date = $query1->fetch(PDO::FETCH_ASSOC);
		
		
		$start_date1=$date['start_date'];
		$start_time=$date['start_time'];


 $expected=strtotime($start_date1.'  '.$start_time);
 

 $datetime1 = time();

if( $datetime1 < $expected){

  $remaining = $datetime1 - $expected;
    $days_remaining = floor($remaining / 86400);
    $hours_remaining = floor(($remaining % 86400) / 3600);
    $minutes_remaining = floor(($remaining % 3600) / 60);
    $seconds_remaining = ($remaining % 60);
    echo "<p>$days_remaining <span style='font-size:.6em;'>days</span> $hours_remaining <span style='font-size:.6em;'>hours</span> $minutes_remaining <span style='font-size:.6em;'>minutes</span> $seconds_remaining <span style='font-size:.6em;'>seconds</span></p>"

	;


}
{

	$_SESSION['error'] = 'Voting has not started';
			header("location: index.php");
}
					

$end_date1=$date['end_date'];
		$end_time=$date['end_time'];
	
 $enddate=strtotime($end_date1.' '.$end_time);

$currentdate =time();

if($currentdate > $enddate ){


echo' hey election  ended at'; echo $end_date1;   echo $end_time;




}



	

?>
</body>
</html>
