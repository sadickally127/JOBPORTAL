<?php
session_start();

// Check if Jobseeker is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Retrieve Jobseeker's email from session
$JobseekerEmail = $_SESSION['user_email'];

// Query the JobseekerId associated with the logged-in Jobseeker
$sql = "SELECT JobseekerId FROM jobseeker_reg WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $JobseekerEmail);
if (!$stmt->execute()) {
    echo "Error executing query: " . $stmt->error;
    exit();
}
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Jobseeker not found."; // Handle error if Jobseeker not found
    exit();
}

$row = $result->fetch_assoc();
$JobseekerId = $row['JobseekerId'];

// Close statement
$stmt->close();

// Query applied jobs from application_master table
$sql = "SELECT n.Company, n.JobTitle, n.NewsDate FROM application_master a
        INNER JOIN news_master n ON a.NewsId = n.NewsId
        WHERE a.JobseekerId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $JobseekerId);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="sidebar">
    <div class="logo"></div>
    <ul class="menu">
        <li> <a href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li> <a href="JobseekerProfileview.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Profile</span>
            </a>
        </li>
        <li  class="active"> <a href="AppliedJobs.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Applied Jobs</span>
            </a>
        </li>
        <li> <a href="ApplyJob.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Apply Job</span>
            </a>
        </li>
        <li class="logout"> <a href="#">
                <i class="fas fa-tachometer-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Jobseeker Dashboard</h2>
        </div>
        <div class="user-info">
            <!-- Display Jobseeker Email -->
            <h3><?php echo "Jobseeker Email: " . $_SESSION['user_email'];?></h3>
        </div>
    </div>
    <div class="job-postings">
        <h3>Applied Jobs</h3>
        <table>
            <thead>
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Date Posted</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['Company']; ?></td>
                    <td><?php echo $row['JobTitle']; ?></td>
                    <td><?php echo $row['NewsDate']; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
// Close statement and connection
$stmt->close();
$conn->close();
?>
