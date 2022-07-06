<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$image = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "upload slide/".$image;
move_uploaded_file($tempname, $folder);
$title = $_POST['title'];
$cuisine = $_POST['cuisine'];
$recipes = $_POST['recipes'];
$data=mysqli_query($conn,"insert into add_recipes(image, title, cuisine, recipes) values('".$folder."','".$title."','".$cuisine."',".$recipes."')");
if($data=true)
{
	header("location:admin-addrecipes.php");
}
else
{
	echo "recipes not inserted";
}
}
?>

