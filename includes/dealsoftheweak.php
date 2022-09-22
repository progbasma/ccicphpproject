<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

try {
    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql2 = "SELECT COUNT(details.sales_id),details.product_id,products.id,products.name,products.price,products.photo
 FROM details INNER JOIN sales ON sales.id=details.sales_id INNER JOIN products ON products.id=details.product_id WHERE sales.sales_date>='2022-09-10'
 GROUP BY details.product_id ORDER BY COUNT(details.sales_id) DESC LIMIT 9;";
    $stmt2 = $conn2->prepare($sql2);

    $stmt2->execute();
    $dealsoftheweek = $stmt2->fetchAll();
} catch (PDOException $e) {
    $message = $e->getMessage();
}

$conn = null;

?>
<section class="related-product-area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Deals of the Week</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php
                    foreach ($dealsoftheweek as $x) :
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="single-product.php?productid=<?php echo $x['id'];?>"><img style="width:100px" src="images/<?php echo $x['photo'] ?>" alt=""></a>
                                <div class="desc">
                                    <a href="single-product.php?productid=<?php echo $x['id'];?>" class="title"><?php echo $x['name'] ?></a>
                                    <div class="price">
                                        <h6><?php echo $x['price'] ?></h6>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>