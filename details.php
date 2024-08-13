<?php
error_reporting(E_ALL);
include_once('./function.php'); // import function.php

$id = $_GET['ID'];
if (isset($id)) {
    $product = getProductById($id); // called a getAllproduct
}
if (isset($_POST['delete'])) {
    deleteProduct($_POST['ID']);
    header("Location: ./");
}
?>
<?php include_once('templates/header.php'); ?>

<div class="container">
    <?php if ($product): ?>
        <h1 class="mt-5"><?= $product['product_name'] ?></h1>
        <div class="mt-2">

            <form method="post">
                <div class="my-4">
                    <a href="editProduct.php?ID=<?= $product['ID']; ?>" class="btn btn-primary">Edit Product</a>
                    <button class="btn btn-danger" name="delete">Delete Product</button>
                    <input type="hidden" name="ID" value="<?= $product['ID']; ?>">
                </div>
            </form>

            <table class="table table-border table-hover">
                <thead>
                    <tr>
                        <th>Description</th>
                        <td><?= $products['product_description']; ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= $product['createdAt']; ?></td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php else: ?>
        <h3 class="mt-5">Product does not exist.</h3>
    <?php endif; ?>
</div>
<?php include_once('templates/footer.php'); ?>