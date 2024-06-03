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
$sql_query = "DELETE FROM Product WHERE ProductID = $productId";
$result = mysqli_query($conn, $sql_query);
header("location: " . "http://localhost/web-project/search.php");
