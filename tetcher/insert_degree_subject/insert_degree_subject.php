<?php
include "../../connection/connection.php";
$name_teacher =  $_SESSION["name_of_tetcher"];

$unv_id = $_GET["unv_id"];
$name_std = $_GET["name_std"];
$name_subject = $_GET["name_subject"];
$type_certificate = $_GET["type_certificate"];
$department = $_GET["department"];
$batch = $_GET["batch"];
$study_year = $_GET["study_year"];
$semester = $_GET["semester"];
$type_exam = $_GET["type_exam"];

//التحقق اولا اذا ما نفس البيانات موجودة في قاعدة البيانات ام لا
if($type_exam == "normal"){
if(isset($_POST["degree_exam"])){

    $unv_id2 = $_POST["unv_id"];
    $name_std2 = $_POST["name_std"];
    $name_subject2 = $_POST["name_subject"];
    $type_certificate2 = $_POST["type_certificate"];
    $department2 = $_POST["department"];
    $batch2 = $_POST["batch"];
    $study_year2 = $_POST["study_year"];
    $semester2 = $_POST["semester"];
    $degree_exam = $_POST["degree_exam"];
    $date = date("Y-m-d");
    $hour = date("h:m:s");

    //النقاط
    if($degree_exam >=90){
        $points = 4;
    }
    elseif($degree_exam >=80){
        $points = 3.5;
    }
    elseif($degree_exam >=70){
        $points = 3;
    }
    elseif($degree_exam >=60){
        $points = 2.5;
    }
    elseif($degree_exam >=50){
        $points = 2;
    }
    elseif($degree_exam <50){
        $points = 0;
    }

    //عرض ساعات المادة لضربها في النقاط
    $display_hours_subject_for_insert = mysqli_query($connection , "select number_hours_subject from subjects where name_subject='$name_subject' ");
    $value_hour = mysqli_fetch_array($display_hours_subject_for_insert);
    $value_hour2 = $value_hour["number_hours_subject"];
    $number_points = $value_hour2* $points;
        $update_or_insert_degree_std = mysqli_query($connection , "update submit_std_and_result_subjects set degree_exam='$degree_exam', number_of_points='$number_points' where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' ");
         if($update_or_insert_degree_std){
        //echo "<script>alert('SUCCESSEFULY')</script>";
         header("location: ../display_std_inf_for_results/display_std_inf_for_results.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
         }
         else{
            echo "<script>alert('Sorry, There Was An Entry Error')</script>";
}
}
}
if($type_exam == "sub_exams"){
    if(isset($_POST["degree_exam"])){
    
        $unv_id2 = $_POST["unv_id"];
        $name_std2 = $_POST["name_std"];
        $name_subject2 = $_POST["name_subject"];
        $type_certificate2 = $_POST["type_certificate"];
        $department2 = $_POST["department"];
        $batch2 = $_POST["batch"];
        $study_year2 = $_POST["study_year"];
        $semester2 = $_POST["semester"];
        $degree_exam = $_POST["degree_exam"];
        $date = date("Y-m-d");
        $hour = date("h:m:s");

        //النقاط
    if($degree_exam >=90){
        $points = 4;
    }
    elseif($degree_exam >=80){
        $points = 3.5;
    }
    elseif($degree_exam >=70){
        $points = 3;
    }
    elseif($degree_exam >=60){
        $points = 2.5;
    }
    elseif($degree_exam >=50){
        $points = 2;
    }
    elseif($degree_exam <50){
        $points = 0;
    }

    //عرض ساعات المادة لضربها في النقاط
    $display_hours_subject_for_insert = mysqli_query($connection , "select number_hours_subject from subjects where name_subject='$name_subject' ");
    $value_hour = mysqli_fetch_array($display_hours_subject_for_insert);
    $value_hour2 = $value_hour["number_hours_subject"];
    $number_points = $value_hour2* $points;
    
            $update_or_insert_degree_std = mysqli_query($connection , "update submit_std_and_result_subjects set degree_exam2='$degree_exam',  number_of_points_2='$number_points' where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' ");
             if($update_or_insert_degree_std){
            //echo "<script>alert('SUCCESSEFULY')</script>";
             header("location: ../display_std_inf_for_results/display_std_inf_for_results.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
             }
             else{
                echo "<script>alert('Sorry, There Was An Entry Error')</script>";
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
    <link rel="stylesheet" href="../../css/manegment/teacher/insert_degree_subject.css?v=<?php echo time();?>">
    <title>تاكيد حضور الطالب</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
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
<div class="form">
<form action="" method="post">
<div class="row">
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Name </label>
        <input type="text" name="name_std" value="<?php echo $name_std; ?>" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">UNV ID </label>
        <input type="text" name="unv_id" value="<?php echo $unv_id; ?>" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Certificate type</label>
        <input type="text" name="type_certificate" value="<?php echo $type_certificate; ?>" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Department</label>
        <input type="text" name="department" value="<?php echo $department; ?>" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Batch</label>
        <input type="text" name="batch" value="<?php echo $batch; ?>"  class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead"> Study Year</label>
        <input type="text" name="study_year" value="<?php echo $study_year; ?>"  class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Semester</label>
        <input type="text" name="semester" value="<?php echo $semester; ?>"  class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Subject Name</label>
        <input type="text" name="name_subject" value="<?php echo $name_subject; ?>"  class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Exam Degree</label>
        <input type="number" name="degree_exam" id=""  class="form-control">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <input type="submit" name="submit_password" value="Conform" class="btn btn-primary">
    </div>
    </form>
</body>
</html>