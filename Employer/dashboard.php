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
                <span>Applie Jobs</span>
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
      <h2>Dashboard</h2>
   </div>
   <div class="user-info">
      <div class="search-box">
      <i class="fasolid fa-search"></i>
      <input type="text" placeholder="Search">
      </div>
      <img src=".image/Avatar" alt="User-image">
   </div>
</div>
<div class="tabular-wrapper">
   <h3 class="main-title">Complete Your Profile</h3>
   <div class="table-container">
   <div>
  
 <form action="Employer/EmployeInsert.php" method="post" enctype="multipart/form-data">
    <table>
        <thead>
            <tr>
                <th>ITEMS</th>
                <th>PARTICULARS</th>
            </tr>
        </thead>
        <tr>
            <td>Company Name:</td>
            <td><input type="text" name="txtName" required /></td>
        </tr>
        <tr>
            <td>Contact Person:</td>
            <td><input type="text" name="txtPerson" required /></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><textarea name="txtAddress" cols="45" rows="5" required></textarea></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input type="text" name="txtCity" required /></td>
        </tr>
        <tr>
            <td>Mobile:</td>
            <td><input type="text" name="txtMobile" required /></td>
        </tr>
        <tr>
            <td>Area of Work:</td>
            <td><input type="text" name="txtAreaWork" required /></td>
        </tr>
        <tr>
            <td>Security Question:</td>
            <td>
                <select name="cmbQue" required>
                    <option value="What is Your Pet Name?">What is Your Pet Name?</option>
                    <option value="Who is Your Favourite Person?" selected>Who is Your Favourite Person?</option>
                    <option value="What is the Name of Your First School?">What is the Name of Your First School?</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Answer:</td>
            <td><input type="text" name="txtAnswer" required /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="button2" value="Submit" /></td>
        </tr>
    </table>
 </form>
   </div>
</div>
</div>

</body>
</html>
