<?php
include "../../connection/connection.php";
session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];


$username = $_SESSION["username_tetcher"];

$display_password = mysqli_query($connection , "select password from tetchers where username='$username'");
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
            $update_password = mysqli_query($connection , "update tetchers set password='$new_password' where username='$username'");
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
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/teacher/change_password.css?v=<?php echo time();?>">
    <title>Change Password</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
        <a href="../subjects/subjects.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
        <a href="../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">مراقبة الامتحانات</li></a>
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../profile_tetcher/profile_tetcher.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_teacher ?></h3>
        </div>
        <div class="log">
        <a href="../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="form-change">
    <form action="" method="post">
        <div  class="form-group">
            <label for="" class="lead">Password Now</label>
            <input type="password" name="old_password" id="" required class="form-control">
        </div>
        <div  class="form-group">
        <label for="" class="lead">New Password</label>
            <input type="password" name="new_password" id="" required class="form-control">
        </div>
        <div  class="form-group">
        <label for="" class="lead">Confirm New Password</label>
            <input type="password" name="confirm_password" id="" required class="form-control">
        </div>
        <div  class="form-group">
            <input type="submit" name="change" value="Change" class="btn btn-primary">
        </div>
    </form>
</div>
</div>
</body>
</html>