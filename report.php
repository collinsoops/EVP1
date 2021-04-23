	<?php require_once('session.php'); ?>

<?php
//session_start();
	include('conn.php');
if(isset($_POST['report'])){
// configuration


// new data
$id = $_POST['id'];
$dt = $_POST['report1'];


$sql = "INSERT INTO complains  (user_id,complain_text) VALUES (:u,:dt)";
$q = $conn->prepare($sql);

$q->execute(array(':u'=>$id,':dt'=>$dt));
 
 $_SESSION['r'] = 'Complain successfully submitted';
 
header("location: report.php");


}

?>

<?php

	//require_once('checkelection.php');

	include 'head.php';
?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report</title>
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
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
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


    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-4 rounded-lg shadow-2xl">
	  <section class="mt-2">
          <div class="container grid px-6 mx-auto justify-items-center">
            <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Report complain</h4>
			
			
				<?php
  		if(isset($_SESSION['r'])){
  			echo '
			
			   <h4
              class="my-2 text-1xl font-semibold text-gray-700 dark:text-gray-200"
            >	'.$_SESSION['r'].' </h4>
			';
			}

			?>
			
			
		
	

<form action="" name="report" method="POST" enctype='multipart/form-data'>
<input type="hidden" name="id" value="<?php echo $_SESSION['voter'] ;?>" />
<br>

<center><label>Complain: </label></center><input type="textarea" class="bg-gray-200 w-full rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-8 pb-20" name="report1" required /><br/>
<p class="py-3"></p>




<center><input type="submit" value="Report" name="report"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded shadow-lg  hover:shadow-xl transition duration-200" /></center>

</form>
</section>
</main>

</div>
</div>
</body></html>
