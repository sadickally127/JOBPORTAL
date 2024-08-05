<?php
session_start();

// Check if Employer is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Retrieve Employer's email from session
$EmployerEmail = $_SESSION['user_email'];

// Query the EmployerId associated with the logged-in Employer
$sql = "SELECT EmployerId FROM employer_reg WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $EmployerEmail);
if (!$stmt->execute()) {
    echo "Error executing query: " . $stmt->error;
    exit();
}
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Employer not found."; // Handle error if Employer not found
    exit();
}

$row = $result->fetch_assoc();
$EmployerId = $row['EmployerId'];

// Close statement
$stmt->close();

// Query applied jobs from application_master table
$sql = "SELECT n.Company, n.JobTitle, a.JobseekerEmail, a.NewsId FROM application_master a
        INNER JOIN news_master n ON a.NewsId = n.NewsId
        WHERE n.EmployerId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $EmployerId);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
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
        <li> <a href="EmployerProfileview.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Profile</span>
            </a>
        </li>
        <li> <a href="JobManage.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Add Job</span>
            </a>
        </li>
        <li> <a href="DeleteJob.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Delete Job</span>
            </a>
        </li>
        <li class="active"> <a href="AppliedJobs.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Applied Jobs</span>
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
            <h2>Employer Dashboard</h2>
        </div>
        <div class="user-info">
            <!-- Display Employer Email -->
            <h3><?php echo "Employer Email: " . $_SESSION['user_email'];?></h3>
        </div>
    </div>
    <div class="job-postings">
        <h3>Applied Jobs</h3>
        <table>
            <thead>
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Candidate's Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['Company']; ?></td>
                    <td><?php echo $row['JobTitle']; ?></td>
                    <td><?php echo $row['JobseekerEmail']; ?></td>
                    <td>
                        <a href="downloadResume.php?JobseekerEmail=<?php echo urlencode($row['JobseekerEmail']); ?>" style="background-color:green; color:aliceblue; padding:10px; border-radius:5px; margin-left:5px; text-decoration:none; justify-content:normal;">Download Resume</a>
                    </td>
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
