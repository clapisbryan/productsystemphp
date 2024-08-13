<?php

function connect()
{

    $host = 'sql302.infinityfree.com'; // set a host variable
    $dbname = 'if0_37090443_productsystem'; // set a database name variable
    $username = 'if0_37090443'; // set username variable
    $password = 'YinwH24dEO'; // set password variable

    try {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // establish connection

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set an attribute

        // echo "Connection succcessfully!"; // show success message
        return $pdo; // return a pdo 
    } catch (PDOException $e) { // catch error
        echo "Connection failed: " . $e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}

// connect();

function insertProduct($productName, $productDescription) // add function insertProduct with parameter $productName and $productDescription
{
    try {
        $pdo = connect(); // called a database connection 

        $stmt = $pdo->prepare("INSERT INTO products (product_name, product_description) VALUES (:productName, :product_description)"); // prepare a query insert 

        $stmt->bindParam(':productName', $productName); // bind a parameter to variable
        $stmt->bindParam(':product_description', $productDescription); // bind a parameter to variable
        $stmt->execute(); // execute a prepared query

        return $pdo->lastInsertId(); // return value
    } catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}


// insertProduct("Cheese"); // called a insertProduct with a argument
// insertProduct("Apple");

function deleteProduct($productId) // add function deleteProduct with parameter $productId
{
    try {
        $pdo = connect(); // called a database

        $stmt = $pdo->prepare("DELETE FROM products WHERE ID = :productId"); // prepare a query delete
        $stmt->bindParam(":productId", $productId); // bind a $productId parameter to :productId variable
        $stmt->execute(); // execute a prepared query on line 51

        echo "Product deleted successfully!"; // show success message
    } catch (PDOException $e) {
        echo "Deletion failed: " . $e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}

// deleteProduct(2);


function editProduct($productId, $newProductName)  // add function editProduct with a parameter $productId and $newProductName
{
    try {
        $pdo = connect(); // called a database connection

        $stmt = $pdo->prepare("UPDATE products SET product_name = :newProductName WHERE ID = :productId"); // prepared a query for update
        $stmt->bindParam(':newProductName', $newProductName); // bind a $newProductName parameter to :newProductName variable
        $stmt->bindParam(':productId', $productId); // bind a $productId parameter to :productId variable
        $stmt->execute(); // execute a prepared query on line 71

        echo "Product edited successfully!"; // show success message
    } catch (PDOException $e) {
        echo "Edit failed: " . $e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}


// editProduct(1, "Cheese Cake");


function getAllProducts(){ // add function for getAllProduct
    try {
        $pdo = connect(); // called database connection

        $stmt = $pdo->prepare("SELECT * FROM products"); // prepared a query for select all
        $stmt->execute(); // execute a prepared query on line 88

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all get data

        return $products; // return a products
    } catch (PDOException $e) {
        echo "Selection failed: " .$e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}


function getProductById($productId){ // add function for get product by id with a $productId parameter
    try {
        $pdo = connect(); // called a database connection

        $stmt = $pdo->prepare("SELECT * FROM products WHERE ID = :productId"); // prepared a query for select product by id
        $stmt->bindParam(":productId", $productId); // bind a $productId parameter to :productId variable
        $stmt->execute(); // execute a prepared a query on line 106

        $products = $stmt->fetch(PDO::FETCH_ASSOC); // fetch a specific product

        return $products; // return products
    } catch (PDOException $e) {
        echo "Selection failed: " .$e->getMessage(); // show error message
    } finally {
        $pdo = null;
    }
}