<?php
include 'inc/db.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$stmt = $conn->prepare("SELECT * from products WHERE id = ?");
	$stmt->execute([$id]);
	$products = $stmt->fetch();
$price = 0;
    if($_POST['chec'] == "dostovka"){
        $price += 20000;
    }else{
        $price = 0;
    }

    $total = $products['price'] * $_POST['count'];
    $all = $price + $total;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['payment'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $p_id = $_POST['p_id'];
    $total = $_POST['total'];
    $p_count = $_POST['p_count'];
    $j_count = $_POST['j_count'];

    $sql = "INSERT INTO orders (ismi, phone, adress, count, p_id, narxi, product_count) VALUES (:ismi, :phone, :adress, :count, :p_id, :narxi, :product_count)";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        'ismi' => $name,
        'phone' => $phone,
        'adress' => $address,
        'count' => $p_count,
        'p_id' => $p_id,
        'narxi' => $total,
        'product_count' => $j_count
    ]);

    header('Location: /');
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- title of site -->
    <title>CarSpare</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <link rel="stylesheet" href="assets/css/chechout.css">

</head>

<body style="overflow: hidden;">
<div class='subject'>DailyUI #002 </br><strong>Credit Card Checkout</strong></div>

<div class='checkout'>
    <div class='order'>
        <h2>Mahsulot</h2>
        <h5>Order #0101</h5>
        <ul class='order-list'>
            <li><img src='panel/products/<?=$products['img'];?>'>
                <h4><?=$products['name'];?></h4>
                <h5><?=$products['price'];?></h5>
            </li>
        </ul>
        <h5>Mahsulot narxi</h5>
        <h4><?=$products['price'];?></h4>
        <h5 class='total'>Jami</h5>
        <h1><?=$all;?></h1>
    </div>
    <h2>Ma'lumotlar</h2>
    <form action="" method="POST">
    <div id='payment' class='payment'>
        <div class='card-form' style="display: flex; flex-direction: column; gap: 10px;">
            <input type="hidden" name="p_id" value="<?=$products['id'];?>">
            <input type="hidden" name="total" value="<?=$all;?>">
            <input type="hidden" name="p_count" value="<?=$_POST['count'];?>">
            <input type="hidden" name="j_count" value="<?=$products['product_count'];?>">
            <input type='text' style="width: 100%; background-color: white; border-radius: 5px; padding: 20px; outline: none;" id='cardnumber' name='name' placeholder='Ismingizni kiriting' title='name' />
            <input type='text' style="width: 100%; background-color: white; border-radius: 5px; padding: 20px; outline: none;" id='cardnumber' name='phone' placeholder='Telefoningizni kiriting' title='Phone' />
            <textarea type='text' style="width: 100%; background-color: white; border-radius: 5px; padding: 20px 10px; outline: none;" id='cardnumber' name='address' placeholder='Manzilingizni kiriting' title='Phone'></textarea>

            <button type="submit" class='button-cta' title='Confirm your purchase' name="payment"><span>Sotib olish</span></button>
        </div>
    </div>
    </form>
    <div id='paid' class='paid'>
        <svg id='icon-paid' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 310.277 310.277" style="enable-background:new 0 0 310.277 310.277;" xml:space="preserve" width="180px" height="180px">
            <g>
                <path d="M155.139,0C69.598,0,0,69.598,0,155.139c0,85.547,69.598,155.139,155.139,155.139   c85.547,0,155.139-69.592,155.139-155.139C310.277,69.598,240.686,0,155.139,0z M144.177,196.567L90.571,142.96l8.437-8.437   l45.169,45.169l81.34-81.34l8.437,8.437L144.177,196.567z" fill="#3ac569" />
            </g>
        </svg>
        <h2>Your payment was completed.</h2>
        <h2>Thank you!</h2>
    </div>
</div>

<div class='icon-credits'>Outlined icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> & <a href="http://www.flaticon.com/authors/abhimanyu-rana" title="Abhimanyu Rana">Abhimanyu Rana</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	<!-- Include all js compiled plugins (below), or include individual files as needed --> 

	<!--Custom JS-->
	<script src="assets/js/checkout.js"></script>

</body>

</html>