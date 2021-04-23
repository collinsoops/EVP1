<?php
require_once('session.php');
include('conn.php');


if (isset ($_POST['idnum']) &&($_POST['vot']) && ($_POST['election']) && ($_POST['vot'])) {
  

$idnum=$_POST['idnum'];
$e=$_POST['vot'];
$election=$_POST['election'];
$a=1;
$edittable=$_POST['votes'];
$N = count($edittable);
for($i=0; $i < $N; $i++)
{


$sqlas = "INSERT INTO votes(candidate_id,user_id,position_id,election_id) VALUES (:m,:n,:e,:el)";
	$qs = $conn->prepare($sqlas);
	$qs->execute(array(':m'=>$edittable[$i],  ':n'=>$idnum , ':e'=>$e[$i] , ':el'=>$election ));

}
header("location: congratulation.php?id=$idnum");

}
else {
  header("location: home.php");
}

?>