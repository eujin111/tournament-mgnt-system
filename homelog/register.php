<?php

$host = 'localhost';
$dbname = 'tournamentmgnt';
$username = 'root'; 
$password = ''; 

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Collect form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $isValid = true;

    //Query to select if gmail already exists in database.
    $sqlemail = "SELECT email FROM userstmt where email = '$email'";
        //Execute the query and store it in a variable.
        $resemail = mysqli_query($conn, $sqlemail);

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    //Validate firstname.
    if(!preg_match("/^[a-zA-Z]{3,}/", $full_name)){
        $_SESSION['fullNameError'] = "Invalid Name.";
        $isValid = false;
    }

    //Validate gmail.
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailError'] = "Invalid email.";
        $isValid = false;
    } 
    //Check if email already exists.
        elseif(mysqli_num_rows($resemail) > 0) {
            $_SESSION['emailError'] = "Email already in use.";
            $isValid = false;
    }

    //Validate password.
    if(!preg_match("/^(?=(.*[a-zA-Z]))(?=(.*\d))(?=(.*\w)).{8,}$/", $password)){
        $_SESSION['passwordError'] = "Not proper password used";
        $isValid = false;
    }
    
    //Check if passwords match.
    if(($password != $confirm_password) || ($password == "" || $confirm_password == "")){
        $_SESSION['confirmpasswordError'] = "Passwords do not match";
        $isValid = false;
    }

    if($isValid){
    // Insert the data into the database
    $sql = "INSERT INTO userstmt (full_name, email, usernametm, passwordtm) VALUES ('$full_name', '$email', '$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: home.html");
    }
    // $res = mysqli_query($conn, $sql);
    //         if(!$res){ 
    //     echo "Registration unsuccessful!";
    //     header("Location: register.php");
    // } 
    // $conn->close();
}
else{
        header("Location: login.php");
    }
}

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETourna Registration</title>
    <link rel="stylesheet" href="../Assets/regstyle.css">
</head>
<body>
    <div class="registration-container">
        <div class="registration-form">
            <div class="logo">
                <img src="../images/etourna.png" alt="ETourna Logo">
            </div>
            <form action="register.php" method="POST">
                <input type="text" name="full_name" placeholder="Full Name" class="input-field" required />
                <error style="display: block; height: 1.6rem;">
                        <?php
                        if(isset($_SESSION['fullNameError'])){
                            echo "<br><e>".$_SESSION['fullNameError']."</e>";
                        }
                        ?>
                </error>
                <input type="email" name="email" placeholder="Email" class="input-field" required />
                <error style="display: block; height: 1.6rem;">
                        <?php
                        if(isset($_SESSION['emailError'])){
                            echo "<br><e>".$_SESSION['emailError']."</e>";
                        }
                        ?>
                </error>       
                <input type="text" name="username" placeholder="Username" class="input-field" required />
                <error style="display: block; height: 1.6rem;">
                        <?php
                        if(isset($_SESSION['fullNameError'])){
                            echo "<br><e>".$_SESSION['fullNameError']."</e>";
                        }
                        ?>
                </error>
                <input type="password" name="password" placeholder="Password" class="input-field" required />
                <error style="display: block; height: 1.6rem;">
                        <?php
                        if(isset($_SESSION['passwordError'])){
                            echo "<br><e>".$_SESSION['passwordError']."</e>";
                        }
                        ?>
                </error>
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="input-field" required />
                <error style="display: block; height: 1.6rem;">
                        <?php
                        if(isset($_SESSION['confirmpasswordError'])){
                            echo "<br><e>".$_SESSION['confirmpasswordError']."</e>";
                        }
                        ?>
                </error>
                <div class="terms">
                    <input type="checkbox" id="terms" required />
                    <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                </div>
                <button type="submit" name="register" class="register-btn">Register</button>
                <div class="register-link">
                    <a href="login.php">Have an Account ?</a> <span>|</span> <a href="admlog.php">Not a User</a><span>|</span> <a href="index.html">Back</a>
                </div>
            </form>            
        </div>
        <div class="image-container">
            <img src="../images/cypher.png" alt="Character Image">
        </div>
    </div>
</body>
</html>
