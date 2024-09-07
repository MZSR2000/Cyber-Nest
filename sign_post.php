<?php
include("connect.php");
require_once 'vendor/autoload.php';

if (isset($_POST["submit"])) {
    $FirstName = trim($_POST["firstname"]);
    $LastName  = trim($_POST["lastname"]);
    $Email     = trim($_POST["email"]);
    $Phone     = trim($_POST["phone"]); 
    $Age       = trim($_POST["age"]); 
    $Password  = trim($_POST["password"]);

    //$hashedPassword= password_hash($Password, PASSWORD_BCRYPT);

    $err_s = 0;
    $FirstName_error = $LastName_error = $Email_error = $Phone_error = $Age_error = $Pass_error = '';

    // Validation for First Name and Last Name
    if (empty($FirstName) || empty($LastName) || strlen($FirstName) < 3 || strlen($LastName) < 3 || is_numeric($FirstName) || is_numeric($LastName)) {
        $err_s = 1;
        $FirstName_error = empty($FirstName) ? "Please Enter First Name <br>" : (strlen($FirstName) < 3 ? 'Your Firstname needs to have a minimum of 3 letters <br>' : 'Please enter a valid Firstname, not a number <br>');
        $LastName_error = empty($LastName) ? "Please Enter Last Name <br>" : (strlen($LastName) < 3 ? "Your Lastname needs to have a minimum of 3 letters <br>" : 'Please enter a valid Lastname, not a number <br>');
    }
    
    // Validation for Email
    if (empty($Email)) {
        $Email_error = 'Please insert email <br>';
        $err_s = 1;
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $Email_error = 'Please enter a valid email <br>';
        $err_s = 1;
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE email=?");
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $Email_error = '<p id="error">Sorry, Email already exists. Please change Email.<p> <br>';
            $err_s = 1;
        }
    }

    // Validation for Phone Number
    if (empty($Phone) || strlen($Phone) < 10) {
        $Phone_error = empty($Phone) ? 'Please Enter Phone number' : 'Your Phone number needs to have a minimum of 10 digits <br>';
        $err_s = 1;
    }

    // Validation for Age
    if (empty($Age) || !is_numeric($Age) || strlen($Age) < 2) {
        $Age_error = empty($Age) ? 'Please enter Age <br>' : 'Your Age needs to be a valid number with a minimum of 2 digits <br>';
        $err_s = 1;
    }

    // Validation for Password
    if (empty($Password) || strlen($Password) < 8) {
        $Pass_error = empty($Password) ? 'Please insert Password <br>' : 'Your password needs to have a minimum of 8 letters <br>';
        $err_s = 1;
    }

    if ($err_s == 0) {
        // Insert user data into the database using prepared statement
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, phone, age, password, md5_pass, secret_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $md5_pass = md5($Password);
        
        // Generate secret key
        $ga = new \PHPGangsta_GoogleAuthenticator();
        $secret_key = $ga->createSecret();
 
        // Insert user data and secret key into the database
        $stmt->bind_param("ssssssss", $FirstName, $LastName, $Email, $Phone, $Age, $Password, $md5_pass, $secret_key);
        $stmt->execute();

        // Display the 2FA secret key to the user (temporary display)
        echo 'Registration successful. Your Two-Factor Authentication (2FA) secret key is: ' . $secret_key . '<br>';
        echo 'Please store this key securely.<br>';
        echo 'You will not be able to view it again.';

        // Store the secret key in a session variable for a short duration
        session_start();
        $_SESSION['temp_secret_key'] = $secret_key;
        header('Refresh: 30; URL=sign2.php'); // Redirect to login page after 60 seconds
        exit();
        // Redirect to the next step of the signup process
        header('Location: sign2.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

include('sign1.php');
?>
