<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>


 <!-- REGISTRATION FORM START -->
<h2>Registration</h2>
<form action="register_process.php" method="post">
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    
    <label for="status">Status:</label><br>
    <select id="status" name="status" required>
        <option value="Employer">Employer</option>
        <option value="Jobseeker">Jobseeker</option>
    </select><br>
    
    <input type="submit" value="Register">
</form>



    <!-- LOGIN FORM START
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Login">
    </form> -->


</body>
</html>
