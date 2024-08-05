<?php
session_start();

// Check if employer is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Function to check directory existence and create if necessary
function ensureUploadsDirectoryExists() {
    $uploadDirectory = __DIR__ . "/Employer/uploads/";

    // Check if the directory exists
    if (!file_exists($uploadDirectory)) {
        // If it doesn't exist, create it
        if (!mkdir($uploadDirectory, 0755, true)) {
            // If mkdir fails, handle the error
            die("Failed to create directory");
        }
    }
}

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Initialize variables
$company = "";
$jobTitle = "";
$newsDate = date("Y-m-d");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ensure "uploads" directory exists
    ensureUploadsDirectoryExists();

    // Retrieve form data
    $company = $_POST['company'];
    $jobTitle = $_POST['job_title'];
    $newsDate = $_POST['job_date'];

    // Get EmployerId of logged-in user
    $userEmail = $_SESSION['user_email'];
    $employerQuery = "SELECT EmployerId FROM employer_reg WHERE email = '$userEmail'";
    $employerResult = mysqli_query($conn, $employerQuery);
    $employerData = mysqli_fetch_assoc($employerResult);
    $employerId = $employerData['EmployerId'];

    // File upload
    $targetDir = "Employer/uploads/";
    $targetFile = $targetDir . basename($_FILES["job_pdf"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a PDF
    if($fileType != "pdf") {
        $error = "Only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["job_pdf"]["size"] > 500000) {
        $error = "File is too large.";
        $uploadOk = 0;
    }

    // Check if file was uploaded without errors
    if ($uploadOk == 0) {
        $error = "File was not uploaded.";
    } else {
        // Attempt to move uploaded file to destination directory
        if (move_uploaded_file($_FILES["job_pdf"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, proceed with database insertion
            // Get the URL of the uploaded file
            $fileUrl = $_SERVER['HTTP_HOST'] . "/jobpanel/" . $targetFile;

            // Insert new job posting with EmployerId
            $sql = "INSERT INTO news_master (EmployerId, company, JobTitle, JobNewsUrl, NewsDate) VALUES (?, ?, ?, ?, ?)";
            
            // Prepare and bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $employerId, $company, $jobTitle, $fileUrl, $newsDate);
            
            // Execute statement
            if ($stmt->execute()) {
                // Job added successfully
                $message = "Job added successfully.";
            } else {
                // Error occurred
                $error = "Error: " . $conn->error;
            }

            // Close statement
            $stmt->close();
        } else {
            // Error occurred while uploading file
            $error = "There was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
?>


<?php
        // Display success or error message if set
        if (isset($message)) {
            echo '<p class="success">' . $message . '</p>';
        } elseif (isset($error)) {
            echo '<p class="error">' . $error . '</p>';
        }
    ?>