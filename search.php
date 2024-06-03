<?php
// Connect to the database (replace with your database credentials)
try {

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
    $mysqli_query = mysqli_query($conn, $sql_query);
    if ($mysqli_query ?? null) {
        echo '<script>window.location.href = "add-product.html";</script>';
    } else {
        $mysqli_query = (array)[
            null,
            null,
            null,
        ];
        echo '<script>alert("Error adding product: ' . mysqli_error($conn) . '");</script>';
        echo '<script>window.location.href = "add-product.html";</script>';
    }

    // Close the database connection
    mysqli_close($conn);
} catch (\Throwable $th) {
    // echo $th->getMessage();
    // echo "<br>";
    // echo $th->getCode();
    // echo "<br>";
    // echo $th->getLine();
    // echo "<br>";
}

?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat Mar 16 2024 05:42:55 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65f1f9b304bd6e58ea4c1d8d" data-wf-site="65edf05d62c81bf7ebc5cc15">

<head>
    <meta charset="utf-8">
    <title>Search Results</title>
    <meta content="Search Results" property="og:title">
    <meta content="Search Results" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/web-project-03dfc9.webflow.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
    WebFont.load({
        google: {
            families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic",
                "Varela Round:400", "Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic",
                "Playfair Display:regular,500,700,900", "Rubik:500,300italic"
            ]
        }
    });
    </script>
    <script type="text/javascript">
    ! function(o, c) {
        var n = c.documentElement,
            t = " w-mod-";
        n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
            .className += t + "touch")
    }(window, document);
    </script>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
        text-align: center;
    }
    </style>

</head>

<body>
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navbar w-nav">
        <div class="container-6 w-container">
            <a href="#" class="w-nav-brand"><img src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png"
                    loading="lazy" width="130" alt=""></a>
            <nav role="navigation" class="w-nav-menu">
                <a href="#" class="nav-link w-nav-link">Home</a>
                <a href="#" class="nav-link navcolor w-nav-link">Shop</a>
                <a href="#" class="nav-link w-nav-link">Contact</a>
            </nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
    <div class="w-container">
        <form action="search.php" class="search-2 w-form"><label for="search">Search</label>
            <input class="search-input-2 w-input" maxlength="256" name="query" placeholder="Search ..." type="search"
                id="search" required=""><input type="submit" class="search-button-2 w-button" value="Search">
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    $query = $_REQUEST['query'];
    if ($query == ' ') {
        $query = '';
    }
    if ($query) {
        $sql_query = "SELECT * FROM Product WHERE Name LIKE '%" . $query . "%' OR Description LIKE " . "'%$query%'";
        $result = mysqli_query($conn, $sql_query);
        $final_res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <h4>Products Found: (<?= count($final_res) ?>)</h4>
    <table>
        <tr>
            <th>Product Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Options</th>
        </tr>
        <?php
            foreach ($final_res as $product) {
            ?>
        <tr>
            <td><?= $product['ProductID'] ?></td>
            <td><?= $product['Name'] ?></td>
            <td><?= $product['Description'] ?></td>
            <td><?= $product['Price'] ?></td>
            <td><?= $product['Quantity'] ?></td>
            <td>
                <a target="_blank" href="http://localhost/web-project/images/<?= $product['Image'] ?>">
                    <img src="http://localhost/web-project/images/<?= $product['Image'] ?>" width="70px" height="70px"
                        alt="">
                </a>
            </td>
            <td>
                <a href="http://localhost/web-project/editProduct.php?ProductID=<?= $product['ProductID'] ?>"><i
                        class="fa-solid fa-edit" style="margin-right: 12px;font-size: 20px;color: blue"></i></a>
                <a href="http://localhost/web-project/deleteProduct.php?ProductID=<?= $product['ProductID'] ?>"><i
                        class="fa-solid fa-trash" style="margin-right: 12px;font-size: 20px;color:red"></i></a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
    <?php
    }
    ?>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65edf05d62c81bf7ebc5cc15"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="js/webflow.js" type="text/javascript"></script>
</body>

</html>