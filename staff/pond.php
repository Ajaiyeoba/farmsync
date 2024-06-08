<?php

include '../config.php';
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$sql = " SELECT id, pond_name, size, fish_quantity from pond";
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
    <title>FarmSync Home Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <header>
        <a href="" class="logo">
            <h2>FarmSync </h2> 
        </a>
        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="">About</a></li>            
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-icon">
        <a href="staff_board.php">
    <button class="formbold-btn">Dashboard</button>
</a>
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

<section>

</section>




<section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                            <tr class="table100-head">
                                    <th>Id</th>
                                    <th>Pond </th>
                                    <th>Size</th>
                                    <th>Fish Quantity</th> 

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($farm as $rows): ?>
                                <tr>
                                <td class="column1"> <?php echo ($rows['id']); ?></td>   
                                <td class="column1"> <?php echo ($rows['pond_name']); ?></td>
                                <td class="column2"> <?php echo ($rows['size']); ?>Metre</td>
                                <td class="column3"> <?php echo ($rows['fish_quantity']); ?> </td>     
                              
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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