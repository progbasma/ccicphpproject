<?php
include('includes/header.php');
?>
<section class="login_box_area section_gap">
	<div class="container forgotpassword">
		<div class="row">			
			<div class="col-lg-8">
				<div class="login_form_inner">
					<h1>Forgot Your Password?</h1>
					<form class="row login_form" style="max-width: 800px;" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
						<div class="col-lg-12 form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-lg-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include('includes/footer.php');
?>