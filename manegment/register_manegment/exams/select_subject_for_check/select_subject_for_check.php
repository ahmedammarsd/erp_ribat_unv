<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الامتحان</title>
</head>
<body>
<?php
include "../../../../connection/connection.php";

session_start();
 $name = $_SESSION["name_of_tetcher"];

$date = date("Y-m-d");

    $display_subjects = mysqli_query($connection , "select name_subject, type_certificate , department ,batch ,study_year ,semester , type_exam from distribution_tetcher_exams where name_tetcher='$name' && date_of_exam='$date'");
    if(mysqli_num_rows($display_subjects) == 0){
        echo "لا توجد مواد";
    }
    else{
        while($row2 = mysqli_fetch_array($display_subjects)){
            $name_subject = $row2["name_subject"];
            $type_certificate = $row2["type_certificate"];
            $department = $row2["department"];
            $batch = $row2["batch"];
            $study_year = $row2["study_year"];
            $semester = $row2["semester"];
            $type_exam = $row2["type_exam"];
            if($type_exam == "normal"){$type =  "امتحان نهاية سمستر";} if($type_exam == "sub_exams"){$type = "امتحان ملحق";}

            echo "<table cellpadding='20'>
            <tr>
              <td>اسم الماده : $name_subject </td>
              <td>نوع الشهادة :$type_certificate</td>
              <td>القسم :$department</td>
              <td>الدفعة :$batch</td>
              <td>السنة الدراسية :$study_year</td>
              <td> السمستر :$semester</td>
              <td>$type<td>
              <td><a href='../attends_and_check_std/attends_and_check_std.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button>مراقبة ومراجعة الحضور</button></a></td>
            </tr>
            </table>";
        }
    }
  


?>
<hr>
<a href="../../../../tetcher/profile_tetcher/profile_tetcher.php"><button>رجوع</button></a>
</body>
</html>
