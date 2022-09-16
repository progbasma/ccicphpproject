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
				<div class="login_box_img" style="height: 100%;">
					<img class="img-fluid" style="height: 100%;" src="img/login.jpg" alt="">
					<div class="hover">
						<h4>Already have an account?</h4>
						<p>You can login with your account instead of registering again</p>
						<a class="primary-btn" href="Login.php">Login</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Register as a new user</h3>
					<form class="row login_form" style="max-width: 800px;" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
						<div class="col-lg-12 form-group">
							<input type="text" class="form-control" id="fname" name="fname" placeholder="First name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First name'">
						</div>
						<div class="col-lg-12 form-group">
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last name'">
						</div>
						<div class="col-lg-12 form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-lg-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-lg-12 form-group">
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'">
						</div>
						<div class="col-lg-12 form-group">
							<label for="gender" style="display: block;text-align: left;margin-left: 15px;font-size: 16px;">Your gender</label>
							<select name="gender" class="form-control" id="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-lg-12 form-group">
							<label for="uploadedphoto" style="display: block;text-align: left;margin-left: 15px;font-size: 16px;">Your photo</label>
							<input type="file" class="form-control" name="photo" id="uploadedphoto" style="cursor:pointer;">
						</div>

						<div class="col-lg-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Register</button>
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