<?php
include "../../connection/connection.php";

session_start();
if(isset($_POST["login"])){
    $unv_id = $_POST["unv_id"];
    $password = $_POST["password"];
    $display_data_from_unv = "select * from students where unv_id='$unv_id' and password='$password'";
   
    if(mysqli_num_rows(mysqli_query($connection , $display_data_from_unv)) > 0) {
      // echo "<script>alert('SUCCESSEFULY')</script>";
         header("location: ../profile_std/profile_std.php");
         $_SESSION["unv_id"] = $unv_id;

    }
    else{
        echo "<script>alert('Sorry, There Is An Error In The UNV ID Or Password')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/student/login_std.css?v=<?php echo time();?>">
    <title>Student Login</title>
</head>
<body>
<div class="header">
    <div class="nav container">
        <div>
            <h3>RIBAT UNVIRSITY</h3>
        </div>
        <div>
           <h3>STUDENT</h3>
        </div>
    </div>
</div>
    <div class="form">
    <form action="" method="post">
    <center><div class="profile">
               <img src="../../icons/account.png" alt="" width="100px" height="100px">
             </div>
             </center>
        <div class="form-group">
            <label for=""  class="lead">UNV ID</label>
            <i class="fa-solid fa-user fa-1x"></i>
            <input type="text" name="unv_id" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="" class="lead">Password</label>
            <i class="fa-solid fa-lock fa-1x"></i>
            <input type="password" name="password" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </div>
    </form>
    </div>
</body>
</html>