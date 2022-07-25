<?php
include "../../../connection/connection.php";
$year = date("y");
$name_user = $_SESSION["full_name_doctor"] ;
$specialization = $_SESSION["specialization_doctor"];

if($specialization !== "GP"){
echo "<script>alert('Sorry, You don\'t have permissions');
 window.location.href='../statics/statics.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطبيب</title>
</head>
<body>
<form action="" method="post">
    <select name="college" id="">
        <option value="none">----SELECT THE COLLEGE----</option>
        <option value="كلية دراسات الحاسوب">كلية حاسوب</option>
        <option value="">كلية الطب</option>
        <option value="">كلية الهندسة</option>
    </select>
    <select name="type_certificate_unv" id="">
        <option value="بكلاريوس">بكلاريوس</option>
        <option value="دبلوم">دبلوم</option>
    </select>
   <input type="submit" value="search" name="ser">
    </form>
    <br>
    <?php

if(isset($_POST["ser"])){
    $typejop = $_POST["college"];
    $type_certificate_unv = $_POST["type_certificate_unv"];
 
  if($typejop === "كلية دراسات الحاسوب" && $type_certificate_unv === "بكلاريوس" ){
   

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
    $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where review ='good' and type_certificate_unv = 'بكلاريوس'  and doctor= 'none' and year='$year' ");
    
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

              
              
               echo "<td><a href='insert_the_info_std_doctor.php?std_id=".$id."'><button  class='btn btn-primary'>كشف الطبيب</button></a>";
               echo "<tr>";
            }
        }
     

 echo "</table>" ;
}

elseif($typejop === "كلية دراسات الحاسوب" && $type_certificate_unv === "دبلوم" ){
   

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
      $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where review ='good' and type_certificate_unv = 'دبلوم' and doctor= 'none' and year='$year' ");
      
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
  
                
                
                 echo "<td><a href='insert_the_info_std_doctor.php?std_id=".$id."'><button  class='btn btn-primary'>كشف الطبيب</button></a>";
                 echo "<tr>";
              }
          }
       
  
   echo "</table>" ;
  }
}
?>
</body>
</html>