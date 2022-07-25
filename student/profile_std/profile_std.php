<?php
include "../../connection/connection.php";

session_start();
 $unv_id = $_SESSION["unv_id"];

 $display_info_std = mysqli_query($connection , "select * from students where unv_id='$unv_id'");
 $row = mysqli_fetch_array($display_info_std);

 $name_std = $row["name_std"];
 $college = $row["college"];
 $type_certifcate_unv = $row["type_certifcate_unv"];
 $department = $row["department"];
 $personal_photo = $row["personal_photo"];
 $batch = $row["batch"];
 $year_admisson = $row["year_admisson"];
 $register_fee = $row["register_fee"];
 $year_fee = $row["year_fee"];
 $confirm_pay_s1 = $row["confirm_pay_s1"];
 $confirm_pay_s2 = $row["confirm_pay_s2"];
 $confirm_pay_s3 = $row["confirm_pay_s3"];
 $confirm_pay_s4 = $row["confirm_pay_s4"];
 $confirm_pay_s5 = $row["confirm_pay_s5"];
 $confirm_pay_s6 = $row["confirm_pay_s6"];
 $confirm_pay_s7 = $row["confirm_pay_s7"];
 $confirm_pay_s8 = $row["confirm_pay_s8"];
 $GPA_S1 = $row["GPA_S1"];
 $GPA_S2 = $row["GPA_S2"];
 $GPA_S3 = $row["GPA_S3"];
 $GPA_S4 = $row["GPA_S4"];
 $GPA_S5 = $row["GPA_S5"];
 $GPA_S6 = $row["GPA_S6"];
 $GPA_S7 = $row["GPA_S7"];
 $GPA_S8 = $row["GPA_S8"];
 //$TGPA = $row["TGPA"];
 
 $_SESSION["name_std"] = $name_std;
 $_SESSION["confirm_pay_s1"] = $confirm_pay_s1;
 $_SESSION["confirm_pay_s2"] = $confirm_pay_s2;
 $_SESSION["confirm_pay_s3"] = $confirm_pay_s3;
 $_SESSION["confirm_pay_s4"] = $confirm_pay_s4;
 $_SESSION["confirm_pay_s5"] = $confirm_pay_s5;
 $_SESSION["confirm_pay_s6"] = $confirm_pay_s6;
 $_SESSION["confirm_pay_s7"] = $confirm_pay_s7;
 $_SESSION["confirm_pay_s8"] = $confirm_pay_s8;
 $_SESSION["GPA_S1"] = $GPA_S1;
 $_SESSION["GPA_S2"] = $GPA_S2;
 $_SESSION["GPA_S3"] = $GPA_S3;
 $_SESSION["GPA_S4"] = $GPA_S4;
 $_SESSION["GPA_S5"] = $GPA_S5;
 $_SESSION["GPA_S6"] = $GPA_S6;
 $_SESSION["GPA_S7"] = $GPA_S7;
 $_SESSION["GPA_S8"] = $GPA_S8;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الشخصية الطالب</title>
</head>
<body>
          <div>
            
            <div style="width: 200px; height: 200px;">
           <img src="../../elec_reg_new_std/nstd_info_form/images_uplodes/<?php echo $personal_photo ?>" alt="none" width="100%" height="100%">
           </div>
        </div>
        <div>
            الاسم :
            <?php
            echo $name_std;
            ?> 
            
        </div>
        <div>
            الرقم الجامعي :
            <?php
            echo $unv_id;
            ?> 
            
        </div>
        <div>
            الكلية :
            <?php
            echo $college;
            ?> 
            
        </div>
        <div>
            القسم :
            <?php
            echo $department;
            ?> 
            
        </div>
        <div>
            الشهادة :
            <?php
            echo $type_certifcate_unv;
            ?> 
            
        </div>
        <hr>
        <div>
            سنة القبول  :
            <?php echo $year_admisson;?> 
        </div>
        <div>
            السنة الدراسية  :
            <?php  if($confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الاولى ";
            }
            elseif($confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الثانية ";
            }
            elseif($confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الثالثة ";
            }
            else{
                echo "  الرابعة";
            }
            ?> 
        </div>
        <div>
            السمستر الحالي  :
            <?php  if($confirm_pay_s2 == "none" && $confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الاول ";
                $TGPA = $GPA_S1 ;
                $semester = 1;
            }
            elseif($confirm_pay_s3 == "none" && $confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الثاني ";
                $TGPA = $GPA_S2 ;
                $semester = 2;
            }
            elseif($confirm_pay_s4 == "none" && $confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الثالث ";
                $TGPA = $GPA_S4 ;
                $semester = 3;
            }
            elseif($confirm_pay_s5 == "none" && $confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الرابع ";
                $TGPA = $GPA_S4 ;
                $semester = 4;
            }
            elseif($confirm_pay_s6 == "none" && $confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "الخامس ";
                $TGPA = $GPA_S5 ;
                $semester = 5;
            }
            elseif($confirm_pay_s7 == "none" && $confirm_pay_s8 == "none"){
                echo "السادس ";
                $TGPA = $GPA_S6 ;
                $semester = 6;
            }
            elseif($confirm_pay_s8 == "none"){
                echo "السابع ";
                $TGPA = $GPA_S7 ;
                $semester = 7;
            }
            else{
                echo "  الثامن";
                $TGPA = $GPA_S8 ;
                $semester = 8;
            }
            ?> 
        </div>
        <div>
            المعدل التراكمي  :
            <?php echo $TGPA ?>
        </div>
        <hr>
        <div>
        الرسوم الدراسية  :
        <?php
        echo $register_fee + $year_fee;
        $_SESSION["TGPA"] = $TGPA;
        $_SESSION["register_fee"] = $register_fee;
        $_SESSION["year_fee"] = $year_fee;
        $_SESSION["semester"] = $semester;
        $_SESSION["type_certifcate_unv"] = $type_certifcate_unv;
        $_SESSION["department"] = $department;
        $_SESSION["batch"] = $batch ;
        ?>
        </div>
        <hr>
        <div>
            <a href='../change_password/change_password.php'><input type='submit' value='تغيير كلمة السر'></a>
            
        </div>
        <hr>
        <div>
            <a href='../elec_reg/elec_reg.php'><input type='submit' value='تسجيل'></a>
            
        </div>
</body>
</html>