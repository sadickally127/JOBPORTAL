

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
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
      <h2>Add Job</h2>
   </div>
    </div>
    <div class="form-container">
    <form action="Addjob.php" method="post" enctype="multipart/form-data">
    <table>
            <thead>
                <tr>
                    <th>ITEMS</th>
                    <th>PARTICULARS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Company Name:</td>
                    <td><input type="text" name="company" required></td>
                </tr>
                <tr>
                    <td>Job Title:</td>
                    <td><input type="text" name="job_title" required></td>
                </tr>
                <tr>
                    <td>Job Description:</td>
                    <td><input type="file" name="job_pdf" accept=".pdf" required></td>
                </tr>
                <tr>
                    <td>Job Date:</td>
                    <td><input type="date" name="job_date" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="button2" value="Submit" style="background-color:green; color:aliceblue; padding:10px; border-radius:5px; margin-left:5px; text-decoration:none; justify-content:normal;"></td>
                </tr>
            </tbody>
        </table>
       
    </form>
</div>
</div>

</body>
</html>
