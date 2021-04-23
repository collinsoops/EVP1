
<?php
	require_once('sessioncheck.php');
	$el=$_SESSION['id'];
	
if(isset($_POST['add'])){
// configuration
include('../conn.php');

// new data
$id = $_POST['id'];

$f = $_POST['fname'];
$l = $_POST['lname'];
$dt = $_POST['date'];
$us = $_POST['username'];
$u=3;
//$file=$_POST['image'];
if (!$_FILES['image']['name'] == "") {
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
		move_uploaded_file($_FILES["image"]["tmp_name"],"../img/voter/" . $_FILES["image"]["name"]);
		
		$a=$_FILES["image"]["name"];
		$sql = "INSERT INTO users  (usertype_id,username,firstname,lastname,photo, datecreated,election_id) VALUES (:u,:us,:f,:l,:a,:dt,:el)";
		$q = $conn->prepare($sql);

$q->execute(array(':u'=>$u, ':us'=>$us,':f'=>$f,':l'=>$l,':a'=>$a,':dt'=>$dt,':el'=>$el));
header("location: voters.php");

}
}

else{
$sql = "INSERT INTO users  (usertype_id,username,firstname,lastname, datecreated,election_id) VALUES (:u,:us,:f,:l,:dt,:el)";
$q = $conn->prepare($sql);

$q->execute(array(':u'=>$u, ':us'=>$us,':f'=>$f,':l'=>$l,':dt'=>$dt,':el'=>$el));
header("location: voters.php");

}
}
?>











<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Voters</title>
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

   <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
           
	 
		   
		   
		    <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            > 
			Add Voter</h4>

<form action="" name="update" method="POST" enctype='multipart/form-data'>
<input type="hidden" name="id"  />
<br>
<label>First Name: </label> <input type="text" class="px-2 py-4" name="fname"  /><br/>
<p class="py-3"></p>
<input type="hidden" class="px-2 py-4" name="date" value="<?php echo date("d-m-y   H:i:s"); ?>  " />
<label>Last Name: </label><input type="text" class="px-2 py-4" name="lname"  /><br/>
<p class="py-3"></p>
<label>Username: </label><input type="text" class="px-2 py-4" name="username"  /><br/>
<p class="py-3"></p>






<label>Profile :</label><input type="file" class="px-2 py-4 " name="image"/><br/>
<p class="py-3"></p>


<input type="submit" value="Add" name="add"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 px-3 rounded shadow-lg items-center hover:shadow-xl transition duration-200" />

</form>

</div>
