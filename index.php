<?php
session_start();
include("db.php");
error_reporting(0);
if(isset($_POST['send'])){
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$msg = $_POST['message'];
$data = mysqli_query($conn,"insert into contact(name,email,country,message) values('".$name."','".$email."','".$country."','".$msg."')");
if($data==true)
{
  echo "insert ok";
}
else
{
  echo "insert not ok";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Food Chain</title>
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="icon" type="image/png" href="photos/16.ico"/>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.js">

  <style type="text/css">
.carousel-inner img {
      width: 100%;
      height:80vh;
    }
.cards button:hover{
  background: #f1f1f1;
  color: #ccc;
    }
@media screen and (max-width: 600px){
  .carousel-inner img {
      width: 100%;
      height:40vh;
    }
}
</style>
</head>
<body id="top">
  <!-- header start  -->
  <header>
    <div class="heading1">
      <h1  data-toggle="tooltip" title="THE FOOD CHAIN">THE FOOD CHAIN</h1>
    </div>
  <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto  ">
      <li class="nav-item active pr-3">
        <a class="nav-link" href="index.php"  data-toggle="tooltip" title="Home"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown pr-3">
        
        <a class="nav-link dropdown-toggle" href="#" title="Statemenu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Statemenu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        include("db.php");
        $data=mysqli_query($conn,"select * from  add_statemenu ");
        $num=mysqli_num_rows($data)> 0;

        if($num)
        { 
            while($r  = mysqli_fetch_array($data))
              {
            ?>
        <a class="dropdown-item" href="food_links.php?title=<?php echo $r['title']; ?>"><?php echo $r['title'];  ?></a>
        <?php
       }
      }
    ?>
       </div>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="index.php#Contact"  data-toggle="tooltip" title="Contact">Contact</a>
      </li>
      
      <li class="nav-item pr-3">
        <a class="nav-link" href="#About us"  data-toggle="tooltip" title="About Us">About Us</a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="login page.php"  data-toggle="tooltip" title="Login">Login</a>
      </li>
    </ul>
    <!-- search -->
    <ul class="navbar-nav " >
    <form method="post" class="form-inline my-2 my-lg-0">
      
      <input class="form-control mr-sm-2" type="search" name="searchbox" placeholder="Search Food.." aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" name="submit" type="submit" style="border-radius: 50px;" >🔍Search</button>
           
    </form>
  </ul>
  </div>
</nav>
</header>
<!-- end navbar -->
<!-- code search -->
<div class= "container p-0" >
  <?php
      include("db.php");

      if(isset($_POST['submit']) && $_POST['searchbox']!=""){
        $search=$_POST['searchbox'];
        $query=mysqli_query($conn,"SELECT * from add_recipes WHERE title LIKE '%$search%' OR  cuisine LIKE '%$search%' ");
        $data=mysqli_num_rows($query);
        if($data>0)
        {
         while($row=mysqli_fetch_assoc($query)){ ?>
         
           
            <div class="col-sm-11" style="margin-top: 30px;">
           <h2 style="text-align: center;">-: <u><?php echo $row['title']; ?></u> :-</h2>
           <img src="<?php echo $row['image']; ?>"  class="ml-4 pb-2"  alt="Los Angeles" width="1000" height="400">
           <h5>RECIPE -</h5>
           <p> <?php echo $row['recipes']; ?> </p>
           </div>
         
         <?php  }
           } 
          }
         else{

          
         ?>   
        
  </div>
<!-- search code end -->

<!--silde image code-->

<div id="demo" class="carousel slide" data-ride="carousel">
  <?php
    $query=mysqli_query($conn,"select * from add_slide");
    $num=mysqli_num_rows($query);
    
    ?>
    <ul class="carousel-indicators">
      <?php
       for ($row=1; $row <=$num ; $row++)
      {
       ?>
      
      
     <li data-target="#demo" data-slide-to="<? $row; ?>"></li>
   <?php } ?>
     </ul>
     <div class="carousel-inner">

     <?php
       for ($row=1; $row <=$num ; $row++)
      {
      $data=mysqli_fetch_array($query);
      
     if($row==1)
      {
      ?>
     <div class="carousel-item active">
      <img src="<?php echo $data['slide']; ?>" alt="" >
      <div class="carousel-caption">
        <h3><?php echo $data['slide_cuisine']; ?></h3>
        <p><?php echo $data['Description']; ?></p>
      </div>   
    </div>
    
     <?php }else{?>
      <div class="carousel-item">
      <img src="<?php echo $data['slide']; ?>" alt="">
      <div class="carousel-caption">
        <h3><?php echo $data['slide_cuisine']; ?></h3>
        <p><?php echo $data['Description']; ?></p>
      </div>   
    </div>
    <?php   
}
}
  ?> 
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


  <!--indian food meter-->

	<div class="container-fluid">
	 	<h2  class="text-center text capitalize pt-5" data-toggle="tooltip" title="Indian Food"><b>Indian Food</b></h2>
    <hr class="w-25 mx-auto pt-2 ">
    <center><p>The traditional food of India has been widely appreciated for its fabulous use of herbs and spices. Indian cuisine is known for its large assortment of dishes. The cooking style varies from region to region and is largely divided into South Indian North Indian cuisine. India is quite famous for its diverse multi cuisine available in a large number of restaurants and hotel resorts, which is reminiscent of unity in diversity. The staple food in India includes wheat, rice and pulses with chana (Bengal Gram) being the most important one. In modern times Indian pallete has undergone a lot of change. In the last decade, as a result of globalisation, a lot of Indians have travelled to different parts of the world and vice versa there has been a massive influx of people of different nationalities in India.</p></center>
	</div>

  <!--State menu-->
  
  <div class="container-fluid"  style="color:black; height:500px;" id="Statemenu">
  <h2 class="text-center text-capitalize pt-5" data-toggle="tooltip" title="State Menu">State Menu</h2>
  <div class="">
   <?php
   $data=mysqli_query($conn,"select * from  add_statemenu limit 8 ");
   // $s=mysqli_query($conn,"SELECT * from food_links");
   // $h=mysqli_num_rows($s);
    $num=mysqli_num_rows($data);

        if($num)
        { 
            while($r = mysqli_fetch_array($data))
              {

                  ?>
                 
                <div class="cards col-lg-3  my-1" style="overflow: hidden; float: left; ">
                 <a  href="food_links.php?title=<?php echo $r['title']; ?>" data-toggle="tooltip" title="<?php echo $r['title'];  ?>">
                <img src="<?php echo $r['image'] ?>" alt="<?php echo $r['title'];?>" >
                <button class="btn"><?php echo $r['title'];  ?></button>
                </a>
                </div>
                <?php
                
              }
       }
  ?>
  </div>
	<?php } ?>
</div>
<!--contact coding part-->
<div class="container-fluid" id="Contact">
    <h3 class="pt-5 text-center" data-toggle="tooltip" title="Contact" style="font-size:220%;">Contact</h3>
    <div class="container1">
      <form method="post" onsubmit="return validation()">
          <label for="fname">Name:</label>
          <input type="text1" id="name"  class="form-control form-control-lg" autocomplete="off" name="name" placeholder="Your name..">
          <span id="usererror" class="text-danger font-weight-bold">  </span><br>

          <label for="email">Email:</label>
          <input type="text1" id="email" class="form-control form-control-lg" name="email" autocomplete="off" placeholder="Your Email address..">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          <span id="emailerror" class="text-danger font-weight-bold">  </span><br>
        
          <label for="country">Country:</label>
          <select id="country" name="country"  class="form-control form-control-lg" autocomplete="off">
            <option>--Select Country--</option>
            <option value="india">india</option>
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
          </select>
          <span id="countryerror" class="text-danger font-weight-bold">  </span><br>
          
        <label for="subject">Subject:</label><br>
          <textarea id="message"  class="form-control form-control-lg" name="message" placeholder="Write something.." style="height:200px"></textarea>
          <span id="msgerror" class="text-danger font-weight-bold">  </span><br>    

          <input type="submit"  name="send"  data-toggle="tooltip" title="Send Message" value="Send Message">
        </form>
      </div>
  </div>

<script type="text/javascript">
    function validation(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var country = document.getElementById('country').value;
    var message = document.getElementById('message').value;


    var namecheck=/^[A-Za-z. ]{3,30}$/ ;
    var emailcheck = /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/ ;
    var countrycheck = /^[A-Za-z ]{3,15}$/ ;
    var messagecheck = /^[A-Za-z0-9.,'[\()*&^%$#@!~*-+' ]{1,}$/ ;


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

// country name validation
    if(countrycheck.test(country)){
      document.getElementById('countryerror').innerHTML = " ";
    }
    else
    {
      document.getElementById('countryerror').innerHTML = "**Please Select Country Name ";
      return false;
    }

// message validation
    if(messagecheck.test(message)){
      document.getElementById('msgerror').innerHTML = " ";
    }
    else
    {
      document.getElementById('msgerror').innerHTML = "**Please Enter something ";
      return false;
    }

}
</script>



 
  <!--about coding part-->
  <br>
  <div class="footer"style="color:white" id="About us" >
    <div class="end" style="overflow: hidden; display: inline-block;">
      <div id="part-1">
        <a target="_blank">
          <h4  data-toggle="tooltip" title="About Us" style="margin-bottom: 3px;">About Us</h4>
          <br>
          <lu type="square">
          <?php 
            error_reporting(0);
            if(!$_SESSION['name']){
              ?>
              <li><a href="create account.php" style="color: white;"  data-toggle="tooltip" title="Join us">Join us</a></li>
              <?php }
              else {
                ?><font size="5px;" style="color: green;">
                  welcome
                  <?php
                  echo $_SESSION["name"]; ?> !</font>
                  <li ><a href="user-logout.php"  style="color: white;"  data-toggle="tooltip" title="Logout">Logout</a></li><?php 
              }
              ?>

          
            <li style="color:white; cursor: pointer;" onclick="Func()" id="demo"  data-toggle="tooltip" title="Services" >Services</li>
            <li><a href="Gallery.php" style="color: white;"  data-toggle="tooltip" title="Gallery">Gallery</a></li>
            <li style="cursor: pointer;" onclick="help()"  data-toggle="tooltip" title="Help">Help</li>
           <li><a href="admin-login.php" style="color:white"  data-toggle="tooltip" title="Admin">Admin</a></li>
          </lu>
         
      </div>
      </div>


      <div class="end" style="overflow: hidden; display: inline-block;" >
          <a target="_blank">
          <h4 data-toggle="tooltip" title="Social Media Links">Social Media Links</h4>
          <div class="logo">
            <a href="https://www.facebook.com/jatin.bohra.58"  data-toggle="tooltip" title="Facebook" class="fa fa-facebook"></a>
            <a href="https://twitter.com/jatinbohra6" data-toggle="tooltip" title="twitter" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/channel/UCYQ7OPJGPxMYrFJ8FjHwYZA?view_as=subscriber" data-toggle="tooltip" title="youtube" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/bohrajatin1999/?hl=en" data-toggle="tooltip" title="instagram" class="fa fa-instagram"></a>
            <a href="#" data-toggle="tooltip" title="skype" class="fa fa-skype"></a>
          </div>
    </div>

    <div class="end" style="overflow: hidden; display: inline-block;"  >
      <h4 data-toggle="tooltip" title="Map">Map</h4>
      <!--google map location-->
        <section id="section-map" class="clearfix  w3-margin-10px">
            <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
    <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        var setting = {"height":250,"width":792,"zoom":23,"queryString":"Falna, Rajasthan, India","place_id":"ChIJ66qtIzaQQjkRVIm3v2OkjsA","satellite":true,"centerCoord":[25.237233283021308,73.24742639436361],"cid":"0xc08ea463bfb78954","lang":"en","cityUrl":"/india/sanderao-155380","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"120989"};
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://1map.com/js/script-for-user.js?embed_id=120989';
        s.async = true;
        s.onload = function (e) {
          window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        to.parentNode.insertBefore(s, to);
      })();</script><a href="https://1map.com/en/map-embed?embed_id=120989">1 Map</a></div>
     
        </section>
      </div>

      <br></br>
      
      
        <a href="#top" class="scrollup"><i class="fa fa-chevron-up"></i></a>
        
        
        <div class="copyright">
        <p> © 2019, The Food Chain | Designed & Managed By:<a href="index.php" data-toggle="tooltip"  style="color: white;" title="THE FOOD CHAIN"> Jatin Bohra</a></p>
        </div>
        
</div>
 <script>
function Func() {
  // welcome message on servise button.
 swal("🙏🏼Hello User🙏",
  "I am jatin bohra  this website admin. welcome to my indian food recipce website. this website give many indian food recipces. I hope you learn and making indian food on your home.'thank you for visit us'.");
 
}
</script>
      

<script type="text/javascript">
  function help(){
    swal("Please Write your problem here:", {
  content: "input",
})
.then((value) => {
  swal(`You typed: ${value}`);
});
  }
</script>

 
  <script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>

  <!-- <script src="http://kit.fontawesome.com/b99e675b6e.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>