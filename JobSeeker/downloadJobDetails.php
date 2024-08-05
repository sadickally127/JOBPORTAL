<?php
session_start();

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Check if NewsId is provided in the URL
if (!isset($_GET['NewsId'])) {
    echo "Error: NewsId not provided.";
    exit();
}

// Retrieve NewsId from the URL
$NewsId = $_GET['NewsId'];

// Retrieve the PDF file URL from the database based on the NewsId
$sql = "SELECT JobNewsUrl FROM news_master WHERE NewsId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $NewsId);
$stmt->execute();
$stmt->bind_result($pdfUrl);
$stmt->fetch();
$stmt->close();

if ($pdfUrl) {
    // Construct the full URL using localhost
    $pdfUrl = "http://localhost/jobpanel/Employer/uploads/" . $pdfUrl;
    
    // Set headers for file download
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=\"Job_Post.pdf\"");
    
    // Provide the file for download
    readfile($pdfUrl);
    exit();
} else {
    echo "PDF not found for the specified job.";
}

// Close connection
$conn->close();
?>
