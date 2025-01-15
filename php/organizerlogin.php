<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'tournamentmgnt');

// Check connection
if (!$con) {
    die("Failed to connect to the database");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['usernameor'];
    $password = $_POST['passwordor'];

    // Query to validate user
    $sql = "SELECT * FROM organizers WHERE usernameor = '$username' AND passwordor= '$password'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        session_start();
        $_SESSION['username'] = $username; // Store username in the session
        header("Location: orgdb.php"); // Redirect to the dashboard
        exit;
        // header('Location: dashboard.html');
    } else {
        echo "Login failed: Invalid username or password.";
    }
}

// Close the connection
mysqli_close($con);
?>



