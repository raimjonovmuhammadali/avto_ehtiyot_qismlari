<?php
include 'inc/db.php';
if (isset($_SESSION['admin'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['delete'])) {
    $productid = $_POST['productid'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$productid]);

    header('Location: index.php');
}
?>

<?php include 'inc/header.php'; ?>

<div class="container" style="margin-top: 200px;">
    <div class="row">
        <h5 style="margin-bottom: 30px;">Barcha mahsulotlar</h5>
        <table class="table" style="overflow: scroll;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">Tavsif</th>
                    <th scope="col">Narxi</th>
                    <th scope="col">Modeli</th>
                    <th scope="col">Rasmi</th>
                    <th scope="col">Soni</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
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
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['description']; ?></td>
                            <td><?= $row['price']; ?></td>
                            <td><?= $row['model']; ?></td>
                            <td><img src="./products/<?= $row['img']; ?>" alt="productimg" width="70px" height="70px"></td>
                            <td><?= $row['product_count']; ?></td>
                            <td>
                                <form action="update.php" method="GET">
                                    <input type="hidden" name="productid" value="<?= $row['id']; ?>">
                                    <button class="btn btn-success" title="Buyurtmani yangilash" name="update"><i class="fa-solid fa-arrows-rotate"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="productid" value="<?= $row['id']; ?>">
                                    <button class="btn btn-danger" title="Buyurtmani o'chirish" name="delete"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                <?php }
                } ?>
            </tbody>
        </table>
        <span style="margin-bottom: 20px;"><?= $msg; ?></span>
    </div>
</div>