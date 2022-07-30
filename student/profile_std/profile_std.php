<?php
include "../../connection/connection.php";

session_start();
 $unv_id = $_SESSION["unv_id"];

 $display_info_std = mysqli_query($connection , "select * from students where unv_id='$unv_id'");
 $row = mysqli_fetch_array($display_info_std);

 $name_std = $row["name_std"];
 $college = $row["college"];
 $type_certifcate_unv = $row["type_certifcate_unv"];
 $department = $row["department"];
 $personal_photo = $row["personal_photo"];
 $batch = $row["batch"];
 $year_admisson = $row["year_admisson"];
 $register_fee = $row["register_fee"];
 $year_fee = $row["year_fee"];
 $confirm_pay_s1 = $row["confirm_pay_s1"];
 $confirm_pay_s2 = $row["confirm_pay_s2"];
 $confirm_pay_s3 = $row["confirm_pay_s3"];
 $confirm_pay_s4 = $row["confirm_pay_s4"];
 $confirm_pay_s5 = $row["confirm_pay_s5"];
 $confirm_pay_s6 = $row["confirm_pay_s6"];
 $confirm_pay_s7 = $row["confirm_pay_s7"];
 $confirm_pay_s8 = $row["confirm_pay_s8"];
 $GPA_S1 = $row["GPA_S1"];
 $GPA_S2 = $row["GPA_S2"];
 $GPA_S3 = $row["GPA_S3"];
 $GPA_S4 = $row["GPA_S4"];
 $GPA_S5 = $row["GPA_S5"];
 $GPA_S6 = $row["GPA_S6"];
 $GPA_S7 = $row["GPA_S7"];
 $GPA_S8 = $row["GPA_S8"];
 //$TGPA = $row["TGPA"];
 
 $_SESSION["name_std"] = $name_std;
 $_SESSION["confirm_pay_s1"] = $confirm_pay_s1;
 $_SESSION["confirm_pay_s2"] = $confirm_pay_s2;
 $_SESSION["confirm_pay_s3"] = $confirm_pay_s3;
 $_SESSION["confirm_pay_s4"] = $confirm_pay_s4;
 $_SESSION["confirm_pay_s5"] = $confirm_pay_s5;
 $_SESSION["confirm_pay_s6"] = $confirm_pay_s6;
 $_SESSION["confirm_pay_s7"] = $confirm_pay_s7;
 $_SESSION["confirm_pay_s8"] = $confirm_pay_s8;
 $_SESSION["GPA_S1"] = $GPA_S1;
 $_SESSION["GPA_S2"] = $GPA_S2;
 $_SESSION["GPA_S3"] = $GPA_S3;
 $_SESSION["GPA_S4"] = $GPA_S4;
 $_SESSION["GPA_S5"] = $GPA_S5;
 $_SESSION["GPA_S6"] = $GPA_S6;
 $_SESSION["GPA_S7"] = $GPA_S7;
 $_SESSION["GPA_S8"] = $GPA_S8;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/student/profile_std.css?v=<?php echo time();?>">
    <title>profile_std</title>
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
<div class="form">
<div class="row">
    <div class="form-group col-lg-4 col-md-6 col-xs-12 bssa">
        <img src="../../elec_reg_new_std/nstd_info_form/images_uplodes/<?php echo $personal_photo ?>" alt="none" width="100%" height="100%">
    </div>

    <div class="form-group col-lg-4 col-md-6 col-xs-12 my-5">
        <label for=""class="lead">Name </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $name_std;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12 my-5">
        <label for=""class="lead">UNV ID </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $unv_id;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">College </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $college;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Department </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $department;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Certifcate Type </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $type_certifcate_unv;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Admisson Year </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $year_admisson;?>" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Academic Year </label>
        <input type="text" name="username" id="" class="form-control" value="
            <?php  if($confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo " First ";
            }
            elseif($confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo " Second ";
            }
            elseif($confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo " Third ";
            }
            else{
                echo "  Fourth";
            }
            ?> " readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Current Semester </label>
        <input type="text" name="username" id="" class="form-control" value="
            <?php  if($confirm_pay_s2 == "none" && $confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "First ";
                $TGPA = $GPA_S1 ;
                $semester = 1;
            }
            elseif($confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "Second ";
                $TGPA = $GPA_S2 ;
                $semester = 2;
            }
            elseif($confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "Third ";
                $TGPA = $GPA_S4 ;
                $semester = 3;
            }
            elseif($confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "Fourth ";
                $TGPA = $GPA_S4 ;
                $semester = 4;
            }
            elseif($confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "Fifth ";
                $TGPA = $GPA_S5 ;
                $semester = 5;
            }
            elseif($confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "Sixth ";
                $TGPA = $GPA_S6 ;
                $semester = 6;
            }
            elseif($confirm_pay_s8 == "none"){
                echo "Seventh ";
                $TGPA = $GPA_S7 ;
                $semester = 7;
            }
            else{
                echo "Eight";
                $TGPA = $GPA_S8 ;
                $semester = 8;
            }
            ?> " readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">GPA </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $TGPA;?>" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Study Fees </label>
        <input type="text" name="username" id="" class="form-control" value="
        <?php
        echo $register_fee + $year_fee;
        $_SESSION["TGPA"] = $TGPA;
        $_SESSION["register_fee"] = $register_fee;
        $_SESSION["year_fee"] = $year_fee;
        $_SESSION["semester"] = $semester;
        $_SESSION["type_certifcate_unv"] = $type_certifcate_unv;
        $_SESSION["department"] = $department;
        $_SESSION["batch"] = $batch ;
        ?> " readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12 my-5">
            <a href='../change_password/change_password.php'><input type='submit' value='Change Password' class="btn btn-danger"></a>    
        </div>
</div>
</body>
</html>