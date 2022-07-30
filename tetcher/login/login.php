<?php
include "../../connection/connection.php";
session_start();
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username_tetcher"] = $username;

    $display_data_tetcher= "select username , password from tetchers where username='$username' and password='$password'";
   
    if(mysqli_num_rows(mysqli_query($connection , $display_data_tetcher)) > 0) {
       //echo "<script>alert('SUCCESSEFULY')</script>";
        header("location: ../profile_tetcher/profile_tetcher.php");
    }
    else{
        echo "<script>alert('Sorry, There Is An Error In The Username Or Password')</script>";
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
    <link rel="stylesheet" href="../../css/manegment/login.css?v=<?php echo time();?>">
    <title>login</title>
</head>
<body>
<div class="header">
    <div class="nav container">
        <div>
            <h3>RIBAT UNVIRSITY</h3>
        </div>
        <div>
           <h3>TEACHER</h3>
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
            <label for=""  class="lead">Username</label>
            <i class="fa-solid fa-user fa-1x"></i>
            <input type="text" name="username" id="" class="form-control" required>
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