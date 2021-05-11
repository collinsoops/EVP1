<?php
	require_once('sessioncheck.php');
	//require_once('checkelection.php');
$el=$_SESSION['id'];
$page='Candidates';
$sort_variable = "user_id";
?>
<?php
if(isset($_POST['update'])){
// configuration
include('../conn.php');

	
	
	
// new data

$uid = $_POST['uid'];
$p = $_POST['position'];
$f = $_POST['fname'];
$l = $_POST['lname'];
$d = $_POST['date'];
$bio = $_POST['bio'];
$user = $_POST['name'];
//$file=$_POST['image'];
if (!$_FILES['image']['name'] == "") {
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
		move_uploaded_file($_FILES["image"]["tmp_name"],"../img/candidate/" . $_FILES["image"]["name"]);
		
		$a=$_FILES["image"]["name"];
		
		$sql = "UPDATE candidates   SET
position_id=?,bio_info=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($p,$bio,$uid));


$sql = "UPDATE users   SET
username=?,firstname=?,lastname=?,photo=?, last_modified=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($user,$f,$l,$a,$d,$uid));



header("location: candidates.php");
}
}

else{


$sql = "UPDATE candidates   SET
position_id=?,bio_info=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($p,$bio,$uid));

$sql = "UPDATE users   SET
username=?,firstname=?,lastname=?,photo=?, last_modified=?
		WHERE user_id=?";
$q = $conn->prepare($sql);
$q->execute(array($user,$f,$l,$p,$pl,$d));
header("location: candidates.php");

}
}
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
      <!-- Desktop sidebar -->
	  <?php include '../conn.php';
	  $id= $_GET['id'];
	   ?>
    <?php include 'aside.php'; ?>

   <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Update position</h4>
<?php
	include('../conn.php');
	
	
	
	$results = $conn->prepare("SELECT * FROM candidates WHERE candidate_id= ? AND election_id=?" );
	$results->execute(array($id, $el));
	// $results->bindParam("ss", $id, $el);
	//$results->execute();
	$rows2 = $results->fetch();
	$user=  $rows2['user_id']; 
	
	
	
	
	$results1 = $conn->prepare("SELECT * FROM users WHERE user_id= ? AND election_id=?");
	//$results1->bindParam(':userid', $user);
	$results1->execute(array($user, $el));
	//$results1->execute();

	for($i=0; $rows = $results1->fetch(); $i++){
?>
<form action="" name="update" method="POST" enctype='multipart/form-data'>
<input type="hidden" name="uid" value="<?php echo $user; ?>" />
<br>
<label>First Name: </label> <input type="text" class="px-2 py-4" name="fname" value="<?php echo $rows['firstname']; ?>" /><br/>
<p class="py-3"></p>
<label>Last Name: </label><input type="text" class="px-2 py-4" name="lname" value="<?php echo $rows['lastname']; ?>" /><br/>
<p class="py-3"></p>
<label>Username: </label><input type="text" class="px-2 py-4" name="name" value="<?php echo $rows['username']; ?>" /><br/>
<input type="hidden" class="px-2 py-4" name="date" value="<?php echo date("d-m-y   H:i:s"); ?> " />
<p class="py-3"></p>
<label>Position: </label>

	<?php 
	include('../conn.php');
	$idc=$rows2['position_id'];
	$result2 = $conn->prepare("SELECT * FROM positions WHERE election_id=? AND position_id= ? " );
	$result2->execute(array($el,$idc));								
												
	//$result2->bindParam(':d', $idc);
	//$result2->execute();

	
	$row1 = $result2->fetch();
	
	echo  $row1['position_description'];
	
	
	
	?>
	:
	
		<?php
	//$result = $conn->prepare("SELECT * FROM positions");
	
		//$result->execute();
	
	?>
  <select class="" id="position" name="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                        $res= $conn->prepare("SELECT * FROM positions WHERE election_id=?  " );
	$res->execute(array($el));								
		
                          while($row = $res->fetch()){
                            echo "
                              <option value='".$row['position_id']."'>".$row['position_description']."</option>
                            ";
                          }
                        ?>
                      </select>



<p class="py-3"></p>
<label>Profile :</label><input type="file" class="px-2 py-4 " name="image" value="<?php echo $rows['photo']; ?>" /><br/>
<p class="py-3"></p>


<label>Bio_info: </label><input type="text" class="px-2 py-4" name="bio" value="<?php echo $rows2['bio_info']; ?>" /><br/>
<p class="py-3"></p>
<input type="submit" value="Update" name="update"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 px-3 rounded shadow-lg items-center hover:shadow-xl transition duration-200" />

</form>
<?php
}
?>
</div>
