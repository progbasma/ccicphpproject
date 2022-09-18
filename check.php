<?php
include('includes/header.php');
?>
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="img/password.jpg" alt="">
                    <div class="hover">
                        <h4>OTP Number? what is that?</h4>
                        <p>It's the number we sent to your account email to change your password</p>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="login.php">Login as exist user</a>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="register.php">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner" style="padding-top: 80px">
                    <h4 style="width: 70%; margin: 10px auto">Enter the code we have sent to your account to reset your password</h4>
                    <form class="row login_form" action="changepassword.php" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="col-lg-12 form-group">
                            <input type="text" class="form-control" id="checkcode" name="code" placeholder="OTP Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'OTP Number'">
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Check</button>
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