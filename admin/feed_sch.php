<?php


include '../config.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $feed_time = $_POST['feed_time'];
    $quantity = $_POST['quantity'];
    $feed = $_POST['feed'];
     $staff = $_POST['staff']; 


    // Prepare the SQL statement
    $sql = "INSERT INTO `feed_schedule` (feed_time, quantity, feed , staff) VALUES ( ?, ?, ?,? )";
    
    // Prepare the statement
    $stmt = $link->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("siss", $feed_time, $quantity, $feed, $staff);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to saved.php after successful insertion
            header('location: schedlue_board.php');
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
            <h4>Feed Schedule</h4>
            <p>Please set the fish feed schedule for the workers</p>
            <br>
</div>


<div class="formbold-main-wrappper">
<div class="formbold-form-wrapper">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="formbold-form-title">
<!-- <h2>FarmSync</h2> -->
</div>


<?php
 $staff = isset($_POST['staff']) ? $_POST['staff'] : '';
?>
<div class="formbold-input-flex">
<label for="staff" class="formbold-form-label">staff</label>
<input type="text" name="staff" id="" required class="formbold-form-input  <?php echo (!empty($staff_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $staff; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $staff_err; ?></span>
</div>
<?php
$feed = isset($_POST['feed']) ? $_POST['feed'] : '';
?>
<div class="formbold-input-flex">
<label for="feed" class="formbold-form-label">Feed</label>
<input type="text" name="feed" id="feed" required class="formbold-form-input  <?php echo (!empty($feed_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $feed; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $feed_err; ?></span>
</div>



<div class="formbold-input-flex">
<label for="quantity" class="formbold-form-label">Quantity</label>
<input type="number" name="quantity" id="quantity" required class="formbold-form-input <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $quantity_err; ?></span>
</div>

<div class="formbold-input-flex">
<div>
    <label for="feed_time" class="formbold-form-label">Feed Time </label>
    <input type="datetime-local" name="feed_time" id="feed_time" required class="formbold-form-input <?php echo (!empty($feed_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $feed_time; ?>">
    <span class="invalid-feedback" style="display: none;"><?php echo $feed_time_err; ?></span>
</div>


<input type="submit" name="submit" class="formbold-btn" value="Add Schedule">
</form>
</section>

<section>
<a href="dashboard.php">
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