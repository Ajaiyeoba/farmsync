<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $email = $role  = $password = $confirm_password = "";
$username_err = $email_err = $role_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z ]+$/', trim($_POST["username"]))) {
        $username_err = "Enter your full name";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Validate email address
    if (empty($_POST["email"])) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate phone number
    if (empty(trim($_POST["role"]))) {
        $role_err = "Please enter your role.";
    } elseif (strlen(trim($_POST["role"]))) {
        $role_err = "Please enter a valid role.";
    } else {
        $role = trim($_POST["role"]);
    }
    
    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($username_err) && empty($email_err)  && empty($role_err)  && empty($password_err) && empty($confirm_password_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO farmu (username, email, role,  password) VALUES (?, ?, ?,?)";
         
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_role, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_role = $role;
            $param_password = $password; 
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
         
        </div>
    </header>

        <section>
        <div class="formbold-main-wrappper">
        <div class="formbold-form-wrapper">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="formbold-form-title">
                    <h2 style="color: #04b01d">Admin Register</h2>

    </div>
    <div class="formbold-input-flex">
    <label for="staff_id" class="formbold-form-label">
                  Username
                </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Enter your username"
                    class="formbold-form-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"  value="<?php echo $username; ?>"
                />
                <span class="invalid-feedback" style="display: none;" ><?php echo $username_err; ?></span>
    </div>

    <div class="formbold-input-flex">
    <label for="password" class="formbold-form-label">
                  Email
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Enter your Email Address"
                    class="formbold-form-input <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"
                />
                <span class="invalid-feedback" style="display: none;" ><?php echo $email_err; ?></span>
              </div>

    <div class="formbold-input-flex">
    <label for="role" class="formbold-form-label">
              Role
                </label>
                <input
                    type="tel"
                    name="role"
                    id="role"
                    placeholder="Enter your role "
                    class="formbold-form-input <?php echo (!empty($role)) ? 'is-invalid' : ''; ?>"  value="<?php echo $role; ?>"
                />
                <span class="invalid-feedback" style="display: none;" ><?php echo $role_err; ?></span>
    </div>
    <div class="formbold-input-flex">
            <div>
                <label for="password" class="formbold-form-label">
                  Password
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter your Password"
                    class="formbold-form-input  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"
                />
                <span class="invalid-feedback" style="display: none;" ><?php echo $password_err; ?></span>
              </div>
              <div>
                <label for="password" class="formbold-form-label">
                  Confirm Paasword
                </label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Confirm Your Password"
                    class="formbold-form-input   <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"
                />
                <span class="invalid-feedback" style="display: none;" ><?php echo $confirm_password_err; ?></span>
              </div>
    </div>

    <input type="submit" name="submit" class="formbold-btn" value="Register">
        <p>Already Have an Account? <a href="login.php">Login</a></p>
</div>
    </div>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>

    <script src="app.js"></script>
</body>
</html>