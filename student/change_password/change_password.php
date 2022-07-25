<?php
include "../../connection/connection.php";
session_start();

$unv_id = $_SESSION["unv_id"];

$display_password = mysqli_query($connection , "select password from students where unv_id='$unv_id'");
$row = mysqli_fetch_array($display_password);
$password = $row["password"];

if(isset($_POST["change"])){
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if($old_password != $password){
        echo "<script>alert('عذرا الرمز القديم غير صحيح')</script>";
    }
    else{
        if($new_password != $confirm_password){
            echo "<script>alert('عذرا الرمز الجديد غير متطابق')</script>";
        }
        elseif($new_password == $confirm_password){
            $update_password = mysqli_query($connection , "update students set password='$new_password' where unv_id='$unv_id'");
            if($update_password){
                echo "<script>alert('تم تغيير الرمز بنجاح')</script>";
            }
            else{
                echo "<script>alert('عذرا لم يتم تغيير الرمز')</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تغيير كلمة السر</title>
</head>
<body>
    <form action="" method="post">
        <div>
            كلمة السر الحالية
            <input type="password" name="old_password" id="" required>
        </div>
        <div>
            كلمة السر الجديدة
            <input type="password" name="new_password" id="" required>
        </div>
        <div>
            تاكيد كلمة السر الجديدة
            <input type="password" name="confirm_password" id="" required>
        </div>
        <div>
            <input type="submit" name="change" value="تغيير">
        </div>
    </form>
    
</body>
</html>