<?php
try {
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $productName = $_POST["productName"];
    $productID = $_POST["productID"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];
    $productImage = $_POST["productImage"];
    $productDescription = $_POST["productDescription"];



    // Connect to the database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skincare";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Perform your database insertion logic here
    // Assuming you have a database connection established

    // Example code to insert the product into a products table
    $sql = "INSERT INTO Product (Name, ProductID, Price, Quantity, Image, Description) VALUES ('$productName', '$productID', '$productPrice', '$productQuantity', '$productImage', '$productDescription')";

    if (mysqli_query($conn, $sql)) {
      // Product added successfully
      echo '<script>alert("Product added successfully.");</script>';
      echo '<script>window.location.href = "add-product.html";</script>';
    } else {
      // Error occurred while adding the product
      echo '<script>alert("Error adding product: ' . mysqli_error($conn) . '");</script>';
      echo '<script>window.location.href = "add-product.html";</script>';
    }

    // Close the database connection
    mysqli_close($conn);
  }
} catch (\Throwable $th) {
  var_dump([
    $th->getMessage(),
    $th->getCode()
  ]);
}
