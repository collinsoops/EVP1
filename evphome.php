
<?php
//session_start();
	require_once('session.php');
	//require_once('checkelection.php');
	include('conn.php');
	//include 'head.php';
	?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
			<h1 class="text-6xl font-semibold text-gray-700 dark:text-gray-200 my-3">
			Sorry election has not yet started
			</h1>
			    <p class="text-gray-700 text-3xl dark:text-gray-300 my-4">
           Please be patient, Election will begin in the next:
              <a
                class="text-purple-600 hover:underline dark:text-purple-300"
                href="../index.php"
              >
                
              </a>
              .
            </p>
			<?php 
				if(isset($_SESSION['err'])){ echo'
            <h4 class="text-4xl font-semibold text-gray-700 dark:text-gray-200 my-3">
          '.$_SESSION['err'].'
            </h4>
			
			';
				//unset($_SESSION['err']);
			}
			?>
        
			
	
			
			
			
			
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
