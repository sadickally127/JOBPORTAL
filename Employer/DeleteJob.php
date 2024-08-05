<?php
session_start();

// Check if employer is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Establish Connection with Database
$conn = mysqli_connect("localhost", "root", "", "jobpanel");

// Retrieve employer's email from session
$employerEmail = $_SESSION['user_email'];

// Query the EmployerId associated with the logged-in employer
$sql = "SELECT EmployerId FROM employer_reg WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employerEmail);
if (!$stmt->execute()) {
    echo "Error executing query: " . $stmt->error;
    exit();
}
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Employer not found."; // Handle error if employer not found
    exit();
}

$row = $result->fetch_assoc();
$employerId = $row['EmployerId'];

// Close statement
$stmt->close();

// Query job postings created by the employer using EmployerId
$sql = "SELECT * FROM news_master WHERE EmployerId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employerId); // Assuming EmployerId is an integer
if (!$stmt->execute()) {
    echo "Error executing query: " . $stmt->error;
    exit();
}
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No job postings found.";
}

// Close statement
$stmt->close();

// Function to delete a job posting
function deleteJobPosting($newsId, $conn) {
    // Prepare SQL statement to delete job posting
    $sql = "DELETE FROM news_master WHERE NewsId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $newsId);
    $stmt->execute();

    // Close statement
    $stmt->close();
}

?>

<?php
// Handle delete request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $newsId = $_POST['newsId'];
    deleteJobPosting($newsId, $conn);
    // Redirect to refresh the page after deletion
    header("Location: DeleteJob.php");
    exit();
}

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
      <li class="active"> <a href="dashboard.php">
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
      <li> <a href="AppliedJobs.php">
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
      <span>Primary</span>
      <h2>Employer Profile</h2>
   </div>
   <div class="user-info">
      <!-- Display employer's Email -->
      <h3><?php echo "Employer Email: " . $_SESSION['user_email'];?></h3>
   </div>
</div>
<div class="job-postings">
   <h3>My Job Postings</h3>
   <table>
       <thead>
           <tr>
               <th>Job Title</th>
               <th>Date Posted</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <?php while ($row = $result->fetch_assoc()) : ?>
               <tr>
                   <td><?php echo $row['JobTitle']; ?></td>
                   <td><?php echo $row['NewsDate']; ?></td>
                   <td>
                       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                           <input type="hidden" name="newsId" value="<?php echo $row['NewsId']; ?>">
                           <button type="submit" name="delete" style="background-color:green; color:aliceblue; padding:10px; border-radius:5px; margin-left:5px; text-decoration:none; justify-content:normal;">Delete</button>
                       </form>
                   </td>
               </tr>
           <?php endwhile; ?>
       </tbody>
   </table>
</div>
</div>

</body>
</html>


