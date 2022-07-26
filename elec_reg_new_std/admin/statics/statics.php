<?php
include "../../../connection/connection.php";
session_start();
//checl username for permission
$username_permission = $_SESSION["user_name_for_permsisson"];
$display_data_for_login_admin = mysqli_query($connection ,"select * from scientific_affairs_admins where username='$username_permission'");
if(mysqli_num_rows($display_data_for_login_admin) == 0){
    echo "<script>alert('Sorry, You don\'t have permissions');
       window.location.href='../../scintific_affairs/statics/statics.php';</script>";
       }
//------
$user_name =$_SESSION["user_admin_scientific_affairs"]; 
$display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_scientific_affairs"] = $name_user;

$display_num_admin = mysqli_query($connection , "select * from scientific_affairs_admins where del='no'");
$num_admins = mysqli_num_rows($display_num_admin);
$display_num_emp= mysqli_query($connection , "select * from scientific_affairs_employes where del='no'");
$num_emp = mysqli_num_rows($display_num_emp);
$display_num_doctor= mysqli_query($connection , "select * from medical_exam_doctors where del='no'");
$num_doctor = mysqli_num_rows($display_num_doctor);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/admin/statics.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe</li></a>
            <a href="../doctors/add_doctor/add_doctor.php"><li><img src="../../../icons/doc.png" alt="" width="40px" height="40px"> Add Doctor</li></a>
            <a href="../admins/add_admin/add_admin.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Add Admin</li></a>
            <a href="../../scintific_affairs/info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
<div class="content">
                <div class="cards">
                <div class="card">
                        <div class="box">
                           <h3><?php echo $num_admins; ?></h3>
                            <h3>Admins</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../admins/edit_admin/edit_admin.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h3><?php echo $num_emp; ?></h3>
                            <h3>Employes</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/eemp2.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../employes/edit_of_emp/edit_of_emp.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <h3><?php echo $num_doctor; ?></h3>
                            <h3>Doctors</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/doc1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../doctors/edit_doctor/edit_doctor.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                  
              </div>  
           </div>
        </div>
</body>
</html>