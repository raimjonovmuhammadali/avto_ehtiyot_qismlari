<?php
include 'inc/db.php';
include 'inc/func.php';
if (isset($_SESSION['admin'])) {
    header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['add'])){
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

    insert_product($name, $description, $price, $model, $image_name, $count, $db);
}

?>

<?php include 'inc/header.php'; ?>

<div class="container" style="margin-top: 200px;">
    <div class="row">
        <h5 style="margin-bottom: 30px;">Mahsulot qo'shish</h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mahsulot nomi" name="name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot narxi" name="price">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mashina modeli" name="model">
                <small id="emailHelp" class="form-text text-muted">Sotiladigan mahsulot qaysi avtomobil uchunligi yoziladi.</small>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot soni" name="count">
                <small id="emailHelp" class="form-text text-muted">Sotuvda nechta mahsulot bor?</small>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Mahsulot haqida" name="description"></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="exampleInputPassword1" name="img">
            </div>
            <button type="submit" class="btn btn-primary" name="add">Qo'shish</button>
        </form>
    </div>
</div>