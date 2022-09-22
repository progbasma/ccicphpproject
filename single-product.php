<?php
include("includes/header.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";
$data3=[];

if (isset($_GET["productid"])) :



	$proid = $_GET["productid"];
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT products.id,products.name,products.description,products.price,products.photo,products.counter,products.category_id,category.name AS 'cate_name' FROM `products` INNER JOIN category ON products.category_id = category.id WHERE products.id=:productid;";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':productid', $proid);

		$stmt->execute();
		$data = $stmt->fetch();


		$catid=$data['category_id'];
		$sql3 = "select * from products where category_id =:categoryid";
		$stmt3= $conn->prepare($sql3);
		$stmt3->bindParam(':categoryid', $catid);

		$stmt3->execute();
		$data3 = $stmt3->fetchAll();


		
	} catch (PDOException $e) {
		$message = $e->getMessage();
	}
	try {
	$conn2= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql2="SELECT COUNT(details.sales_id),details.product_id,products.id,products.name,products.price,products.photo
 FROM details INNER JOIN sales ON sales.id=details.sales_id INNER JOIN products ON products.id=details.product_id WHERE sales.sales_date>='2022-09-10'
 GROUP BY details.product_id ORDER BY COUNT(details.sales_id) DESC LIMIT 9;";
$stmt2 = $conn2->prepare($sql2);

$stmt2->execute();
$dealsoftheweek=$stmt2->fetchAll();




//echo "record deleted successfully ";
} catch(PDOException $e) {
$message= $e->getMessage();
}

	$conn = null;

?>
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="images/<?php echo $data['photo'];?>" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="images/<?php echo $data['photo'];?>" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="images/<?php echo $data['photo'];?>" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3><?php echo $data['name'];?></h3>
					<h2>$<?php echo $data['price'];?></h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category</span> : <?php echo $data["cate_name"];?></a></li>
						<li><a href="#"><span>Availibility</span> 
						<?php 
						if( $data['counter'] > 0):
						?>
						<span style="color: green">
						: In Stock
						</span>
						<?php 
						else:
						?>
						<span style="color: red">
						: Out Of Stock
						</span>
						<?php 
						endif;
						?>
					</a></li>
					</ul>
					<?php echo $data["description"]?>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
					</div>
					<div class="card_area d-flex align-items-center">
						<a class="primary-btn" href="#">Add to Cart</a>
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
						<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>		
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<?php echo $data["description"]?>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
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

foreach($dealsoftheweek as $x):
						 ?>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img style="width:100px" src="images/<?php echo $x['photo']?>" alt=""></a>
								<div class="desc">
									<a href="#" class="title"><?php echo $x['name']?></a>
									<div class="price">
										<h6><?php echo $x['price']?></h6>
										<h6 class="l-through">$210.00</h6>
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
<!-- End related-product Area -->




<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Related products</h1>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
			<?php 

foreach($data3 as $x):
						 ?>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img style="width:100px" src="images/<?php echo $x['photo']?>" alt=""></a>
								<div class="desc">
									<a href="#" class="title"><?php echo $x['name']?></a>
									<div class="price">
										<h6><?php echo $x['price']?></h6>
										<h6 class="l-through">$210.00</h6>
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
<!-- End related-product Area -->


<?php
else:
?>
<div class="container p-5 text-center"><p> No product selected</p></div>

<?php
endif;

?>





<?php
include("includes/footer.php");
?>