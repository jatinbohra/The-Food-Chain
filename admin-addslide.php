<?php
session_start();
include("test1.php");
include("db.php");
$query = mysqli_query($conn,"select * from add_slide");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admin-add slider</title>
	
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="icon" type="image/png" href="photos/16.ico"/>
	<?php  include("Links.php"); ?>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
	 <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="http://kit.fontawesome.com/b99e675b6e.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".hamburger").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
	</script>
	<style type="text/css">
		*{
			margin: 0px;
			 list-style:none;
			 padding:0;
			 text-decoration: none;
			 box-sizing: border-box;
			 font-family: 'Montserrat', sans-serif;
		}
		body{
			background: #e1ecf2;
			}
		.wrapper{
			margin: 10px;
		}	

		.wrapper .top_navbar{
			width:calc(100% - 20px);
			height: 60px;
			display: flex;
			position: absolute;
			top: 10px;
		}

		.wrapper .top_navbar .hamburger {
			width:70px;
			height: 100%;
			background: #2e4ead;
			padding: 15px 17px;
			border-top-left-radius: 20px;
			cursor: pointer;
		}

		.wrapper .top_navbar .hamburger div{
			width: 35px;
			height: 4px;
			background:#92a6e2;
			margin: 5px 0;
			border-radius: 5px;
		}

		.wrapper .top_navbar .top_menu{
			width:100%;
			background: #fff;
			height: 100%;
			border-top-right-radius: 20px;
			border-top-left-radius: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 0 20px;
			box-shadow: 0 1px 1px  rgba(0,0,0,0.1);

		}

		.wrapper .top_navbar .top_menu .logo{
			color: #2e4ead;
			font-size: 22px;
			font-weight: 700;
			letter-spacing: 3px;

		}

		.wrapper .top_navbar .top_menu ul{
			display: flex;

		}

		.wrapper .top_navbar .top_menu ul li a{
			display: block;
			margin: 0 10px;
			width:35px;
			height: 35px;
			line-height: 35px;
			border:1px solid #2e4ead;
			text-align: center;
			border-radius:50%;
			color: ;
			}
		.wrapper .top_navbar .top_menu ul li a:hover{
			background:#2e4ead;
			color:#fff ;
		}

		
		.wrapper .sidebar{
			position: absolute;
			top:70px;
			left:10px
			background: #2e4ead;
			width: 250px;
			height: calc(100% - 80%);
			border-bottom-left-radius: 20px;
			transition: all 0.3s ease;
		}

		.wrapper .sidebar ul li a{
			display: block;
			padding: 27.8px;
			color: #fff;
			position: relative;
			margin-bottom: 1px;
			background: #2e4ead;
			white-space: nowrap;
		}

		.wrapper .sidebar ul li a:before{
			content:"";
			position: absolute;
			top:0;
			left:0;
			width: 3px;
			height: 100%;
			background: #92a6e2;
			display: none;
		}

		.wrapper .sidebar ul li a span.icon{
			margin-right: 10px;
			display: inline-block;
		}

		.wrapper .sidebar ul li a span.title{
			display: inline-block;
		}

		.wrapper .sidebar ul li a:hover{
			background:#4360b5;
			color:#fff;
		}

		.wrapper .sidebar ul li a:hover:before{
			display: block;
		}

		.wrapper .main_container{
	  		
	  		width: calc(100% - 225px);
	  		margin-top: 63px;
	  		margin-left: 240px;
	  		padding: 15px;
	  		transition: all 0.3s ease;
	  		height: 100%;
	  		
	  	}

	  	.wrapper .main_container .item{
	  		background: #fff;
	  		margin-bottom: 10px;
	  		padding: 15px;
	  		font-size: 17px;
	  		line-height: 22px;
	  		 height: auto;
	  		 

	  	}	

		.wrapper.collapse .sidebar{
			width: 69px;
		}

		.wrapper.collapse .sidebar ul li a{
			text-align: center;
	 	}

		.wrapper.collapse .sidebar ul li a span.icon{
			margin: 0;
	  	}

	  	.wrapper.collapse .sidebar ul li a span.title{
	  		display: none;
	  	}

	  	.wrapper.collapse .main_container{
	  		width: calc(100% - 70px);
	  		margin-left: 70px;
	  	}
	  	input[type=text]{
	  		width:100%;
	  		padding:12px 20px;
	  		margin :8px 0;
	  		display: inline-block;
	  		border: 1px solid #ccc;
	  		border-radius: 4px;
	  		box-sizing: border-box;
	  		font-size: 16px;
	  	}

	  	input[type=file]{
	  		width:100%;
	  		padding:12px 20px;
	  		margin :8px 0;
	  		display: inline-block;
	  		border: 1px solid #ccc;
	  		border-radius: 4px;
	  		box-sizing: border-box;
	  		font-size: 16px;
	  	}

	  	

	  	</style>	 	
	</head>
<body>
<div class="wrapper">
 	<div class="top_navbar">
 		<div class="top_menu">
 			<div class="logo"><i class="fas fa-utensils"></i>The Food Chain</div>
 			<ul>
 				
 				<li><a href="admin-comment.php" style="overflow: hidden; float: left; ">
 					<i class="far fa-bell"></i>
 				</a>
 					<a href="admin-profile.php" style="overflow: hidden; float: left; " >
 					<i class="fas fa-user"></i></a>
 				</li>
 				<?php  echo $_SESSION['uname'] ;  ?>
 			</ul>
 		</div>
 	</div>
 	<div class="sidebar">
 		<ul>
 			<li><a href="admin-dashboard.php">
 				<span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
 				<span class="title">Dashboard </span>
 			</a></li>
 			<li><a href="admin-addslide.php" >
 				<span class="icon"><i class="fas fa-images"></i></span>
 				<span class="title">Add Slide</span>
 			</a></li>
 			<li><a href="admin-addstatemenu.php">
 				<span class="icon"><i class="fas fa-th"></i></span>
 				<span class="title">Add New Statemenu </span>
 			</a></li>
 			<li><a href="admin-addfoodlink.php">
 				<span class="icon"><i class="fas fa-clipboard-list"></i></span>
 				<span class="title">Add Food Post Link</span>
 			</a></li>
 			<li><a href="admin-addrecipes.php">
 				<span class="icon"><i class="fas fa-book-reader"></i></span>
 				<span class="title">Add New Recipes</span>
 			</a></li>
 			<li><a href="admin-profile.php">
 				<span class="icon"><i class="fas fa-user" aria-hidden="true"></i></span>
 				<span class="title">Admin Profile</span>
 			</a></li>
 			<li><a href="admin-logout.php">
 				<span class="icon"><i class="fas fa-share-square"></i></span>
 				<span class="title">Logout</span>
 			</a></li>
 		</ul>
 	</div>
 	<div class="main_container">
 		<div class="item">
 			 <div class="container" style="text-align: center; font-size: 20px;color:#2e4ead; " >
		 	 	<h2><b>-: Add New Slider :-</b></h2>
			 </div>
		  	<form  method="post" enctype="multipart/form-data">
		  		<label for="file">Slide Path:</label>
			    <input type="file" class="form-control" id="name" placeholder="" name="slide"><br>
			  	<label for="fname">Slide Food Cuisine name:</label>
			  	<input type="text" id="fname" name="slidecuisine" placeholder="Enter Cuisine..." required><br>
			  	<label for="fname">Description :</label><br>
    			<textarea id="subject" name="Description" class="form-control" placeholder="Write something.." style="height:150px"></textarea><br>
			    <input type="submit"  name="submit" style="margin-top: 5px;" value="????Add Slide">
		 	 </form>

	
			 <div class="card" style="margin-top:10px;">
						  <div class="card-header">
							    <!-- View table:- -->
							</div>
							   <div class="card-body">
							    <h5 class="card-title">Display database contents</h5>
							    <table class="table table-striped table-dark table-hover table-bordered">
									  <thead>
									    <tr>
									      <th scope="col">Id</th>
									      <th scope="col">Slide</th>
									      <th scope="col">slide cuisine</th>
									      <th scope="col">Description</th>
									      <th scope="col">Edit</th>
									      <th scope="col">Delete</th>
									    </tr>
									  </thead>
									  
									  <tbody>
									  	<?php
									  		
									  		if(mysqli_num_rows($query) > 0)

									  	{   $count=1;

									  		while($row = mysqli_fetch_assoc($query))
									  			
												{?>

									    <tr>

									      <th><?php echo $count; ?></th>

									      <td><img src="<?php echo $row['slide']; ?>" width="100" height="100"></td>
									      <td><?php echo $row['slide_cuisine']; ?></td>
									      <td><?php echo $row['Description'];  ?></td>
									      
									      <TD>  
									      	<a href="adminslide-update.php?id=<?php echo $row['id'];?>" style="color: white">
									      	<button type="button" class="btn btn-info badge-pill"  id="slidebtn"  name="update" style="width: 80px;">EDIT</button></a>
									      </TD>


									      	<TD>
									      	<a href="adminslide-delete.php?id=<?php echo $row['id'];?>" style="color:white;">
									      	 <input type="button" value="DELETE" class="btn btn-danger badge-pill" name="delete" style="width: 80px;"></a>
									      </TD>
									    </tr>
									     <?php

											$count++;	}

										  	}
										  	else
										  	{
										  		echo "No Record Found";
										  	}
									  ?>
									 </tbody>
								</table>
						  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



</body>
</html>