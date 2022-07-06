<!DOCTYPE html>
<html>
<head>
	<title>food_links</title>
	 <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css\style.css">
   <link rel="icon" type="image/png" href="photos/16.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" type="text/Javascript " href="bootstrap.min.js">
   
</head>
<body id="top">
 <!-- header code -->
 <header>
    <!--heading secsion-->
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
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" title="Statemenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<!--header end-->
<!-- search code -->
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
           <h2 style="text-align: center;" >-: <u><?php echo $row['title']; ?></u> :-</h2>
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
<!-- end search code -->
<!-- article start-->

  <section>
  <div class="container" style="margin-top:30px">
    <div class="row">
    <!--cuisine name-->
        <?php
          include("db.php");
          $according=$_REQUEST['title'];
          $query=mysqli_query($conn,"SELECT * from  add_statemenu  where title = '$according'");
          $number=mysqli_num_rows($query);
          if($number)
            {  
              while($s= mysqli_fetch_array($query))
                {
        ?>
      <div class="col-sm-9" >
          <h2 style="text-align: center;" >-: <u><?php echo $s['title'];  ?></u> :-</h2>
        <?php
            }
          }
        ?>
        <!--end cuisine-->
        <!--image -->
        <?php
            include("db.php");
            $according=$_REQUEST['title'];
            $query=mysqli_query($conn,"SELECT * from  add_statemenu  where title = '$according'");
            $number=mysqli_num_rows($query);
            if($number)
              {  
                while($s= mysqli_fetch_array($query))
                {
        ?>
        <img src="<?php echo $s['image'];  ?>" alt="Los Angeles" width="750" height="400">
        <?php
            }
          }
        ?>
    <!--food link-->
        <?php
          include("db.php");
          $according=$_REQUEST['title'];
          $data=mysqli_query($conn,"SELECT * from  add_foodlink where cuisine = '$according'  ");
          $num=mysqli_num_rows($data);
          $count=1;
              while($r  = mysqli_fetch_array($data))
                {
        ?>
    <div class="Dish-1">
          <a href="Food_recipes.php?id=<?php echo $r['id']; ?>"><h5  class="pt-4"><?php echo $count; ?>). <?php  echo $r['linkname']; ?> </h5></a>
          <p><?php echo $r['Description']; ?></p>
        <img src="<?php echo $r['img']; ?>"  alt="Los Angeles" width="750" height="400">
        <?php
          $count++; 
          }
        ?>
    </div>
  </div>
</div>

      <hr class="d-sm-none">
    <div class="col-sm-3" style="background-color:#f2f2f2;">
      <h3  class="text-center text capitalize pt-5" data-toggle="tooltip" title="Indian Food">Indian Food</h3></a>
        <lu type="bullet">
          <?php
          include("db.php");
          $data=mysqli_query($conn,"select * from  add_statemenu ");
          $num=mysqli_num_rows($data)> 0;

          if($num)
            { 
              while($r  = mysqli_fetch_array($data))
                {
          ?>           
            <li><a href="food_links.php?title=<?php echo $r['title']; ?>"><?php echo $r['title'];  ?></a></li>
          <?php
                }
              }
          ?>
</lu>
       <h3  class="text-center text capitalize pt-5 " data-toggle="tooltip" title="More recipes">More recipes</h3></a>
       <lu type="bullet">
        <?php
   include("db.php");
   $data=mysqli_query($conn,"SELECT * from  add_foodlink   ");
    $num=mysqli_num_rows($data);
            while($r  = mysqli_fetch_array($data))
              {
        ?>
            <li><a href="Food_recipes.php?id=<?php echo $r['id']; ?>"><?php  echo $r['linkname']; ?></a></li>
            <?php
       
       }
    ?>
           
          </lu>
      </div>
    <?php } ?>
    </div>
</section>
<!--footer part-->
  <?php include("footer.php") ; ?>

  <script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>