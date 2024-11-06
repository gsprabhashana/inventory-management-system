<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $SKU = $_POST['SKU'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE Products 
            SET name = ?, description = ?, SKU = ?, price = ?, quantity = ? 
            WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$name, $description, $SKU, $price, $quantity, $product_id]);
        echo "Product updated successfully!";
    } catch (PDOException $e) {
        echo "Error updating product: " . $e->getMessage();
    }
}
?>
