<?php
include("includes/header.php");


?>
<div class="container p-5">

    <?php
    if(isset($_GET['message'])):
        $errormessage=$_GET['message'];


    ?>
    <p class="container bg-danger text-light text-center p-5">



    <?php
    echo $errormessage;


    
    ?>
    
    </p>


    <?php
     endif;
     
    ?>
</div>


<?php
include("includes/footer.php");
?>