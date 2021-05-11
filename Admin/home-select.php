<?php
require_once('sessioncheck.php');
	//require_once('checkelection.php');
	//require_once('checkifvoted.php');
	include('../conn.php');
	

?>
<html>

<head>
    <title>WELCOME <?php echo $_SESSION['voter']; ?></title>
    <link rel="icon" type="image/png" href="favicon.png" />

    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="../css/cs1.css" rel="stylesheet">


</head>

<body>

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <?php //  include 'aside.php'; ?>

            <span class="fs-title font-bold text-center " style="color:#0066CC">

            </span>


            <?php
$results = $conn->prepare("SELECT * FROM election");
	//$results->bindParam(':erid', $id);
				$results->execute();

		?>


            <fieldset>



                <h2 class="fs-title font-bold text-center  ">Please select election to manage</h2>



                <hr />


                <hr />


                <div class="flex flex-wrap -mx-1 lg:-mx-4 pt-10">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">


                            </tr>
                        </thead>

                        <?php
					 
					 
		
										while($row = $results->fetch(PDO::FETCH_ASSOC)){
										?>



                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                                <!-- Article -->


                                <a href="home.php?id=<?php echo $row['election_id']; ?>">
                                    <article class="overflow-hidden rounded-lg shadow-lg ">


                                        <figure class="parent">
                                            <label id="styleinput">


                                                <div class=" font-bold fs-title text-center pt-2">Name of Election
                                                    :<?php echo $row['election_title']; ?></div>
                                                <hr>
                                                <div class=" text-center text-sm"><span class="font-bold">Election
                                                        Description : </span><?php echo $row['election_description']; ?>
                                                </div>
                                                <hr>
                                                <div class=" text-center text-sm"><span class="font-bold">Election Start
                                                        Date :</span><?php echo $row['election_start_date']; ?></div>
                                                <hr>
                                                <div class=" text-center text-sm"><span class="font-bold">Election Start
                                                        Time:</span><?php echo $row['election_start_time']; ?></div>
                                                <hr>
                                                <div class=" text-center text-sm"><span class="font-bold">Election End
                                                        Date:</span><?php echo $row['election_end_date']; ?></div>
                                                <hr>
                                                <div class=" text-center text-sm pb-2"><span class="font-bold">Election
                                                        End Time :</span><?php echo $row['election_end_time']; ?></div>

                                                <div class=" text-center text-sm"><input type="button"
                                                        style="background-color:#0000FF" value="SELECT"> </button></div>

                                            </label>
                                            <hr class="pt-1">
                                        </figure>

                                        <?php
             }
                 
?>



                            </div>
                            </a>


                        </tbody>

                    </table>


            </fieldset>
    </div>
    </main>

</body>

</html>