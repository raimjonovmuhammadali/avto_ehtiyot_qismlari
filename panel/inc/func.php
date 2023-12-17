<?php

include 'db.php';

function insert_product($name, $description, $price, $model, $image_name, $count, $db){
    $sql = "INSERT INTO products (name, description, price, model, img, product_count) VALUES (:name, :description, :price, :model, :img, :product_count)";
    $stmt = $db -> prepare($sql);
    $stmt -> execute([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'model' => $model,
        'img' => $image_name,
        'product_count' => $count
    ]);

    header('Location: /panel');
}

function updateproduct($name, $description, $price, $model, $image_name, $count, $db, $id){
    $sql = "UPDATE products SET name = ?, description = ? , price = ?, model = ?, img = ?, product_count = ? WHERE id = ?";
    $stmt = $db -> prepare($sql);
    $stmt -> execute([
        $name,
        $description,
        $price,
        $model,
        $image_name,
        $count,
        $id
    ]);

    header('Location: /panel');
}