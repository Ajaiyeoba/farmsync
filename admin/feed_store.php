<?php

include 'config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmSync Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <a href="" class="logo">
            <h2>FarmSync </h2> 
        </a>
        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="">About</a></li>            
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-icon">
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

<section>
<section style="background-color: #04b01d; ">
<div class="formbold-main-wrappper">
<div class="formbold-form-wrapper">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="formbold-form-title">
<h2>FarmSync</h2>
</div>
<?php
$product = isset($_POST['product']) ? $_POST['product'] : '';
?>
<div class="formbold-input-flex">
<label for="product" class="formbold-form-label">Product Name</label>
<input type="text" name="product" id="product" class="formbold-form-input <?php echo (!empty($product_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $product_err; ?></span>
</div>

<div class="formbold-input-flex">
<label for="quantity" class="formbold-form-label">Quantity</label>
<input type="number" name="quantity" id="quantity" class="formbold-form-input <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $quantity_err; ?></span>
</div>

<div class="formbold-input-flex">
<div>
    <label for="unit" class="formbold-form-label">Unit:</label>
    <select id="unit" name="unit">
        <option value=""></option>
        <option value="kg">Kilograms (kg)</option>
        <option value="g">Grams (g)</option>
    </select>
    <span class="invalid-feedback" style="display: none;"><?php echo $unit_err; ?></span>
</div>



<div class="formbold-input-flex">
<div>
    <label for="date" class="formbold-form-label">Purchase Date</label>
    <input type="date" name="date" id="date" class="formbold-form-input <?php echo (!empty($purchase_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>">
    <span class="invalid-feedback" style="display: none;"><?php echo $purchase_err; ?></span>
</div>
</div>
</div>

<div class="formbold-input-flex">
<label for="image" class="formbold-form-label">Image</label>
<input type="file" name="image" type="image" id="image" class="formbold-form-input <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $image_err; ?></span>
</div>
<?php
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
?>
<div class="formbold-input-flex">
<label for="comment" class="formbold-form-label">Comment</label>
<input type="text" name="comment" id="comment" class="formbold-form-input <?php echo (!empty($comment_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $comment; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $comment_err; ?></span>
</div>


<input type="submit" name="submit" class="formbold-btn" value="Save">
</form>
<a href="saved.php">
    <button class="formbold-btn">View Items</button>
</a>
</section>

    <section class="contact" id="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>FarmSync</h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>08052148610</p>
                <p>farmsync@gmail.com</p>
                <div class="social-icon">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""></a>
                </div>
            </div>

         
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>

    <script src="app.js"></script>
</body>
</html>