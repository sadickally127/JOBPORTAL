
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    
    <title>Welcome to online job portal</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
</head>

<body id="www-url-cz">


<!-- BEGINNING MAIN -->
<div id="main" class="box">

 <!-- BEGINNING MENUE TABS -->
 <div id="tabs" class="noprint">
        <h3 class="noscreen">Navigation</h3>
        <ul class="box">
            <li><a href="index.php">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
            <li><a href="AboutUs.php">About Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
            <li><a href="News.php">Latest News<span class="tab-l"></span><span class="tab-r"></span></a></li>
            <li><a href="ContactUs.php">Contact Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
        </ul>
        <hr class="noscreen" />
    </div>
 <!-- ENDING MENUE TABS -->


<!-- CONTENT AND ARTICLE BEGINNING -->
<div class="article">
	<h2><span><a href="#"><strong>Job Seeker Registration Form</a></span></strong></h2>
	<div class="login">
		<form action="JobSeekerInsert.php" method="post" onSubmit="return validateForm(this,arrFormValidation);" enctype="multipart/form-data" id="form2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>JobSeeker Name:</td>
					<td><span id="sprytextfield3">
					<label>
					<input type="text" name="txtName" id="txtName" />
					</label>
					<span class="textfieldRequiredMsg">Enter Name</span></span></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><span id="sprytextarea1">
					<label>
					<textarea name="txtAddress" id="txtAddress" cols="45" rows="5"></textarea>
					</label>
					<span class="textareaRequiredMsg">Enter Address</span></span></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><span id="sprytextfield4">
					<label>
					<input type="text" name="txtCity" id="txtCity" />
					</label>
					<span class="textfieldRequiredMsg">Enter City</span></span></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><span id="sprytextfield5">
					<label>
					<input type="text" name="txtEmail" id="txtEmail" />
					</label>
					<span class="textfieldRequiredMsg">Enter Email Id</span></span></td>
				</tr>
				<tr>
					<td>Mobile:</td>
					<td><span id="sprytextfield6">
					<label>
					<input type="text" name="txtMobile" id="txtMobile" />
					</label>
					<span class="textfieldRequiredMsg">Enter Mobile</span></span></td>
				</tr>
				<tr>
					<td>Qualification:</td>
					<td><label>
					<input type="text" name="txtQualification" id="txtQualification" />
					</label>
					<span class="textfieldRequiredMsg">Enter Qualification</span></td>
				</tr>
									
				<tr>
					<td>Gender:</td>
					<td><label>
					<select name="cmbGender" id="cmbGender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select>
					</label></td>
				</tr>
				<tr>
					<td>BirthDate:</td>
					<td><span id="sprytextfield7">
					<label>
					<input type="text" name="txtBirthDate" onclick="ds_sh(this);" id="txtBirthDate" />
					</label>
					<span class="textfieldRequiredMsg">Enter Birth Date</span></span></td>
				</tr>
				<tr>
					<td>Upload Marksheet:</td>
					<td><label>
					<input type="file" name="txtFile" id="txtFile" />
					</label></td>
				</tr>
				<tr>
					<td>User Name:</td>
					<td><span id="sprytextfield8">
					<label>
					<input type="text" name="txtUserName" id="txtUserName" />
					</label>
					<span class="textfieldRequiredMsg">Enter User Name</span></span></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><label><span id="sprytextfield9">
					<input type="password" name="txtPassword" id="txtPassword" />
					<span class="textfieldRequiredMsg">Enter Password</span></span></label></td>
				</tr>
									
				<tr>
					<td colspan="2"><label>
					<label></label>
					<div align="center">
					<input type="submit" name="button2" id="button2" value="Submit" />
					</div>
					</label></td>
				</tr>
			</table>
		</form>
		</div>
		<p class="btn-more box noprint">&nbsp;</p>
	</div>
	<hr class="noscreen" />  
</div>
<!-- CONTENT AND ARTICLE ENDINNING -->

 
    <!-- BEGINNING FOOTER -->
    <div id="footer">
        <div id="top" class="noprint">
          <p><span class="noscreen">Back on top</span> <a href="#header" title="Back on top ^">^<span></span></a></p>
        </div>
        <hr class="noscreen" />
        <p>JOB-PORTAL</p>
    </div> 
    <!-- END FOOTER -->
</div>
<!-- END MAIN -->

</body>
</html>
