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
        header("Location: ../homelogphp/dashboard.php"); // Redirect to the dashboard
        exit;
        // header('Location: dashboard.html');
    } else {
        echo "Login failed: Invalid username or password.";
    }
}

// Close the connection
mysqli_close($con);
?>


