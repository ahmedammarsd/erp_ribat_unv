<?php
include "../../connection/connection.php";

session_start();
 $username = $_SESSION["username_tetcher"];

 $display_info_tetcher = mysqli_query($connection , "select * from tetchers where username='$username'");
 $row = mysqli_fetch_array($display_info_tetcher);
   $name = $row["full_name"];
   $phone_number = $row["phone_number"];
   $email = $row["email"];
   $address = $row["address"];
   $academic_qualification1 = $row["academic_qualification1"];
   $academic_qualification2 = $row["academic_qualification2"];
   $academic_qualification3 = $row["academic_qualification3"];
   $_SESSION["name_of_tetcher"] = $name; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../css/manegment/teacher/profile_tetcher.css?v=<?php echo time();?>">
    <title>Teacher Profile</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
        <a href="../subjects/subjects.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
        <a href="../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Exams Control</li></a>
        <a href="../../elec_reg_new_std/faculty_of_computers/display_std/display_std.php"><li><img src="../../icons/stdifo1.png" alt="" width="40px" height="40px">Interview Student</li></a>
        
            
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../profile_tetcher/profile_tetcher.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $username ?></h3>
        </div>
        <div class="log">
        <a href="../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="info">
    <div class="info-two">
          <h3> NAME </h3>
          <h3>  <?php
            echo $name;
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
<div class="change form-group">
            <a href='../change_password/change_password.php'><input type='submit' value='Change Password' class="btn btn-danger"></a>
            
        </div>
</div>

<!-- <div class="form">
<div class="row">
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Name </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $name;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Phone Number </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $phone_number;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Email</label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $email;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Address</label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $address;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Academic Qualification</label>
        <input type="text" name="username" id="" class="form-control" 
        value=" <?php 
            echo $academic_qualification1 ;
            if($academic_qualification2 != ""){
                echo $academic_qualification2;
            }
            if($academic_qualification3 != ""){
                echo $academic_qualification3;
            }
            ?>"readonly>
    </div>
        </form>
   
     <div class="form-group col-lg-8 col-md-5 col-xs-12">
            <a href='../change_password/change_password.php'><input type='submit' value='Change Password' class="btn btn-danger"></a> 
     </div>
</div> -->
</body>
</html>