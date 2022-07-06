<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$img = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$folder = "upload slide/".$img;
move_uploaded_file($tempname, $folder);
$linkname = $_POST['linkname'];
$Description = $_POST['Description'];
$cuisine = $_POST['cuisine'];
$data=mysqli_query($conn,"insert into add_foodlink(img, linkname,Description,cuisine ) values('".$folder."','".$linkname."','".$Description."','".$cuisine."')");
 	if($data=true)
 	{
 		header("location:admin-addfoodlink.php");
 	}
 	else
 	{
 		echo "data not inserted";
 	}
 
 }
?>