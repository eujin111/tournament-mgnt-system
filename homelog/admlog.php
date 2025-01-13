<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'tournamentmgnt');
if (!$con) {
    die("Failed to connect to the database");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['usernameadm'];
    $password = $_POST['passwordadm'];

    // Query to validate admin
    $sql = "SELECT * FROM admins WHERE usernameadm = '$username' AND passwordadm = '$password'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        session_start();
        $_SESSION['username'] = $username; // Store username in session
        header("Location: admdb.php"); // Redirect to admin dashboard
        exit;
    } else {
        echo "Invalid username or password."; // Show error
    }
}
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
            <form action="admlog.php" method="POST">
                <input type="text" name="usernameadm" placeholder="Username" class="input-field" required />
                <input type="password" name="passwordadm" placeholder="Password" class="input-field" required />
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="login-btn">Log in</button>
                <div class="register-link">
                    <a href="index.html">Back</a> <span>|</span> <a href="login.php">Not a Admin</a>
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="../images/jett.png" alt="Character Image">
        </div>
    </div>
</body>
</html>
