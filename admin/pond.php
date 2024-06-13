<?php

include '../config.php';


if ( 
    isset($_POST['submit']) )  {
        $pond_name = $_POST['pond_name'];
        $size = $_POST['size'];
        $fish_quantity = $_POST['fish_quantity'];
     

        $sql = " INSERT INTO   `pond` ( pond_name, size, fish_quantity) VALUES (?,?,?)";
        // Prepare the SQL statement
        $stmt = $link ->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sii", $pond_name, $size, $fish_quantity );

            if ($stmt -> execute()) {
                header('location:pond.php');
                exit();
            } else {
                die("Error" .$stmt->error);
            }
        } else {
            die("Error" .$link->error);
        }
    }

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
        <a href="dashboard.php">
    <button class="formbold-btn">Dashboard</button>
</a>
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

<section>
<section style="background-color: #04b01d; ">
<div class="formbold-main-wrappper">
<div class="formbold-form-wrapper">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multitype">
<div class="formbold-form-title">
<h2> Add Pond</h2>
</div>
<?php
$pond_name = isset($_POST['pond_name']) ? $_POST['pond_name'] : '';
?>
<div class="formbold-input-flex">
<label for="pond_name" class="formbold-form-label">Pond Name</label>
<input type="text" name="pond_name" id="pond_name" class="formbold-form-input <?php echo (!empty($pond_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pond_name; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $pond_name_err; ?></span>
</div>

<div class="formbold-input-flex">
<label for="size" class="formbold-form-label">Size</label>
<input type="number" name="size" id="size" class="formbold-form-input <?php echo (!empty($size_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $size; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $size_err; ?></span>
</div>

<div class="formbold-input-flex">
<?php
$fish_quantity = isset($_POST['fish_quantity']) ? $_POST['fish_quantity'] : '';
?>
<label for="fish_quantity" class="formbold-form-label">Fish Quantity</label>
<input type="text" name="fish_quantity" id="fish_quantity" class="formbold-form-input <?php echo (!empty($fish_quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fish_quantity; ?>">
<span class="invalid-feedback" style="display: none;"><?php echo $fish_quantity_err; ?></span>
</div>



<input type="submit" name="submit" class="formbold-btn" value="Save">
</form>
</div>




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