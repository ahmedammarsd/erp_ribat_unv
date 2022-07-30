<?php
include "../../connection/connection.php";
session_start();
$name_std = $row["name_std"];
$unv_id = $_SESSION["unv_id"];

$display_password = mysqli_query($connection , "select password from students where unv_id='$unv_id'");
$row = mysqli_fetch_array($display_password);
$password = $row["password"];

if(isset($_POST["change"])){
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if($old_password != $password){
        echo "<script>alert('Sorry, The Current Password Is Incorrect')</script>";
    }
    else{
        if($new_password != $confirm_password){
            echo "<script>alert('Sorry, The New Password Does Not Match')</script>";
        }
        elseif($new_password == $confirm_password){
            $update_password = mysqli_query($connection , "update students set password='$new_password' where unv_id='$unv_id'");
            if($update_password){
                echo "<script>alert('Password Changed Successfully')</script>";
            }
            else{
                echo "<script>alert('Sorry, The Password Has Not Been Changed')</script>";
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
    <link rel="stylesheet" href="../../css/manegment/student/change_password.css?v=<?php echo time();?>">
    <title>تغيير كلمة السر</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Student</h2>
        </div>
        <ul>
        <a href="../display_result/display_result.php"><li><img src="../../icons/re.png" alt="" width="40px" height="40px">Result</li></a>
        <a href="../elec_reg/elec_reg.php"><li><img src="../../icons/reg.png" alt="" width="40px" height="40px">Register</li></a>   
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../profile_std/profile_std.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_std ?></h3>
            </div>
            <div class="log">
            <a href="../login_std/login_std.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form-change">
    <form action="" method="post">
        <div  class="form-group">
            <label for="" class="lead">Current Password </label>
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