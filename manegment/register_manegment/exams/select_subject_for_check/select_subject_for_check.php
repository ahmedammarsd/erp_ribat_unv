<?php
include "../../../../connection/connection.php";

session_start();
 $name = $_SESSION["name_of_tetcher"];

$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/teacher/subject.css?v=<?php echo time();?>">
    <title>Exams</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
        <a href="../../../../tetcher/subjects/subjects.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
        <a href="#"><li class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Exams Control</li></a>
        
            
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../../../tetcher/profile_tetcher/profile_tetcher.php"><img src="../../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name ?></h3>
        </div>
        <div class="log">
        <a href="../../../../tetcher/login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="form">
<?php

    $display_subjects = mysqli_query($connection , "select name_subject, type_certificate , department ,batch ,study_year ,semester , type_exam from distribution_tetcher_exams where name_tetcher='$name' && date_of_exam='$date'");
    if(mysqli_num_rows($display_subjects) == 0){
        echo "<label class='lead'>No Subject<label>";
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
            if($type_exam == "normal"){$type =  "Semester Final Exam";} if($type_exam == "sub_exams"){$type = "Supplement Exam";}

            echo "<table cellpadding='20' class='table table-striped table-hover'>
            <tr>
            <th>Subject Name</th>
            <th>Certificte Type</th>
            <th>Department</th>
            <th>Batch</th>
            <th>Study Year</th>
            <th>Semester</th>
            <th>Type</th>
            <th></th>
            <th></th>
            
            </tr>
            <tr>
            <td>$name_subject </td>
            <td>$type_certificate</td>
            <td>$department</td>
            <td>$batch</td>
            <td>$study_year</td>
            <td>$semester</td>
            <td>$type<td>
              <td><a href='../attends_and_check_std/attends_and_check_std.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button  class='btn btn-primary'>View</button></a></td>
            </tr>
            </table>";
        }
    }
  


?>

<!-- <a href="../../../../tetcher/profile_tetcher/profile_tetcher.php"><button class="btn btn-primary">رجوع</button></a> -->
</div>
</div>
</body>
</html>
