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



if (isset($_GET['cart'])) {
  $cartItems = json_decode(urldecode($_GET['cart']), true);
} else {
  $cartItems = array(); // Set an empty array if no cart data is passed
}

$subtotal = 0;
$shipping = 35;
$total = 0;

if (!empty($cartItems)) {
  foreach ($cartItems as $item) {
    $subtotal += $item['item_price'] * $item['item_quantity'];
  }
  $total = $subtotal + $shipping;
}
?>








<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat Mar 16 2024 05:42:55 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65f44c36920bf0c09efed3fd" data-wf-site="65edf05d62c81bf7ebc5cc15">
<head>
  <meta charset="utf-8">
  <title>Checkout</title>
  <meta content="Checkout" property="og:title">
  <meta content="Checkout" property="twitter:title">
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
        <a href="shop.php" class="nav-link w-nav-link">Shop</a>
        <a href="shopping-cart.php" class="nav-link w-nav-link">CART</a>
        <a href="#" class="nav-link w-nav-link">Contact</a>
        <div class="nav-link">Account</div>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="order-wrap">
  <div class="order-items">
    <div class="block-header">
      <h4 class="heading-jumbo-tiny">Items in order</h4>
    </div>
    <div class="block-content">
      <?php if (!empty($cartItems)) : ?>
        <?php foreach ($cartItems as $item) : ?>
          <div class="div-block-17">
            <img src="<?php echo $item['item_image']; ?>" loading="lazy" width="Auto" alt="" class="image-22">
            <div class="div-block-18">
              <div class="text-block-13"><?php echo $item['item_name']; ?></div>
              <div>
                <div>Quantity: <?php echo $item['item_quantity']; ?></div>
              </div>
            </div>
            <div>
              <div class="text-block-15"><?php echo $item['item_price'] * $item['item_quantity']; ?> SAR</div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>No items in the order.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
        <div class="div-block-14">
          <div class="block-header">
            <h4 class="heading-jumbo-tiny">shipping Address</h4>
          </div>
          <div class="block-content">
            <div class="row">
              <div class="column"><label for="field-5" class="field-label-3">FIRST NAME *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="text" id="field-4" required=""></div>
              <div class="column"><label for="field-5" class="field-label-3">LAST NAME *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="text" id="field-4" required=""></div>
            </div><label for="country-2" class="field-label-2">COUNTRY *</label><select id="country" name="country" data-name="country" class="select-field w-select">
              <option value="">Select one...</option>
              <option value="First">Saudi Arabia</option>
              <option value="Second">Bahrain</option>
              <option value="Third">Kuwait</option>
              <option value="Another option">UAE</option>
              <option value="Another option">Oman</option>
            </select>
            <div class="row">
              <div class="column"><label for="field-5" class="field-label-3">CITY *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="text" id="field-4" required=""></div>
              <div class="column"><label for="field-4" class="field-label-3">PHONE NUMBER *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="tel" id="field-4" required=""></div>
            </div>
          </div>
        </div>
        <div class="div-block-14">
          <div class="block-header">
            <h4 class="heading-jumbo-tiny">Payment Info</h4>
          </div>
          <div class="block-content"><label for="field-5" class="field-label-2">CARD NUMBER *</label><input class="text-field-3 w-input" maxlength="256" name="field-5" data-name="Field 5" placeholder="" type="text" id="field-5" required="">
            <div class="row">
              <div class="column"><label for="field-4" class="field-label-3">EXPIRY DATE *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="text" id="field-4" required=""></div>
              <div class="column"><label for="field-5" class="field-label-3">CVV *</label><input class="text-field-4 w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="" type="text" id="field-4" required=""></div>
            </div>
          </div>
        </div>
      </div>
      <div class="order-summary">
        <div class="div-block-13">
          <div class="block-header">
            <h4 class="heading-jumbo-tiny">Order summary</h4>
          </div>
          <div class="block-content">
  <div class="div-block-15">
    <div>Subtotal</div>
    <div><?php echo $subtotal; ?> SAR</div>
  </div>
  <div class="div-block-15">
    <div>Shipping</div>
    <div>35 SAR</div>
  </div>
  <div class="div-block-15">
    <div>Total</div>
    <div class="text-block-12"><?php echo $total; ?> SAR</div>
  </div>
</div>
          <!-- <a href="#" class="button-12 w-button">APPLE PAY</a> -->

          <form id="placeOrderForm">
  <?php foreach ($cartItems as $item) : ?>
    <input type="hidden" name="ProductID[]" value="<?php echo $item['item_id']; ?>">
    <input type="hidden" name="Quantity[]" value="<?php echo $item['item_quantity']; ?>">
  <?php endforeach; ?>
  <button type="button" class="button-f w-button " onclick="placeOrder()">Place Your Order</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function placeOrder() {
    // Get form data
    var formData = $('#placeOrderForm').serialize();

    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: 'place_order.php',
      data: formData,
      success: function(response) {
        // Display success message
        alert("Order placed successfully!");

        // Reset the form (optional)
        $('#placeOrderForm')[0].reset();

        // Redirect to the shop interface
        window.location.href = 'shop.php';
      },
      error: function(xhr, status, error) {
        // Handle error
        alert("Error placing order. Please try again.");
      }
    });
  }
</script>
  
        </div>
      </div>
    </form>
    <div class="w-form-done">
      <div>Thank you! Your submission has been received!</div>
    </div>
    <div class="w-form-fail">
      <div>Oops! Something went wrong while submitting the form.</div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65edf05d62c81bf7ebc5cc15" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>