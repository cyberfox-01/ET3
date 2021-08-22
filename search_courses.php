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
            td = tr[i].getElementsByTagName("td")[1];
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

    <?php 
          $breakemail = explode("@", $_SESSION['username']);
          $username = $breakemail[0];
          $id = $_SESSION['EmpID'];
    ?>
   
    <section id="buttons">
      <div class="buttons_home">
        <input class = "button_1" type="button" value="Search Courses" onclick="msg()" disabled  style="color: gray;">
       <a href="enrolled_courses.php" class="btn btn-primary"><input class = "button_1" type="button" value="Enrolled Course" onclick="enrolled_course.php"></a>
        <input class = "button_1" type="button" value="View Grades" onclick="msg()" }>
      </div>

    </section>

    <section id="quiz">
     
      <hr>
      <div style = "margin-left: 50px; margin-right: 50px;">
         <?php
                echo "<h2>SEARCH COURSES</h2>";
                ?>
      <p>Search courses to enroll.</p>
             <table align="center" id = "enrollmentStatusTable">
                
                 <tr bgcolor ="#E1F0F0" style="text-align:left">
                  <th colspan = 7 style="text-align:left">
                    Enter Course Name: 
                    <input type="text" placeholder="Course Name" name="courseName" id="courseName" onkeyup="search()"required>
                   
                  </th>
          </tr>
          <?php

          		
                    echo "<tr bgcolor =#08F9F3>
                        <th>COURSE ID</th>
                        <th>COURSE NAME</th>
                        <th>COURSE UNIT</th>
                        <th>COURSE DESCRIPTION</th>
                        <th>ENROLL</th>
                           
                        </tr>";

                      $sql = $con-> query("SELECT * FROM course");

                                    if ($sql->num_rows > 0){
                                              while($row = mysqli_fetch_array($sql))
                                                {
                                                echo "<form method=post action=enroll.php>";
                                                echo "<tr>";
                                                echo "<td>" . $row['CourseID']. "</td>";
                                                echo "<td>" . $row['CourseName']. "</td>";
                                                echo "<td>" . $row['CourseUnit']. "</td>";
                                                echo "<td>" . $row['CourseDescription']. "</td>";
                                                echo "<td>"."<input type=hidden name=hidden value='" . $row['CourseID']. "'>"."<input type=submit name=enroll value=Enroll>"."</td>";
                                                echo "</tr>";
                                                echo "</form>";

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
       <hr>
   
    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
