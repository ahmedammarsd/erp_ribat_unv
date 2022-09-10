<?php
include "../../../connection/connection.php";
session_start();
// error_reporting(0);
$user_name =$_SESSION["user_admin_scientific_affairs"]; 
$display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_scientific_affairs"] = $name_user;
$name_user_admin = $_SESSION["full_name_scientific_affairs"] ;
if ($name_user_admin != ""){
    $name_user = $_SESSION["full_name_scientific_affairs"];
}

$display_number_of_students_registered = mysqli_query($connection , "select * from new_std_form_info");
$num_display_number_of_students_registered = mysqli_num_rows($display_number_of_students_registered);

$display_number_of_students_reviewed = mysqli_query($connection , "select * from new_std_form_info where review='good'");
$num_display_number_of_students_reviewed = mysqli_num_rows($display_number_of_students_reviewed);

$display_number_of_students_not_reviewed = mysqli_query($connection , "select * from new_std_form_info where review='bad'");
$num_display_number_of_students_not_reviewed = mysqli_num_rows($display_number_of_students_not_reviewed);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/scintific_affairs/statics.css?v=<?php echo time();?>">
    <title>Statics Scintific Affairs</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scintific Affairs</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
            <a href="../report_review_info_stds_done/report_review_info_stds_done.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../../admin/statics/statics.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Admin</li></a>
        </ul>
        </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div>
                <a href="../account/account.php"><h3><img src="../../../icons/account.png" alt="" width="40px" height="40px"><?php echo " " . $name_user ?></h3></a>
                </div>
                <div class="log">
                <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
            </div>
        </div>
<div class="content">
                <div class="cards">
                <div class="card">
                        <div class="box">
                         <center>  <h3><?php echo $num_display_number_of_students_registered; ?></h3></center>
                         <center>  <h3>Number Of Students Registered</h3></center>
                        </div>
                        <div class="icon-case">
                            <!-- <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px"> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <center><h3><?php echo $num_display_number_of_students_reviewed; ?></h3></center>
                        <center><h3>Number Of Students Reviewed And Confirmed</h3></center>
                        </div>
                        <div class="icon-case">
                            <!-- <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px"> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <center><h3><?php echo $num_display_number_of_students_not_reviewed; ?></h3></center>
                        <center><h3>Number Of Students Reviewed And Not Confirmed</h3></center>
                        </div>
                        <div class="icon-case">
                            <!-- <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px"> -->
                        </div>
                    </div>
              </div>  
           </div>
    </div>
        
</body>
</html>