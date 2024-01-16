<?php
include("connect.php");

extract($_POST);

if(isset($_POST["name"])&& isset($_POST["email"])&& isset($_POST["mobile"])&& isset($_POST["place"]))

$sql="INSERT INTO `crud`(`name`, `email`, `Mobile`, `place`) VALUES ('$name','$email','$mobile','$place')";

$result=mysqli_query($conn,$sql);
?>