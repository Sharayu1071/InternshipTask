
<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="css/style.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

 <!-- header section starts -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 90px; padding-right: 90px; ">
  <a class="navbar-brand" href="index.php">InternshipTask</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link active" href="index.php">Home </a>
      <a class="nav-item nav-link" href="register.php">Register</a>
      <a class="nav-item nav-link" href="login.php">Login</a>
    </div>
  </div>
</nav>


    <!-- header section end-->



    <?php

include 'connect.php';

      if(isset($_POST['submit'])){
         
          $email = $_POST['email'];
          $password = $_POST['password'];

          $email_search = " select * from register where email='$email' ";
          $query = mysqli_query($con,$email_search);

          $emai_count = mysqli_num_rows($query);

          if($emai_count){
              $email_pass = mysqli_fetch_assoc($query);

              $db_pass = $email_pass['pass'];

              $_SESSION['username'] = $email_pass['username'];

              $pass_decode = password_verify( $password, $db_pass);

              if($pass_decode){
                  echo "Login Successful"; 
                 
                 ?>
    <script>
     location.replace("home.php");
    </script>
    <?php

              }else{
                  echo "Incorrect Password";
              }
          }else{
              echo "Invalid Email";
               }
     }

?>


    <!---------------login-page------------->

    <section class="login">
    
        
            <div class="" id="sign-up" style="width: 50%;">
                <br>
               
                <p>Login to Get Started</p>
            
                <br>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST">
                    <label for="email"><b>Email</b></label><br />
                    <input type="text" class="sign-up-ip" placeholder="Enter Email" name="email" required /><br /><br />

                    <label for="password"><b>Password</b></label><br />
                    <input type="password" class="sign-up-ip" placeholder="Enter Password" name="password"
                        required /><br /><br />

                    <div class="sign-up-last">
                        <button type="button" class="cancelbtn" name="cancel">
                            Cancel
                        </button>
                        <button type="submit" class="signupbtn" name="submit">
                            Log In
                        </button>
                    </div>
                    <br />
                    <br>

                    <p>
                        Don't have an account ?
                        <a href="register.php" style="color: dodgerblue">Register here</a>.
                    </p>
                </form>
           
            </div>
     
        
    </section>
</body>

</html>