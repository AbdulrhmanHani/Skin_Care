<?php

try {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skincare";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $mysqli_query = mysqli_query($conn, $sql_query);
    if ($mysqli_query ?? null) {
        echo '<script>window.location.href = "add-product.html";</script>';
    } else {
        $mysqli_query = (array)[
            null,
        ];
        echo '<script>alert("Error adding product: ' . mysqli_error($conn) . '");</script>';
        echo '<script>window.location.href = "add-product.html";</script>';
    }
    mysqli_close($conn);
} catch (\Throwable $th) {
}
$productId = $_REQUEST['ProductID'];
$productIDD = $_REQUEST['productIDD'];
$productName = $_REQUEST['productName'];
$productDescription = $_REQUEST['productDescription'];
$productPrice = $_REQUEST['productPrice'];
$productQuantity = $_REQUEST['productQuantity'];

$sql_query = "UPDATE Product SET ProductID = $productIDD, Name='$productName', Description='$productDescription', Price=$productPrice, Quantity=$productQuantity WHERE ProductID = $productId";
// echo $sql_query;
$result = mysqli_query($conn, $sql_query);
header("location: " . "http://localhost/web-project/search.php");
