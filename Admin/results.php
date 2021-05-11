
<?php
//session_start();
	require_once('sessioncheck.php');
	//require_once('checkelection.php');


	?>


 
 <!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Results</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>

		
	
	
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
	  <?php include '../conn.php'; ?>
    <?php include 'aside.php'; ?>
			

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            Results         </h4>


            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
			  		<?php
								
								$sql = "SELECT * FROM positions";
		$query = $conn->prepare($sql);
		$query ->execute();
	
				
				
					
						for($i=0; $position = $query->fetch(PDO::FETCH_ASSOC); $i++){
				
				 // while($position = $query->fetch()){
				
				
				$sql4 = "SELECT * FROM `candidates` WHERE `position_id` ='".$position['position_id']."'";
			$query4 = $conn->prepare($sql4);
			$query4->execute();
			//$row = $query->rowCount();
			$candidate = $query4->fetch();
				
				
				
		
				
				
					$sql1 = "SELECT * FROM `users` WHERE `user_id` ='".$candidate['user_id']."'";
			$query1 = $conn->prepare($sql1);
			$query1->execute();
			//$row = $query->rowCount();
			$fetch = $query1->fetch();
			
				
				?>
					   <?php echo $position['position_description'];  ?>
			
                <table class="w-full whitespace-no-wrap">
				
                  <thead>
                   
				    	<?php
			
	
/*$sql1 = "SELECT * FROM votes WHERE position_id = '".$position['position_id']."'";
		$query1 = $conn->prepare($sql1);
		$query1 ->execute();
		
	 $votes = $query->fetch(PDO::FETCH_ASSOC);


			
			$sql1 = "SELECT * FROM `users` WHERE `user_id` ='".$fetch4['user_id']."'";
			$query1 = $conn->prepare($sql1);
			$query1->execute();
			//$row = $query->rowCount();
			$fetch = $query1->fetch();
			
	
			
			
			
				$sql = "SELECT * FROM positions WHERE position_id = '".$fetch4['position_id']."'";
		$query2 = $conn->prepare($sql);
		$query2 ->execute();
		$position = $query2->fetch(PDO::FETCH_ASSOC);
						*/
						
						
						
		?>		
						
						
						
						
				   
				
				   
				    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
			
					
                      <th class="px-4 py-3">Profile</th>
					  
                      <th class="px-4 py-3">Details</th>
                      <th class="px-4 py-3">Votes</th>
					  
                  
                   
                    </tr>
                  </thead>
				  
				 
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
                              src="../img/candidate/<?php echo $fetch['photo']; ?>"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"><?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo $fetch['username']; ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
					  <?php
					  
					  $sql4 = "SELECT * FROM `votes` WHERE (candidate_id ='".$candidate['candidate_id']."') AND ('".$candidate['position_id']."'= '".$position['position_id']."') ";
			$query4 = $conn->prepare($sql4);
			$query4->execute();
			$row4 = $query->rowCount();
			
		
					  ?>
					  
					  
					  
                     <?php echo $row4 ; ?>
                      </td>
             
                      <td class="px-4 py-3 text-sm ">
                    <?php 
					
				
						echo $row2['position_description']; 
					
					?>
					
					
					
                      </td>
                      
                    </tr>

                
                  </tbody>
                </table>
				   <?php
				   }
				   ?>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Previous"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                  
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>


