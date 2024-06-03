<?php
// Connect to the database (replace with your database credentials)
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "skincare";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the order details from the request
$productIDs = $_POST['ProductID'];
$quantities = $_POST['Quantity'];

// Loop through the order items and update the quantities in the database
for ($i = 0; $i < count($productIDs); $i++) {
  $productID = $productIDs[$i];
  $quantity = $quantities[$i];

  // Update the quantity in the database
  $sql = "UPDATE product SET quantity = quantity - $quantity WHERE ProductID = $productID";

  if ($conn->query($sql) !== TRUE) {
    echo "Error updating quantity: " . $conn->error;
    $conn->close();
    exit;
  }
}

// Reset the cart
// Assuming you have a session-based cart, you can clear the cart items from the session
session_start();
$_SESSION["shopping_cart"] = array();

echo "Order placed successfully!";
$conn->close();
?>