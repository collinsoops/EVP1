<?php
	require_once('session.php');
	require_once('checkelection.php');
	include('conn.php');
	
?>

<!DOCTYPE html>
<meta http-equiv="refresh" content="1">
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Congratulations</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../assets/js/init-alpine.js"></script>
  </head>
  <body>
  <?php 
  include 'head.php';
  
  
  
  
  		$sql1 = "SELECT * FROM settings ";
		$query1 = $conn->prepare($sql1);
		$query1 ->execute();
		$date = $query1->fetch(PDO::FETCH_ASSOC);
  
  ?>
   
   
   
   
   
   

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container flex flex-col items-center px-6 mx-auto">
            <svg
              class="w-12 h-12 mt-8 text-purple-200"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <h1 class="text-5xl font-semibold text-gray-700 dark:text-gray-200 my-3">
             Congratulations for voting!
            </h1>
            <p class="text-gray-700 text-3xl dark:text-gray-300 my-4">
           Please be patient as you wait for the results
              <a
                class="text-purple-600 hover:underline dark:text-purple-300"
                href="viewvotes.php"
              >
           View your votes
              </a>
              .
            </p>
			
			
			
			     <p class="text-gray-700  text-4xl dark:text-gray-300">
        Results for the <span class="text-green-100"> <?php echo $date['election_title'] ;?> election </span> will be released in the next:
              <h3 
                class="text-purple-600 text-4xl  hover:underline dark:text-purple-300"
     
              >
         
            
            <?php
			


		
		
		$start_date1=$date['end_date'];
		$start_time=$date['end_time'];


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
?>
		
		</h4>	
			
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
