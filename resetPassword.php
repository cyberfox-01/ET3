<?php include_once 'includes/resource/session.php'; 
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
          echo $username?>!
      </h1>
      <h1 align="center"> Reset your password
      </h1>
    </section>
   
    <section id="showcase">

    <form class="container" method ="post" action = "resetPassword.php">
        
          <div class = "input-group">
            <label for="password">Enter New Password: </label>
            <input type="password" placeholder="New Password" name="password" required>
          </div>
          <div class = "input-group">
            <label for="password">Verify New Password: </label>
            <input type="password" placeholder="Verify Password" name="password" required>
          </div>
           
          <div class = "input-group">
            <button class="button_1" type="submit" name="submit">RESET</button>
          </div> 
                         
      </form>    
    </section>
     

    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
