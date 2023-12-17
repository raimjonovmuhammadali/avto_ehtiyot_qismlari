<?php
include 'inc/db.php';
if (isset($_SESSION['admin'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['update'])) {
    $orderid = $_POST['orderid'];
    $productid = $_POST['productid'];
    $count = $_POST['ordercount'];

    $stmt = $conn->prepare("UPDATE orders SET checked = 1 WHERE id = ?");
    $stmt->execute([$orderid]);

    $stmtt = $conn->prepare("UPDATE products SET product_count = product_count - $count WHERE id = ?");
    $stmtt->execute([$productid]);

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['delete'])) {
    $orderid = $_POST['orderid'];

    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$orderid]);

    header('Location: index.php');
}
?>

<?php include 'inc/header.php'; ?>

<div class="container" style="margin-top: 200px;">
    <div class="row">
        <h5 style="margin-bottom: 30px;">Barcha buyurtmalar</h5>
        <table class="table" style="overflow: scroll;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ismi</th>
                    <th scope="col">Raqami</th>
                    <th scope="col">Manzili</th>
                    <th scope="col">Buyurtma soni</th>
                    <th scope="col">Narxi</th>
                    <th scope="col">Mahsulot rasmi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './inc/db.php';

                $stmt = $conn->prepare("SELECT * from orders ORDER BY checked");
                $stmt->execute();
                $products = $stmt->fetchAll();


                $msg = '';
                if (count($products) == 0) {
                    $msg = "Buyurtmalar mavjud emas";
                } else {
                    $i = 0;
                    foreach ($products as $row) {
                        $i = $i + 1;
                        $id = $row['p_id'];
                        $stmtt = $conn->prepare("SELECT * from products WHERE id = $id");
                        $stmtt->execute();
                        $product = $stmtt->fetch();
                ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['ismi']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['adress']; ?></td>
                            <td><?= $row['count']; ?></td>
                            <td><?= $row['narxi']; ?></td>
                            <td><img src="products/<?= $product['img']; ?>" alt="productimg" width="100px" height="100px" title="<?= $product['name']; ?>"></td>

                            <?php if ($row['checked'] == 0) { ?>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="orderid" value="<?= $row['id']; ?>">
                                        <input type="hidden" name="ordercount" value="<?= $row['count']; ?>">
                                        <input type="hidden" name="productid" value="<?= $row['p_id']; ?>">
                                        <button type="submit" class="btn btn-success" title="Yetkazilganligi haqida tasdiq" name="update"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="orderid" value="<?= $row['id']; ?>">
                                        <button class="btn btn-danger" title="Buyurtmani o'chirish" name="delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            <?php } ?>

                        </tr>

                <?php }
                } ?>
            </tbody>
        </table>
        <span style="margin-bottom: 20px;"><?= $msg; ?></span>
    </div>
</div>