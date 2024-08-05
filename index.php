<?php
session_start();
if(isset($_SESSION['$UserName'])){
	header('location:Admin/index.php');
} 
if(isset($_SESSION['$UserName_job'])){
	header('location:JobSeeker/index.php');
} 
if(isset($_SESSION['$UserName_emp'])){
	header('location:Employer/index.php');
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    
    <title>ONLINE JOBPANEL</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    <link rel="stylesheet" type="text/css" href="./css/AllCss.css" />
    <link href="https://fontawesome.com/icons/globe-stand?f=sharp&s=solid" rel="stylesheet">

 
</head>

<body id="www-url-cz">


<!-- BEGINNING MAIN -->
<div id="main" class="box">

    <!-- BEGINNING MENUE TABS -->
    <nav>
        <label class="logo"><i class="fa-sharp fa-solid fa-globe-stand"></i> GLOBAL JOBPORTAL</label>
            <ul>
                <li><a class="active" href="index.php">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="AboutUs.php">About Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="News.php">Latest News<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="ContactUs.php">Contact Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="Signin.php">Signin<span class="tab-l"></span><span class="tab-r"></span></a></li>
            </ul>
    </nav>
    <!-- ENDING MENUE TABS -->

    <!-- CONTENT AND ARTICLE BEGINNING -->
    <div id="content">
        <hr class="noscreen" />
        <!-- Article -->
        <div class="article">
            <h2><marquee><span><strong><a href="#">Welcome To online Job Portal System</a></span><strong></marquee></h2>
            <p> <span class="style2">W</span>elcome to online Job Portal. It provides facility to the Job Seeker to search for various jobs as per his qualification. Here Job Seeker can registered himself on the web portal and create his profile along with his educational information. Job Seeker can search various jobs and apply for the Job.</p>
            <p>This Portal is also designed for the various employer who required to recruit employees in their organization. Employer can register himself on the web portal and then he can upload information of various job vacancies in their organization. Employeer can view the applications of Job Seeker and send call latter to the job seekers.</p>
            <p class="btn-more box noprint">&nbsp;</p>
        </div> 
    </div>
    <!-- CONTENT AND ARTICLE ENDINNING -->


    <!-- BEGINNING FOOTER -->
        <div id="footer">
                <div class="Quicklinks">
                    <ul>
                        <li><b>Quick links</b></li>
                        <p>Privacy Policy</p>
                        <p>Terms and Conditions</p>
                        <p>Confidentiality Policy</p>
                    </ul>
                </div>
                <div class="Employerlinks">
                    <ul>
                        <li><b>For Employers</b></li>
                        <p>Employer Dashboard</p>
                        <p>Browse Ctegories</p>
                        <p>Submit Post</p>
                    </ul>
                </div>
                <div class="Seekerlinks">
                    <ul>
                        <li><b>For Candidates</b></li>
                        <p>Candidate Dashboard</p>
                        <p>Browse Categories</p>
                        <p>View Posts</p>
                    </ul>
                </div>
                <div class="Contactlinks">
                    <ul>
                        <li><b>Contact us</b></li>
                        <p>For more info Communicate with us,<br> we are available 24/7.</p>
                        <p>Temdo Road,<br> Njiro hill, Arusha,<br> Tanzania.</p>
                        <p>globaljobportal@gmail.com</p>
                    </ul>
                </div>
            <!-- <p>JOB-PORTAL</p> -->
        </div> 
    <!-- END FOOTER -->
</div> 
<!-- END MAIN -->

</body>
</html>
