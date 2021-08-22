<?php include_once 'includes/resource/session.php'; 

$url = $_GET['url'];
$title = $_GET['title'];
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
      <p align="center"> 
        <?php 
          echo $title;
          ?>
      </p>
    </section>
   
    <section id="buttons">
    	<div class="buttons_home">
	    	<iframe width="1000" height="500" src="<?php echo $url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    	</div>

    </section>
    
     

    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
