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


