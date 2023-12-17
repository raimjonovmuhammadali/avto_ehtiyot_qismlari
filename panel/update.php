<?php
include 'inc/db.php';
include 'inc/func.php';
if (isset($_SESSION['admin'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['update'])) {
    $productid = $_GET['productid'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = '$productid'");
    $stmt->execute();
    $product = $stmt->fetch();
}else{
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $model = $_POST['model'];
    $count = $_POST['count'];
    $description = $_POST['description'];
    
    $image_name = $_FILES['img']['name'] ;
    $target_file = "./products/$image_name";
    $targetFileForItem = "products/$image_name";
    
    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
    $db = $conn;
    $id = $_GET['productid'];

    updateproduct($name, $description, $price, $model, $image_name, $count, $db, $id);
}

?>

<?php include 'inc/header.php'; ?>

<div class="container" style="margin: 200px auto;">
    <div class="row" style="margin-bottom: 40px;">
        <h5 style="margin-bottom: 30px;">Mahsulotni yangilash</h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mahsulot nomi" name="name" value="<?=$product['name'];?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot narxi" name="price"value="<?=$product['price'];?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mashina modeli" name="model"value="<?=$product['model'];?>" required>
                <small id="emailHelp" class="form-text text-muted">Sotiladigan mahsulot qaysi avtomobil uchunligi yoziladi.</small>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot soni" name="count"value="<?=$product['product_count'];?>" required>
                <small id="emailHelp" class="form-text text-muted">Sotuvda nechta mahsulot bor?</small>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot haqida" name="description" rows="6" required><?=$product['description'];?></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="exampleInputPassword1" name="img" value="<?=$product['img'];?>" required>
                <img src="products/<?=$product['img'];?>" alt="productimg" width="100px" height="100px">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Yangilash</button>
            <a href="index.php"><button type="button" class="btn btn-success">Bekor qilish</button></a>
        </form>
    </div>
</div>