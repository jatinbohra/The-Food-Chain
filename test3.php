<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="icon" type="image/png" href="photos/16.ico"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome.css">
</head>
<body>
  <!-- header code -->
<header>
    <!--heading secsion-->
    <div class="heading1">
    <h1>THE FOOD CHAIN</h1>
  </div>
  <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top " style="z-index: 1;" >
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto  ">
      <li class="nav-item active pr-3">
        <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown pr-3">
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a class="nav-link" href="index.php#Contact">Contact</a>
      </li>
      
      <li class="nav-item pr-3">
        <a class="nav-link" href="#About us">About Us</a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="login page.php">Login</a>
      </li>
    </ul>
    <!-- search -->
    <ul class="navbar-nav " >
    <form method="post"  class="form-inline my-2 my-lg-0">
      
      <input class="form-control mr-sm-2" type="text" id="search" type="search" name="search" placeholder="Search Food.." aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" name="submit" type="submit" style="border-radius: 50px;" >🔍Search</button>
    </form>
    </ul>
  </div>
</nav>
 <div class="col-md-2" style="position: relative; margin-top: -10px; margin-left:  1008px;z-index:-1;">
            <div class="list-group" id="show-list1">
            <a href='#' class='list-group-item list-group-item-action border-1'>".$row['title']."</a>
            </div>
          </div>  
        
     
 
</header>


<!-- end header code -->
<!-- code search -->

     <?php
      include("db.php");

      if(isset($_POST['submit'])){
        $inpText=$_POST['searchText'];
        $query="SELECT * from add_recipes WHERE title LIKE '%$inpText%' OR cuisine LIKE '%$inpText%'";
        $result= $conn->query($query);
          if($result->num_rows>0){
            while($row= $result->fetch_assoc()){
            ?>
          
            <?php
            }
          }

          else
          {
            echo"<p class='list-group-item border-1'>No Record</p>";
          }



}
    
    ?>


<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keyup(function(){
        var searchText = $("#search").val();
          if(searchText.length > 2){
            $.ajax({
              url:'test3.php',
              method:'POST',
              data:{search :1,
                q : searchText},
              success:function(data){
                $("#response").html(data);
              },
              datatype : 'text'
            });
          }
          else
          {
            $("#show-list1").html('');
          }
    });
    $(document).on('click','a',function(){
        $("#search").val($(this).text());
        $("#show-list1").html('');
    });

  });
</script>


 <!-- end search code -->

 <script src="http://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>