
<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register</title>
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
      <a class="nav-item nav-link active" href="index.php">Home</a>
      <a class="nav-item nav-link" href="register.php">Register </a>
      <a class="nav-item nav-link" href="login.php">Login</a>
    </div>
  </div>
</nav>


    <!-- header section end-->
    
<?php

include 'connect.php';

      if(isset($_POST['submit'])){
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
          $address = mysqli_real_escape_string($con, $_POST['address']);
          $adr = mysqli_real_escape_string($con, $_POST['address']);

          
          $pass = password_hash($password, PASSWORD_BCRYPT);
          $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

          $emailquery = " select * from register where email='$email' ";
          $query = mysqli_query($con,$emailquery);

          $emailcount = mysqli_num_rows($query);

          if($emailcount>0){
              echo "email already exists ";
          }else{
              if($password === $cpassword){

                $insertquery ="INSERT INTO `register` (`username`, `mobile`, `email`, `pass`, `cpass`, `adr`) VALUES ('$username','$mobile','$email','$pass','$cpass', '$adr')";

                 
                 
                  $iquery = mysqli_query($con, $insertquery);

                  if($iquery){
                      ?>
                      <script>
                      alert("Registration Successful...!");
                      </script>
                      <?php
                  }else{
                    ?>
                    <script>
                    alert(" Something Went Wrong...");
                    </script>
                    <?php
                  }

              }else{
                  echo "password not matching";
              }
          }

      }
?>



    <!---------------signup-page------------->

    <section class="login">
        <div class="" id="sign-up"  style="width: 50%; overflow-y: auto;">
         <p>Register Now</p>
          <form
            action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> "
            method="POST"
          >
            <label for="username"><b>Name</b></label
            ><br />
            <input
              type="text"
              class="sign-up-ip"
              placeholder="Enter Name"
              name="username"
              required
            />
            <br />

            <label for="mobile"><b>Mobile No</b></label
            ><br />
            <input
              type="text"
              class="sign-up-ip"
              placeholder="Enter Mobile No"
              name="mobile"
              required
            />
            <br />

            <label for="email"><b>Email</b></label
            ><br />
            <input
              type="text"
              class="sign-up-ip"
              placeholder="Enter Email"
              name="email"
              required
            />
            <br />

            <label for="password"><b>Password</b></label
            ><br />
            <input
              type="password"
              class="sign-up-ip"
              placeholder="Enter Password"
              name="password"
              required
            />
            <br />

            <label for="cpassword"><b> Confirm Password</b></label
            ><br />
            <input
              type="password"
              class="sign-up-ip"
              placeholder="Confirm Password"
              name="cpassword"
              required
            />
            <br />

            <label for="address"><b>Address</b></label>
            <br />
<input
    type="text"
    class="sign-up-ip"
    placeholder="Enter Address"
    name="address"
    required
/><br />

            <p>
              By creating an account you agree to our
              <a href="#" style="color: dodgerblue">Terms & Privacy</a>.
            </p>

            <div class="sign-up-last">
              <button type="button" class="cancelbtn" name="cancel">
                Cancel
              </button>
              <button type="submit" class="signupbtn" name="submit">
                Register
              </button>
            </div>

            <p>
              Have an account ?
              <a href="login.php" style="color: dodgerblue">Log In</a>.
            </p>
          </form>
        </div>
   
    
    </section>
  
  </body>
</html>
