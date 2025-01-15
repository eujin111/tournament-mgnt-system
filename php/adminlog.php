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
        $_SESSION['login_source'] = 'admin';
        header("Location: admdb.php"); // Redirect to admin dashboard
        exit;
    } else {
        echo "Invalid username or password."; // Show error
    }
}
?>
