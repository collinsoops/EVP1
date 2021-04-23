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
							<?php
						
							  ?>
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
  			echo "
			<button class='container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative' role='alert'>".$_SESSION['error']."
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
			 <h3 class="py-2 px-4" ><?php echo $slug;?> </h3>
		
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Picture</th>
                      <th class="px-4 py-3">Bio Details</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Vote</th>
                    </tr>
                  </thead>
				  	 <?php
			 		
										while($crow = $cquery->fetch(PDO::FETCH_ASSOC)){
											
											
											?>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"> <?php echo $crow['firstname']; ?> <?php echo $crow['lastname']; ?> </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo $crow['firstname']; ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                       <?php echo $crow['platform']; ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          Approved
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                   <?php echo '
						<input type="radio" class="flex items-center mr-4 mb-4" name=  "'.$slug."[]". '" value= "'.$crow['id'].'">
						';?>
                      </td>
                    </tr>
              
<?php
             }
                 
?>

    
                 
                  </tbody>
                </table>
				<?php
             }}
                 
?>
    
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                 
                </span>
				<span class="flex items-center col-span-3">
                 
                </span>
                <span class="col-span-2">
				 <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Review</button>
				  <button class="bg-green-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="vote">Submit</button>
				
				
				</form>
				
				
				
				
				
				
				</span>
              
     







    </div>
</body>

</html>