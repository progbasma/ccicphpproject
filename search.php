<?php
include('includes/header.php');
if (isset($_GET['searchtext'])) {
	$_GET['searchtext'] = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $_GET['searchtext']);
	        $_GET['searchtext'] = preg_replace('#</*\w+:\w[^>]*+>#i', '', $_GET['searchtext']);


	$searchtext = htmlspecialchars( $_GET['searchtext']);
	        
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ecomm";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM `products` WHERE `name`LIKE :productname";
		$stmt = $conn->prepare($sql);
		$searchtext = '%' . $searchtext . '%';
		$stmt->bindParam(':productname', $searchtext);

		$stmt->execute();
		$data = $stmt->fetchAll();
	} catch (PDOException $e) {
		$message = $e->getMessage();
	}

	$conn = null;
}
?>
<section class="contact_area section_gap_bottom">
	<div class="container">
		<div class="row">
			<?php
			if ($data) :
				foreach ($data as $product) :
			?>
					<div class="col-lg-4 col-md-6">
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
			else :
				?>
				<div class="container p-md-5 p-3">
					<p class="text-center p-3 text-dark fw-bold">no such a thing called <?php echo htmlspecialchars( $_GET['searchtext']) ?> </p>
				</div>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
<?php
include('includes/footer.php');
?>