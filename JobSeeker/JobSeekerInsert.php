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
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Check if user exists in the database
$query = "SELECT * FROM user_master WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // Retrieve user ID
    $userId = $user['userId'];

    // Retrieve form data
    $Gender = $_POST['txtGender'];
    $Birthday = $_POST['txtBday'];
    $Address = $_POST['txtAddress'];
    $City = $_POST['txtCity'];
    $Mobile = $_POST['txtMobile'];
    $Resume = $_FILES['txtResume']['name']; // File name only
    $Question = $_POST['cmbQue'];
    $Answer = $_POST['txtAnswer'];
    $ResumeURL = "ruploads/" . $Resume; // Constructing the Resume URL

    // Move uploaded resume file to desired directory
    $targetDir = "ruploads/";
    $targetFile = $targetDir . basename($_FILES["txtResume"]["name"]);
    move_uploaded_file($_FILES["txtResume"]["tmp_name"], $targetFile);

    // Check if there's an existing record for the user in jobseeker_reg table
    $query = "SELECT * FROM jobseeker_reg WHERE JobseekerId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $sql = "UPDATE jobseeker_reg SET Gender = ?, Birthdate = ?, Address = ?, 
                City = ?, Mobile = ?, Resume = ?, ResumeURL = ?, 
                Question = ?, Answer = ? WHERE JobseekerId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $Gender, $Birthday, $Address, $City, $Mobile, $Resume, $ResumeURL, $Question, $Answer, $userId);
    } else {
        // Insert new record
        $sql = "INSERT INTO jobseeker_reg (JobseekerId, Gender, Birthdate, Address, City, Mobile, Resume, ResumeURL, Question, Answer) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssss", $userId, $Gender, $Birthday, $Address, $City, $Mobile, $Resume, $ResumeURL, $Question, $Answer);
    }

    // Execute query
    if ($stmt->execute()) {
        echo '<script type="text/javascript">alert("Registration Completed Successfully"); window.location=\'JobseekerProfileview.php\';</script>';
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
    // Close the connection
    $conn->close();
} else {
    echo "User not found.";
}
?>
