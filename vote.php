<?php
	require_once('session.php');
	require_once('checkelection.php');
	
	if(isset($_GET['id'])){
	$id=$_GET['id'];
   $_SESSION['electionid']=$_GET['id'];
    }else{
	  header('location: home.php');
	}
	
	require_once('checkifvoted.php');
	include('conn.php');
	include 'head.php';
	
?>
<html>
<head>
<title>WELCOME <?php echo $_SESSION['voter']; ?></title>
<link rel="icon" type="image/png" href="favicon.png" />
 <link href="css/style.css" rel="stylesheet">
  <link href="css/cs.css" rel="stylesheet">

</head>
<body>

<p class="fs-title font-bold text-center "> Election Title:
<span class="fs-title font-bold text-center " style="color:#0066CC">
<?php 

	$results = $conn->prepare("SELECT * FROM election WHERE election_id= :erid");
	$results->bindParam(':erid', $id);
				$results->execute();
		$row = $results->fetch(PDO::FETCH_ASSOC);
		echo $row['election_title'];


?>
</span></p>
	
<form id="msform"  action="preview.php" method="POST" onSubmit="">
	
	<input type="hidden" name="election" value="<?php echo $id; ?> " />
	
	
	<?php
	//$resultasa = $conn->prepare("SELECT * FROM positions ORDER BY priority ASC");
	$resultasa = $conn->prepare("SELECT * FROM positions WHERE election_id=:id ");
	$resultasa->bindParam(':id',$id);
		$resultasa->execute();
		 $rows =$resultasa->rowCount();
		if($rows==0){
		
	?>
		<fieldset>
<center>		<h2 class="fs-title">Sorry there are no positions or candidates for this election </h2>
		<a href="home.php"><input type="button" value="CHOOSE ANOTHER ELECTION" class="previous actio-button" style="width:30%"> </a>
</center>
	</fieldset>
	
		<?php
		}
		
		for($i=0; $rowasa = $resultasa->fetch(); $i++){

		
		$exrxrxrx=$rowasa['position_description'];

		
		if($exrxrxrx== 'chairman'){
		?>
		

	<fieldset>
	
	
	
		<h2 class="fs-title font-bold text-center "><?php echo $rowasa['position_description']; ?></h2>

		<hr/>
		
		<input type="button" value="Next" class="next actio-button"  description="next">
		
		<hr/>
		
		
		<div class="flex flex-wrap -mx-1 lg:-mx-4 pt-10"> 
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    
                  
                    </tr>
                  </thead>
				 
				  	 <?php
					 $dsds=$rowasa['position_id'];
		$results = $conn->prepare("SELECT * FROM candidates WHERE position_id= :a");
			$results->bindParam(':a', $dsds);
			 		$results->execute();
										while($row = $results->fetch(PDO::FETCH_ASSOC)){
											
					
											?>
													
											<?php
											$pos=$row['user_id'];
		$results1 = $conn->prepare("SELECT * FROM users WHERE user_id= :a");
			$results1->bindParam(':a', $pos);
			 		$results1->execute();
					$row2 = $results1->fetch(PDO::FETCH_ASSOC);
					
					?>
						
											
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  
                         <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg ">

 
      <figure class="parent">
      <label id="styleinput">
               <input type="radio" name="<?php echo $rowasa['position_description'] ?>" value="<?php echo $row['user_id']; ?> " />
                     <div class=" text-center mb-2"><span class="font-bold">Name:</span> <?php echo $row2['firstname']; ?> <?php echo $row2['lastname']; ?></div>
		  <img class="w-40 h-40 rounded-full mx-auto" src="img/candidate/<?php echo $row2['photo']; ?>" alt="" width="400" height="680">
  
        <span class="overlay-image"></span>
                   
          
					   <div class=" font-bold text-center">Bio- Info</div>
		 <div class="pt-0 text-center space-y-2">
          <?php echo $row['bio_info']; ?>
        </div>
      </label>
    </figure>
              
<?php
             }
                 
?>


</div>
 
       </tbody>
			
    </table>
		
		
		
	</fieldset>
	
	
	
	
	<?php
	}
	
	if(($exrxrxrx!='chairman') ){
	

	?>
	
	
	<fieldset>
		<h2 class="fs-title font-bold text-center "> <?php echo $rowasa['position_description'] ?></h2>
	<?php
		 $dsds=$rowasa['position_id'];
		$results = $conn->prepare("SELECT * FROM candidates WHERE (position_id= :a) AND (election_id=:id)");
		//	$results->bindParam(':a', $dsds);
			$results->execute(array(':a'=>$dsds,':id'=>$id));
	              $row = $results->rowCount();
			 		
					
					if($row==0){
					?>
					<h2 class="fs-title text-center">Sorry there are no candidates for this election </h2>
		
					<?php
					
					}
				?>
	
	
	<hr/>
		<input type="button" value="Previous" class="previous act-button" description="previous"> 
		
		<input type="button" value="Next" class="next action-button" description="next">
		
		<hr/>
		
		
	
		<div class="flex flex-wrap -mx-1 lg:-mx-4"> 
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                                 
                    </tr>
                  </thead>
				 
				  	 <?php
				
										while($row = $results->fetch(PDO::FETCH_ASSOC)){
											
											?>
											<?php
											$pos=$row['user_id'];
		$results1 = $conn->prepare("SELECT * FROM users WHERE user_id= :a");
			$results1->bindParam(':a', $pos);
			 		$results1->execute();
					$row2 = $results1->fetch(PDO::FETCH_ASSOC);
					?>
											
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  
                         <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg ">

        <figure class="parent">
      <label id="styleinput">
              <input type="radio" name="<?php echo $rowasa['position_description'] ?>" value="<?php echo $row2['user_id']; ?> " />
                     <div class=" text-center mb-2"><span class="font-bold">Name:</span> <?php echo $row2['firstname']; ?> <?php echo $row2['lastname']; ?></div>
					 
					 
					 
		  <img class="w-40 h-40 rounded-full mx-auto" src="img/candidate/<?php echo $row2['photo']; ?>" alt="" width="400" height="680">
  
        <span class="overlay-image  rounded-full "></span>
                   
          
					   <div class=" font-bold text-center">Bio- Info</div>
		 <div class="pt-0 text-center space-y-2">
          <?php echo $row['bio_info']; ?>
        </div>
      </label>
    </figure>
         
<?php
             }
			
                 
?>
</div>
  
                  </tbody>
				     
                </table>
		

	</fieldset>
	<?php
	}
	
	
	}
	?>
	<fieldset>
		<h2 class="fs-title">You Are done voting would you like to proceed to preview before submitting?</h2>
		<input type="button" value="GO BACK TO VOTE" class="previous actio-button" description="previous">
		<input type="submit" value="Preview" description="submit" id="submit">
	</fieldset>
	
	
</form>
<!-- jQuery -->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<!-- jQuery easing plugin -->
<script type="text/javascript" src="js/jquery.easing.min.js"></script><script>//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
</script>
</body>
</html>