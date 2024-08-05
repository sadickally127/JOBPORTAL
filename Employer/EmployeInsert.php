<?php
session_start();

// Retrieve user email from session
$email = $_SESSION['user_email'];

if (!isset($email)) {
    // Redirect if session email is not set
    header("Location: login.php");
    exit();
}

// Establish Connection with MySQL
$con = mysqli_connect("localhost", "root", "", "jobpanel");

// Check if user exists in the database
$query = "SELECT * FROM user_master WHERE email = '$email'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    // Retrieve user ID
    $userId = $user['userId'];

    // Retrieve form data
    $CompanyName = mysqli_real_escape_string($con, $_POST['txtName']);
    $ContactPerson = mysqli_real_escape_string($con, $_POST['txtPerson']);
    $Address = mysqli_real_escape_string($con, $_POST['txtAddress']);
    $City = mysqli_real_escape_string($con, $_POST['txtCity']);
    $Mobile = mysqli_real_escape_string($con, $_POST['txtMobile']);
    $Area = mysqli_real_escape_string($con, $_POST['txtAreaWork']);
    $Question = mysqli_real_escape_string($con, $_POST['cmbQue']);
    $Answer = mysqli_real_escape_string($con, $_POST['txtAnswer']);

    // Check if there's an existing record for the user in employer_reg table
    $query = "SELECT * FROM employer_reg WHERE EmployerId = $userId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Update existing record
        $sql = "UPDATE employer_reg SET CompanyName = '$CompanyName', ContactPerson = '$ContactPerson', Address = '$Address', 
                City = '$City', Mobile = '$Mobile', Area_Work = '$Area', 
                Question = '$Question', Answer = '$Answer' WHERE EmployerId = $userId";
    } else {
        // Insert new record
        $sql = "INSERT INTO employer_reg (EmployerId, CompanyName, ContactPerson, Address, City, Mobile, Area_Work, Question, Answer) 
                VALUES ($userId, '$CompanyName', '$ContactPerson', '$Address', '$City', '$Mobile', '$Area', '$Question', '$Answer')";
    }

    // Execute query
    if (mysqli_query($con, $sql)) {
        echo '<script type="text/javascript">alert("Registration Completed Successfully"); window.location=\'EmployerProfileview.php\';</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "User not found.";
}
?>
