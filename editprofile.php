

<?php
//session_start();
	include('conn.php');
if(isset($_POST['update'])){
// configuration


// new data
$id = $_POST['id'];
$n = $_POST['name'];
$f = $_POST['fname'];
$p = $_POST['pwd'];
$l = $_POST['lname'];

//$file=$_POST['image'];
if (!$_FILES['image']['name'] == "") {
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		if ($image_size==FALSE) {
		
			$_SESSION['er'] = 'That is not an image!';
			header("location: editprofile.php");
		
		
			
		}else{
		move_uploaded_file($_FILES["image"]["tmp_name"],"../img/candidate/" . $_FILES["image"]["name"]);
		
		$a=$_FILES["image"]["name"];
		$sql = "UPDATE users 
        SET firstname=?, lastname=?, username=?, password=?, photo=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($f,$l,$n,$p,$a,$id));
	$_SESSION['e'] = 'Sucessfully Updated';
			header("location: editprofile.php");

}
}

else{
$sql = "UPDATE users
        SET firstname=?, lastname=?, username=? ,password=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($f,$l,$n,$p,$id));
$_SESSION['e'] = 'Sucessfully Updated';
header("location: editprofile.php");

}
}
?>

<?php
	require_once('session.php');
	//require_once('checkelection.php');

	include 'head.php';
?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>candidate</title>
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
            >Update profile</h4>
			
			
				<?php
  		if(isset($_SESSION['e'])){
  			echo '
			
			   <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >	'.$_SESSION['e'].' </h4>
			';
			}
	unset($_SESSION['e']);
			?>
			
			
				<?php
  		if(isset($_SESSION['er'])){
  			echo '
			
			   <h4
              class="my-6 text-2xl font-semibold text-red-500 dark:text-gray-200"
            >	'.$_SESSION['er'].' </h4>
			';
			}
	unset($_SESSION['er']);
			?>
				
			
			
			
			
			
			
			
<?php
	//include('../conn.php');
	
	$id=$_SESSION['voter'];
	
	$results = $conn->prepare("SELECT * FROM users WHERE user_id= :userid");
	$results->bindParam(':userid', $id);
	$results->execute();
	for($i=0; $rows = $results->fetch(); $i++){
?>
<form action="" name="update" method="POST" enctype='multipart/form-data'>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<br>
<label class="">First Name: </label> <input type="text" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="fname" value="<?php echo $rows['firstname']; ?>" /><br/>
<p class="py-3"></p>
<label>Last Name: </label><input type="text" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="lname" value="<?php echo $rows['lastname']; ?>" /><br/>
<p class="py-3"></p>
<label>Username: </label><input type="text" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="name" value="<?php echo $rows['username']; ?>" /><br/>
<p class="py-3"></p>
<label>Password: </label><input type="password" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="pwd" value="<?php echo $rows['password']; ?>" /><br/>
<p class="py-3"></p>
<label>Profile :</label><input type="file" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3 " name="image" value="<?php echo $rows['photo']; ?>" /><br/>
<p class="py-3"></p>



<center><input type="submit" value="Update" name="update"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded shadow-lg  hover:shadow-xl transition duration-200" /></center>

</form>
</section>
</main>
<?php
}
?>
</div>
</div>
</body></html>
