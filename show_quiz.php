<?php include_once 'includes/resource/session.php'; 
$url = $_GET['url'];
$name = $_GET['title']." Quiz";
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

    <script>
      function myFunction() {
      document.getElementById("myFrame").height = "1500";
      }
    </script>
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
      <h1 align="center"> 
        <?php 
          echo $name;
          ?>
      </h1>
    </section>
   
    <section id="buttons">
    	<div class="buttons_home">
	    	<iframe id="myFrame" width="850px" height="1500px" src="<?php echo $url; ?>" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: 3px solid #0A0246; border-radius: 5px;; max-width:100%; max-height:100vh;" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
    	</div>

    </section> 
    <footer>
      <p>All Rights Reserved &copy; 2019</p>
    </footer>
  </body>
</html>
