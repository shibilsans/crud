<?php
include("connect.php");

if(isset($_POST["deletesend"])){
    $uniq=$_POST["deletesend"];

    $sql= "DELETE FROM `crud` WHERE id=$uniq";

    $result=mysqli_query($conn,$sql);
}
?>