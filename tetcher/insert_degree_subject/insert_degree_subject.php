<?php
include "../../connection/connection.php";
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
            echo "<script>alert('عذرا يوجد خطا في  الادخال')</script>";
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
                echo "<script>alert('عذرا يوجد خطا في  الادخال')</script>";
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
    <title>تاكيد حضور الطالب</title>
</head>
<body>
    <form action="" method="post">
       <div>
           الاسم
            <input type="text" name="name_std" value="<?php echo $name_std; ?>" readonly>
        </div>
        <div>
            الرقم الجامعي
            <input type="text" name="unv_id" value="<?php echo $unv_id; ?>" readonly>
        </div>
        <div>
           نوع الشهادة
            <input type="text" name="type_certificate" value="<?php echo $type_certificate; ?>" readonly>
        </div>
        <div>
          القسم
            <input type="text" name="department" value="<?php echo $department; ?>" readonly>
        </div>
        <div>
          الدفعة
            <input type="text" name="batch" value="<?php echo $batch; ?>" readonly>
        </div>
        <div>
          السنة الدراسية
            <input type="text" name="study_year" value="<?php echo $study_year; ?>" readonly>
        </div>
        <div>
          السمستر
            <input type="text" name="semester" value="<?php echo $semester; ?>" readonly>
        </div>
        <br>
        <div>
         المادة
            <input type="text" name="name_subject" value="<?php echo $name_subject; ?>" readonly>
        </div>
        <br>
        <div>
           الدرجة
            <input type="number" name="degree_exam" id="">
        </div>
        <div>
            <input type="submit" name="submit_password" value="تاكيد">
        </div>
    </form>
</body>
</html>