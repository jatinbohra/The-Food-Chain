<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$password = $_POST['password'];
// $query= ;
$data = mysqli_query($conn,"insert into  user_login(name,email,mobile,country,password)values('".$name."','".$email."','".$mobile."','".$country."','".$password."')");
if($data==true)
  {
     echo "data inserted";
    header("location:login page.php");
  }
  else
  {?>
    <script type="text/javascript">
        alert("sorry your registration not valid ");  
    </script>
    <?php
  }
}
?>
<html>
<head>
	<title>Create Account</title>
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
<body  id="top">
  <!-- header code -->
<?php include("header.php");  ?>
<!--header end-->
<!--from start-->
<div class="row justify-content-center">
  <div class="Create Account col-lg-6 " id="Contact" >
    <center><h3 class="pt-5" data-toggle="tooltip" title="Create Account" style="font-size:220%;">Create Account</h3></center>
    <div class="container1">
      <form method="post" onsubmit="return validation()">
          <label for="fname">Name :</label>
          <input type="text1" id="name" class="form-control form-control-lg" autocomplete="off" name="name" placeholder="Your name..">
          <span id="usererror" class="text-danger font-weight-bold">  </span>

          <label for="email">Email :</label>
          <input type="text1" id="email" name="email" class="form-control form-control-lg" autocomplete="off" placeholder="Your Email address..">
          <span id="emailerror" class="text-danger font-weight-bold">  </span>

          <label for="email">Mobile no. :</label>
          <input type="text1" id="mobile" name="mobile" class="form-control form-control-lg" autocomplete="off"   placeholder="Your mobile number..">
          <span id="mobileerror" class="text-danger font-weight-bold">  </span>

          <label for="country">Country :</label>
            <select id="country" name="country" class="form-control form-control-lg" autocomplete="off">
              <option>--Select Country--</option>
              <option value="india">india</option>
              <option value="australia">Australia</option>
              <option value="canada">Canada</option>
              <option value="usa">USA</option>
            </select>
          <span id="countryerror" class="text-danger font-weight-bold">  </span><br>
          
        
         <label for="psw">Password :</label>
         <input type="password" id="password" class="form-control form-control-lg" placeholder="New Password" name="password" class="pw" >
         <span id="passworderror" class="text-danger font-weight-bold">  </span><br>
    

          <label for="psw" >Repeat Password :</label>
          <input type="password" id="cpassword" class="form-control form-control-lg" placeholder="Repeat Password" name="cpassword" class="pw" >
          <span id="cpassworderror" class="text-danger font-weight-bold">  </span><br>

          <input type="submit" name="submit" class="btn-block"  data-toggle="tooltip" title="Submit" value="Submit">
          <br>
          <p style="float: right;">Already Have An Account ?<a href="login page.php"  data-toggle="tooltip" title="Login"> Login</a></p>
          </form>
      </div>
  </div>
  </div>


  <script type="text/javascript">
    function validation(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var country = document.getElementById('country').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;

    var namecheck=/^[A-Za-z. ]{3,30}$/ ;
    var emailcheck = /^[A-Za-z_]{3,}[0-9]{1,15}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/ ;
    var mobilecheck = /^[0-9]{10}$/ ;
    var countrycheck = /^[A-Za-z ]{3,15}$/ ;
    var passwordcheck= /^[?=.*[A-Za-z0-9]{8,16}$/ ;///^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/ ;

// name validation
    if(namecheck.test(name)){
      document.getElementById('usererror').innerHTML = " ";
    }
    else
    {
      document.getElementById('usererror').innerHTML = "**Username is Invalid ";
      return false;
    }

// email validation
if(emailcheck.test(email)){
      document.getElementById('emailerror').innerHTML = " ";
    }
    else
    {
      document.getElementById('emailerror').innerHTML = "*Email is Invalid ";
      return false;
    }

// mobile validation
    if(mobilecheck.test(mobile)){
      document.getElementById('mobileerror').innerHTML = " ";
    }
    else
    {
      document.getElementById('mobileerror').innerHTML = "**Mobile Number is Invalid ";
      return false;
    }

// country name validation
    if(countrycheck.test(country)){
      document.getElementById('countryerror').innerHTML = " ";
    }
    else
    {
      document.getElementById('countryerror').innerHTML = "**Please Select Country Name ";
      return false;
    }

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