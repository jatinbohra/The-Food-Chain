<?php
include("db.php");
session_start();
error_reporting(0);
if(isset($_POST['login'])){
$name = $_POST['name'];
$password =$_POST['password'];
$data = mysqli_query($conn,"select * from user_login where name='$name' and password = '$password' ");
$row=mysqli_num_rows($data);
if($row==1)
  {
    $_SESSION["name"] ="$name";
    header("location:index.php");
  }
else
{
 ?>
 <script type="text/javascript"> 
  alert("please enter valid details😈😈😈");
  </script>
  <?php
  }
}

include("db.php");
error_reporting(0);
if(isset($_POST['update'])){
$id = $_POST['id'];
$email =$_POST['email'];
$mobile =$_POST['mobile'];
$data = mysqli_query($conn,"select * from user_login where email='$email' || mobile= '$mobile' ");
$row=mysqli_num_rows($data);
if($row==1)
  {
    $_SESSION["email"] ="$email";
    $_SESSION["mobile"] ="$mobile";
     ?>
  <script type="text/javascript"> 
      window.location="forget password.php";
  </script>
 <?php
    
  }

else
{
 //header("location:login page.php");
 ?>
  <script type="text/javascript"> 
      alert("please enter valid details😈😈😈");
  </script>
 <?php
 }
}


?>
<html>
<head>
	<title>login</title>
	 <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="icon" type="image/png" href="photos/16.ico"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome.css">
  
<style type="text/css">
</style>
</head>
<body id="top">
	<!-- header code -->
<?php include("header.php");  ?>
<!--header end-->


<!-- section start -->
 <section>
<div class="row justify-content-center">
  <div class="col-lg-6" id="Contact" >
    <center><h2 class="pt-4" data-toggle="tooltip" title="Login">LOGIN</h2></center>
    <div class="container1">
      <form method="post" name="login1" onsubmit="return validation()">
          <label for="fname">Name :</label>
          <input type="text1" id="name" class="form-control form-control-lg" autocomplete="off" name="name" placeholder="Your name..">
          <label for="psw">Password :</label>
         <input type="password" class="form-control form-control-lg" placeholder="New Password" name="password" class="pw">
          <br>
          <input type="submit" name="login" class="btn btn-outline-success btn-lg btn-block" value="Login">
          <br>
          <a href="" style="float: left; padding:4px;"  data-toggle="modal"  title="Forget Password" data-target="#exampleModal" data-whatever="@mdo">Forget Password?</a>

          <a href="create account.php" style="float: right; padding:4px;"  data-toggle="tooltip" title="Create Account">Create Account</a>
          <br>
          </form>
      </div>
  </div>
  </div>

</section>

<!-- model-1 start -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  data-toggle="tooltip" title="Reset Password">Reset Password:-</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
           <div class="form-group">
            <label for="email-address" class="col-form-label">E-Mail:</label>
            <input type="text" class="form-control" id="recipient-name" autocomplete="off" name="email" placeholder="Your e-mail address...">
          </div>
          <center><p class="btn btn-secondary" style="border-radius: 30px;">OR</p></center>
          <div class="form-group">
            <label for="moblie-number" class="col-form-label">Mobile No.:</label>
            <input type="text" class="form-control" id="message-text" name="mobile" autocomplete="off" placeholder="Your mobile number....">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"  data-toggle="tooltip" title="Close">Close</button>

       <a href="forget password.php?id=<?php echo $row['id'];?>" style="color:white;">
        <button type="submit" class="btn btn-primary" name="update"  data-toggle="tooltip" title="Verify">Verify</button></a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- model-1 end -->

<script type="text/javascript">
  function validation(){
    var name = document.login1.name.value;
    var password = document.login1.password.value;

    if(name=="" || password==""){
      alert("both fields should not be blank");
    return;
    }
    if(password.length<8 || password.length>12){
      alert("password must be 8 to 12 characters");
      return;
    }
    var str= name.slice(0,1);
    if(name.slice(0,1)=="_"|| name.slice(0,1)=="0"|| str.match(/[0-9]/g) !=null)
    {
      alert("username should not start with '_' and number");
    return;
    }
 }
</script>


<!--about coding part-->
  <?php include("footer.php") ; ?>
</div>

<script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>