<?php
include "../../../connection/connection.php";
session_start();
$full_name = $_SESSION["full_name_scientific_affairs"];
$display_data = mysqli_query($connection ,"select * from scientific_affairs_admins where full_name='$full_name'");
$row = mysqli_fetch_array($display_data);
$name_user =$row["full_name"];

$display_password = mysqli_query($connection , "select password from scientific_affairs_admins where full_name='$full_name'");
$row = mysqli_fetch_array($display_password);
$password = $row["password"];

if(isset($_POST["change"])){
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if($old_password != $password){
        echo "<script>alert('SORRY, Old Password Incorrect')</script>";
    }
    else{
        if($new_password != $confirm_password){
            echo "<script>alert('SORRY, New Password Is Not Confirm')</script>";
        }
        elseif($new_password == $confirm_password){
            $update_password = mysqli_query($connection , "update scientific_affairs_admins set password='$new_password' where full_name='$full_name'");
            if($update_password){
                echo "<script>alert('Successfully Change Password')</script>";
            }
            else{
                echo "<script>alert('SORRY, Password Not Change Plese Call Developer')</script>";
            }
        }
    }
}

$name_user_admin = $_SESSION["full_name_scientific_affairs"] ;
if ($name_user_admin != ""){
    header("location: ../../admin/change_password/change_password.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/change_password.css?v=<?php echo time();?>">
    <title>Change Password</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
    <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
    </div>
            <ul>
                <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
                <a href="../info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
                <a href="../report_review_info_stds_done/report_review_info_stds_done.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Reports</li></a>
                <a href="../../admin/statics/statics.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Admin</li></a>
            </ul>
    </div>
<div class="container">
        <div class="header">
            <div class="nav">
               <div>
               <h3><a href="../account/account.php"><img src="../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
               </div>
               <div class="log">
               <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
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