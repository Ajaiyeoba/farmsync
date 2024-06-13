
<?php
include '../config.php';


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
            <li><a href="../index.html">Home</a></li>            
            <li><a href="">About</a></li>            
            <li><a href="">Contact</a></li>
        </ul>

        <div class="nav-icon">
        <a href="../logout.php">
            <button class="formbold-btn">Logout</button>
        </a>
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section class="hero" id="staff" >
    
        <div class="">
            <h2>Aqua Place</h2>
            <h4 style="color:#fff;"> Farmer <b><?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : "Unknown"; ?></b></h4>
        </div>
            <h2></h2>
   

            <section>
                <a href="s_sche.php">
                    <button class="formbold-btn">  Feed Schedule</button>
                </a>
                <a href="stockdisplay.php">
                    <button class="formbold-btn"> View Feed </button>
                </a>
                <a href="s_harvest.php">
                    <button class="formbold-btn"> Harvest Records </button>
                </a>
                <a href="pond.php">
                    <button class="formbold-btn"> Ponds </button>
                </a>
            </section>

    <section class="contact" id="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>FarmHouse</h2>
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