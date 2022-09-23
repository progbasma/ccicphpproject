<?php
$message="";
include('includes/header.php');
if(isset($_GET['message']))
{
    $message=$_GET['message'];

}
?>
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="img/password.jpg" alt="">
                    <div class="hover">
                        <h4>Forgot your password?</h4>
                        <p>No problem your can change your password with your email</p>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="login.php">Login as exist user</a>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="register.php">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner" style="padding-top: 80px">
                    <h5 style="width: 70%; margin: 10px auto">Enter the email of your account for which you want to change the password</h5>
                    <form class="row login_form" action="a.php" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="col-lg-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Send</button>
                        </div>
                        <div class="continer text-danger"><?php echo $message;?></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('includes/footer.php');
?>