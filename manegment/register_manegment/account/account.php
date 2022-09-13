<?php
include "../../../connection/connection.php";
session_start();
//info about hr
$name_user = $_SESSION["full_name_reg"] ;
 $display_info_emp = mysqli_query($connection , "select * from employes where full_name='$name_user'");
 $row = mysqli_fetch_array($display_info_emp);
   $name_admin = $row["full_name"];
   $phone_number = $row["phone_number"];
   $email = $row["email"];
   $address = $row["address"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../css/manegment/account.css?v=<?php echo time();?>">
    <title>Personal Page Admin</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
    <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
            </div>
            <ul>   
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../add_subject/add_subject.php"><li ><img src="../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../subjects_distribution/subjects_distribution.php"><li><img src="../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../fees_for_batchs/fees_for_batchs.php"><li><img src="../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
            <a href="../exams/distribution_tetcher_for_subject/distribution_tetcher_for_subject.php"><li><img src="../../../icons/dt.png" alt="" width="40px" height="40px">Teacher Distribution</li></a>
            </ul>
        </div>
        <div class="container">
            <div class="header">
            </div>
            <div class="container">
        <div class="header">
            <div class="nav">
               <div>
               <h3><img src="../../../icons/account.png" alt="" width="40px" height="40px"><?php echo " " . $name_user ?></h3>
                           </div>
               <div class="log">
                <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
            </div>
        </div>
        <div class="info">
    <div class="info-two">
          <h3> NAME </h3>
          <h3>  <?php
            echo $name_admin;
            ?></h3>  
    </div>
    <div class="info-two">
          <h3>  PHONE NUMBER </h3>
          <h3> <?php
            echo $phone_number;
            ?></h3>  
    </div>
    <div class="info-two">
          <h3>EMAIL</h3>
          <h3>
            <?php
            echo $email;
            ?></h3>  
    </div>
    <div class="info-two">
       <h3> ADDRESS</h3>
       <h3><?php
            echo $address;
            ?></h3>  
    </div>
</div>
<div class="change">
            <a href='../change_password/change_password.php'><input type='submit' value='Change Password' class="btn btn-danger"></a>
            
        </div>
</div>
  
       
</body>
</html>