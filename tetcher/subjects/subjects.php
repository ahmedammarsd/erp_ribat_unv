<?php
include "../../connection/connection.php";

session_start();
//  $username = $_SESSION["username_tetcher"];

$name = $_SESSION["name_of_tetcher"]; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
</head>
<body>
<h4>المواد التي تدرسها</h4>
    <?php
    $display_subjects = mysqli_query($connection , "select name_subject, type_certifcate_unv , department ,batch ,study_year ,semester from distribution_subject where name_tetcher='$name' && complete_and_end_subject='none'");
    if(mysqli_num_rows($display_subjects) == 0){
        echo "لا توجد مواد";
    }
    else{
        while($row2 = mysqli_fetch_array($display_subjects)){
            $name_subject = $row2["name_subject"];
            $type_certificate = $row2["type_certifcate_unv"];
            $department = $row2["department"];
            $batch = $row2["batch"];
            $study_year = $row2["study_year"];
            $semester = $row2["semester"];


            echo "<table cellpadding='20'>
            <tr>
              <td>اسم الماده : $name_subject </td>
              <td>نوع الشهادة :$type_certificate</td>
              <td>القسم :$department</td>
              <td>الدفعة :$batch</td>
              <td>السنة الدراسية :$study_year</td>
              <td> السمستر :$semester</td>
              <td><a href='../display_std_inf_for_results/display_std_inf_for_results.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester'><button>ادخال الدرجات</button></a></td>
              </form>
            </tr>
            </table>";
        }
    }
     ?>
</body>
</html>