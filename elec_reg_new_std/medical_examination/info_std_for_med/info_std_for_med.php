<?php
include "../../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مراجعة بيانات الطلاب المسجلين</title>
</head>
<body>
<form action="" method="post">
    <select name="college" id="">
        <option value="none">----SELECT THE COLLEGE----</option>
        <option value="كلية دراسات الحاسوب">كلية حاسوب</option>
        <option value="">كلية الطب</option>
        <option value="">كلية الهندسة</option>
    </select>
   <input type="submit" value="search" name="ser">
    </form>
    <br>
    <?php

if(isset($_POST["ser"])){
    $typejop = $_POST["college"];
 
  if($typejop === "كلية دراسات الحاسوب"){
   

  echo "
    <table>
    <tr>
       
        <th>اسم الطالب</th>
        <th>رقم الاستمارة</th>
        <th>الكلية</th>
        <th>اخيار العملية</th>
    </tr>
   ";
    $display_data = mysqli_query($connection , "select id,form_number,name_std,college from new_std_form_info where review ='good' ");
    
        // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
        if($display_data){
           
            while( $row = mysqli_fetch_array($display_data)){
                $id = $row['id'];
                $fullname = $row['name_std'];
                $form_number = $row['form_number'];
                $college = $row['college'];
    
               
               echo "<tr>";
               echo "<td>".$fullname."</td>";
               echo "<td>".$form_number."</td>";
               echo "<td>".$college."</td>";

              
              
               echo "<td><a href='../med_exam/med_exam.php?std_id=".$id."'><button  class='btn btn-primary'>اختبار الكشف</button></a>";
               echo "<tr>";
            }
        }
     

 echo "</table>" ;
}
}
?>
</body>
</html>