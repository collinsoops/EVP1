<?php include 'session.php'; ?>
<!doctype html>
<html>
<?php
include 'head.php';
$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
				    	$vquery = $conn->prepare($sql);
						$vquery->execute();
						$row = $vquery->rowCount();
				    	if($row > 0){
				    		?>
				    		<div class="text-center">
					    		<h3>You have already voted for this election.</h3>
					    		<a href="#view" data-toggle="modal" class="btn btn-flat btn-primary btn-lg">View Ballot</a>
					    	</div>
				    		<?php
				    	}
				    	else{
				    		?>
							
			    			<!-- Voting Ballot -->
						    <form method="POST" id="ballotForm" action="submit.php">
							
				        		<?php
				        		

				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->prepare($sql);
									$query->execute();
										while($row = $query->fetch(PDO::FETCH_ASSOC)){
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->prepare($sql);
										$cquery ->execute();
						           $slug = $row['description']; 
														
												
											
													

?>



	 	<?php
  		if(isset($_SESSION['error'])){
  		?>
			<button class='container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative' role='alert'> 
			<?php echo $_SESSION['error'] ;?>
			
			<?php echo "
<span class='absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton'>
				<svg class='fill-current h-6 w-6 text-white' role='button' xmlns='http://www.w3.org/2000/svg'
					viewBox='0 0 20 20'>
					<title>Close</title>
					<path
						d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z' />
				</svg>
			</span>
			</button>
  			";
  			unset($_SESSION['error']);
  		}
  	?>


<div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
			 <h3 class="" ><?php echo $slug;?> </h3>
		
               
				  	 <?php
			 		
										while($crow = $cquery->fetch(PDO::FETCH_ASSOC)){
											
											
											?>
											
											
											
												
  <div class="p-4">  
    <!--Card 1-->
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-40 h-40 rounded-full mx-auto" src="d.png" alt="" width="500" height="800">
      <div class="px- py-3">
        <div class=" text-center mb-2">Name: <?php echo $crow['firstname']; ?> <?php echo $crow['lastname']; ?></div>
           <div class=" font-bold text-center mb-2">Bio- Info</div>
		 <div class="pt-3 text-center space-y-2">
          <?php echo $crow['platform']; ?>
        </div>
      </div>
      <div class="px-6 pt-4 pb-2 text-center">
        <div class=" text-center  font-bold mb-2"> Vote</div>
        <div class="inline-block bg-gray-200 rounded-full px-1 py-1 text-sm font-semibold  mr-2 mb-2">
		 
		 <?php echo '
						<input type="radio" class="form-radio h-4 w-4 t text-indigo-600"" name=  "'.$slug."[]". '" value= "'.$crow['id'].'">
						';?>
		
</div>
        
      </div>
    </div>
 
		
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
			
             
<?php
             }
                 
?>

    
	
	
	
                 
              
				<?php
             }}
                 
?>
    
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                 
                </span>
		<span class="col-span-2">
		</span>
		
                <span class="col-span-2">
				 <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Review</button>
				  <button class="bg-green-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="vote">Submit</button>
				
				
				</form>
				
				
				
				
				
				
				</span>
              
     







    </div>
</body>

</html>
