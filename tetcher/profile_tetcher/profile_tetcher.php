<?php
include "../../connection/connection.php";

session_start();
 $username = $_SESSION["username_tetcher"];

 $display_info_tetcher = mysqli_query($connection , "select * from tetchers where username='$username'");
 $row = mysqli_fetch_array($display_info_tetcher);
   $name = $row["full_name"];
   $phone_number = $row["phone_number"];
   $email = $row["email"];
   $address = $row["address"];
   $academic_qualification1 = $row["academic_qualification1"];
   $academic_qualification2 = $row["academic_qualification2"];
   $academic_qualification3 = $row["academic_qualification3"];
   $_SESSION["name_of_tetcher"] = $name; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الشخصية للاستاذ</title>
</head>
<body>
    <div>
            الاسم :
            <?php
            echo $name;
            ?>  
    </div>
    <div>
            رقم الهاتف :
            <?php
            echo $phone_number;
            ?>  
    </div>
    <div>
            الايميل :
            <br>
            <?php
            echo $email;
            ?>  
    </div>
    <div>
            العنوان :
            <?php
            echo $address;
            ?>  
    </div>
    <div>
            المؤهلات الاكادمية :
            <br>
            <?php
            echo $academic_qualification1 . "<br>";
            if($academic_qualification2 != ""){
                echo $academic_qualification2. "<br>";
            }
            if($academic_qualification3 != ""){
                echo $academic_qualification3. "<br>";
            }
            ?>  
    </div>
   
     <hr>

     <a href="../../manegment/register_manegment/exams/select_subject_for_check/select_subject_for_check.php"><button>مراقبة الامتحانات</button></a>
     <hr>
        <div>
            <a href='../change_password/change_password.php'><input type='submit' value='تغيير كلمة السر'></a>
            
        </div>
</body>
</html>