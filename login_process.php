<?php

// Start session
session_start();

// Establish Connection with MYSQL
$con = mysqli_connect("localhost", "root", "", "jobpanel");

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check if user exists in the database
$query = "SELECT * FROM user_master WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Check if user exists
if ($user) {
    // Start session and store user email
    $_SESSION['user_email'] = $email;

    // Redirect to user dashboard based on status
    if ($user['Status'] === 'Jobseeker') {
        header("Location: Jobseeker/JobseekerProfileview.php");
        exit();
    } elseif ($user['Status'] === 'Employer') {
        header("Location: Employer/EmployerProfileview.php");
        exit();
    } else {
        // User status not defined, handle accordingly
        echo "User status not defined.";
        // Redirect to a default page or display an error message
        // header("Location: dashboard.php");
        // exit();
    }
} else {
    // User does not exist or invalid credentials
    echo "Invalid email or password. Please try again.";
}


?>