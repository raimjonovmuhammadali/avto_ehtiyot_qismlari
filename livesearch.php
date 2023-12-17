<?php

include 'inc/db.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $stmt = $conn->prepare("SELECT * from products WHERE name LIKE '{$input}%' OR model LIKE '{$input}%'");
    $stmt->execute();
    $products = $stmt->fetch();
    $rowcount = $stmt->rowcount();


    if ($rowcount > 0) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-featured-cars">
                <div class="featured-img-box">
                    <div class="featured-cars-img" style="overflow: hidden;">
                        <a href="product-detail.php?id=<?= $products['id']; ?>"><img src="./panel/products/<?= $products['img']; ?>" alt="cars"></a>
                    </div>
                    <div class="featured-model-info">
                        <p>
                            <?= $products['model']; ?>
                        </p>
                    </div>
                </div>
                <div class="featured-cars-txt">
                    <h2><a href="product-detail.php?id=<?= $products['id']; ?>"><?= $products['name']; ?></a></h2>
                    <h3><?= $products['price']; ?></h3>
                    <p>
                        <?= $products['description']; ?>
                    </p>
                </div>
            </div>
        </div>
<?php

    } else {
        echo "<h6 class='text-danger'>Mahsulot topilmadi</h6>";
    }
}
