<?php
	require_once('sessioncheck.php');
include '../conn.php';

if(isset($_POST['save'])){
$e=$_SESSION['id'];
$a = $_POST['position'];
// query
$sql = "INSERT INTO positions (position_description,election_id) VALUES (:a,:e)";
$q = $conn->prepare($sql);
$q->execute(array(':a'=>$a, ':e'=>$e));
header("location: positions.php");
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Positions</title>
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
      <!-- Desktop sidebar -->
	  <?php include '../conn.php';
	
	   ?>
    <?php include 'aside.php'; ?>
<center>
   <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Add position</h4>

<form action="" name="save" method="POST">


<br>
<input type="text" class="px-2 py-2" name="position" /><br/>

<p class="py-3"></p>
<input type="submit" value="Save" name="save"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 rounded shadow-lg  hover:shadow-xl transition duration-200" />

</form>

</div>
</center>