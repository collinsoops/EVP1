<?php
	include 'session.php';
	
	//include 'includes/slugify.php';

	if(isset($_POST['vote'])){
		if(count($_POST) == 1){
			$_SESSION['error'][] = 'Please vote atleast one candidate';
		}
		else{
			$_SESSION['post'] = $_POST;
			$sql = "SELECT * FROM positions";
			$query = $conn->prepare($sql);
            $query ->execute();
			$error = false;
			$sql_array = array();
			$row = $query->fetch(PDO::FETCH_ASSOC);
				$position = $row['description'];
				
				if(isset($_POST[$position])){
				
					//$vote= $_SESSION['voter'];
						$candidate = $_POST[$position];
						$pos_id = $row['id'];
						
				
				
				
				
				
				
				
						
					
$sql_array[] =  "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES (:vote, :candidate, :posid)";
		
				foreach($sql_array as $sql_row){
					 $quer=$conn->prepare($sql_row);
		$quer->bindparam(':vote',  $_SESSION['voter']);
      $quer->bindparam(':candidate', $candidate);
      $quer->bindparam(':posid',$pos_id);
					
					
                    $quer->execute();
				}

				unset($_SESSION['post']);
				$_SESSION['success'] = 'Ballot Submitted';

			}

		}
    }
	

	
	

	
	else{
		$_SESSION['error'][] = 'Select candidates to vote first';
	}

	header('location: home.php');

?>