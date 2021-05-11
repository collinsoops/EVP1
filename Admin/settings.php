

<?php
error_reporting(0);
include '../conn.php';
if(isset($_POST['save'])){
	 $id= $_GET['id'];
$start_time=$_POST['start_time'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$end_time=$_POST['end_time'];
$election_description=$_POST['election_description'];
$election_title=$_POST['election_title'];

	
$stmt=$conn->prepare("UPDATE election SET
election_title=:elect,
election_start_date=:sd,
election_start_time=:st,
election_end_date=:ed,
election_end_time=:et,

election_description=:desc WHERE
election_id=:id
 ");
$stmt->execute(array(':sd'=>$start_date,':st'=>$start_time,':ed'=>$end_date,':et'=>$end_time,':elect'=>$election_title,':desc'=>$election_description,':id'=>$id ));

}

?>




<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Date</title>
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
    
<?php
	include('../conn.php');
	
	$results = $conn->prepare("SELECT * FROM election WHERE election_id= :erid");
	$results->bindParam(':erid', $id);

	$results->execute();
 $rows = $results->fetch();
$row = $results->rowCount();


?>
<p class="py-4">
 <h3
              class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Title of Election</h3>


<form method="POST">
<label class="text-sm">Election Title</label><input type="text" class="px-2 py-2" name="election_title" value="<?php echo  $rows['election_title']; ?>" /><br/>
<p class="py-1"></p>

<label class="text-sm">Election Description</label><input type="text" class="px-5 py-5" name="election_description" value="<?php echo  $rows['election_description']; ?>" /><br/>
<p class="py-1"></p>

 <h3
              class="my-5 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Starting Date</h3>

<input type="hidden" name="memids" value="<?php //echo $id; ?>" />
<br>
<label class="text-sm">Start_date</label><input type="date" class="px-2 py-2" name="start_date" value="<?php echo  $rows['election_start_date']; ?>" /><br/>
<p class="py-1"></p>
<label class="text-sm">Start_time</label><input type="time" class="px-2 py-2" name="start_time" value="<?php echo  $rows['election_start_time']; ?>" /><br/>
<p class="py-3 "></p>

 <h3
              class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Ending Time</h3>


<label class="text-sm">Start_date</label><input type="date" class="px-2 py-2" name="end_date" value="<?php echo  $rows['election_end_date']; ?>" /><br/>
<p class="py-1"></p>

<label class="text-sm">End_time</label><input type="time" class="px-2 py-2" name="end_time" value="<?php echo  $rows['election_end_time']; ?>" /><br/>
<p class="py-3"></p>



<input type="submit" value="Save"   name="save" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 px-5 rounded shadow-lg  hover:shadow-xl transition duration-200" />


</form>



</div>
