<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    
    <title>ONLINE JOBPORTAL</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    <link rel="stylesheet" type="text/css" href="./css/AllCss.css" />

</head>

<body id="www-url-cz">


<!-- BEGINNING MAIN -->
<div id="main" class="box">

    <!-- BEGINNING MENUE TABS -->
    <nav>
        <label class="logo"><i class="fa-sharp fa-solid fa-globe-stand"></i> GLOBAL JOBPORTAL</label>
            <ul>
                <li><a href="index.php">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="AboutUs.php">About Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a class="active" href="News.php">Latest News<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="ContactUs.php">Contact Us<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="Signin.php">Signin<span class="tab-l"></span><span class="tab-r"></span></a></li>
            </ul>
    </nav>
    <!-- ENDING MENUE TABS -->


<!-- CONTENT AND ARTICLE BEGINNING -->
<div id="content">
  <h2><span><a href="#"><strong>Latest News</a></span></strong></h2>
                
  <p>
    <table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
      <tr>
      <th height="32" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong style="color: white;">Company</strong></div></th>
        <th height="32" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong style="color: white;">Position</strong></div></th>
        <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong style="color: white;">News Date</strong></div></th>
      </tr>
      <?php
        // Establish Connection with Database
        $con = mysqli_connect("localhost","root","","jobpanel");
        // Select Database

        // Specify the query to execute
        $sql = "select * from news_master";
        // Execute query
        $result = mysqli_query($con,$sql) or die( mysqli_error($con));
        // Loop through each records 
        while($row = mysqli_fetch_array($result))
        {
        $Company=$row['Company'];
        $JobTitle=$row['JobTitle'];
        $NewsDate=$row['NewsDate'];
      ?>
      <tr>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Company;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $JobTitle;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $NewsDate;?></strong></div></td>
      </tr>
      <?php
        }
        // Retrieve Number of records returned
        $records = mysqli_num_rows($result);
      ?>

      <?php
        // Close the connection
        mysqli_close($con);
      ?>
      </table>
      </td>
      </tr>
    </table>
  </p>
  <p class="btn-more box noprint">&nbsp;</p>
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
