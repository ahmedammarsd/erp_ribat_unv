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
        echo "<script>alert('عذرا يوجد خطا في اسم المستخدم او كلمة المرور')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الاساتذة</title>
</head>
<body>
    <form action="" method="post">
        <div>
            اسم المستخدم
            <input type="text" name="username" id="">
        </div>
        <div>
            كلمة المرور
            <input type="password" name="password" id="">
        </div>
        <div>
            <input type="submit" value="دخول" name="login">
        </div>
    </form>
</body>
</html>