<?php include_once 'includes/resource/session.php'; 
	include_once 'includes/resource/db.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="ET3">
	  <meta name="keywords" content="ET3">
  	<meta name="author" content="Marlon Tercero">
    <title>ELEVATING TALENT THROUGH TRAINING | Welcome</title>
    <link rel="icon" type="image/gif/png" href="./img/lcs_logo.png"/>
    <link rel="stylesheet" href="./css/homepage.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">

         <h2><span class = "a">opentext&#8482;</h2> <h1><span class="highlight2">ELEVATING</span>  TALENT THROUGH TRAINING</h1>
         <p><?php echo date("l".', '." jS \of F Y") ; ?>
        </div>
        <nav>
           <ul class = "main-menu">
            <li class="current"><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a>
                <ul class="sub-menu">
                  <li><a href="takequiz.php">Take Quiz</a></li>
                  <li><a href="enrollCourse.php">Enroll Course</a></li>
                  <li><a href="viewGrades.php">View Grades</a></li>
                  <li><a href="resetPassword.php">Reset Password</a></li>
                 
                </ul></li>

              </li>

              <li><a href="logout.php">Log Out</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!--<section id="welcome">
      <h1 align="center">Welcome, 
        <?php 
          $breakemail = explode("@", $_SESSION['username']);
          $username = $breakemail[0];
          echo $username?>!
      </h1>
    </section> -->
   
    <section id="buttons">
    	<div class="buttons_home">
	    	<input class = "button_1" type="button" value="Search Courses" onclick="search_courses.php">
	    	<input class = "button_1" type="button" value="Enrolled Course" onclick="enrolled_courses.php">
	    	<input class = "button_1" type="button" value="View Grades" onclick="msg()" disabled  style="color: gray;"}>
    	</div>

    </section>

    <section id="quiz">
      <p>Below are your grades for quiz/zes you have taken:</p>
      <hr>
    	<div style = "margin-left: 50px; margin-right: 50px;">
	    	 <?php
                echo "<h2> QUIZ RECORDS </h2>";
                ?>
       
             
                     <?php
	                        echo "<table style='border: 1px solid #0A0246;'>";
                            echo "<tr style='border: 1px solid gray; '>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Quiz ID </th>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Quiz Name   </th>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Course ID </th>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Course Name </th>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Grade </th>";
                            echo "<th style='border: 1px solid gray; width: 300px; background-color: #0A0246; color: white;'> Date Taken </th>";
                            echo "</tr>";
                            echo "<tr style='border: 1px solid gray; '>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> J-101 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Java 101   </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> C-101 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Java Programming </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> 100 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Janaury 25, 2020 </th>";
                            echo "</tr>";
                            echo "<tr style='border: 1px solid gray; '>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> D-101 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Database 101   </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> C-102 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Introduction to Databases </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> 95 </th>";
                            echo "<td style='border: 1px solid gray; width: 300px;'> Janaury 19, 2020 </th>";
                            echo "</tr>";
							echo "</table>";
               ?>
            </table>

    	</div>
    	 <hr>
    </section>
         <section id="announcement">
          <div style = "margin-left: 150px; margin-right: 150px; margin-top: 40px; margin-bottom: 60px; text-align:justify;">
              <h1 style="color:#f4f4f4; font-size: 20px; text-align: left; text-decoration: none;"><a href="announcements.php">ANNOUNCEMENTS</a></h1>
		          <?php
		              $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs'); 
		              $sql2 = $con-> query("SELECT * FROM announcement ORDER BY datePosted DESC LIMIT 3;");
		              
		              while($row2 = mysqli_fetch_array($sql2))

		              {
		                $postedBy2 = $row2['postedBy'];
		                $announcement2 = $row2['announcement'];
		                $datePosted2 = $row2['datePosted'];
		                $announcementTitle2 = $row2['announcementTitle'];
		                $id = $row2['id'];


		              echo "<tr>";
		              
		              echo "<p><b><a href=#>".$announcementTitle2."</a></b><br>";
		              echo "<span style='color: green; font-size: 11px;'> Date Posted: ".$datePosted2."</p>"; 
		              echo "<p>".$announcement2."......<a href=announcements.php>view more</a></p>";
		              
		             
		              echo "</tr>";

		              
		          

		            }

		         ?>
       		</div>
        </section>
    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
