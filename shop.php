<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat Mar 16 2024 05:42:55 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65ee3e57f020f21a86371a4c" data-wf-site="65edf05d62c81bf7ebc5cc15">
<head>
  <meta charset="utf-8">
  <title>Shop</title>
  <meta content="Shop" property="og:title">
  <meta content="Shop" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/web-project-03dfc9.webflow.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Varela Round:400","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Playfair Display:regular,500,700,900","Rubik:500,300italic"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
    <div class="container-6 w-container">
      <a href="#" class="brand w-nav-brand"><img src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png" loading="lazy" width="180" alt=""></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="index.html" class="nav-link w-nav-link">Home</a>
        <a href="shop.html" aria-current="page" class="nav-link w-nav-link w--current">Shop</a>
        <a href="#" class="nav-link w-nav-link">Contact</a>
        <a href="#" class="nav-link w-nav-link">account</a>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="w-layout-blockcontainer w-container">
      <h1 class="heading-4">Skincare</h1>
      <p class="paragraph-3">Products your skin will adore.</p>
      <div class="div-block-2">
       <!-- <div id="w-node-_764eebe2-0bf8-cf19-7f53-b2f78e117776-86371a4c" class="product-cell"><img src="images/makeup-remover.png" loading="lazy" width="143" alt="" class="product-image">
          <h3 class="heading-5">Tea Tree Toner</h3>
          <h5 class="prices">59SR</h5>
          <a href="#" class="button-2 w-button">Add to cart</a>
         </div> -->

         <?php
    // Connect to the database (replace with your database credentials)
    $conn = new mysqli("localhost:4306", "root", "", "skincare");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch products from the database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each row and generate product cells
    while ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
        $price = $row["Price"];
        $image = $row["Image"];
        $category = $row["CategoryID"];
        $quant = $row["Quantity"];
        $ProductID = $row["ProductID"];

        // Generate the HTML for each product cell
        echo '<div class="col s12 l3">';
        echo '<div class="product-cell">';
        echo '<form method="post" action="shopping-cart.php?action=add&id=' . $row["ProductID"] . '">';

        echo '<div class="product-cell">';
        echo '<img src="' . $image . '" alt="' . $name . '" class="product-image" style="width: 143px; height: 250px;">';
        echo '<h3 class="heading-5">' . $name . '</h3>';
        echo '<input type="hidden" name="hidden_img_id" value="' . $image . '">';
        echo '<input type="hidden" name="hidden_name" value="' . $name . '">';
        echo '<input type="hidden" name="hidden_price" value="' . $price . '">';
        echo '<input type="hidden" name="hidden_category" value="category 1">';
        echo '<input type="hidden" name="item_quantity" value=" ' . $quant . '">';
        echo '<input type="hidden" name="id" value=" ' . $ProductID . '">';

        echo '<h5 class="prices">' . $price . 'SR</h5>';
        echo '<label for="quantity" style="font-size: 16px; text-align: center;">Quantity:</label>';
        
        echo '<input type="number" name="item_quantity" value="1" min="1" max="' . $quant . '" class="button-2" style="font-size: 16px; text-align: center;" onchange="checkQuantity(this, ' . $quant . ')">';
        echo '<script>';
        echo 'function checkQuantity(input, maxQuantity) {';
        echo '  var selectedQuantity = input.value;';
        echo '  if (selectedQuantity > maxQuantity) {';
        echo '    alert("The selected quantity exceeds the available quantity.");';
        echo '    input.value = maxQuantity;';
        echo '  }';
        echo '}';
        echo '</script>';
        
        
        echo '<span class="card_font"><input type="submit" class="button-2 w-button" value="Add To Cart" name="add_to_cart"></span>';
        echo '</div>';

        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No products found.";
}

    // Close the database connection
    $conn->close();
?>

      </div>
    </div>
  </section>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65edf05d62c81bf7ebc5cc15" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>