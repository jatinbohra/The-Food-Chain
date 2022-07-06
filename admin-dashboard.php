<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admin-dashboard</title>
	<?php  include("links.php");  ?>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	 <link rel="icon" type="image/png" href="photos/16.ico"/>
	 <a href="https://icons8.com/icon/90085/new-slide"></a>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
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

	  @media screen and (max-width: 600px){

		.sidebar{
			width: 35px;
			height: 4px;
			background:#92a6e2;
			margin: 5px 0;
			border-radius: 5px;
		}
	


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
				<h3><b>📊 Dashboard</b></h3>
				<br>
				<div class="card-deck" style="color:white; ">
				  <div class="card bg-primary" style="border-radius: 30px;">
				    <div class="card-body text-center">
				      <p class="card-text">Slide</p>
				       <i class="far fa-images" style="font-size: 40px;" ></i>
					   <p class="p-2">4</p>
				    </div>
				  </div>
				  <div class="card bg-warning" style="border-radius: 30px;">
				    <div class="card-body text-center" >
				      <p class="card-text">Statemenu</p>
				       <i class="fab fa-buromobelexperte" style="font-size: 40px;" ></i>
					   <p class="p-2">4</p>
				    </div>
				  </div>
				  <div class="card bg-success" style="border-radius: 30px;">
				    <div class="card-body text-center" >
				      <p class="card-text">Post Link</p>
				      <i class="fas fa-clipboard-list" style="font-size: 40px;"></i>
					  <p class="p-2">4</p>
				    </div>
				  </div>
				  <div class="card bg-danger" style="border-radius: 30px;">
				    <div class="card-body text-center" >
				      <p class="card-text">Recipes</p>
				       <i class="fas fa-book-reader" style="font-size: 40px;"></i>
					   <p class="p-2">4</p>
				    </div>
				  </div>
				   <div class="card bg-dark" style="border-radius: 30px;">
				    <div class="card-body text-center" >
				      <p class="card-text">Visitors</p>
				      <i class="fas fa-users" style="font-size: 40px;"></i>
					  <p class="p-2">100</p>
				    </div>
				  </div>
				</div>
				<br>
			

		<div class="row">
		<!-- card1	 -->
			<div class="col-sm-5">
		      <div class="card ">
				  <div class="card-header">
				    <b>India Map:-</b>
				  </div>
				  <div class="card-body ">
				   <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
				<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
		        var setting = {"height":250,"width":396,"zoom":3,"queryString":"India","place_id":"ChIJkbeSa_BfYzARphNChaFPjNc","satellite":false,"centerCoord":[40.71152424219953,-74.01236054999998],"cid":"0xd78c4fa1854213a6","lang":"en","cityUrl":"/us/ny/new-york","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"141474"};
		        var d = document;
		        var s = d.createElement('script');
		        s.src = 'https://1map.com/js/script-for-user.js?embed_id=141474';
		        s.async = true;
		        s.onload = function (e) {
		          window.OneMap.initMap(setting)
		        };
		        var to = d.getElementsByTagName('script')[0];
		        to.parentNode.insertBefore(s, to);
		      })();</script><a href="https://1map.com/en/map-embed?embed_id=141474">1 Map</a></div>
			 <!-- end card1     -->
			 <!-- card2   -->
				  </div>
				</div>
			</div>

			<div class="col-sm-7">
			    <div class="card">
			    	 <div class="card-header">
				    <b>Table:-</b>
				  </div>
			      <div class="card-body">
			        <table class="table table-sm">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Table</th>
					      <th scope="col">rows</th>
					      <th scope="col">panel</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>	add_foodlink</td>
					      <td>4</td>
					      <td>user</td>
					      
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>add_recipes</td>
					      <td>4</td>
					      <td>user</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>add_slide</td>
					      <td>4</td>
					      <td>user</td>
					    </tr>
					     <tr>
					      <th scope="row">4</th>
					      <td>add_statemenu</td>
					      <td>5</td>
					      <td>user</td>
					    </tr>
					     <tr>
					      <th scope="row">5</th>
					      <td>adminlogin</td>
					      <td>1</td>
					      <td>admin</td>
					    </tr>
					     <tr>
					      <th scope="row">6</th>
					      <td>contact</td>
					      <td>7</td>
					      <td>user</td>
					    </tr>
					     <tr>
					      <th scope="row">7</th>
					      <td>user_login</td>
					      <td>3</td>
					      <td>user</td>
					    </tr>
					  </tbody>
					</table>
			      </div>
			    </div>
			  </div>
			  <!-- end card2 -->
			</div>

<hr>

				<div class="footer2 text-center">
					<h5><u>! Welcome to Admin Panel !</u></h5>
					<p>Note: Admin Panel in You Can Insert, Update, & Delete Any Operation Perform Like Slide, Statemenu..... </p>
				</div>
</div>
</div>
</body>
</html>


