<?php
/*
هذه الصفحة مقسمة الي قسمين جزء الاماحانات العادية وامتحانات الملاحق تختلف البانات فيها
 على حسب السمتخدم وتعرض له ايضا على حسب البيانات المحدده له
 حيث تقوم باظهار بيانات الطلاب لتاكيد حضورهم الامتحان او لا
  ويتم ذالك عن طريق تحديد الاستاذ المراقب الذي تم تحديده من قبل المسجل
  وبعد تحديد الطلاب الحاضرين والغياب ايضا يقوم بعرض بياناتهم في نفس الصفحة للتاكيد
*/
include "../../../../connection/connection.php";
session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];

$name_subject = $_GET["name_subject"];
$type_certificate = $_GET["type_certificate"];
$department = $_GET["department"];
$batch = $_GET["batch"];
$study_year = $_GET["study_year"];
$semester = $_GET["semester"];
$type_exam = $_GET["type_exam"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/teacher/attends_and_check_std.css?v=<?php echo time();?>">
    <title>Students schedule for a subject exam <?php echo $name_subject ?></title>
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
<?php
if($type_exam == "normal"){
    echo " <label class='lead'>Students List For $name_subject Exam </label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
    <tr>
     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>College</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     <th></th>
     <th></th>
      
     </tr>";
     if($semester == 1){
     $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s1='done'");
     }
     elseif($semester == 2){
        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s2='done'");
        }
    elseif($semester == 3){
       $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s3='done'");
        }  
        elseif($semester == 4){
            $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s4='done'");
             }  
             elseif($semester == 5){
                $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s5='done'");
                 }          
                 elseif($semester == 6){
                    $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s6='done'");
                     } 
                     elseif($semester == 7){
                        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s7='done'");
                         } 
                         elseif($semester == 8){
                            $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std ,college ,type_certifcate_unv ,department ,batch from students where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && confirm_pay_s8='done'");
                             }          
 while($row=mysqli_fetch_array($display_students_for_degree)){
     $unv_id = $row["unv_id"];
     $name_std = $row["name_std"];
     $college = $row["college"];
     $type_certifcate_unv = $row["type_certifcate_unv"];
     $department = $row["department"];
     $batch = $row["batch"];
     $dispaly_data_std_for_check_if_exisit = mysqli_query($connection, "select * from submit_std_and_result_subjects where unv_id='$unv_id' && name_std='$name_std' && type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam'");

if(mysqli_num_rows($dispaly_data_std_for_check_if_exisit) == 1){
    $stuats = "DONE";
    //header("location: attends_and_check_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam");
}
else{
    $stuats = "NOT YET";
}
     echo "
     <tr>
     <td>$unv_id</td>
     <td>$name_std</td>
     <td>$college</td>
     <td>$type_certifcate_unv</td>
     <td>$department</td>
     <td>$batch</td>
     <td>$stuats</td>
     <td><a href='submit_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button class='btn btn-primary'>attendance </button></a></td>
     <td><a href='absence_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button class='btn btn-primary'>not attendance </button></a></td>
     </tr>
     "; 
     }
 echo "</table>";
 $total_of_all_students = mysqli_num_rows($display_students_for_degree);
 echo "<label class='lead'>Total Students Number . $total_of_all_students</label>" ;
 echo"</div>";
//---------------------------------------------------------------------------------------------------------------------

echo "<hr>
<div class='form'>
 <label class='lead'>List Of Students Attending $name_subject Examination</label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
     <tr>
     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>College</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     </tr>";
     $display_students_for_submit_exam = mysqli_query($connection , "select unv_id , name_std , type_certifcate_unv , department ,batch from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' ");
    while($row2=mysqli_fetch_array($display_students_for_submit_exam)){
     $unv_id2 = $row2["unv_id"];
     $name_std2 = $row2["name_std"];
     $type_certifcate_unv2 = $row2["type_certifcate_unv"];
     $department2 = $row2["department"];
     $batch2 = $row2["batch"];
     echo "
     <tr>
     <td>$unv_id2</td>
     <td>$name_std2</td>
     <td>$college</td>
     <td>$type_certifcate_unv2</td>
     <td>$department2</td>
     <td>$batch2</td>
     </tr>
     "; 
     }
 echo "</table>";
 $total_of_submit_students = mysqli_num_rows($display_students_for_submit_exam);
 echo "<label class='lead'>Number Of Students Attending</label>" . $total_of_submit_students;
 echo "</div> ";
 //---------------------------------------------------------------------------------------------------------------------
 echo "<hr>
 <div class='form'>
 <label class='lead'>List Of Students Absent For $name_subject Exam</label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
     <tr>
     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>College</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     </tr>
    ";
    $display_students_for_absence_exam = mysqli_query($connection , "select unv_id , name_std , type_certifcate_unv , department ,batch from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='no' ");
    while($row2=mysqli_fetch_array($display_students_for_absence_exam)){
    $unv_id2 = $row2["unv_id"];
    $name_std2 = $row2["name_std"];
    $type_certifcate_unv2 = $row2["type_certifcate_unv"];
    $department2 = $row2["department"];
    $batch2 = $row2["batch"];
    echo "
    <tr>
    <td>$unv_id2</td>
    <td>$name_std2</td>
    <td>$college</td>
    <td>$type_certifcate_unv2</td>
    <td>$department2</td>
    <td>$batch2</td>
    </tr>
    "; 
    }
echo "</table>";
$total_of_absence_students = mysqli_num_rows($display_students_for_absence_exam);
echo "<label class='lead'>The Number Of Absent Students</label>" . $total_of_absence_students;
echo "<hr>";
}

//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
elseif($type_exam == "sub_exams"){
    echo " <label class='lead'>Students List For $name_subject Exam </label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
     <tr>
     <td>$unv_id</td>
     <td>$name_std</td>
     <td>$type_certifcate_unv</td>
     <td>$department</td>
     <td>$batch</td>

     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>College</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     </tr>";

     //في حالة لم يحضر المتحان الاول
     $display_students_attendes = mysqli_query($connection , "select unv_id ,name_std ,type_certifcate_unv ,department ,batch,name_subject from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch'&& semester='$semester' && name_subject='$name_subject' && come_to_exam_in_first_time='no'");

 while($row3=mysqli_fetch_array($display_students_attendes)){
     $unv_id = $row3["unv_id"];
     $name_std = $row3["name_std"];
     $type_certifcate_unv = $row3["type_certifcate_unv"];
     $department = $row3["department"];
     $batch = $row3["batch"];
     $name_subject = $row3["name_subject"];
     echo "
     <tr>
     <td>$unv_id</td>
     <td>$name_std</td>
     <td>$type_certifcate_unv</td>
     <td>$department</td>
     <td>$batch</td>
     <td>$name_subject</td>
     <td><a href='submit_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam''><button>تاكيد الحضور</button></a></td>
     <td><a href='absence_std.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam''><button>غياب </button></a></td>
     </tr>
     "; 
     }
     //في حالة سوف يمتحن امتحان بدييبل
     $display_students_attendes2 = mysqli_query($connection , "select unv_id ,name_std ,type_certifcate_unv ,department ,batch,name_subject from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch'&& semester='$semester' && name_subject='$name_subject' && status_exam='no_sub'");
     while($row4=mysqli_fetch_array($display_students_attendes2)){
        $unv_id4 = $row4["unv_id"];
        $name_std4 = $row4["name_std"];
        $type_certifcate_unv4 = $row4["type_certifcate_unv"];
        $department4 = $row4["department"];
        $batch4 = $row4["batch"];
        $name_subject4 = $row4["name_subject"];
        echo "
        <tr>
        <td>$unv_id4</td>
        <td>$name_std4</td>
        <td>$type_certifcate_unv4</td>
        <td>$department4</td>
        <td>$batch4</td>
        <td>$name_subject4</td>
         <td>sdj</td>>
        <td><a href='submit_std.php?unv_id=$unv_id4&name_std=$name_std4&name_subject=$name_subject4&type_certificate=$type_certificate4&department=$department4&batch=$batch4&study_year=$study_year4&semester=$semester4&type_exam=$type_exam4''><button>تاكيد الحضور</button></a></td>
        <td><a href='absence_std.php?unv_id=$unv_id4&name_std=$name_std4&name_subject=$name_subject4&type_certificate=$type_certificate4&department=$department4&batch=$batch4&study_year=$study_year4&semester=$semester4&type_exam=$type_exam4''><button>غياب </button></a></td>
        </tr>
        "; 
        }

         //في حالة سوف يمتحن امتحان ملحق اي ساقط في المادة
     $display_students_attendes3 = mysqli_query($connection , "select unv_id ,name_std ,type_certifcate_unv ,department ,batch,name_subject from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch'&& semester='$semester' && name_subject='$name_subject'  && come_to_exam_in_first_time='yes' && degree_exam < 50");
     while($row5=mysqli_fetch_array($display_students_attendes3)){
        $unv_id5 = $row5["unv_id"];
        $name_std5 = $row5["name_std"];
        $type_certifcate_unv5 = $row5["type_certifcate_unv"];
        $department5 = $row5["department"];
        $batch5 = $row5["batch"];
        $name_subject5 = $row5["name_subject"];
        echo "
        <tr>
        <td>$unv_id5</td>
        <td>$name_std5</td>
        <td>$type_certifcate_unv5</td>
        <td>$department5</td>
        <td>$batch5</td>
        <td>$name_subject5</td>
        <td><a href='submit_std.php?unv_id=$unv_id5&name_std=$name_std5&name_subject=$name_subject5&type_certificate=$type_certificate5&department=$department5&batch=$batch5&study_year=$study_year5&semester=$semester5&type_exam=$type_exam5''><button>تاكيد الحضور</button></a></td>
        <td><a href='absence_std.php?unv_id=$unv_id5&name_std=$name_std5&name_subject=$name_subject5&type_certificate=$type_certificate5&department=$department5&batch=$batch5&study_year=$study_year5&semester=$semester5&type_exam=$type_exam5''><button>غياب </button></a></td>
        </tr>
        "; 
        }


 echo "</table>";
 $total_of_all_students1 = mysqli_num_rows($display_students_attendes) + mysqli_num_rows($display_students_attendes2) +  mysqli_num_rows($display_students_attendes3);
 $total_of_all_students2 = mysqli_num_rows($display_students_attendes2);
 $total_of_all_students3 = mysqli_num_rows($display_students_attendes3);
 echo "<label class='lead'>Total Student Number</label>" . $total_of_all_students1  ;
///----------------------------------------------------------------------------------------------------------------------
echo "<hr>
 <label class='lead'>List Of Students Attending The Supplementary $name_subject Exams</label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
     <tr>
     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     </tr>";
     $display_students_for_submit_exam = mysqli_query($connection , "select unv_id , name_std , type_certifcate_unv , department ,batch from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && come_to_exam_in_second_time='yes' ");
    while($row2=mysqli_fetch_array($display_students_for_submit_exam)){
     $unv_id2 = $row2["unv_id"];
     $name_std2 = $row2["name_std"];
     $type_certifcate_unv2 = $row2["type_certifcate_unv"];
     $department2 = $row2["department"];
     $batch2 = $row2["batch"];
     echo "
     <tr>
     <td>$unv_id2</td>
     <td>$name_std2</td>
     <td>$type_certifcate_unv2</td>
     <td>$department2</td>
     <td>$batch2</td>
     </tr>
     "; 
     }
 echo "</table>";

 $total_of_submit_students = mysqli_num_rows($display_students_for_submit_exam);
 echo "<label class='lead'>Number Of Students Attending</label>" . $total_of_submit_students;
 //------------------------------------------------------------------------------------------
 echo"<div class='form'>";
 echo "<hr>
 <label class='lead'>List Of Absent Students For Subject Supplement $name_subject Exams</label>
    <br>
    <table cellpadding='20' class='table table-striped table-hover'>
     <tr>
     <th>UNV_ID</th>
     <th>Std_Name</th>
     <th>Certifcate  Type</th>
     <th>Department</th>
     <th>Batch</th>
     <th></th>
     </tr>
    ";
    $display_students_for_absence_exam = mysqli_query($connection , "select unv_id , name_std , type_certifcate_unv , department ,batch from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && study_year='$study_year' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && come_to_exam_in_second_time='no' ");
    while($row2=mysqli_fetch_array($display_students_for_absence_exam)){
    $unv_id2 = $row2["unv_id"];
    $name_std2 = $row2["name_std"];
    $type_certifcate_unv2 = $row2["type_certifcate_unv"];
    $department2 = $row2["department"];
    $batch2 = $row2["batch"];
    echo "
    <tr>
    <td>$unv_id2</td>
    <td>$name_std2</td>
    <td>$type_certifcate_unv2</td>
    <td>$department2</td>
    <td>$batch2</td>
    </tr>
    "; 
    }
echo "</table>";
$total_of_absence_students = mysqli_num_rows($display_students_for_absence_exam);
echo "<label class='lead'>The Number Of Absent Students</label>" . $total_of_absence_students;
}
?>

<hr>
<a href="../select_subject_for_check/select_subject_for_check.php"><button class="btn btn-primary">Back</button></a>
</body>
</html>

