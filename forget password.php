<?php
include("db.php");
session_start();
error_reporting(0);
if(isset($_POST['submit'])){
$password = $_POST['password'];
$data = mysqli_query($conn,"update user_login set password='".$password."' where email ='".$_SESSION['email']."' || mobile='".$_SESSION['mobile']."'");
if($data==true)
  {
    header('location:login page.php');
  }
  else
  {
    echo("not update");
  }
}
?>
<html>
<head>
	<title>forget password</title>
	 <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css\style.css">
   <link rel="icon" type="image/png" href="photos/16.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
</style>
</head>
<body id="top">
<!-- header code -->
<?php include("header.php");  ?>
<!--header end--> 
<!--form start-->
	<div class="Create Account" id="Contact">
    <center><h3 class="pt-5" data-toggle="tooltip" title="Forget Password" style="font-size:220%;">Forget Password</h3></center>
    <div class="container">
      <form method="post" onsubmit="return validation()">
        <label for="psw">Password:</label>
        <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter new Password" name="password"class="pw" >
        <span id="passworderror" class="text-danger font-weight-bold">  </span><br>

        <label for="psw" >Repeat  Password:</label>
        <input type="password" id="cpassword" placeholder="Re-enter Password"  class="form-control form-control-lg" name="password" class="pw" >
        <span id="cpassworderror" class="text-danger font-weight-bold">  </span><br>

        <input type="submit" name="submit"  data-toggle="tooltip" title="Confirm Password" value="Confirm Password">
      </form>
      </div>
  </div>

  <script type="text/javascript">
    function validation(){
     var password = document.getElementById('password').value;
     var cpassword = document.getElementById('cpassword').value;

     
     var passwordcheck= /^[?=.*[A-Za-z0-9]{8,16}$/ ;///^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/ ;



// password validation
    if(passwordcheck.test(password)){
      document.getElementById('passworderror').innerHTML = " ";
    }
    else
    {
      document.getElementById('passworderror').innerHTML = "**Password in characters and numbers  ";
      return false;
    }

// cpassword validation
      if(cpassword.match(password)){
        document.getElementById('cpassworderror').innerHTML = " ";
    }
    else
    {
      document.getElementById('cpassworderror').innerHTML = "**Password is Not Match";
      return false;
    }

}
  </script>
	
	<!--footer part-->
   <?php include("footer.php") ; ?>
	</div> 


<script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>

</div>
</body>
</html>