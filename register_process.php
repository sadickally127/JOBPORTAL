<?php
// Establish Connection with MYSQL
$conn = mysqli_connect ("localhost","root","","jobpanel");

// Get form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];

// Check if the email already exists in the user_master table
$sql = "SELECT COUNT(*) AS count FROM user_master WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if ($count > 0) {
    // Email already exists, handle the error (e.g., display an error message)
    echo "Error: Email address already exists!";
} else {
    // Insert data into user_master table
    $sql = "INSERT INTO user_master (username, FullName, email, password, Status) VALUES ('$email', '$fullname', '$email', '$password', '$status')";
    $result = mysqli_query($conn, $sql);

    // Check if user_master insertion was successful
    if ($result) {
        // Get the auto-generated userId
        $userId = mysqli_insert_id($conn);

        // Insert data into appropriate table based on status
        if ($status === 'Employer') {
            $employerSql = "INSERT INTO employer_reg (email) SELECT '$email' WHERE NOT EXISTS (SELECT * FROM employer_reg WHERE email = '$email')";
            $employerResult = mysqli_query($conn, $employerSql);
            if (!$employerResult) {
                // Handle error (e.g., log or display error message)
                echo "Error: " . mysqli_error($conn);
            }
        } elseif ($status === 'Jobseeker') {
            $jobseekerSql = "INSERT INTO jobseeker_reg (email) SELECT '$email' WHERE NOT EXISTS (SELECT * FROM jobseeker_reg WHERE email = '$email')";
            $jobseekerResult = mysqli_query($conn, $jobseekerSql);
            if (!$jobseekerResult) {
                // Handle error (e.g., log or display error message)
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Handle invalid status (optional)
            echo "Error: Invalid status!";
        }

        // Redirect to success page or perform other actions
        header("Location: registration_success.php");
        exit();
    } else {
        // Handle user_master insertion failure
        echo "Error: " . mysqli_error($conn);
    }
}
?>
