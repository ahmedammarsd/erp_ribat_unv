<?php
include "../../../connection/connection.php";
session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];
$year = date("y");
//echo "1-".$year."-".random_int(10000000,99999999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../css/manegment/teacher/display_std_inf_for_results.css?v=<?php echo time();?>">
    <title>Students</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Teacher</h2>
        </div>
        <ul>
        <a href="../../../tetcher/subjects/subjects.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Subjects</li></a>
        <a href="../../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Exams Control</li></a>
        <a href="#"><li class="active"><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px">Interview Student</li></a>     
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../../tetcher/profile_tetcher/profile_tetcher.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_teacher ?></h3>
        </div>
        <div class="log">
        <a href="../../../tetcher/logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
</div>
<div class="form">
<form action="" method="post">
<div class="row">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
     <label for=""class="lead">Name </label>
    <select name="type_certificate_unv" id="" class="form-select">
        <option value="بكلاريوس">بكلاريوس</option>
        <option value="دبلوم">دبلوم</option>
    </select>
</div>
<div class="form-group col-lg-6 col-md-6 col-xs-12 klash">
   <input type="submit" value="search" name="ser"  class="btn btn-primary">
</div>
</div>
    </form>

    <br>
    <?php

if(isset($_POST["ser"])){
  
    $type_certificate_unv = $_POST["type_certificate_unv"];
 
  if($type_certificate_unv === "بكلاريوس" ){
   

  echo "
    <table class='table table-striped table-hover'>
    <tr>
        <th>Student Name</th>
        <th>form Number</th>
        <th>College</th>
        <th>Certificate Type</th>
        <th>Department</th>
        <th>Operation</th>
    </tr>
   ";
    $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where college ='كلية دراسات الحاسوب' and review='good' and type_certificate_unv = 'بكلاريوس'  and doctor= 'done' and optic='done' and psychologist='done' and interview='none' and year='$year' ");
    
        // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
        if($display_data){
           
            while( $row = mysqli_fetch_array($display_data)){
                $id = $row['id'];
                $fullname = $row['name_std'];
                $form_number = $row['form_number'];
                $college = $row['college'];
                $type_certificate = $row["type_certificate_unv"];
                $department = $row["department"];
    
               
               echo "<tr>";
               echo "<td>".$fullname."</td>";
               echo "<td>".$form_number."</td>";
               echo "<td>".$college."</td>";
               echo "<td>".$type_certificate."</td>";
               echo "<td>".$department."</td>";

              
              
               echo "<td><a href='../interview_std/interview_std.php?std_id=".$id."'><button  class='btn btn-primary'>معاينة</button></a>";
               echo "<tr>";
            }
        }
     

 echo "</table>" ;
}

elseif($type_certificate_unv === "دبلوم" ){
   

    echo "
      <table class='table table-striped table-hover'>
      <tr>
        <th>Student Name</th>
        <th>form Number</th>
        <th>College</th>
        <th>Certificate Type</th>
        <th>Department</th>
        <th>Operation</th>
      </tr>
     ";
      $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where college ='كلية دراسات الحاسوب' and review ='good' and type_certificate_unv = 'دبلوم' and doctor= 'done' and optic='done' and psychologist='done' and year='$year' ");
      
          // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
          if($display_data){
             
              while( $row = mysqli_fetch_array($display_data)){
                  $id = $row['id'];
                  $fullname = $row['name_std'];
                  $form_number = $row['form_number'];
                  $college = $row['college'];
                  $type_certificate = $row["type_certificate_unv"];
                  $department = $row["department"];
      
                 
                 echo "<tr>";
                 echo "<td>".$fullname."</td>";
                 echo "<td>".$form_number."</td>";
                 echo "<td>".$college."</td>";
                 echo "<td>".$type_certificate."</td>";
                 echo "<td>".$department."</td>";
  
                
                
                 echo "<td><a href='../interview_std/interview_std.php?std_id=".$id."'><button  class='btn btn-primary'>معاينة</button></a>";
                 echo "<tr>";
              }
          }
       
  
   echo "</table>" ;
  }
}
?>
</body>
</html>