<?php
	require_once('sessioncheck.php');

include '../conn.php';
$el=$_SESSION['id'];
$page='voters';
$password='1234';
$hashvalue = password_hash($password, PASSWORD_BCRYPT);
$sort_variable = "user_id";
$dt=date("d-m-y   H:i:s");
?>

<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $user_id = "";
            if (isset($column[0])) {
                $user_id = mysqli_real_escape_string($conn, $column[0]);
            }
            $user_type_id = "";
            if (isset($column[1])) {
                $user_type_id = mysqli_real_escape_string($conn, $column[1]);
            }
            $username = "";
            if (isset($column[2])) {
                $username = mysqli_real_escape_string($conn, $column[2]);
            }
            $password = "";
            if (isset($column[3])) {
                $password = mysqli_real_escape_string($conn, $column[3]);
            }
			  $firstname = "";
            if (isset($column[4])) {
                $firstname = mysqli_real_escape_string($conn, $column[4]);
               
            }
            $lastname = "";
            if (isset($column[5])) {
                $lastname= mysqli_real_escape_string($conn, $column[5]);
            }
			
			$last_modified = "";
            if (isset($column[6])) {
                $last_modified = mysqli_real_escape_string($conn, $column[6]);
            }
			$date_created = "";
            if (isset($column[7])) {
                $date_created = mysqli_real_escape_string($conn, $column[7]);
            }
			$election_id = "";
            if (isset($column[8])) {
                $election_id = mysqli_real_escape_string($conn, $column[8]);
            }
			
	
            
            $sqlInsert = "INSERT into users (user_type_id,username,password, firstname, lastname, last_modified,date_created,election_id)
                   values (?,?,?,?,?,?,?,?)";
            $paramType = "isssssss";
            $paramArray = array(
               $user_type_id, $username, $hashvalue,  $firstname,  $lastname,  $last_modified, $dt, $el
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
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
 
 <script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv",".xlsx";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
 <style>


.btn-submit {
    background:#2A9322;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
 
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
	  <?php include '../conn.php'; ?>
    <?php include 'aside.php'; ?>
<center>
  
   <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
          
            <h4
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >Import Excel file</h4>

 <h3 align="center"><a href="Sample.csv" target="_blank" class="bg-purple-600 p-2">Download Sample</a></h3>
   <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
        
<form action="" name="save" method="POST" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row p-3">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv,.xlsx">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit bg-blue-500 p-2">Import</button>
                    <br />

                </div>
</form>

</div>
</center>