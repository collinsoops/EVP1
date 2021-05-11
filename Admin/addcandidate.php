
<?php
	require_once('sessioncheck.php');
	$el=$_SESSION['id'];
if(isset($_POST['update'])){
// configuration
include('../conn.php');

// new data
$id = $_POST['name'];
$p = $_POST['position'];
$pl = $_POST['plat'];
$u=2;
//$file=$_POST['image'];


$sql1 = "UPDATE users
        SET user_type_id=?
		WHERE user_id=?";
$q1 = $conn->prepare($sql1);
$q1->execute(array($u,$id));


$sql = "INSERT INTO candidates  (position_id,user_id,bio_info,election_id) VALUES (:p,:id,:pl,:el) ";
$q = $conn->prepare($sql);

$q->execute(array(':p'=>$p,':id'=>$id,':pl'=>$pl,':el'=>$el));
header("location: candidates.php");


}
?>







<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Candidate</title>
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
            >Add Candidate</h4>

<form action="" name="update" method="POST" enctype='multipart/form-data'>
<input type="hidden" name="id"  />
<br>


<label>Full name: </label>

	
  <select class="" id="name" name="name" required>
                        <option value="" selected>- Select - </option>
                        <?php
						
							$u=3;
	
							$result1 = $conn->prepare("SELECT * FROM users WHERE (user_type_id = :user) AND (election_id=:el ) ");
						//$result1->bindParam(':user', $u);
						
							$result1->execute(array(':user'=>$u, ':el'=>$el));
						$result1->execute();
						
                          while($row = $result1->fetch()){
                            echo "
                              <option value='".$row['user_id']."'>".$row['firstname']." ".$row['lastname']."</option>
                            ";
                          }
                        ?>
                      </select>


<input type="hidden" class="px-2 py-4" name="elecid" value="<?php echo  $row['election_id']    ?>" required/>
<p class="py-3"></p>
<label>Position: </label>

	
		<?php
	//$result = $conn->prepare("SELECT * FROM positions");
	
		//$result->execute();
	
	?>
  <select class="" id="position" name="position" required>
                        <option value="" selected> - Select - </option>
                        <?php
                          $sql = "SELECT * FROM positions WHERE election_id='".$_SESSION['id']."'";
                          $query = $conn->prepare($sql);
						   $query->execute();
                          while($row = $query->fetch()){
                            echo "
                              <option value='".$row['position_id']."'>".$row['position_description']."</option>
                            ";
                          }
                        ?>
                      </select>

<br/>

<p class="py-3"></p>


<label>Bio_info: </label><input type="text" class="px-2 py-4" name="plat" required/><br/>
<p class="py-3"></p>
<input type="submit" value="Add" name="update"   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 px-3 rounded shadow-lg items-center hover:shadow-xl transition duration-200" />

</form>

</div>
</center>