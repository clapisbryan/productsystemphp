<?php
include_once('function.php');
if (isset($_POST['submit'])) {
    $id = insertProduct($_POST['product_name'], $_POST['product_description']);
    if ($id) {
        header("Location: details.php?ID=" . $id);
    }
}
?>
<?php include_once('templates/header.php'); ?>

<div class="container">
    <h1 class="my-5">Add New Product Form</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control form-control-lg" placeholder="Specify product name..." required>
        </div>
        <div class="mb-3">
            <label for="product_description" class="form-label">Product Description</label>
            <textarea rows="5" name="product_description" id="product_description" class="form-control" placeholder="Specify product description..." required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg my-4">Save</button>
    </form>
</div>
<?php include_once('templates/footer.php'); ?>