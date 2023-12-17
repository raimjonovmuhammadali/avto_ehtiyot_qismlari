<?php include 'inc/header.php'; include 'inc/db.php'; ?>
<?php


if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$stmt = $conn->prepare("SELECT * from products WHERE id = ?");
	$stmt->execute([$id]);
	$products = $stmt->fetch();
}


?>
<!--new-cars start -->
<section class="new-cars">
	<div class="container">
		<div class="section-header">
			<p>Mahsulot haqida <span>va</span> sotib olish</p>
			<h2>Sotib olish</h2>
		</div><!--/.section-header-->
		<div class="new-cars-content">
			<div class="owl-carousel owl-theme" id="new-cars-carousel">
				<div class="new-cars-item">
					<div class="single-new-cars-item">
						<div class="row">
							<div class="col-md-7 col-sm-12">
								<div class="new-cars-img" style="height: 400px; display: flex; justify-content: center; align-items: center;">
									<img src="panel/products/<?=$products['img'];?>" alt="img" />
								</div><!--/.new-cars-img-->
							</div>
							<div class="col-md-5 col-sm-12">
								<div class="new-cars-txt">
									<h2><a href="#"><?=$products['name'];?></a></h2>
									<p>
									<?=$products['description'];?>
									</p>
									<p class="new-cars-para2 mb-2">
									<?=$products['price'];?> so'm | Mavjud <?=$products['product_count'];?> ta
									</p>
									<form action='checkout.php' method="POST">
									<input type="hidden" name="id" value="<?=$products['id'];?>">
										<div class="row" style="display: flex; gap: 10px; margin: 15px 5px 0 0;">
											<div class="form-group">
												<input type="radio" name="chec" id="check" value="saboy" checked>
												<label for="check">Olib ketish</label>
											</div>
											<div class="form-group">
												<input type="radio" name="chec" id="ch" value="dostovka">
												<label for="ch">Yetkazib berish</label>
											</div>
										</div>
										<div class="form-group">
										<small id="emailHelp" class="form-text text-muted">Yetkazib berish xizmati 20 000  so'm</small>
										</div>
										<div class="out" style="display: flex; align-items: center; gap: 10px;">
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												Sotib olish
											</button>
											<input type="number" class="form-control welcome-btn new-cars-btn" min="1" max="<?=$products['product_count'];?>" value="1" style="background-color: white; color: black;" name="count">
										</div>

									</form>
								</div><!--/.new-cars-txt-->
							</div><!--/.col-->
						</div><!--/.row-->
					</div><!--/.single-new-cars-item-->
				</div><!--/.new-cars-item-->
			</div><!--/#new-cars-carousel-->
		</div><!--/.new-cars-content-->
	</div><!--/.container-->

</section><!--/.new-cars-->
<!--new-cars end -->


<?php include 'inc/footer.php'; ?>