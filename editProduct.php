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
$sql_query = "SELECT * FROM Product WHERE ProductID = $productId";
$result = mysqli_query($conn, $sql_query);
$Product = mysqli_fetch_all($result, MYSQLI_ASSOC);
$Product = $Product[0]; 
?>

<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat Mar 16 2024 05:42:55 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65f4a108e93f3e3fe09e3941" data-wf-site="65edf05d62c81bf7ebc5cc15">

<head>
    <meta charset="utf-8">
    <title>Edit product <?= $Product['Name'] ?></title>
    <meta content="Add product" property="og:title">
    <meta content="Add product" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/web-project-03dfc9.webflow.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
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
</head>

<body>
    <section>
        <div data-collapse="all" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
            role="banner" class="navbar-2 w-nav">
            <div class="container-16 nav">
                <div class="_06-hamburger w-nav-button">
                    <div class="_06-nav__icon w-icon-nav-menu"></div>
                </div>
                <a href="#" class="brand-2 w-nav-brand"><img width="140" loading="lazy" alt=""
                        src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png" class="image-21"></a>
                <nav role="navigation" class="_06-nav-menu w-nav-menu">
                    <div class="_07-menu-inner">
                        <a href="index.html" class="_06-nav-link w-nav-link">Home</a>
                        <a href="profile-page.html" data-ms-action="login-redirect"
                            class="_06-nav-link w-nav-link">Profile</a>
                        <a href="add-product.html" aria-current="page" class="_06-nav-link w-nav-link w--current">Add
                            Product</a>
                        <a href="home-copy.html" class="_06-nav-link w-nav-link">Manage Product</a>
                        <a href="search.php" class="_06-nav-link w-nav-link">Search Product</a>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <div class="w-layout-blockcontainer container-20 w-clearfix w-container">
        <h1 class="heading-18">Edit Product <?= $Product['Name'] ?></h1>
        <div class="form-block-3 w-form">
            <form id="addProductForm" name="addProductForm" method="post" action="edit_product.php?ProductID=<?= $Product['ProductID'] ?>">
                <label for="productName"  class="field-label-11">Product Name</label>
                <input class="text-field-11 w-input" value="<?= $Product['Name'] ?>" maxlength="256" name="productName" placeholder="Name" type="text"
                    id="productName" required>
                <label for="productID" class="field-label-10">Product ID</label>
                <input class="text-field-12 w-input" maxlength="256" value="<?= $Product['ProductID'] ?>" name="productIDD" placeholder="10" type="text"
                    id="productID" required>
                <label for="productPrice" class="field-label-9">Product Price</label>
                <input class="text-field-13 w-input" maxlength="256" value="<?= $Product['Price'] ?>" name="productPrice" placeholder="110" type="number"
                    id="productPrice" required>
                <label for="productQuantity" class="field-label-8">Quantity</label>
                <input class="text-field-14 w-input" maxlength="256" value="<?= $Product['Quantity'] ?>" name="productQuantity" placeholder="29"
                    type="number" id="productQuantity" required>
                <!-- <input class="text-field-15 w-input" maxlength="256" name="productImage" placeholder="" type="text" id="productImage" required> -->
                <label for="productQuantity" class="field-label-8">Description</label>
                <textarea placeholder="Product Description" maxlength="5000" name="productDescription"
                    class="textarea-2 w-input"><?= $Product['Description'] ?></textarea>
                <input type="submit" class="submit-button-8 w-button" value="Update">
            </form>
            <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
            </div>
        </div>
    </div>
    <div data-collapse="all" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navbar-2 w-nav">
        <div class="container-16 nav">
            <div class="_06-hamburger w-nav-button">
                <div class="_06-nav__icon w-icon-nav-menu"></div>
            </div>
            <a href="#" class="brand-2 w-nav-brand"><img width="140" loading="lazy" alt=""
                    src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png" class="image-21"></a>
            <nav role="navigation" class="_06-nav-menu w-nav-menu">
                <div class="_07-menu-inner">
                    <a href="index.html" class="_06-nav-link w-nav-link">Home</a>
                    <a href="profile-page.html" data-ms-action="login-redirect"
                        class="_06-nav-link w-nav-link">Profile</a>
                    <a href="add-product.html" aria-current="page" class="_06-nav-link w-nav-link w--current">Add
                        Product</a>
                    <a href="home-copy.html" class="_06-nav-link w-nav-link">Manage Product</a>
                    <a href="search.html" class="_06-nav-link w-nav-link">Search Product</a>
                </div>
            </nav>
        </div>
    </div>
    <div data-collapse="all" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navbar-2 w-nav">
        <div class="container-16 nav">
            <div class="_06-hamburger w-nav-button">
                <div class="_06-nav__icon w-icon-nav-menu"></div>
            </div>
            <a href="#" class="brand-2 w-nav-brand"><img width="140" loading="lazy" alt=""
                    src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png" class="image-21"></a>
            <nav role="navigation" class="_06-nav-menu w-nav-menu">
                <div class="_07-menu-inner">
                    <a href="index.html" class="_06-nav-link w-nav-link">Home</a>
                    <a href="profile-page.html" data-ms-action="login-redirect"
                        class="_06-nav-link w-nav-link">Profile</a>
                    <a href="add-product.html" aria-current="page" class="_06-nav-link w-nav-link w--current">Add
                        Product</a>
                    <a href="home-copy.html" class="_06-nav-link w-nav-link">Manage Product</a>
                    <a href="search.html" class="_06-nav-link w-nav-link">Search Product</a>

                </div>
            </nav>
        </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65edf05d62c81bf7ebc5cc15"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="js/webflow.js" type="text/javascript"></script>
</body>

</html>