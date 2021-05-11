
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
    <script src="./assets/js/init-alpine.js"></script>
	
		<script src="src/facebox.js" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		
		
		
			<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
		
	
	
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
            Results          </h4>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
			  	  		<?php
	
				
				  $querym  = $conn->prepare("SELECT * FROM positions WHERE election_id= '".$_SESSION['id']."'" );
	            // $querym = $conn->prepare($sqlm);
			     $querym->execute();
			     $rowm = $querym->rowCount();
			      
				  
			
				  
				  		
						
	
				/*  $sql = "SELECT * FROM positions WHERE position_id= '".$vm['position_id']."'";
		     $query = $conn->prepare($sql);
	        	$query ->execute();
				
	    for($i=0; $position = $query->fetch(PDO::FETCH_ASSOC); $i++){
			 */
			 
			 
			 
				    for($i=0; $position= $querym->fetch(); $i++){
			$sql4= "SELECT * FROM `candidates` WHERE (election_id ='".$_SESSION['id']."')  AND (position_id= '".$position['position_id']."')"  ;
			//FROM `candidates` WHERE `position_id` ='".$position['position_id']."'";
			$query4 = $conn->prepare($sql4);
			$query4->execute();
			 
				
	 ?>
				
			
				
			   <?php echo $position['position_description'];  ?>
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Profile</th>
                      <th class="px-4 py-3">Votes</th>
                      <th class="px-4 py-3">Position</th>
                  
               
                    </tr>
                  </thead>
				  <?php
	
		    //$row = $query->rowCount();
						
						 for($i=0; $candidate = $query4->fetch(); $i++){	
								


          $sql6= "SELECT * FROM `users` WHERE `user_id` ='".$candidate['user_id']."'";
				
			//FROM `candidates` WHERE `position_id` ='".$position['position_id']."'";
			$query6 = $conn->prepare($sql6);
			$query6->execute();
		    //$row = $query->rowCount();
			$user = $query6->fetch();
				
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
                              src="../img/candidate/<?php echo $user['photo']; ?>"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"><?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo $user['username']; ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
					  
		<?php
	     	$sql44= "SELECT * FROM votes WHERE (candidate_id ='".$user['user_id']."')  AND (election_id= '".$_SESSION['id']."') ";
			//FROM `candidates` WHERE `position_id` ='".$position['position_id']."'";
			$query44 = $conn->prepare($sql44);
			$query44->execute();
		    $row4 = $query44->rowCount();
			//$cande = $query4->fetch();
					echo $row4 ; ?>
                      </td>
             
                      <td class="px-4 py-3 text-sm ">
                    <?php 
					
				
						echo $position['position_description']; 
					
					?>
					
					
					
            </td>
                    </tr>

                	  <?php
				  }
				  ?>
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


