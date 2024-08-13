<?php
error_reporting(E_ALL);
include_once('./function.php'); // import function.php

$products = getAllProducts(); // called a getAllproduct

?>
<?php include_once('templates/header.php'); ?>

<div class="container">
    <h1 class="mt-5">Products</h1>
    <div class="mt-2">
        <a href="addProduct.php" class="btn btn-success btn-lg my-2">Add New Product</a>
        <table class="table table-border table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) {
                ?>
                    <tr>
                        <td><a href="details.php?ID=<?= $product['ID'] ?>" class="btn btn-primary btn-sm">View</a></td>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['createdAt'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>