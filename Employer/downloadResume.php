<?php
session_start();

// Check if Employer is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if Jobseeker Email is set in the URL
if (!isset($_GET['JobseekerEmail'])) {
    echo "Error: Jobseeker Email not provided.";
    exit();
}

// Retrieve Jobseeker Email from URL
$JobseekerEmail = $_GET['JobseekerEmail'];

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Retrieve the Resume URL from the database based on the Jobseeker Email
$sql = "SELECT ResumeURL FROM jobseeker_reg WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $JobseekerEmail);
$stmt->execute();
$stmt->bind_result($resumeUrl);
$stmt->fetch();
$stmt->close();

if (!empty($resumeUrl)) {
    // Set headers for file download
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=\"Candidate_Resume.pdf\"");
    
    // Provide the file for download
    readfile($resumeUrl);
    exit();
} else {
    echo "Resume-PDF URL not found for the specified Candidate.";
}

// Close connection
$conn->close();
?>
