<?php
session_start();
$_SESSION['message']="";
//Creates DB connection//

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

  //Two Passwords are equal
  if($_POST['password'] == $_POST['confirmpassword']){


    $username=$conn->real_escape_string($_POST['username']);
    $email=$conn->real_escape_string($_POST['email']);
    $password=$_POST['password'];

    $query="INSERT INTO test2(username,email,password) VALUES('$username','$email','$password')";
    if($conn->query($query)===true){
      // $_SESSION['message']="Welcome Back! $username ";
      header("location: welcome.php");
    }
    else{
      $_SESSION['message']="User not added to the database";
    }
  }    else{
    $_SESSION['message']="Passwords do not match";

      }
}

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

    <div class="register-container">

      <div class="register-left">



        <div class="register-left-overlay">

          <div class="register-left-overlay-text-container">

            <span class="register-left-overlay-title">Owl Digital</span>
            <p class="register-left-overlay-text">Build meaningful relationships between organizations and employees. Join us as we continue to support over 1,000 local businesses</p>

            <a href="#">
              <div class="facebook-login">
                <i class="fab fa-facebook-f"></i> Login with Facebook
              </div>
            </a>

            <a href="#">
              <div class="twitter-login">
              <i class="fab fa-twitter"></i> Login with Twitter
              </div>
            </a>
          </div>


        </div>

      </div>


      <div class="register-right">
        <div class="register-right-input-container">
          <div class="register-right-title-container">
            <span class="create-title" data-words='["Create an account", "Join the Team"]' data-wait="3000"></span>
          </div>

          <p class="register-right-create-accnt">Create your account, it takes less than a minute. If you already have an account <a href="login.php">login</a> </p>

          <form class="form"  method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"><?php if(isset($_POST['register'])){echo $_SESSION['message'];} ?></div>
            <input type="text" placeholder="User Name" name="username"/>
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" autocomplete="new-password"/>
            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password"  />
            <input type="submit" value="Create Account" name="register" class="btn btn-block btn-primary" />
          </form>

          <p class="register-login-reminder">Already have an account? <a href="login.php">Sign In</a> </p>
          <p class="register-right-terms">By clicking Create Account you agree to the <a href="#">Terms & Privacy Policy</a>. </p>


        </div>





    </div>
      </div>

  </body>
  <script type="text/javascript">
  //////////////////////////////typewriter effect////////////////////////////////////////////
const TypeWriter=function(txtElement,words,wait=3000){
this.txtElement=txtElement;
this.words=words;
this.txt='';
this.wordIndex=0;
this.wait=parseInt(wait,10);
this.type();
this.isDeleting=false;
}
TypeWriter.prototype.type=function(){
const current = this.wordIndex % this.words.length;
const fullTxt=this.words[current];
if(this.isDeleting){
this.txt=fullTxt.substring(0,this.txt.length - 1);

}else{
this.txt=fullTxt.substring(0,this.txt.length + 1);

}
this.txtElement.innerHTML=`<span class="txt">${this.txt}</span>`

let typeSpeed =300;
if(this.isDeleting){
typeSpeed /=2;
}
if(!this.isDeleting && this.txt===fullTxt){
typeSpeed=this.wait;
this.isDeleting=true;
}else if(this.isDeleting && this.txt===''){
this.isDeleting=false;
this.wordIndex++;
typeSpeed=500;
}

setTimeout(()=>this.type(),typeSpeed)
}
document.addEventListener('DOMContentLoaded',init);

function init(){
const txtElement=document.querySelector('.create-title');
const words=JSON.parse(txtElement.getAttribute('data-words'));
const wait=txtElement.getAttribute('data-wait');
new TypeWriter(txtElement,words,wait);
}
  </script>
</html>
