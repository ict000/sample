<?php 
session_start();

	include("connection.php");
	include("functions.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		//username if exist!

				function usernameExists($user_name) {
					global $con;
					$query = "SELECT COUNT(*) as count FROM user_db WHERE user_name = '$user_name'";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result);
						return $row['count'] > 0;				
				}
				$submittedUsername = $_POST['user_name'];

				if(usernameExists($submittedUsername)) {
					echo('Access denied. Username already exists.');
					die;
				}

		//store inside mysql		

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !is_numeric($password))
		{
			
			//save to database
			$user_id = random_num(20);
			$query = "insert into user_db (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signin</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .toggle-container {
            display: inline-block;
        }

        .toggle-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

        <!-- Sign up form -->
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Signup</h2>		
						
						
                    		    <form method="post">                       
								<div class="form-group">
								    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								    <input type="text" name="user_name" placeholder="Your Name" required/>
								</div>
								<div class="form-group">
								    <label for="email"><i class="zmdi zmdi-email"></i></label>
								    <input type="email" name="user_email" placeholder="Your Email" />
								</div>
								<div class="form-group">
								    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
								    <input type="password" name="password" placeholder="Password" />
								</div>
								<div class="form-group">
								    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
								    <input type="password" name="repeat_password" placeholder="Repeat your password" />
								</div>
								<div class="form-group">
								    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
								    <label for="agree-term" class="label-agree-term">
								        <span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a>
								    </label>
								</div>
								<div class="form-group form-button">
								    <input  class="form-submit" onclick="onc()" type="Submit" name="signup" id="button" class="form-submit" value="Signup" />
								</div>
                   		 </form>
                	</div>
         	   </div>
  		  </div>





    <Script>

        function onc() {
            //alert("Sorry: this page is under maintenance!");
            window.location.href = "login.php";
        }
    </Script>
</body>
</html>

