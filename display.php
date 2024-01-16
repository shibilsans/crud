<?php

include("connect.php");
if(isset($_POST["displaysend"])){
    $table='<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
    <th scope="col">SI</th>
    <th scope="col">Name</th>
    <th scope="ol">Email</th>
    <th scope="col">Mobile</th>
    <th scope="col">Place</th>
    <th scope="col">Opration</th>
</tr>

    </thead>';

    $sql="SELECT * FROM `crud`";
    $result=mysqli_query($conn,$sql);
    $number =1;
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['Mobile'];
        $place=$row['place'];
        $table.= '<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$place.'</td>
        <td>
    <button class="btn btn-outline-secondary" onclick="update('.$id.')">Update</button>
    <button class="btn btn-danger" onclick="deleteuser('.$id.')">Delete</button>
</td>
      </tr>';
      $number++;
    }
    $table.='</table>';

    echo $table;
}
?>
