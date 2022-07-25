<?php
include "../../../../connection/connection.php";
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
    echo "<script>alert('عذرا تم تاكيد حضور الطالب مسبقا');
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
       echo "<script>alert('تم تاكيد حضور الطالب');
       window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
       // header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
        }
        }
     }
     else{
         echo "<script>alert('عذرا يوجد خطا في  كلمة المرور')</script>";
     }
}
}

}
//-------------------------------------------------------------------------------------------------------------------------

elseif($type_exam == "sub_exams"){

    $dispaly_data_std_for_check_if_exisit = mysqli_query($connection, "select * from submit_std_and_result_subjects where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam'");

if(mysqli_num_rows($dispaly_data_std_for_check_if_exisit) == 1){
    echo "<script>alert('عذرا تم تاكيد حضور الطالب لامتحان الملحق مسبقا');
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
                echo "<script>alert('تم تاكيد حضور الطالب لامتحان الملحق');
                window.location.href='attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'</script>";
             //header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
             }
         }
         else{
             echo "<script>alert('عذرا يوجد خطا في  كلمة المرور')</script>";
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
            الرجاء كتابة كلمة المرور الخاصة بك لتاكيد حضورك
            <input type="password" name="password_std" id="">
        </div>
        <div>
            <input type="submit" name="submit_password" value="تاكيد">
        </div>
    </form>
</body>
</html>