<?php
include "../../connection/connection.php";

session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];

//  $username = $_SESSION["username_tetcher"];
// $name = $_SESSION["name_of_tetcher"]; 
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
    <link rel="stylesheet" href="../../css/manegment/teacher/subject.css?v=<?php echo time();?>">
    <title>Subjects</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
            <a href="#"><li class="active"><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
            <a href="../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Exams Control</li></a>
            <a href="../../elec_reg_new_std/faculty_of_computers/display_std/display_std.php"><li><img src="../../icons/stdifo1.png" alt="" width="40px" height="40px">Interview Student</li></a>

        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../profile_tetcher/profile_tetcher.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_teacher ?></h3>
        </div>
        <div class="log">
        <a href="../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="form">
    <?php
    $display_subjects = mysqli_query($connection , "select name_subject, type_certifcate_unv , department ,batch ,study_year ,semester from distribution_subject where name_tetcher='$name_teacher' && complete_and_end_subject='none'");
    if(mysqli_num_rows($display_subjects) == 0){
        echo "<label class='lead'>No Subject</label>";
    }
    else{
        while($row2 = mysqli_fetch_array($display_subjects)){
            $name_subject = $row2["name_subject"];
            $type_certificate = $row2["type_certifcate_unv"];
            $department = $row2["department"];
            $batch = $row2["batch"];
            $study_year = $row2["study_year"];
            $semester = $row2["semester"];


            echo "<table cellpadding='20' class='table table-striped table-hover'>
            <tr>
              <th>Subject Name</th>
              <th>Certificte Type</th>
              <th>Department </th>
              <th>Batch</th>
              <th>Study Year</th>
              <th>Semester</th>
              <th></th>
              </tr>
              <tr>
              <td>$name_subject</td>
              <td>$type_certificate</td>
              <td>$department</td>
              <td>$batch</td>
              <td>$study_year</td>
              <td> $semester</td>
              <td><a href='../display_std_inf_for_results/display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester'><button class='btn btn-primary'>Enter Degree</button></a></td>
              </form>
            </tr>
            </table>";
        }
    }
     ?>
</body>
</html>