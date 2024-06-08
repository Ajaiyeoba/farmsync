<?php
include '../config.php';
if (isset($_POST['submit'])) {
    // Retrieve form data
    $date = $_POST['date'];
    $species = $_POST['species'];
    $pond = $_POST['pond'];
    $avg_weight = $_POST['avg_weight'];
    $total_weight = $_POST['total_weight'];
    $quantity = $_POST['quantity'];
    $population = $_POST['population'];

    // Prepare the SQL statement
    $sql = "INSERT INTO `stock` (date, species, pond, avg_weight, total_weight, quantity, population ) 
                            VALUES   ( ?, ?, ?, ?,?,?,?)    ";
    // Prepare the statement
    $stmt = $link->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssiiis", $date, $species, $pond, $avg_weight, $total_weight, $quantity, $population);
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to saved.php after successful insertion
            header('location: harvest.php');
            exit(); // Terminate script after redirection
        } else {
            die("Error: Unable to execute query. " . $stmt->error);
        }
    } else {
        die("Error: Unable to prepare statement. " . $link->error);
    }
}
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmSync Schedule Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <a href="" class="logo">
            <h2>FarmSync </h2> 
        </a>
        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="#about">About</a></li>            
            <li><a href="#contact">Contact</a></li>

        </ul>

        <div class="nav-icon">
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section class="hero">
        <div class="">
            <p>Please record the fish Harvest </p>
            <br>
</div>


<div class="formbold-main-wrappper">
<div class="formbold-form-wrapper">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="formbold-form-title">
<h4>FIsh Harvest Records</h4>
</div>




<?php
  // $date = isset($_POST['date']) ? $_POST['date'] : '';
?>
<div class="formbold-input-flex">
<label for="date" class="formbold-form-label"> Harvest Date</label>
<input type="date" name="date" id="date" required class="formbold-form-input  <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $date_err; ?></span>
</div>

<?php
 $species = isset($_POST['species']) ? $_POST['species'] : '';
?>
<div class="formbold-input-flex">
<label for="species" class="formbold-form-label">Species</label>
<input type="text" name="species" id="species" required class="formbold-form-input  <?php echo (!empty($species_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $species; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $species_err; ?></span>
</div>


<?php
$pond = isset($_POST['pond']) ? $_POST['pond'] : '';
?>
<div class="formbold-input-flex">
<label for="pond" class="formbold-form-label">Pond</label>
<input type="text" name="pond" id="pond" required class="formbold-form-input  <?php echo (!empty($pond_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pond; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $pond_err; ?></span>
</div>

<div class="formbold-input-flex">
<label for="quantity" class="formbold-form-label">Quantity</label>
<input type="number" name="quantity" id="quantity" required class="formbold-form-input <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $quantity_err; ?></span>
</div>


<?php
// $avg_weight = isset($_POST['avg_weight']) ? $_POST['avg_weight'] : '';
?>
<div class="formbold-input-flex">
<label for="avg_weight" class="formbold-form-label">Average weight (kg)</label>
<input type="number" name="avg_weight" id="avg_weight" required class="formbold-form-input  <?php echo (!empty($avg_weight_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $avg_weight; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $avg_weight_err; ?></span>
</div>

<?php

?>
<div class="formbold-input-flex">
<label for="total_weight" class="formbold-form-label">Total weight (kg)</label>
<input type="number" name="total_weight" id="total_weight" required class="formbold-form-input  <?php echo (!empty($total_weight_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total_weight; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $total_weight_err; ?></span>
</div>



<!-- <div class="formbold-input-flex">
<label for="total_weight" class="formbold-form-label">Total weight (kg)</label>
<input type="number" name="population" id="population" required class="formbold-form-input  <?php echo (!empty($population_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $population; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $population_err; ?></span>
</div> -->

<?php
$population = isset($_POST['population']) ? $_POST['population'] : '';
?>
 <div class="formbold-input-flex">
<label for="population" class="formbold-form-label">Population</label>
                <select id="population" name="population" class="formbold-form-input <?php echo (!empty($population_err)) ? 'is-invalid' : ''; ?>">
                    <option value="">Select Harvested Population</option>
                    <option value="Total">Total</option>
                    <option value="Partial">Partial</option>
                </select>
                <span class="invalid-feedback"><?php echo $population_err; ?></span>
</div> 






<input type="submit" name="submit" class="formbold-btn" value="Save Records">
</form>
</section>

<section>
<a href="staff_board.php">
    <button class="formbold-btn">Dashboard</button>
</a>
</section>
    <section class="contact" id="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>FarmHouse</h2>
                </a>

         
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>

    <script src="app.js"></script>
</body>
</html>