<?php
include "../../connection/connection.php";

session_start();
if(isset($_POST["login"])){
    $unv_id = $_POST["unv_id"];
    $password = $_POST["password"];

    $_SESSION["unv_id"] = $unv_id;

    $display_data_from_unv = "select unv_id , name_std from students where unv_id='$unv_id' and password='$password'";
   
    if(mysqli_num_rows(mysqli_query($connection , $display_data_from_unv)) > 0) {
      // echo "<script>alert('SUCCESSEFULY')</script>";
         header("location: ../profile_std/profile_std.php");
    }
    else{
        echo "<script>alert('عذرا يوجد خطا في الرقم الجامعي او اسم الطالب')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الطالب</title>
</head>
<body>
    <form action="" method="post">
        <div>
            الرقم الجامعي
            <input type="text" name="unv_id" id="" required>
        </div>
        <div>
           رمز الدخول
            <input type="password" name="password" id="" required>
        </div>
        <div>
            <input type="submit" name="login" value="دخول">
        </div>
    </form>
</body>
</html>