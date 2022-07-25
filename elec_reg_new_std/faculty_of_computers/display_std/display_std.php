<?php
include "../../../connection/connection.php";
$year = date("y");
//echo "1-".$year."-".random_int(10000000,99999999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيانات الطلاب للمعاينة</title>
</head>
<body>
<form action="" method="post">
   
    <select name="type_certificate_unv" id="">
        <option value="بكلاريوس">بكلاريوس</option>
        <option value="دبلوم">دبلوم</option>
    </select>
   <input type="submit" value="search" name="ser">
    </form>
    <br>
    <?php

if(isset($_POST["ser"])){
  
    $type_certificate_unv = $_POST["type_certificate_unv"];
 
  if($type_certificate_unv === "بكلاريوس" ){
   

  echo "
    <table>
    <tr>
       
        <th>اسم الطالب</th>
        <th>رقم الاستمارة</th>
        <th>الكلية</th>
        <th>نوع الشهادة</th>
        <th>التخصص</th>
        <th>اخيار العملية</th>
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
      <table>
      <tr>
         
          <th>اسم الطالب</th>
          <th>رقم الاستمارة</th>
          <th>الكلية</th>
          <th>نوع الشهادة</th>
          <th>التخصص</th>
          <th>اخيار العملية</th>
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