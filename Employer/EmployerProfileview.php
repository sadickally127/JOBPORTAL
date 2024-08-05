<?php
session_start();

// Check if employer is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get employer's email from session
$email = $_SESSION['user_email']; // Change 'email' to 'user_email'

// Establish Connection with Database
$con = mysqli_connect("localhost", "root", "", "jobpanel");

// Prepare and execute query to fetch employer's profile based on email
$sql = "SELECT * FROM employer_reg WHERE email = '$email'";
$result = mysqli_query($con, $sql);

// Check if query was successful
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch employer's profile data
    $row = mysqli_fetch_assoc($result);
} else {
    // Handle error (e.g., profile not found)
    echo "Error: Employer profile not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Profile</title>
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
      <li class="active"> <a href="EmployerProfileview.php">
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
      <!-- Display employer's name -->
      <h3><?php echo $row['CompanyName']; ?></h3>
   </div>
</div>
<div class="tabular-wrapper">
   <h3 class="main-title">Profile Information</h3>
   <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Company Name:</td>
                <td><?php echo $row['CompanyName']; ?></td>
            </tr>
            <tr>
                <td>Contact Person:</td>
                <td><?php echo $row['ContactPerson']; ?></td>
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
                <td>Email:</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?php echo $row['Mobile']; ?></td>
            </tr>
            <tr>
                <td>Area of Work:</td>
                <td><?php echo $row['Area_work']; ?></td>
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
