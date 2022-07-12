<?php include("./Connection.php") ?>
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/2.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				<form action="" method="Post" class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="Fullname" placeholder="Full Name">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Phone </span>
						<input class="input100" type="text" name="phone" placeholder="Enter you Phone Number">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Village</span>
						<select name="village" class="form-control" id="">
                            <option value="" selected Disabled> Select Your Village</option>
                            <?php
                                $query = "SELECT * FROM `village` ORDER BY `villageID` ASC";
                                $result = mysqli_query($conn, $query);
                                
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row["villageID"] ?>"><?php echo $row["villageName"] ?></option>
                            <?php } ?>
                        </select>
						<!-- <span class="focus-input100"></span> -->
					</div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Plan</span>
						<select name="plan" class="form-control" id="">
                            <option value="" selected Disabled> Choose Your Plan</option>
                            <option value="family">Family</option>
                            <option value="Big family">Big Family</option>
                            <option value="Enterprise">Enterprise</option>
                        </select>
						<!-- <span class="focus-input100"></span> -->
					</div>


					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
                    

					

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="btn-Add">
							Sign Up
						</button>
					</div>
				<center style="color: rgba(57, 52, 52, 0.817); margin-top: 15px;">Already have account?<a href="./index.php"> Log in</a></center>
					
				</form>

                <?php

                if(isset($_POST['btn-Add'])){
                    $Fullname = mysqli_real_escape_string($conn, $_POST["Fullname"]);
                    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
                    $village = mysqli_real_escape_string($conn, $_POST["village"]);
                    $plan = mysqli_real_escape_string($conn, $_POST["plan"]);
                    $username = mysqli_real_escape_string($conn, $_POST["username"]);
                    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
                    $status = "pending";
                    // $status = mysqli_real_escape_string($conn, $_POST["RegionName"]);
                    

                    $insert = mysqli_query($conn, "INSERT INTO `customer` VALUES (Null,'$Fullname','$phone','$village','$plan','$username','$pass','$status')");
                    if($insert){
                        echo '<script>
                        window.location.replace("./index.php");
                            
                        </script>';
                    }else{
                        echo"Make sure you do not add the same Employee twice..";
                    }

                }
                
                ?>
				
					
				
			</div>
		</div>
	</div>
	
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

</body>
</html>
