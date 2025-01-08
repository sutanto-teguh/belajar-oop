<?php
include_once 'Database.php';
include_once 'Product.php';
include_once 'ProductCtrl.php';

$database = new Database();
$db = $database->getConnection();
echo "<h2>TEST INSERT DATA</h2>";

$ctrl = new ProductCtrl($db);

$item = new Product(1,"Ayam Pas",9000,"Ayam sayap");

if($ctrl->insert($item)) {
    echo "Berhasil menambahkan Product Baru.";
} else {
    echo "Gagal menambahkan Product.";
}
echo $ctrl->getAllProducts();
?>