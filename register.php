<?php 
require_once('classes/reg.php');

?>
<html> 
<head>
    <title>Create an Account with us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
<a href="index.html" class=" ion-arrow-left-c btn">Home Page</a>
  </head>

<?php
if(isset($_POST['username'])){
  $name=stripslashes($_REQUEST['username']);
  $password = stripslashes($_REQUEST['password']);
  $email= stripslashes($_REQUEST['email']);
  $pic = 1;
  $log = new reg();
  $login = $log->regs($name,$email,$password,$pic);
  if($login==false){

    echo "<div class='form'>
    <h5> Please try using another Username/Email. </h5>
    <br/>Back to  <a type='button' href='register.php' class='btn btn-danger'> Registration</a></div>";
  }
  else{ ?>
    <div style="text-align: center"><img src="img/swoosh.png" alt="account create success">
    <h3>Your new account has been created successfuly!<br><a href="login.php" class="btn btn-success">Click to login</a></h3></div>
 <?php }
} else{
?>
<div class="form center ">
  <h2  class="center">Create an account with us</h2>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
  <div class="center">
                
                  <label for="name">UserName</label>
                  <input type="text" id="username" name="username" class="form-control " required>
                  <label for="name">Email</label>
                  <input type="text" id="email" name="email" class="form-control " required>

                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control " required>
                          <br> <br>
                  <input type="submit" value="Register" class="btn btn-info ">
                
              </div>
</form> 
</div>
<?php } ?>


<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>

    <script src="js/main.js"></script>
</body>
</html>