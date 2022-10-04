<?php

// Declare and define two dates
$date1 = strtotime("+3 weeks -3days +2hours +30mins +30secs");
$date2 = strtotime("next friday +1hours +30mins +30secs");

// Formulate the Difference between two dates
$diff = abs($date2 - $date1);


// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
$years = floor($diff / (365*60*60*24));

// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
$months = floor(($diff - $years * 365*60*60*24)
								/ (30*60*60*24));

// To get the day, subtract it with years and
// months and divide the resultant date into
// total seconds in a days (60*60*24)
$days = floor(($diff - $years * 365*60*60*24 -
			$months*30*60*60*24)/ (60*60*24));

// To get the hour, subtract it with years,
// months & seconds and divide the resultant
// date into total seconds in a hours (60*60)
$hours = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24)
									/ (60*60));

// To get the minutes, subtract it with years,
// months, seconds and hours and divide the
// resultant date into total seconds i.e. 60
$minutes = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
							- $hours*60*60)/ 60);

// To get the minutes, subtract it with years,
// months, seconds, hours and minutes
$seconds = floor(($diff - $years * 365*60*60*24
		- $months*30*60*60*24 - $days*60*60*24
				- $hours*60*60 - $minutes*60));


?>

<?php
include("includes/homeheader.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
	$stmt = $conn->prepare($sql);

	$stmt->execute();
	$latestproduct = $stmt->fetchAll();

	$sql2 = "SELECT * FROM products ORDER BY `sale_percent` DESC LIMIT 8";
	$stmt2 = $conn->prepare($sql2);

	$stmt2->execute();
	$saleproducts = $stmt2->fetchAll();
} catch (PDOException $e) {
	$message = $e->getMessage();
}

$conn = null;

?>
<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon1.png" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
							<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
							<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c3.jpg" alt="">
							<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Product for Couple</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
							<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-deal">
					<div class="overlay"></div>
					<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
					<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
						<div class="deal-details">
							<h6 class="deal-title">Sneaker for Sports</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				foreach ($latestproduct as $product) :
				?>
					<!-- single product -->

					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="images/<?php echo $product['photo'] ?>" alt="">
							<div class="product-details">
								<h6><?php echo $product['name'] ?>
								</h6>
								<div class="price">
									<h6><?php echo $product['price'] ?></h6>									
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
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
				?>
				<a href="latest-products.php" class="primary-btn text-center col-md-12 rounded border-0">All Latest products</a>
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Sale Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				if ($saleproducts) :
					foreach ($saleproducts as $item) :
						
				?>
						<!-- single product -->
						<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="images/<?php echo $item['photo']; ?>" alt="">
								<div class="product-details">
									<h6><?php echo $item['name']; ?></h6>
									<div class="price">
										<h6>$<?php
												$saleprice = $item['price'] * ((100 - $item['sale_percent']) / 100);
												echo number_format($saleprice, 2);
												?></h6>
										<h6 class="l-through">$<?php echo $item['price']; ?></h6>
									</div>
									<div class="prd-bottom">

										<a href="" class="social-info">
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
										<a href="single-product.php?productid=<?php echo $item['id']; ?>" class="social-info">
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
				<a href="sale-products.php" class="primary-btn text-center col-md-12 rounded border-0">All sale products</a>
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->

<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 no-padding exclusive-left">
				<div class="row clock_sec clockdiv" id="clockdiv">
					<div class="col-lg-12">
						<h1>Exclusive Hot Deal Ends Soon!</h1>
						<h1 class="text-center"> 20% </h1>
					</div>
					<div class="col-lg-12">
						<div class="row clock-wrap">
					
							<div class="col clockinner1 clockinner">
								<h1 class="days"><?php echo $days?></h1>
								<span class="smalltext">Days</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="hours"><?php echo $hours?></h1>
								<span class="smalltext">Hours</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="minutes"><?php echo $minutes?></h1>
								<span class="smalltext">Mins</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="seconds"><?php echo $seconds?></h1>
								<span class="smalltext">Seconds</span>
							</div>
							
						</div>
					</div>
				</div>
				<a href="category.php" class="primary-btn">Shop Now</a>
			</div>
			<div class="col-lg-6 no-padding exclusive-right">
				<div class="active-exclusive-product-slider">
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<img class="img-fluid" src="img/product/e-p1.png" alt="">
						<div class="product-details">
							<div class="price">
								<h6>$150.00</h6>								
							</div>
							<h4>addidas New Hammer sole
								for Sports person</h4>
							<div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div>
						</div>
					</div>
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<img class="img-fluid" src="img/product/e-p1.png" alt="">
						<div class="product-details">
							<div class="price">
								<h6>$150.00</h6>								
							</div>
							<h4>addidas New Hammer sole
								for Sports person</h4>
							<div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End exclusive deal Area -->



<!-- Start related-product Area -->
<?php
include("includes/dealsoftheweak.php");
?>
<!-- End related-product Area -->
<?php
include("includes/footer.php");
?>