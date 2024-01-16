<?php
include("connect.php");

if (isset($_POST["updateuser"])){
   $userid=$_POST["updateuser"];

   $sql= "SELECT * FROM `crud` WHERE id=$userid";

   $result=mysqli_query($conn,$sql);
   $Response=array();
   while($row=mysqli_fetch_assoc($result)){
    $Response=$row;
   }
   echo json_encode($Response);
}else{
    $Response["status"]=200;
    $Response["message"]="inavlid data";
}
///  update 
if(isset($_POST['hiddendata'])){
    $uniq=$_POST["hiddendata"];
    $name=$_POST["updatename"];
    $email=$_POST["updateemail"];
    $mobile=$_POST["updatemobile"];
    $place=$_POST["updateplace"];

   $sql="UPDATE `crud` SET `name`='$name',`email`='$email',`Mobile`='$mobile',`place`='$place' WHERE id=$uniq";

    $result=mysqli_query($conn,$sql);
}
?>