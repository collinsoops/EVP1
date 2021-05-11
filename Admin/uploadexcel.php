

<?php
//session_start();
	require_once('sessioncheck.php');
	//require_once('checkelection.php');
$el=$_SESSION['id'];

$page='voters';
$password='1234';
$hashvalue = password_hash($password, PASSWORD_BCRYPT);
$sort_variable = "user_id";

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
               $user_type_id, $username, $password,  $firstname,  $lastname,  $last_modified, $date_created, $election_id
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
<html>

<head>
 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voters</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>

    <script src="src/facebox.js" type="text/javascript"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    < script type = "text/javascript" >
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            })
        })
    </script>


<script src="jquery-3.2.1.min.js"></script>

<style>
body {
    font-family: Arial;
    width: 550px;
}

.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
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
</head>

<body>

    <h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">
                    <td colspan="2" align="center"><a href="import_example.csv" target="_blank">Download Sample</a></td>

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM users";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
            <table id='userTable'>
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>User_type_id</th>
                      <th>Username</th>
                    <th>Password</th>
                         <th>First Name</th>
                    <th>Last Name</th>
                    <th>Last Modified</th>
                  
               
                      <th>Date Created</th>
                    <th>Election Id</th>

                </tr>
            </thead>
<?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>
    
                   <td><?php  echo $row['user_id']; ?></td>
				   <td><?php  echo $row['user_type_id']; ?></td>
				   <td><?php  echo $row['username']; ?></td>
							<td><?php  echo $row['password']; ?></td> 
						<td><?php  echo $row['firstname']; ?></td> 
							 <td><?php  echo $row['lastname']; ?></td>
									 <td><?php  echo $row['last_modified']; ?></td>
									 <td><?php  echo $row['date_created']; ?></td>
							 <td><?php  echo $row['election_id']; ?></td>
                 
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>

</body>

</html>