<?php
// Check if the form is submitted
try {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $adminID = $_POST["Email-3"];
    $userPassword = $_POST["Password-3"];

    // Perform your database query to check if admin exists
    $servername = "127.0.0.1";
    $username = "root";
    $dbPassword = "";
    $dbname = "skincare";

    $conn = new mysqli($servername, $username, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Example code to check if admin exists in the database using a query
    $sql = "SELECT * FROM Admin WHERE Email = '$adminID' AND Password = '$userPassword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // Admin login successful, redirect to add product interface
      header("Location: add-product.html");
      exit();
    } else {
      // Admin login failed, display error message on the login page
      echo '<script>alert("Invalid admin ID or password."); window.location.href = "log-in.php";</script>';
    }

    // Close the database connection
    mysqli_close($conn);
  }
} catch (\Throwable $th) {
  var_dump([
    $th->getMessage(),
    $th->getCode(),
  ]);
}
