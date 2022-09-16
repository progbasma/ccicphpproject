<?php
include("includes/header.php");
?>
<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$loginemail = $_POST['email'];
	$loginpassword = $_POST['password'];

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM `users` WHERE email=:loginemail";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':loginemail', $loginemail);

		$stmt->execute();
		$user = $stmt->fetch();
		if ($user) {
			if ($user['password'] == $loginpassword) {
				$_SESSION['user'] = $user;
				header('location:index.php');
			} else {
				$message = "Wrong password , you forget password?";
			}
		} else {
			$message = "this email not foud , create a new user ";
		}
		
	} catch (PDOException $e) {
		$message = $e->getMessage();
	}
	$conn = null;
}
?>
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="img/login.jpg" alt="">
					<div class="hover">
						<h4>New to our website?</h4>
						<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						<a class="primary-btn" href="register.php">Create an Account</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner" style="padding-top: 115px;">
					<h3>Log in to enter</h3>
					<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Log In</button>
							<a href="#">Forgot Password?</a>
						</div>
						<?php
						if ($message != "") :
						?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?php
								echo $message;
								?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php
						endif;
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->
<?php
include("includes/footer.php");
?>