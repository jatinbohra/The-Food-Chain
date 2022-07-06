<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<link rel="icon" type="image/png" href="photos/16.ico"/>
	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="jquery.fancybox.min.js"></script>
	<link href="jquery.fancybox.min.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/css?family=Ma+Shan+Zheng&display=swap" rel="stylesheet">
	<script src="http://kit.fontawesome.com/b99e675b6e.js"></script>

	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			background: #ccc;
			font-family: 'Ma Shan Zheng', cursive;
		}
		main{
			width: 95%;
			margin: 0px auto;
		}

		.thumnails{
			width:30%;
			float:left;
			margin:10px;
			background: #fff;
			padding: 20px;
			box-sizing: border-box;
			border-radius: 10px;
		}

		.thumnails img{
			width: 100%;
			height: auto;
		}


	</style>
</head>
<body>
	<main>
		
		<h1><i class="fab fa-instagram"></i> <u>Image Gallery</u></h1>
	</main>
	<?php 
		$dir = glob('upload slide/{*.jpg,*.png }',GLOB_BRACE);

		foreach ($dir as  $value) {
			# code...
			?>
			<div class="thumnails">
				<a href="<?php echo $value ; ?>" data-fancybox="images" data-caption="<?php echo $value ; ?>">
					<img src="<?php echo $value;  ?>" alt="<?php echo $value; ?>" /></a>

					<h2><!-- Title of Food --><?php echo $value ; ?></h2>
			</div>
			
			<?php
		}

	?>


<script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>
</body>
</html>