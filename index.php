<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="completemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
    <label for="completename" class="form-label">Name</label>
    <input type="text" class="form-control" id="completename" placeholder="enter your name">
  </div>
  <div class="mb-3">
    <label for="completeemail" class="form-label">Email</label>
    <input type="email" class="form-control" id="completeemail" placeholder="enter your email">
  </div>
  <div class="mb-3">
    <label for="completemobile" class="form-label">Mobile</label>
    <input type="number" class="form-control" id="completemobile" placeholder="enter your mobile number">
  </div>
  <div class="mb-3">
    <label for="completeplace" class="form-label">Place</label>
    <input type="text" class="form-control" id="completeplace" placeholder="enter your place">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"onclick="adduser()"  data-bs-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div>

<!--update modal-->

<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update User Information</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="updatename" class="form-label">Name</label>
          <input type="text" class="form-control" id="updatename" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="updateemail" class="form-label">Email</label>
          <input type="email" class="form-control" id="updateemail" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="updatemobile" class="form-label">Mobile</label>
          <input type="number" class="form-control" id="updatemobile" placeholder="Enter your mobile number">
        </div>
        <div class="mb-3">
          <label for="updateplace" class="form-label">Place</label>
          <input type="text" class="form-control" id="updateplace" placeholder="Enter your place">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" onclick="updateusers()" data-bs-dismiss="modal">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>



    <div class="container my-3">
        <h1 class="text-center">CRUD OPRATION</h1>
        <button type="button" class="btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#completemodal">
  Add New User
</button>
<div id="DisplayDataTable"></div>
    </div>

<!--BOOTSTRAP-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--JQUERY -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    displaydata();
});
    //display data
    function displaydata(){
        var displaydata="true";
        $.ajax({
            url:"display.php",
            method: "POST",
            data:{
             displaysend:displaydata
            },
            success:function(data, status){
                $("#DisplayDataTable").html(data);

            }
        });
    }


    function adduser() {
        var $nameadd = $("#completename").val();
        var $emailadd = $("#completeemail").val();
        var $mobileadd = $("#completemobile").val();
        var $placeadd = $("#completeplace").val();

        $.ajax({
            url: "insert.php",
            method: "POST",
            data: {
                name: $nameadd,
                email: $emailadd,
                mobile: $mobileadd,
                place: $placeadd
            },
            success: function (data, status) {
                // console.log(status);
                $("#completemodal").modal("hide");
                displaydata();
            }
        });
    }

    //delete
    function deleteuser(deleteid){
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:{
                deletesend:deleteid
            },
            success: function (data, status){
                displaydata();
            }
        });
    }

    function update(updateuser){
        $("#hiddendata").val(updateuser);

        $.post("update.php",{updateuser:updateuser},function(data,status){
            var userid=JSON.parse(data);
            $("#updatename").val(userid.name);
            $("#updateemail").val(userid.email);
            $("#updatemobile").val(userid.mobile);
            $("#updateplace").val(userid.place);

        });

     $("#updatemodal").modal("show");
    }
//update click
    function updateusers(){
        var updatename=$("#updatename").val();
        var updateemail=$("#updateemail").val();
        var updatemobile=$("#updatemobile").val();
        var updateplace=$("#updateplace").val();
        var hiddendata=$("#hiddendata").val();

        $.post("update.php",{
            updatename:updatename,
            updateemail:updateemail,
            updatemobile:updatemobile,
            updateplace:updateplace,
            hiddendata:hiddendata
        }, 
        function(data,status){
            $("#updatemodal").modal("hide");
            displaydata();
        });
     }
</script>

</body>
</html>