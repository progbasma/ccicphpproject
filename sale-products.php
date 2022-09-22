<?php
include('includes/header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM products WHERE `sale_percent` > 0 ORDER BY `sale_percent` DESC";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $saleproducts = $stmt->fetchAll();
} catch (PDOException $e) {
    $message = $e->getMessage();
}

$conn = null;
?>
<section class="contact_area section_gap_top">
    <div class="container">
        <h1 class="section_gap_bottom text-center">All products with sale</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    if ($saleproducts) :
                        foreach ($saleproducts as $product) :
                    ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="images/<?php echo $product['photo'] ?>" alt="">
                                    <div class="product-details">
                                        <h6><?php echo $product['name'] ?></h6>
                                        <div class="price">
                                            <h6><?php echo $product['price'] ?></h6>
                                            <h6 class="l-through">$210.00</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="#" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Wishlist</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">compare</p>
                                            </a>
                                            <a href="single-product.php?productid=<?php echo $product['id'] ?>" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">view more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("includes/dealsoftheweak.php");
?>
<?php
include('includes/footer.php');
?>