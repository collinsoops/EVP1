<?php
require_once('session.php');
include('conn.php');
$idnum=$_POST['idnum'];
$e=$_POST['vot'];
$a=1;
$edittable=$_POST['votes'];
$N = count($edittable);
for($i=0; $i < $N; $i++)
{


$sqlas = "INSERT INTO votes(candidate_id,user_id,position_id) VALUES (:m,:n,:e)";
	$qs = $conn->prepare($sqlas);
	$qs->execute(array(':m'=>$edittable[$i],  ':n'=>$idnum , ':e'=>$e[$i]  ));

}
header("location: congratulation.php?id=$idnum");

?>