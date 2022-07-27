<?php
include "../../../connection/connection.php";
session_start();
$user_name =$_SESSION["user_doctor"]; 
$display_info_user = mysqli_query($connection , "select full_name,specialization from medical_exam_doctors where username='$user_name'");
$row_info = mysqli_fetch_array($display_info_user);
$name_user = $row_info["full_name"];
$specialization = $row_info["specialization"];
$_SESSION["full_name_doctor"] = $name_user;
$_SESSION["specialization_doctor"] = $specialization;

$display_number_of_students = mysqli_query($connection , "select * from new_std_form_info");
$num_display_number_of_students = mysqli_num_rows($display_number_of_students);

$display_number_of_students_completed_medical = mysqli_query($connection , "select * from new_std_form_info where optic='done' && doctor='done' && psychologist='done'");
$num_display_number_of_students_completed_medical = mysqli_num_rows($display_number_of_students_completed_medical);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/medical_examination/statics.css?v=<?php echo time();?>">
    <title>medical_examination</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Medical Examination</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../doctor/display_std_for_doctor_exm.php"><li><img src="../../../icons/doc.png" alt="" width="40px" height="40px"> Doctor</li></a>
            <a href="../optics/display_std_for_optics_exm.php"><li><img src="../../../icons/ds.png" alt="" width="40px" height="40px"> Optics</li></a>
            <a href="../psychoogist/display_std_for_psychologist_exm.php"><li><img src="../../../icons/op.png" alt="" width="40px" height="40px">Psychoogist</li></a>
            <a href="../info_std_for_med/info_std_for_med.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px">Students Information</li></a>
        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../../medical_examination/login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
<div class="content">
                <div class="cards">
                <div class="card">
                        <div class="box">
                           <center><h3><?php echo $num_display_number_of_students; ?></h3></center>
                           <center><h3>Number of students</h3></center>
                        </div>
                        <div class="icon-case">
                            <!-- <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px"> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <center><h3><?php echo $num_display_number_of_students_completed_medical; ?></h3></center>
                        <center><h3>Number of students completed a medical examination</h3></center>
                        </div>
                        <div class="icon-case">
                            <!-- <img src="../../../icons/admin1.png" alt="" srcset=""  width="70px" height="70px"> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <center><h3><?php echo $num_display_number_of_students - $num_display_number_of_students_completed_medical; ?></h3></center>
                        <center><h3>Number of students left</h3></center>
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