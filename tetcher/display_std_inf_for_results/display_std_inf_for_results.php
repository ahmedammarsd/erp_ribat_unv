<?php
include "../../connection/connection.php";
session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];
$name_subject = $_GET["name_subject"];
$type_certificate = $_GET["type_certificate"];
$department = $_GET["department"];
$batch = $_GET["batch"];
$study_year = $_GET["study_year"];
$semester = $_GET["semester"];
//$type_exam = $_GET["type_exam"];
//echo $type_exam;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/teacher/display_std_inf_for_results.css?v=<?php echo time();?>">
    <title>جدول الطلاب لامتحان مادة <?php echo $name_subject ?></title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
        <a href="../subjects/subjects.php"><li class="active"><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
        <a href="../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Exams Control</li></a>
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
        <label for=""class="lead">Select Exam Type </label>
        <select name="type_exam" id="" class="form-select">
            <option value="">Select Exam Type</option>
            <option value="normal"> Final Exams Semester <?php echo $semester ?></option>
            <option value="sub_exams"> Supplements Exams Semester <?php echo $semester ?></option>
        </select>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12 my-5">
            <input type="submit" value="Search" name="submit" id="btn" class="btn btn-primary">
        </div>
    </form>
    
  <?php 
  if(isset($_POST["submit"])){
      $type_exam = $_POST["type_exam"];

      if($type_exam == "normal"){
        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' && check_tetcher='none' ");
       if(mysqli_num_rows($display_students_for_degree) == 0){
           echo "<label class='lead'>Sorry There Is No Data For Students Because Exams Have Not Started</label>";
       }
       else{
       echo "<h2>Students Schedule For <?php echo $name_subject ?> Exam</h2>
       <br>";
        echo "<table cellpadding='15' class='table table-striped table-hover'>
        <tr>
        <th>UNV ID</th>
        <th>Name</th>
        <th> Certificte Type : $type_certificate</th>
        <th>Department :$department</th>
        <th>Batch</th>
        <th>Subject Degree:  $name_subject </th>
        <th></th>
        </tr>
        ";
       // $display_students_for_degree2 = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' ");

while($row=mysqli_fetch_array($display_students_for_degree)){
   $unv_id = $row["unv_id"];
   $name_std = $row["name_std"];
   $type_certifcate_unv = $row["type_certifcate_unv"];
   $department = $row["department"];
   $batch = $row["batch"];
   $degree_exam = $row["degree_exam"];

   echo "
   <tr>
   <td>$unv_id</td>
   <td>$name_std</td>
   <td>$type_certifcate_unv</td>
   <td>$department</td>
   <td>$batch</td>
   <td>$degree_exam</td>
   <td><a href='../insert_degree_subject/insert_degree_subject.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button>ادخال الدرجة</button></a></td>
   </tr>";
  }
  echo "</table>";
  $number_of_std_for_result = mysqli_num_rows($display_students_for_degree);
  echo "The Total Number Of Students Who Took The Exam". "<br>" . $number_of_std_for_result . "<br>";
  //تحديد عدد الطلاب الذين تم ادخال دردرجاته
  $display_students_complete_insert_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && degree_exam ='' && come_to_exam_in_first_time='yes' ");
  $number_of_complete_result = mysqli_num_rows($display_students_complete_insert_degree);
  echo "Number Of Students Left To Enter Their Grades <br>";
  echo $number_of_complete_result;
  if($number_of_complete_result == 0){
    echo "<form action='submit_and_send_result.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam' method='post'>
    <input type='submit' name='submit_result' value='Confirm'>
    </form>";
}
   }
    }
    //------------------------------------------------------------------------------------------------
    elseif($type_exam == "sub_exams"){
        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && come_to_exam_in_second_time='yes' && check_tetcher2='none'");
       if(mysqli_num_rows($display_students_for_degree) == 0){
           echo "<h2>Sorry, There Is No Data For Students Because Exams Have Not Started Or The Result Has Been Confirmed</h2>";
       }
       else{
        echo "<h2>Students Schedule For <?php echo $name_subject ?> Exam</h2>
        <br>";
        echo "<table cellpadding='15' class='table table-striped table-hover'>
        <tr>
        <th>UNV ID</th>
        <th>Name</th>
        <th> Certificte Type </th>
        <th>Department</th>
        <th>Batch</th>
        <th>Subject Degree:  $name_subject </th>
        <th></th>
        </tr>
        ";
       // $display_students_for_degree2 = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' ");

while($row=mysqli_fetch_array($display_students_for_degree)){
   $unv_id = $row["unv_id"];
   $name_std = $row["name_std"];
   $type_certifcate_unv = $row["type_certifcate_unv"];
   $department = $row["department"];
   $batch = $row["batch"];
   $degree_exam = $row["degree_exam2"];

   echo "
   <tr>
   <td>$unv_id</td>
   <td>$name_std</td>
   <td>$type_certifcate_unv</td>
   <td>$department</td>
   <td>$batch</td>
   <td><span style='color:blue;'>$degree_exam</span></td>
   <td><a href='../insert_degree_subject/insert_degree_subject.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button class='btn btn-primary'>ادخال الدرجة</button></a></td>
   </tr>
  
   ";
  }
  echo " </table> <br>";
  $number_of_std_for_result = mysqli_num_rows($display_students_for_degree);
  echo "The Total Number Of Students Who Took The Exam". "<br>" . $number_of_std_for_result . "<br>";
  //تحديد عدد الطلاب الذين تم ادخال دردرجاته
  $display_students_complete_insert_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && degree_exam2 ='' && come_to_exam_in_second_time='yes' ");
  $number_of_complete_result = mysqli_num_rows($display_students_complete_insert_degree);
  echo "Number Of Students Left To Enter Their Grades <br>";
  echo $number_of_complete_result;

  //بعد اكتمال ادخال الدرجات يظهر زر لتاكيد البيانات وارسالها الى المسجل
  if($number_of_complete_result == 0){
      echo "<form action='submit_and_send_result.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam' method='post'>
      <input type='submit' name='submit_result' value='Conform' class='btn btn-primary'>
      </form>";
  }
  
      }
    }

  }
     
          
?>
 
</body>
</html>

