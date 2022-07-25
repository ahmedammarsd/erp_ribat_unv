<?php
include "../../connection/connection.php";

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
    <title>جدول الطلاب لامتحان مادة <?php echo $name_subject ?></title>
</head>
<body>
    <form action="" method="post">
        <div>
        <select name="type_exam" id="">
            <option value="normal">امتحان نهاية سمستر <?php echo $semester ?></option>
            <option value="sub_exams">امتحان ملحق سمستر <?php echo $semester ?></option>
        </select>
        </div>
        <div>
            <input type="submit" value="بحث" name="submit" id="btn">
        </div>
    </form>
    
  <?php 
  if(isset($_POST["submit"])){
      $type_exam = $_POST["type_exam"];

      if($type_exam == "normal"){
        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && come_to_exam_in_first_time='yes' && check_tetcher='none' ");
       if(mysqli_num_rows($display_students_for_degree) == 0){
           echo "<h2>عذرا لا توجد بيانات للطلاب لعدم بدء الامتحانات</h2>";
       }
       else{
       echo "<h2>جدول الطلاب لامتحان مادة <?php echo $name_subject ?></h2>
       <br>";
        echo "<table cellpadding='15'>
        <tr>
        <th>الرقم الجامعي</th>
        <th>اسم الطالب</th>
        <th>نوع الشهادة</th>
        <th>القسم</th>
        <th>الدفعة</th>
        <th>الدرجة في مادة  $name_subject </th>
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
  echo "العدد الكلي للطلاب الذين امتحنو". "<br>" . $number_of_std_for_result . "<br>";
  //تحديد عدد الطلاب الذين تم ادخال دردرجاته
  $display_students_complete_insert_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam='$type_exam' && degree_exam ='' && come_to_exam_in_first_time='yes' ");
  $number_of_complete_result = mysqli_num_rows($display_students_complete_insert_degree);
  echo "عدد الطلاب المتبقى ادخال درجاتهم <br>";
  echo $number_of_complete_result;
  if($number_of_complete_result == 0){
    echo "<form action='submit_and_send_result.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam' method='post'>
    <input type='submit' name='submit_result' value='تاكيد النتيجة'>
    </form>";
}
   }
    }
    //------------------------------------------------------------------------------------------------
    elseif($type_exam == "sub_exams"){
        $display_students_for_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && come_to_exam_in_second_time='yes' && check_tetcher2='none'");
       if(mysqli_num_rows($display_students_for_degree) == 0){
           echo "<h2>عذرا لا توجد بيانات للطلاب لعدم بدء الامتحانات او تم تاكيد النتيجة</h2>";
       }
       else{
       echo "<h2>جدول الطلاب لامتحان مادة <?php echo $name_subject ?></h2>
       <br>";
        echo "<table cellpadding='15'>
        <tr>
        <th>الرقم الجامعي</th>
        <th>اسم الطالب</th>
        <th>نوع الشهادة</th>
        <th>القسم</th>
        <th>الدفعة</th>
        <th>الدرجة في مادة  $name_subject </th>
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
   <td><a href='../insert_degree_subject/insert_degree_subject.php?unv_id=$unv_id&name_std=$name_std&name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam'><button>ادخال الدرجة</button></a></td>
   </tr>
  
   ";
  }
  echo " </table> <br>";
  $number_of_std_for_result = mysqli_num_rows($display_students_for_degree);
  echo "العدد الكلي للطلاب الذين امتحنو". "<br>" . $number_of_std_for_result . "<br>";
  //تحديد عدد الطلاب الذين تم ادخال دردرجاته
  $display_students_complete_insert_degree = mysqli_query($connection , "select unv_id ,name_std  ,type_certifcate_unv ,department ,batch ,degree_exam2 from submit_std_and_result_subjects where type_certifcate_unv='$type_certificate' && department='$department' && batch='$batch' && semester='$semester' && name_subject='$name_subject' && type_exam2='$type_exam' && degree_exam2 ='' && come_to_exam_in_second_time='yes' ");
  $number_of_complete_result = mysqli_num_rows($display_students_complete_insert_degree);
  echo "عدد الطلاب المتبقى ادخال درجاتهم <br>";
  echo $number_of_complete_result;

  //بعد اكتمال ادخال الدرجات يظهر زر لتاكيد البيانات وارسالها الى المسجل
  if($number_of_complete_result == 0){
      echo "<form action='submit_and_send_result.php?name_subject=$name_subject&type_certificate=$type_certificate&department=$department&batch=$batch&study_year=$study_year&semester=$semester&type_exam=$type_exam' method='post'>
      <input type='submit' name='submit_result' value='تاكيد النتيجة'>
      </form>";
  }
  
      }
    }

  }
     
          
?>
 
</body>
</html>

