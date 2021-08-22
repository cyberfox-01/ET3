<?php
include_once 'includes/resource/session.php';
include_once 'includes/resource/db.php';

  $msg = "";

  if (isset($_POST['submit'])) {
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    if ($email == "" || $password == "")
      $msg = "Either email address box or password field is empty!";
    else {
      $sql = $con->query("SELECT EmpEmail, password, EmpID FROM employee WHERE LOWER(EmpEmail)='$email'");
      if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                echo $data['password'];
                if ($password == $data['password']) {
                      $_SESSION['username'] = $email;
                      $_SESSION['EmpID'] = $data['EmpID'];
                      $msg = "You have been logged in!";
                      header("Location: home.php"); 
                    }
                 else
                  $msg = "Please verify username or password!";
      } else {
        $msg = "Please check your inputs!";
      }
    }
  }
  mysqli_close($con);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Elevating Talent Through Training">
    <meta name="author" content="Marlon Tercero">
    <title>ET3 - Elevating Talent Through Training | Welcome</title>
    <link rel="icon" type="image/gif/png" href="./img/logo.png"/>
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight"></h1>
        </div>
        <nav>
          <ul class = "main-menu">
            
          </ul>
        </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
         <h2><span class = "highlight">opentext&#8482;</h2>
        <h1><span class = "highlight">ELEVATING TALENT THROUGH TRAINING</h1>
        <form class="container" method ="post" action = "index.php">
          <div class = "input-group">


            <label for="email">Email Address:</label>
            <input type="text" placeholder="Enter Email Address" name="email" required>

          </div>
          <div class = "input-group">
            <label for="password">Password: </label>
            <input type="password" placeholder="Enter Password" name="password" required>
          </div>
           
          <div class = "input-group">
            <button class="button_1" type="submit" name="submit">SIGN IN</button>
          </div> 
          <div class = "input-group-sign-up">
               <label><input type="checkbox">Remember Me?</a></label><br>
               <label><a href ="password-reset.php">Forgot Password?</a></label>
          </div>                  
      </form>
      </div>
      
      
      

    </section>

    
    

    <footer>
      <p>All Rights Reserved &copy; <?php echo date("Y"); ?></p>
    </footer>
  </body>
</html>
