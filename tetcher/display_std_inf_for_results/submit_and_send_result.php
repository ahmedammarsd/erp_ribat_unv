<?php
include "../../connection/connection.php";
session_start();

$name_subject = $_GET["name_subject"];
$type_certificate = $_GET["type_certificate"];
$department = $_GET["department"];
$batch = $_GET["batch"];
$study_year = $_GET["study_year"];
$semester = $_GET["semester"];
$type_exam = $_GET["type_exam"];
$username = $_SESSION["username_tetcher"];


if($type_exam == "normal"){
    if(isset($_POST["submit"])){
    $update_and_send_result_to_register = mysqli_query($connection , "update submit_std_and_result_subjects set check_tetcher='done' where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam'");
    if($update_and_send_result_to_register){
        //في حالة عدم وجود امتحان ملحق
         //تحديد عدد الطلاب الكلي  ومعرفة درجة كل طالب واذا لا يوجد طالب ساقط في المادة تنتهي المادة
         //من عرضها في صفحة الاستاذ او البروفايل الخاص به
         $display_students_for_count = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes'");
         $display_degree_students_for_count = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' && degree_exam >'50'");
         $number_of_std = mysqli_num_rows($display_students_for_count);
         $number_of_std_pass_exam = mysqli_num_rows($display_degree_students_for_count);
         if($number_of_std == $number_of_std_pass_exam){
            $update_to_end_the_subject = mysqli_query($connection , "update distribution_subject set complete_and_end_subject='done' where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && name_tetcher='$username'");
            if($update_to_end_the_subject){
                echo "<script>alert('Subject Grades Have Been Confirmed Successfully');
                window.location.href='display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam';</script>";
           // header("location: display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'");
            }
            else{
                echo "<script>alert('Sorry, The Result Is Not Confirmed. Please Contact The Developer')</script>";
            }
         }
    }
    else{
        echo "<script>alert('Sorry, The Result Is Not Confirmed. Please Contact The Developer')</script>";
    }
}
}
if( $type_exam == "sub_exams"){
    if(isset($_POST["submit"])){
    $update_and_send_result_to_register = mysqli_query($connection , "update submit_std_and_result_subjects set check_tetcher2='done' where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && come_to_exam_in_second_time='yes'");
    if($update_and_send_result_to_register){
        $update_to_end_the_subject = mysqli_query($connection , "update distribution_subject set complete_and_end_subject='done' where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && name_tetcher='$username'");
        echo "<script>alert('Supplementary Scores Confirmed Successfully');
        window.location.href='display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam';</script>";
   
      // header("location: display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'");
    }
    else{
        echo "<script>alert('Sorry, The Result Is Not Confirmed. Please Contact The Developer')</script>";
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
    <title>Confirm The Result</title>
</head>
<body>
    <h2>Are You Sure You Can Confirm These Scores?</h2>
    <form action="" method="post">
        <div>
            <button name="submit">Confirm</button>
        </div>
        <?php 
       echo "<a href='display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'>Back</a>";
        ?>
    </form>
</body>
</html>