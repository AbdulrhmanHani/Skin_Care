<?php
$total=0;
//for shopping cart without login
session_start();
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); 
    $item_array_category = array_column($_SESSION["shopping_cart"], "item_category");
    if(!in_array($_GET["id"],$item_array_id)) //this comes from category page
    {
        $count1= count($_SESSION["shopping_cart"]);
        $item_array=array(
          'item_id' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'item_price' => $_POST["hidden_price"],
          'item_image' => $_POST["hidden_img_id"],
          'item_category' => $_POST["hidden_category"],
          'item_quantity' => $_POST["item_quantity"]
        );
        $_SESSION["shopping_cart"][$count1]=$item_array;
    }
    
    else
    {
      foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
          if($values["item_id"]==$_GET["id"])
          {
             $item_array=array(
                 'item_id' => $_GET["id"],
                 'item_name' => $_POST["hidden_name"],
                 'item_price' => $_POST["hidden_price"],
                 'item_image' => $_POST["hidden_img_id"],
                 'item_category' => $_POST["hidden_category"],
                 'item_quantity' => $values["item_quantity"]+1
              );
             $_SESSION["shopping_cart"]["$keys"]=$item_array;
          }
        }
    }
  }
  else//for first insert in the cart
  {
    $item_array=array(
      'item_id' => $_GET["id"],
      'item_name' => $_POST["hidden_name"],
      'item_price' => $_POST["hidden_price"],
      'item_category' => $_POST["hidden_category"],
      'item_image' => $_POST["hidden_img_id"],
      'item_quantity' => 1
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    $var1="Item added";
  }
}
//for removing items from shopping cart
if(isset($_GET["action"]))
{
	if($_GET["action"]=="delete")
	{
		foreach ($_SESSION["shopping_cart"] as $keys => $values) 
		{
			if($values["item_id"]==$_GET["id"])
      {
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="shopping-cart.php"</script>';
			}
		}
	}
}

  
?>


<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat Mar 16 2024 05:42:55 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65f3388b285a3e9549a4d120" data-wf-site="65edf05d62c81bf7ebc5cc15">
  <head>
        <meta charset="utf-8">
        <title>Shopping Cart</title>
        <meta content="Shopping Cart" property="og:title">
        <meta content="Shopping Cart" property="twitter:title">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Webflow" name="generator">
        <link href="css/normalize.css" rel="stylesheet" type="text/css">
        <link href="css/webflow.css" rel="stylesheet" type="text/css">
        <link href="css/web-project-03dfc9.webflow.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  

        <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <!-- FONTS      -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
      <!-- Font Awesome Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Materialized CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  

        <style>
		.grad1{
			background:linear-gradient(black,grey);
		}
		.card_color{
			background-color: #ffab91;
		}
		.card_font{
			font-size: 17px;
		}
		.card_button{
			font-size: 15px;
			border-radius: 10px;
			margin-left: 40%;
			font-size: 20px;
			background-color: white;
			border:2px solid black;
			transition: 0.5s;
			padding:5px 20px 5px 20px; 
		}
		.card_button:hover{
			background-color: black;
			color:white;
			transition: 0.5s;
		}
    p{
      font-size:18px;
    }

    .card-title1{
      font-size: 18px;
      text-align: center;
      position: relative;
    }

    .card-image{
      align-items: center;
      position: relative;
    }
    </style>








  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
  WebFont.load({
    google: {
      families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Varela Round:400","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Playfair Display:regular,500,700,900","Rubik:500,300italic"]
    }
  }); </script>


  


  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  </head>


  <body>

  

<!-- nav bar -->

  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
    <div class="container-6 w-container">
      <a href="#" class="brand w-nav-brand"><img src="images/Beige-and-Black-Aesthetic-Minimalist-Skincare-Logo-2.png" loading="lazy" width="180" alt=""></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="index.html" class="nav-link w-nav-link">Home</a>
        <a href="shop.php" class="nav-link w-nav-link">Shop</a>
        <a href="shopping-cart.php" aria-current="page" class="nav-link w-nav-link w--current">CART</a>
        <a href="#" class="nav-link w-nav-link">Contact</a>
        <div class="nav-link">Account</div>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="w-layout-blockcontainer container-9 w-container">
    <section class="section-3"></section>
  </div>

  <!-- <img src="images/download.png" loading="lazy" width="66" alt="" class="image-8"> -->

  <!-- class="grad1" style="margin-top:-20px;" -->
  <div>
  <?php if (!empty($_SESSION["shopping_cart"])) {
  $count2 = 0;
  foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    if ($count2 == 0) { ?>
      <div class="row">
    <?php }
    $count2 = $count2 + 1; ?>
    <div class="col s12 m6 l3">
      <div class="card medium">
        <div class="card-image" style="width: 143px; height: 250px;">
          <?php echo '<img src="' . $values["item_image"] . '" alt="' . $values["item_name"] . '">'; ?>
          <span class="card-title1"><?php echo $values["item_name"]; ?></span>
        </div>
        <div class="card-content">
          <p>Rs <?php echo $values["item_price"]; ?></p>
          <p>
            Quantity: <?php echo $values["item_quantity"]; ?>
          </p>
          <p id="total-<?php echo $values["item_id"]; ?>">Total <?php echo $values["item_price"] * $values["item_quantity"]; ?></p>
        </div>
        <div class="card-action">
          <a href="shopping-cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="card_button">Remove</a>
        </div>
      </div>
    </div>
    <?php $total = $total + $values["item_quantity"] * $values["item_price"];
    if ($count2 == 4) {
      $count2 = 0; ?>
      </div>
<?php }
  }
} ?>
</div>

<div class="card-panel" style="border-radius:20px;margin-top: 100px;margin-bottom: 100px; background-color: white;">
  <?php if ($total == 0) { ?>
    <h4 style="text-align:center;">Shopping Cart is Empty!...</h4>
  <?php } else { ?>
    <h4 style="text-align:center;">TOTAL AMOUNT TO BE PAID: <span id="total-amount"><?php echo number_format($total, 2); ?></span>
      <?php $_SESSION['total_amt'] = number_format($total, 2); ?>
      <a href="checkout.php?cart=<?php echo urlencode(json_encode($_SESSION['shopping_cart'])); ?>">
  <input type="button" value="Checkout" class="card_button">
</a>
      <!-- <a href="shop.php"><input type="button" value="Continue Shopping" class="card_button"></a> -->
    </h4>
  <?php } ?>
</div>













  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65edf05d62c81bf7ebc5cc15" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  </body>
</html>