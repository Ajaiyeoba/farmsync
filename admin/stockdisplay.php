<?php
require_once "../config.php";
// Start the session
session_start();
  
  // Check if the admin is logged in, if not then redirect them to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}

$sql = " SELECT id, product, unit, quantity, date, comment from feed_stock";


$stmt =  mysqli_prepare($link, $sql);

if($stmt) {
    mysqli_stmt_execute($stmt);
    $result  = mysqli_stmt_get_result($stmt);
    $farm = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $farm[] = $row; 
        }
        mysqli_free_result($result);
    }
    else {
        echo "error" . mysqli_error($link);
    }
    mysqli_close($link); 
}
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
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

        <a href=""><i class="fa-solid fa-film"></i></a>
        <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <h4>Welcome Farmer <b><?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : "Unknown"; ?></b></h4>


<section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                            <tr class="table100-head">
                                    <th>Id</th>
                                    <th>Product </th>
                                    <th>Quantity</th>
                                    <th>Unit</th> 
                                    <th>Comment</th>
                                    <th>Purchase Date</th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($farm as $rows): ?>
                                <tr>
                                <td class="column1"> <?php echo ($rows['id']); ?></td>   
                                <td class="column1"> <?php echo ($rows['product']); ?></td>
                                <td class="column2"> <?php echo ($rows['quantity']); ?></td>
                                <td class="column3"> <?php echo ($rows['unit']); ?> Kg</td>     
                                <td class="column3"> <?php echo ($rows['comment']); ?> Kg</td>   
                                <td class="column3"> <?php echo ($rows['date']); ?> Kg</td>             
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
<a href="dashboard.php">
    <button class="formbold-btn">Dashboard</button>
</a>

<a href="feed_store.php">
    <button class="formbold-btn">Store Feed</button>
</a>
</section>





    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>FarmHouse</h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>08052148610</p>
                <p>ajaiyeobajibola@gmail.com</p>
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
