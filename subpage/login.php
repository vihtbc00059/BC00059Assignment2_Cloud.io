<?php
    $info = "";
    if(isset($_POST['btnLogin'])){
        $username = $_POST['login_email'];
        $password = $_POST['login_password'];
        
        $sql = "SELECT * FROM user WHERE user_email='$username' AND user_password=MD5('$password')";
        $result = $conn -> query($sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row;
            header("Location: index.php");
        }
        else{
            $info = "Login failed!";
        }
    }
	else if(isset($_POST['registrationBtn'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        $sql = "INSERT INTO user(user_fullname, user_email, user_password, user_address)
                VALUES('$fullname', '$email', md5('$password'), '$address')";
		
        $result = $conn -> query($sql);

        if($result){
            header("Location: index.php");
        }
    }
?>
<section id="form" style="margin-top: 15px;"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="" method="POST">
						<input type="email" name="login_email" id="login_email" placeholder="Input email">
						<input type="password" name="login_password" id="login_password" placeholder="Input password">
						<button type="submit" name="btnLogin" class="btn btn-default">Login</button>
					</form>
					<?php echo $info; ?>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="" method="POST" onsubmit="return checkUserRegistration()">
						<input type="fullname" name="fullname" id="fullname" placeholder="Input Fullname" autocomplete="off" >
						<input type="email" name="email" id="email" placeholder="Email Address" autocomplete="off" >
						<input type="password" name="password" id="password"  placeholder="Password" autocomplete="off" >
						<input type="password" name="password2" id="password2" placeholder="Retype password" autocomplete="off" >
						<input type="text" name="address" id="address" autocomplete="off" placeholder="Input Address">
						
						<button type="submit" id="registration" name="registrationBtn" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
<script src="JavaScript/JSscript.js"></script>
