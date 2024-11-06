<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM Products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$product_id]);
        echo "Product deleted successfully!";
    } catch (PDOException $e) {
        echo "Error deleting product: " . $e->getMessage();
    }
}
?>
