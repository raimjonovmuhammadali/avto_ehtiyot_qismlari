<?php include 'inc/header.php'; ?>
<section id="home" class="welcome-hero">



	<div class="container">
		<div class="welcome-hero-txt">
			<h2>O'zbekiston bo'yicha Avto ehtiyot qismlar</h2>
			<p>
				CarSpare O'zbekiston bo'yichagi Avto ehtiyot qismlar bo'yicha eng yaxshi takliflarni taqdim etadi.
			</p>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="model-search-content">
					<form action="">
						<div class="row" style="display: flex ; justify-content: space-between; align-items: center;">
							<div class="form-group col-md-8">
								<div class="single-model-search">
									<h2>CarSpareda qidirish</h2>
									<div class="form-group">
										<input class="form-control" type="text" name="search" placeholder="Izlash..." id="search" />
									</div><!-- /.model-select-icon -->
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</section><!--/.welcome-hero-->
<!--welcome-hero end -->


<!--featured-cars start -->
<section id="featured-cars" class="featured-cars">
	<div class="container">
		<div class="featured-cars-content">
			<div class="row" id="searchresult">
				<?php
				include './inc/db.php';

				$stmt = $conn->prepare("SELECT * from products ORDER BY id DESC");
				$stmt->execute();
				$products = $stmt->fetchAll();

				$msg = '';
				if (count($products) == 0) {
					$msg = "Mahsulotlar mavjud emas";
				} else {
					$i = 0;
					foreach ($products as $row) {
						$i = $i + 1;
				?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box" >
									<div class="featured-cars-img" style="overflow: hidden !important;">
										<a href="product-detail.php?id=<?= $row['id']; ?>"><img src="./panel/products/<?= $row['img']; ?>" alt="cars"></a>
									</div>
									<div class="featured-model-info">
										<p>
											<?= $row['model']; ?>
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="product-detail.php?id=<?= $row['id']; ?>"><?= $row['name']; ?></a></h2>
									<h3><?= $row['price']; ?></h3>
									<p>
										<?= $row['description']; ?>
									</p>
								</div>
							</div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.featured-cars-->
<!--featured-cars end -->

<!--brand strat -->
<section id="brand" class="brand">
	<div class="container">
		<div class="brand-area">
			<div class="owl-carousel owl-theme brand-item">
				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br1.png" alt="brand-image" />
					</a>
				</div><!--/.item-->
				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br2.png" alt="brand-image" />
					</a>
				</div><!--/.item-->
				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br3.png" alt="brand-image" />
					</a>
				</div><!--/.item-->
				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br4.png" alt="brand-image" />
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br5.png" alt="brand-image" />
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#">
						<img src="assets/images/brand/br6.png" alt="brand-image" />
					</a>
				</div><!--/.item-->
			</div><!--/.owl-carousel-->
		</div><!--/.clients-area-->

	</div><!--/.container-->

</section><!--/brand-->
<!--brand end -->

<!--blog start -->
<section id="blog" class="blog"></section><!--/.blog-->
<!--blog end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			var input = $(this).val();
			// alert(input)

			if(input != ""){
				$.ajax({
					url: "livesearch.php",
					method: "POST",
					data:{input:input},

					success:function(data){
						$('#searchresult').html(data);
					}
				})
			}
		})
	})
</script>
<?php include 'inc/footer.php'; ?>
