<?php
session_start();

// Check if jobseeker is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get jobseeker's email from session
$email = $_SESSION['user_email']; // Change 'email' to 'user_email'

// Establish Connection with Database
$con = mysqli_connect("localhost", "root", "", "jobpanel");

// Prepare and execute query to fetch jobseeker's profile based on email
$sql = "SELECT * FROM jobseeker_reg WHERE email = '$email'";
$result = mysqli_query($con, $sql);

// Check if query was successful
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch jobseeker's profile data
    $row = mysqli_fetch_assoc($result);
} else {
    // Handle error (e.g., profile not found)
    echo "Error: Jobseeker profile not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Profile</title>
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
      <li class="active"> <a href="JobseekerProfileview.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Profile</span>
         </a>
      </li>
      <li> <a href="AppliedJobs.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Applied Jobs</span>
         </a>
      </li>
      <li> <a href="ApplyJob.php">
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
      <h2>Employer Profile</h2>
   </div>
   <div class="user-info">
      <!-- Display Jobseeker's name -->
      <h3><?php echo $row['FullName']; ?></h3>
   </div>
</div>
<div class="tabular-wrapper">
   <h3 class="main-title">Profile Information</h3>
   <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ITEMS</th>
                <th>DETAILS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Full Name:</td>
                <td><?php echo $row['FullName']; ?></td>
            </tr>
            <tr>
                <td>GENDER:</td>
                <td><?php echo $row['Gender']; ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $row['Address']; ?></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><?php echo $row['City']; ?></td>
            </tr>
            <tr>
                <td>Birthdate:</td>
                <td><?php echo $row['Birthdate']; ?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?php echo $row['Mobile']; ?></td>
            </tr>
            <tr>
                <td>Resume:</td>
                <td><?php echo $row['Resume']; ?></td>
            </tr>
            <tr>
                <td>Security Question:</td>
                <td><?php echo $row['Question']; ?></td>
            </tr>
            <tr>
                <td>Answer:</td>
                <td><?php echo $row['Answer']; ?></td>
            </tr>
        </tbody>
    </table>
   </div>
</div>
</div>

</body>
</html>

<?php
// Close database connection
mysqli_close($con);
?>
