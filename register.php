<?php
include("includes/header.php");
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO `users` (`email`, `password`, `firstname`, `lastname`, `Phone`) VALUES (:email,:password,:fname,:lname,:phone)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $pass);
		$stmt->bindParam(':phone', $phone);
		
		$stmt->execute();
		echo "<script> alert('You have been registered');</script>";
	} catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage()." ". $e->getLine();
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
					<form class="row login_form" action="register.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="fname" name="fname" placeholder="First name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'">
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Register</button>
						</div>
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