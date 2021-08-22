<?php 
include_once 'includes/resource/session.php'; 
?>

<?php
 include_once 'includes/resource/db.php'; 
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

     <script>
        function search() {
          // Declare variables 
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("courseName");
          filter = input.value.toUpperCase();
          table = document.getElementById("enrollmentStatusTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            } 
          }
        }
</script>


    <section id="welcome">
      <h1 align="center">Welcome, 
        <?php 
          $breakemail = explode("@", $_SESSION['username']);
          $username = $breakemail[0];
          $id = $_SESSION['EmpID'];
          //echo $username;
          ?>
      </h1>
    </section>
   
    <section id="buttons">
    	<div class="buttons_home">
	    	<a href="search_courses.php" class="btn btn-primary"><input class = "button_1" type="button" value="Search Courses" onclick="search_courses.php"></a>
	    	<a href="enrolled_courses.php" class="btn btn-primary"><input class = "button_1" type="button" value="Enrolled Course" onclick="enrolled_course.php"></a>
	    	<input class = "button_1" type="button" value="View Grades" onclick="msg()">
    	</div>

    </section>

    <section id="quiz">
      <p>You are currently enrolled and tasked to take the following quiz/zes:</p>
      <hr>
    	<div style = "margin-left: 150px; margin-right: 150px;">


      <table align="center" id = "enrollmentStatusTable">
                
                 <tr bgcolor ="#E1F0F0" style="text-align:left">
                  <th colspan = 7 style="text-align:left">
                    Enter Course Name: 
                    <input type="text" placeholder="Course Name" name="courseName" id="courseName" onkeyup="search()"required>
                   
                  </th>
          </tr>
          <?php


                    echo "<tr bgcolor =#08F9F3>
                        <th>COURSE NAME</th>
                        <th>TRAINER NAME</th>
                        <th>TOTAL NUMBER OF ITEMS</th>
                        <th>SCORE</th>
                        <th>AVERAGE</th>
                        <th>DATE TAKEN</th>
                           
                        </tr>";

                      $sql = $con-> query("SELECT course.courseName as COURSE_NAME, trainer.FirstName as TRAINER_FIRSTNAME, trainer.LastName as TRAINER_LASTNAME, quizresults.totalNoofItems as TOTALNUMBEROFITEMS, quizresults.score as SCORE, quizresults.average as AVERAGE, quizresults.QuizDate as DATE_TAKEN
                          FROM quizresults
                          INNER JOIN course
                            ON quizresults.courseID = course.courseID
                          INNER JOIN (SELECT employee.EmpFirstName as FirstName, employee.empLastName as LastName, trainer.TrainerID as Trainer
      										    FROM trainer
      										    INNER JOIN employee
      										    ON trainer.EmpID = employee.EmpID) AS SUBQUERY
							              ON quizresults.trainerID = SUBQUERY.Trainer
                          WHERE quizresults.empID =$id");

                                    if ($sql->num_rows > 0){
                                              while($row = mysqli_fetch_array($sql))
                                                {
                                                
                                                echo "<tr>";
                                                echo "<td>" . $row['COURSE_NAME']. "</td>";
                                                echo "<td>".$row['TRAINER_FIRSTNAME']." ".$row['TRAINER_LASTNAME']."</td>";
                                                echo "<td>" . $row['SCORE']. "</td>";
                                                echo "<td>" . $row['AVERAGE']. "</td>";
                                                echo "<td>" . $row['DATE_TAKEN']. "</td>";
                                                echo "</tr>";

                                            }
                                          }else{

                                                echo "<tr>";
                                                echo "<td colspan=7>No records found.</td>";
                                                
                                                echo "</tr>";


                                          }

                                    mysqli_close($con);          
                                  ?>
          </table>

    	</div>
    	</div>

    </section>


    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
