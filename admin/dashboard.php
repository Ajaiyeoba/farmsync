
<?php
include '../config.php';

// Debugging
// echo "Session Data: <pre>";
// var_dump($_SESSION);
// echo "</pre>";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $category = $_POST['category'];
    $storage = $_POST['storage'];
    $image = $_POST['image']; // Note: File uploads require 'enctype="multipart/form-data"' in the form tag
    $date = $_POST['date'];
    $comment = $_POST['comment'];

    // Prepare the SQL statement
    $sql = "INSERT INTO `store_db` (product, quantity, unit, category, storage, image, date, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $link->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sissssss", $product, $quantity, $unit, $category, $storage, $image, $date, $comment);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to saved.php after successful insertion
            header('location: saved.php');
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
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <style>
.formbold-main-wrapper{
    display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
}
.formbold-form-wrapper {
          margin: 0 auto;
          max-width: 570px;
          width: 100%;
          background: white;
          padding: 40px;
        }
        .formbold-form-title {
          margin-bottom: 30px;
        }
        .formbold-form-title h2 {
          font-weight: 600;
          font-size: 28px;
          line-height: 34px;
          color: #07074d;
        }
        .formbold-input-flex {
          display: flex;
          gap: 20px;
          margin-bottom: 15px;
        }
        .formbold-input-flex > div {
          width: 50%;
        }
        .formbold-form-input {
          text-align: left;
          width: 100%;
          padding: 13px 22px;
          border-radius: 5px;
          border: 1px solid #dde3ec;
          background: #ffffff;
          font-weight: 500;
          font-size: 16px;
          color: #536387;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-form-label {
          color: #04b01d;
          font-size: 14px;
          line-height: 24px;
          display: block;
          margin-bottom: 10px;
        }
        .formbold-btn {
          font-size: 16px;
          border-radius: 5px;
          padding: 14px 25px;
          border: none;
          font-weight: 500;
          background-color: #04b01d;
          color: white;
          cursor: pointer;
          margin-top: 25px;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-mb-3 {
          margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <a href="" class="logo">
            <h2>FarmHouse </h2> 
           
        </a>

        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="">About</a></li>            
            <li><a href="">Contact</a></li>

        </ul>

        <div class="nav-icon">
        <a href="logout.php">
            <button class="formbold-btn">Logout</button>
        </a>
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section class="hero">
        <div class="">
            <h2>FarmHouse</h2>
            <h4>Welcome Farmer <b><?php echo isset($_SESSION["email"]) ?  htmlspecialchars($_SESSION["email"]) :
             "Unknown"
            ; 
             ?></b></h4>
        </div>
            <h2>
            <!-- <?php //echo htmlspecialchars($_SESSION["fullname"]); ?> -->
            </h2>
   

            <section>
                <a href="schedlue_board.php">
                    <button class="formbold-btn">  Feed Schedule</button>
                </a>
                <a href="stockdisplay.php">
                    <button class="formbold-btn"> View Feed </button>
                </a>
                <a href="staff.php">
                    <button class="formbold-btn"> Staff List </button>
                </a>

                <a href="harvest_record.php">
                    <button class="formbold-btn"> Harvest Record </button>
                </a>

                <a href="pond.php">
                    <button class="formbold-btn"> Add Pond </button>
                </a>
            </section>


    <section class="contact">
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