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

// Query all Jobs
$sql = "SELECT * FROM news_master";
$result = $conn->query($sql);

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
        <li> <a href="AppliedJobs.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Applied Jobs</span>
            </a>
        </li>
        <li class="active"> <a href="ApplyJob.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Apply Job</span>
            </a>
        </li>
        <li class="logout"> <a href="logout.php">
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
        <h3>All Posted Jobs</h3>
        <table>
            <thead>
            <tr>
                <th>Job Title</th>
                <th>Date Posted</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['JobTitle']; ?></td>
                    <td><?php echo $row['NewsDate']; ?></td>
                    <td style="display: flex;">
                        <form action="ApplyJob.php" method="post">
                            <input type="hidden" name="newsId" value="<?php echo $row['NewsId']; ?>">
                            <button type="submit" name="apply" style="background-color:blue; color:aliceblue; padding:10px; border-radius:5px; margin-right:5px; justify-content:normal; cursor:pointer;">Apply</button>
                        </form>
                        <a href="downloadJobDetails.php?NewsId=<?php echo $row['NewsId']; ?>" style="background-color:green; color:aliceblue; padding:10px; border-radius:5px; margin-left:5px; text-decoration:none; justify-content:normal;">Download PDF</a>
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
// Handle apply request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['apply'])) {
    $newsId = $_POST['newsId'];
    
    // Retrieve Jobseeker's resume data from jobseeker_reg table
    $sql_resume = "SELECT Resume FROM jobseeker_reg WHERE JobseekerId = ?";
    $stmt_resume = $conn->prepare($sql_resume);
    $stmt_resume->bind_param("i", $JobseekerId);
    $stmt_resume->execute();
    $stmt_resume->store_result();
    
    // Check if resume data exists for the Jobseeker
    if ($stmt_resume->num_rows > 0) {
        // Bind result variables
        $stmt_resume->bind_result($resumeData);
        $stmt_resume->fetch();
        
        // Insert application information into Application_master table
        $sql_insert = "INSERT INTO application_master (JobseekerId, NewsId, JobseekerEmail, JobseekerResume) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iiss", $JobseekerId, $newsId, $JobseekerEmail, $resumeData);
        
        // Execute query
        if ($stmt_insert->execute()) {
            echo '<script type="text/javascript">alert("Your Application Has been sent Successfully"); window.location=\'ApplyJob.php\';</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Resume data not found for the Jobseeker.";
    }

    // Close statement
    $stmt_resume->close();
}

?>
