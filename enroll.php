<?php 
  include_once 'includes/resource/session.php'; 
  include_once 'includes/resource/db.php';
  include_once 'PHPMailer/PHPMailer.php';
  include_once 'PHPMailer/Exception.php';
  include_once 'PHPMailer/SMTP.php';
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

    <section id="welcome">
      <h1 align="center">Welcome, 
        <?php 
          $breakemail = explode("@", $_SESSION['username']);
          $username = $breakemail[0];
        
           $id = strval($_SESSION['EmpID']);
          ?>
      </h1>
    </section>

   <?php
          if (isset($_POST['enroll'])){

              $courseId = $con->real_escape_string($_POST['hidden']);
              $quizID="";

              $sql = $con-> query("SELECT * FROM quiz WHERE CourseID='$courseId'");
                while($row = mysqli_fetch_array($sql))
                  {
                    $quizID = $row['QuizID'];                                            
                  }
                

                $course_ID = $con->real_escape_string($_POST['hidden']);
                $quiz_ID = $con->real_escape_string($quizID);
                $trainer_ID = $con->real_escape_string('T-10001');
                $emp_ID = $con->real_escape_string($id);
                $status = $con->real_escape_string('Awaiting Approval');
               
                
                $stmt1 = $con-> query("SELECT * FROM enrolledcourse WHERE CourseID='$course_ID' AND EmpID='$emp_ID'");
                if ($stmt1->num_rows > 0) {
                      echo '<script type = "text/javascript"> alert("You have already enrolled in this course!");</script>';
                      exit;

                }else{
                  $stmt2 = "INSERT INTO enrolledcourse (CourseID, EmpID, TrainerID, quizID, Status) VALUES ('".$course_ID."', '".$emp_ID."', '".$trainer_ID."', '".$quiz_ID."', '".$status."')";


                if (mysqli_query($con, $stmt2)) {
                    echo "You have successfully sent your registration request. Please await for your manager's approval.";

                        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 587;
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'mptercero@up.edu.ph';
                        $mail->Password = 'seudriiwmozxuzdu';
                        $mail->setFrom($mail->Username);
                        $mail->addAddress('mtercero@opentext.com');
                        $mail->Subject = 'APPROVAL: Your employee has enrolled';
                        $message = '<p>Dear Manager,</p><p>'.$username.', has recently enrolled for the following course/s:</p>'.$course_ID.' - '.$course_ID.'<p> Please click this link to approve and this link to disapprove.</p>';
                        $mail->msgHTML($message);
                        $mail->AltBody = strip_tags($message);
                        $mail->send();
                        
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }

                }  
                
                
              }

              ?>

    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
