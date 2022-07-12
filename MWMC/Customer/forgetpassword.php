<?php include("./Connection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="../toastr/build/toastr.min.css">
<style>
	.hided{
		display: none;
	}
	.show{
		display: block;
	}
</style>
</head>
<body >
	
	<div class="limiter">
		<div class="container-login100">
			
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
				
					<span class="login100-form-title-1">
						Forget password
					</span>
				</div>
				<center style="margin-top:15px; color:red;" >

				<?php

                if(isset($_POST['btn-login'])){
                    
                    $name = $_POST['username'];
					$phone = $_POST['phone'];
					$passw = $_POST['pass'];

					$user = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$name' AND CustomerTell = '$phone' ");
					if ($user) {
						if (mysqli_num_rows($user) > 0) {
							$us = mysqli_fetch_array($user);
							$usern = $us['username'];
							$_SESSION['username'] = $usern;

							$Id = $us['customerID'];
							

							if($us['customerStatus'] == "Active"){
                                $update = mysqli_query($conn, " UPDATE `customer` SET `password`='$passw' WHERE `customerID`='$Id'");
                                if($update){
                                    echo "<script>window.location='./index.php'</script>";
                                }
							}elseif($us['customerStatus'] == "pending"){
								echo 'Your Account Is Pending, Plaese contact to the support Team';
							}else{
								echo 'your account is Deactivated';
							}

							
						}else {
							echo 'Account Not Found';
						}
					} 
                }
                
                ?>
			
			</center>
				<form action="" method="POST" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "phone number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="text" name="phone" placeholder="Enter phone number">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter new password">
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn-login">
							Change Password
						</button>
					</div>
				<center style="color: rgba(57, 52, 52, 0.817); margin-top: 15px;">Password Remembed?<a href="./index.php"> login</a></center>
					
				</form>
				
				
				
					
				
			</div>
		</div>
	</div>
	<script src="./jquery.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="../toastr/build/toastr.min.js"></script>

	<script>
		window.onload =function(){
			
		let eror = document.getElementById("showEror")
		eror.classList.add("hided")
		eror.classList.remove("show")
	}
	
</script> 

</body>
</html>

