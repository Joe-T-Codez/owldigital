<?php
session_start();
$_SESSION['message']="";


$hostname="Localhost";
$username="pumumimy_owl_digital_users";
$password="2UGebfLP9z3ShCw";
$dbname="pumumimy_owldigital";
$usertable="test2";

$conn=new mysqli($hostname,$username,$password,$dbname);
if($conn === false){
  die("ERROR:Could not connect. " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){


 if (isset($_POST['email'], $_POST['password'])){

    $email=$conn->real_escape_string($_POST['email']);
    $password=$_POST['password'];

    $query="SELECT * FROM test2 WHERE email='".$email."' AND password='".$password."'";
    $result=$conn->query($query);
    if($result->num_rows==1){
      $_SESSION['message']="Welcome back! $email";
      header("location: welcome.php");
    }
    elseif($conn->mysql_rows($result)==0){
$_SESSION['message']="User not added to the database";
    }



}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="css/login.css" type="text/css">
    <script src="https://kit.fontawesome.com/e96f0d297c.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="body-content">
      <div class="body-content-overlay">

      </div>
      <div class="login-container">
        <div class="login-title-container">
            <h1 id="login-title">Sign In</h1>
        </div>
        <div class="login-user-icon">
            <i class="fas fa-user"></i>
        </div>

        <form class="form"  method="post" action="login.php" enctype="multipart/form-data" autocomplete="off">
          <div class="alert alert-error"><?php if(isset($_GET['login'])){echo $_SESSION['message'];} ?></div>

          <input type="email" placeholder="Email" name="email" />
          <input type="password" placeholder="Password" name="password" autocomplete="new-password"  />

          <input type="submit" value="Sign In" name="login" class="btn btn-block btn-primary" />
        </form>

        <p class="login-register-reminder">Don't ahve an account? <a href="register.php">Create an Account</a> </p>
        <p class="login-terms">By clicking Sign In you agree to the <a href="#">Terms & Privacy Policy</a>. </p>


    </div>
      </div>
  </body>
</html>
