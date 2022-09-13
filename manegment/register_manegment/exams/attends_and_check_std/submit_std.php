<?php
include "../../../../connection/connection.php";
session_start();
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

if($type_exam == "normal"){
    //التحقق اولا اذا ما نفس البيانات موجودة في قاعدة البيانات ام لا

$dispaly_data_std_for_check_if_exisit = mysqli_query($connection, "select * from submit_std_and_result_subjects where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam'");

if(mysqli_num_rows($dispaly_data_std_for_check_if_exisit) == 1){
    echo "<script>alert('Sorry, Student Attendance Has Already Been Confirmed');
    window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
   // header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
}

else{
if(isset($_POST["submit_password"])){

    $unv_id2 = $_POST["unv_id"];
    $name_std2 = $_POST["name_std"];
    $name_subject2 = $_POST["name_subject"];
    $type_certificate2 = $_POST["type_certificate"];
    $department2 = $_POST["department"];
    $batch2 = $_POST["batch"];
    $study_year2 = $_POST["study_year"];
    $semester2 = $_POST["semester"];
    $password_std = $_POST["password_std"];
    $date = date("Y-m-d");
    $hour = date("h:m:s");

    $dispaly_password_for_submit = mysqli_query($connection , "select password from students where password='$password_std' && unv_id='$unv_id' ");
    if(mysqli_num_rows($dispaly_password_for_submit) == 1) {
        $display_hours_subject_for_insert = mysqli_query($connection , "select number_hours_subject from subjects where name_subject='$name_subject' ");
        $value_hour = mysqli_fetch_array($display_hours_subject_for_insert);
        $value_hour2 = $value_hour["number_hours_subject"];
        if($display_hours_subject_for_insert){
            $insert_data_std = mysqli_query($connection , "insert into submit_std_and_result_subjects (unv_id,name_std,type_certifcate_unv,department,batch,study_year,semester,name_subject,come_to_exam_in_first_time , type_exam,number_of_hour_subject , date ,hour)
            value ('$unv_id2','$name_std2','$type_certificate2','$department2','$batch','$study_year','$semester','$name_subject2','yes','$type_exam','$value_hour2','$date','$hour') ");
        if($insert_data_std){
       echo "<script>alert('Student Attendance Confirmed');
       window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
       // header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
        }
        }
     }
     else{
         echo "<script>alert('Sorry, There Is An Error In The Password')</script>";
     }
}
}

}
//-------------------------------------------------------------------------------------------------------------------------

elseif($type_exam == "sub_exams"){

    $dispaly_data_std_for_check_if_exisit = mysqli_query($connection, "select * from submit_std_and_result_subjects where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam'");

if(mysqli_num_rows($dispaly_data_std_for_check_if_exisit) == 1){
    echo "<script>alert('Sorry, The Student's Attendance Of The Supplement Exam Has Already Been Confirmed');
    window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
    //header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
}

    if(isset($_POST["submit_password"])){

        $unv_id2 = $_POST["unv_id"];
        $name_std2 = $_POST["name_std"];
        $name_subject2 = $_POST["name_subject"];
        $type_certificate2 = $_POST["type_certificate"];
        $department2 = $_POST["department"];
        $batch2 = $_POST["batch"];
        $study_year2 = $_POST["study_year"];
        $semester2 = $_POST["semester"];
        $password_std = $_POST["password_std"];
        $date = date("Y-m-d");
        $hour = date("h:m:s");
    
        $dispaly_password_for_submit = mysqli_query($connection , "select password from students where password='$password_std' && unv_id='$unv_id' ");
        if(mysqli_num_rows($dispaly_password_for_submit) == 1) {
            $update_data = mysqli_query($connection , "update submit_std_and_result_subjects set come_to_exam_in_second_time='yes' ,type_exam2='sub_exams' where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject'");
             if($update_data){
                echo "<script>alert('The Student Has Been Confirmed To Attend The Supplementary Exam');
                window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
             //header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
             }
         }
         else{
             echo "<script>alert('Sorry, There Is An Error In The Password')</script>";
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
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../../css/manegment/teacher/submit_std.css?v=<?php echo time();?>">
    <title>Confirmation of student attendance</title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../../../tetcher/profile_tetcher/profile_tetcher.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_teacher ?></h3>
        </div>
        <div class="log">
        <a href="../../../../tetcher/logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="form">
    <form action="" method="post">
    <div class="row">
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Name</label>
            <input type="text" name="name_std" value="<?php echo $name_std; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">UNV ID</label>
            <input type="text" name="unv_id" value="<?php echo $unv_id; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Certificate Type</label>
            <input type="text" name="type_certificate" value="<?php echo $type_certificate; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Department</label>
            <input type="text" name="department" value="<?php echo $department; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Batch</label>
            <input type="text" name="batch" value="<?php echo $batch; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Study Year</label>
            <input type="text" name="study_year" value="<?php echo $study_year; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Semester</label>
            <input type="text" name="semester" value="<?php echo $semester; ?>" class="form-control" readonly>
        </div>
        <br>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Subject</label>
            <input type="text" name="name_subject" value="<?php echo $name_subject; ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Enter Your Password </label>
            <input type="password" name="password_std" id="" class="form-control">
        </div>
        <div class="form-group col-lg-12 col-md-12 col-xs-12 ">
            <input type="submit" name="submit_password" value="Confirm" class="btn btn-primary">
        </div>
    </form>
</body>
</html>