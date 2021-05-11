<?php
session_start();
  if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EVP Voting System</title>

    <meta name="description" content="">

    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
     
    </style>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">EVP</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Welcome to EVP</h3>
            <p class="text-gray-600 pt-2 content-center">
			
			 	<?php
  		if(isset($_SESSION['error'])){
  			echo "
			<button class='container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative' role='alert'>".$_SESSION['error']."
<span class='absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton'>
				<svg class='fill-current h-6 w-6 text-white' role='button' xmlns='http://www.w3.org/2000/svg'
					viewBox='0 0 20 20'>
					<title>Close</title>
					<path
						d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z' />
				</svg>
			</span>
			</button>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
	
			</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="login.php">
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="text" name="voter" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                </div>
     
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg  hover:shadow-xl transition duration-200" type="submit" name="login">Log In</button>
		
            </form>

				        </section>
						
    </main>

    <footer class="max-w-lg mx-auto flex justify-center text-white">
  
    </footer>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
	integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
	</script>
	<script>
$(".closealertbutton").click(function (e) {
    // $('.alertbox')[0].hide()
    // e.preventDefault();
    pid = $(this).parent().parent().hide(500)
    console.log(pid)
    // $(".alertbox", this).hide()
})
</script>