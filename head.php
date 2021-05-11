
<?php

				$a = $_SESSION['voter'] ;
											
		$results1 = $conn->prepare("SELECT * FROM users WHERE user_id= :a");
			$results1->bindParam(':a',$a);
			 		$results1->execute();
					$row2 = $results1->fetch(PDO::FETCH_ASSOC);
					?>





<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/style.css" rel="stylesheet">
  
</head>

<body>
    <div class="container mx-auto">

   
<nav class="bg-purple-600">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="true">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
       <a href="home.php">   <img class="block lg:hidden h-8 w-auto" src="img/logo.jpg" alt="EVP"></a>
          <a href="home.php"> <img class="hidden lg:block h-8 w-auto" src="img/lg.jpg" alt="EVP"></a>
        </div>
       
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
    
            <button type="button" class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
          
              <img class="h-8 w-8 rounded-full" src="img/voter/<?php echo $row2['photo'] ;?>" alt=" usr">
			  
            </button>
			
			
	
			 <a href="editprofile.php" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><?php echo $row2['firstname'] ;?> <?php echo  $row2['lastname']; ?><br></a>
        </button>

<?php
if( $row2['user_type_id']==2){
echo '

 <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
           
            <a href="report.php" class="text-white text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Report</a>

 
          </div>
        </div>

';
}
     ?>
        <div class="ml-3 relative">
          <div>
         <a href="logout.php" class="text-white  hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Logout</a>
          </div>

       
        </div>
      </div>
    </div>
  </div>

 
</nav>