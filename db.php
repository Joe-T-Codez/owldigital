<?
$Name=($_POST["username"]);
$Email=($_POST["Email"]);
$password=$_POST['password'];

$hostname="Localhost";
$username="pumumimy_owl_digital_users";
$password="2UGebfLP9z3ShCw";
$dbname="pumumimy_owldigital";
$usertable="test2";

$link=mysqli_connect($hostname,$username,$password,$dbname);
if($link === false){
  die("ERROR:Could not connect. " . mysqli_connect_error());
}
 /////////////////////
$sql="INSERT INTO $usertable(username,email,password) VALUES('$username','$email','$password')";
/////////////////////////////////
if(mysqli_query($link,$sql)){
  echo "Records added successfully";
}else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="shortcut icon" href="">
  <link rel="stylesheet" href="css/form.css" type="text/css">
    <script src="https://kit.fontawesome.com/e96f0d297c.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="body-content">
      <div class="module">
        <h1 id="create-title">Create an account</h1>
        <form class="form"  method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" autocomplete="off">
          <div class="alert alert-error"><?php if(isset($_POST['register'])){echo $_SESSION['message'];} ?></div>
          <input type="text" placeholder="User Name" name="username"/>
          <input type="email" placeholder="Email" name="email" />
          <input type="password" placeholder="Password" name="password" autocomplete="new-password"  />
          <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password"  />
          <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
        </form>




    </div>
      </div>

  </body>
</html>
