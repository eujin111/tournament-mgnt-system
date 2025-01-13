<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'tournamentmgnt');

// Check connection
if (!$con) {
    die("Failed to connect to the database");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['usernametm'];
    $password = $_POST['passwordtm'];

    // Query to validate user
    $sql = "SELECT * FROM userstmt WHERE usernametm = '$username' AND passwordtm = '$password'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        session_start();
        $_SESSION['username'] = $username; // Store username in the session
        header("Location: dashboard.php"); // Redirect to the dashboard
        exit;
        // header('Location: dashboard.html');
    } else {
        echo "Login failed: Invalid username or password.";
    }
}

// Close the connection
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETourna Login</title>
    <link rel="stylesheet" href="../Assets/styles.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="logo">
                <img src="../images/etour.svg" alt="ETourna Logo">
            </div>
            <form action="login.php" method="POST">
                <input type="text" name="usernametm" placeholder="Username" class="input-field" required />
                <input type="password" name="passwordtm" placeholder="Password" class="input-field" required />
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="login-btn">Log in</button>
                <div class="register-link">
                    <a href="register.php">Register Now</a> <span>|</span> <a href="admlog.php">Not a User</a><span>|</span><a href="organizerlogin.php">Organizer</a>
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="../images/cypher.png" alt="Character Image">
        </div>
    </div>
</body>
</html>
