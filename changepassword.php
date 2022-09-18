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
                        <h5 style="color: white; margin-bottom: 20px;">Do you have account or want to Create new one?</h5>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="login.php">Login as exist user</a>
                        <a class="primary-btn" style="display: block; width: 50%; margin: 10px auto" href="register.php">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner" style="padding-top: 40px">
                    <h4 style="width: 70%; margin: 10px auto">Enter the code we have sent to your account to reset your password</h4>
                    <form class="row login_form" action="login.php" method="post" id="contactForm" onsubmit="return(validate());">
                        <div class="col-lg-12 form-group">
                            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="New password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New password'">
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" class="form-control" id="pass2" name="pass1" placeholder="Confirm new password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm new password'">
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let fpass = document.querySelector('#pass1');
    let lpass = document.querySelector('#pass2');

    function validate() {
        if(fpass.value != lpass.value){
            alert("Password and confirm password are not same")
            return(false);
        }
        
        return (true);
    }
</script>
<?php
include('includes/footer.php');
?>