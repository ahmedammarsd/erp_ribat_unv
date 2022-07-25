<?php
include "../../../connection/connection.php";
$year_for_unv_id = date("y");
$unv_rand_id = "1-".$year_for_unv_id."-0001".random_int(1111,9999);

$id_std = $_GET["std_id"];

$display_data_std_for_review = mysqli_query($connection , "select * from new_std_form_info where id = '$id_std'");
$row = mysqli_fetch_array($display_data_std_for_review);

$form_number = $row["form_number"];
$name_std = $row["name_std"];
$the_college = $row["college"];
$type_certificate_unv = $row["type_certificate_unv"];
$the_department = $row["department"];
$the_type_certificate = $row["type_certifcate"];
$the_course = $row["course"];
$the_certificate_rate = $row["certifcate_rate"];
$the_set_number = $row["set_number"];
$nationality_number = $row["nationality_number"];
$gender = $row["gender"];
$nationality = $row["nationality"];
$religion = $row["religion"];
$state = $row["state"];
$city = $row["city"];
$area = $row["area"];
$home_number = $row["home_number"];
$name_guardian = $row["name_of_guardian"];
$jop_guardian = $row["jop_guardian"];
$relatuve_relation = $row["relatuve_relation"];
$phone_guardian = $row["phone_of_guardian"];
$phone_std = $row["phone_std"];
$email_std = $row["email_std"];
$name_closest_relative = $row["name_closest_relative"];
$address_closest_relative = $row["address_closest_relative"];
$phone_closest_relative = $row["phone_closest_relative"];
$personal_photo = $row["personal_photo"];
$photo_nationality_number = $row["photo_nationality_number"];
$name_of_brother = $row["name_of_brother"];
$univirsity_number = $row["univirsity_number"];
$card_photo = $row["card_photo"];
$name_of_father_police = $row["name_of_father_police"];
$services_certificate = $row["services_certificate"];
$name_of_fater_unv = $row["name_of_fater_unv"];
$services_certificate_unv = $row["services_certificate_unv"];
$descount_rate = $row["descount_rate"];
$date =$row["date"];
$hours = $row["hours"];


$the_date = date("y");
if($the_date == 22){
    $batch = 1;
}
if($the_date == 23){
    $batch = 2;
}
if($the_date == 24){
    $batch = 3;
}

//عرض رسوم التسجيل والسنة الدراسية
$display_the_fees = mysqli_query($connection , "select register_fee , year_fee from fees_for_batchs where batch= '$batch'");
$view_data = mysqli_fetch_array($display_the_fees);
$register_fee = $view_data["register_fee"];
$year_fee = $view_data["year_fee"];

if(isset($_POST["submit"])){

    $unvirsity_id = $_POST["unv_idd"];
    $reg_fee = $_POST["reg_fee"];
    $y_fee = $_POST["year_fee"];
    $the_note = $_POST["note"];
    $year_addmission = date("Y");
    $insert_data = mysqli_query($connection , "insert into students (unv_id	,name_std,college,type_certifcate_unv,department,gender,phone_number,email,personal_photo,descount_rate,note_about_descount	,batch,year_admisson,register_fee,year_fee)
                  value ('$unvirsity_id','$name_std','$the_college','$type_certificate_unv','$the_department','$gender','$phone_std','$email_std','$personal_photo','$descount_rate','$the_note','$batch','$year_addmission','$reg_fee','$y_fee')");
        if($insert_data){
            $update_data_inteview = mysqli_query($connection , "update new_std_form_info set interview='done' where id='$id_std'");
            if($update_data_inteview){
                echo "<script>alert('تمت المعاينة بنجاح');
                window.location.href='../display_std/display_std.php';</script>";
            //header("location: ../display_std/display_std.php");
            }
        }  
        else{
            echo "<script>alert('عذرا يوجد خطا في المعاينة الرجاء الاتصال بالمطور')</script>";
        }        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information student</title>
</head>
<body>
    <form action="" method="post">
    <div>
            <div>
                رقم الاستمارة
                <input type="text"  value="<?php echo $form_number  ?>" readonly>
            </div>
            <div>
               الاسم
                <input type="text" value="<?php echo $name_std  ?>" readonly>
            </div>
             <div>
               الكلية
                <input type="text" value="<?php echo $the_college  ?>" readonly>
            </div>
            <div>
               نوع الشهادة الجامعية
                <input type="text"  value="<?php echo $type_certificate_unv  ?>" readonly>
            </div>
            <div>
                القسم
                <input type="text"  value="<?php echo $the_department  ?>" readonly>
            </div>
             <div>
               نوع الشهادة
                <input type="text"  value="<?php echo $the_type_certificate  ?>" readonly>
            </div>
            <div>
                المساق
                <input type="text" value="<?php echo $the_course  ?>" readonly>
            </div>
            <div>
               نسبة الشهادة
                <input type="text"  value="<?php echo $the_certificate_rate  ?>" readonly>
            </div>
            <div>
               رقم الجلوس
                <input type="text"  value="<?php echo $the_set_number  ?>" readonly>
            </div>
        </div>
        <hr>
        <div>
           الرقم الوطني
            <input type="text"  value="<?php echo $nationality_number  ?>"  readonly>
        </div>
        <div>
            الجنس
            <input type="text"  value="<?php echo $gender  ?>"  readonly>
        </div>
        <div>
            الجنسية
            <input type="text"  value="<?php echo $nationality  ?>" readonly>
        </div>
        <div>
            الديانة
            <input type="text"  value="<?php echo $religion  ?>" readonly>
        </div>
        <div>
            الولاية
            <input type="text"  value="<?php echo $state  ?>" readonly>
        </div>
        <div>
            المدينة
            <input type="text"  value="<?php echo $city  ?>" readonly>
        </div>
        <div>
            الحي
            <input type="text"  value="<?php echo $area  ?>" readonly>
        </div>
        <div>
            رقم المنزل
            <input type="text"  value="<?php echo $home_number  ?>" readonly>
        </div>
        <div>
            اسم ولي الامر
            <input type="text"  value="<?php echo $name_guardian  ?>" readonly>
        </div>
        <div>
            مهنة ولي الامر
            <input type="text"  value="<?php echo $jop_guardian  ?>" readonly>
        </div>
        <div>
            صلة القرابة
            <input type="text"  value="<?php echo $relatuve_relation  ?>" readonly>
        </div>
        <div>
            هاتف ولي الامر
            <input type="text"  value="<?php echo $phone_guardian  ?>" readonly>
        </div>
        <div>
            هاتف الطالب
            <input type="text"  value="<?php echo $phone_std  ?>" readonly>
        </div>
        <div>
            الايميل
            <input type="email"  value="<?php echo $email_std  ?>" readonly>
        </div>
        <div>
            اسم اقرب الاقربين
            <input type="text"  value="<?php echo $name_closest_relative  ?>" readonly>
        </div>
        <div>
            عنوان اقرب الاقربين
            <input type="text"  value="<?php echo $address_closest_relative  ?>" readonly>
        </div>
        <div>
            هاتف اقرب الاقربين
            <input type="text"  value="<?php echo $phone_closest_relative  ?>" readonly>
        </div>
        <div>
            ارفاق صورة شخصية
            <div style="width: 500px; height: 500px;">
           <img src="../../nstd_info_form/images_uplodes/<?php echo $personal_photo ?>" alt="none" width="100%" height="100%">
           </div>
        </div>
        <div>
            ارفاق صورة الرقم الوطني
            <div style="width: 500px; height: 500px;">
           <img src="../../nstd_info_form/images_uplodes/<?php echo $photo_nationality_number ?>" alt="none" width="100%" height="100%">
           </div>
        </div>
        <br>
        <?php 
        if($name_of_brother != "none" && $univirsity_number != "none" && $card_photo != "none" ){
            echo "
            <div>
            تخفيض بنسبة 10% في حالة لديك اخ او اخت يدرس في الجامعة حاليا
            <div>
                اسم الاخ او الاخت
                <input type='text' name='name_brother'  value='$name_of_brother' readonly>
            </div>
            <div>
                الرقم الجامعي
                <input type='text' name='unv_number'  value='$univirsity_number' readonly>
            </div>
            <div>
                ارفاق صورة البطاقة الجامعية
                <div style='width: 500px; height: 500px;'>
           <img src='../../nstd_info_form/images_uplodes/$card_photo' alt='none' width='100%' height='100%'>
           </div>
            </div>
        </div>
        <div>
            ";
        }

        if($name_of_father_police != "none" && $services_certificate != "none"){
            echo "
            تخفيض بنسبة 20% اذا كان والدك او والدتك تعمل في الشرطة حاليا
            <div>
              اسم الوالد او الوالدة
                <input type='text' name='name_father_police'  value='$name_of_father_police' readonly>
            </div>
            <div>
                ارفاق اثبات شهادة قيد الخدمة
                <div style='width: 500px; height: 500px;'>
           <img src='../../nstd_info_form/images_uplodes/$services_certificate' alt='none' width='100%' height='100%'>
           </div>
            </div>
        </div>
        <div>
            ";
        }

        if($name_of_fater_unv != "none" && $services_certificate_unv != "none"){
            echo "
            تخفيض بنسبة 70% اذا كان والدك او والدتك تعمل في ادارة جامعة الرباط الوطني حاليا
            <div>
              اسم الوالد او الوالدة
                <input type='text' name='name_father_unv'  value='$name_of_fater_unv'>
            </div>
            <div>
                ارفاق اثبات شهادة قيد الخدمة
                <div style='width: 500px; height: 500px;'>
           <img src='../../nstd_info_form/images_uplodes/$services_certificate_unv' alt='none' width='100%' height='100%'>
           </div>
            </div>
        </div>
       
            ";
        }
        ?>
       
         <br>   
         <div>
              نسبة التخفيض
                <input type="text" name="descount_rate"  value="<?php echo $descount_rate ?>" readonly>
            </div>
       <br>
       <hr>
       <div>
           الدفعة
           <input type="text" name="batch" id="" value="<?php echo $batch; ?>">
       </div>
       <div>
           الرقم الجامعي
           <input type="text" name="unv_idd" id="" value="<?php echo $unv_rand_id ?>">
       </div>
       <div>
           رسوم التسجيل
           <input type="text" name="reg_fee" value="<?php echo $register_fee; ?>" readonly>
       </div>
       <?php
           if($descount_rate == "0%"){
               $note = "لا توجد ملاحظة";
               $new_value_descout_rate = 100;
           }
           if($descount_rate == "10%"){
            $note = "شقيق في الجامعة";
            $new_value_descout_rate = 90;
            }
            if($descount_rate == "20%"){
                $note = "ابناء شرطة";
                $new_value_descout_rate = 80;
            }
            if($descount_rate == "30%"){
                $note = "ابناء شرطة + شقيق في الجامعة";
                $new_value_descout_rate = 70;
            }
            if($descount_rate == "70%"){
                $note = "ابناء عاملين";
                $new_value_descout_rate = 30;
            }
            if($descount_rate == "80%"){
                $note = "ابناء عاملين + شقيق في الجامعة";
                $new_value_descout_rate = 20;
            }
            if($descount_rate == "90%"){
                $note = "ابناء عاملين + ابناء شرطة";
                $new_value_descout_rate = 10;
            }
            if($descount_rate == "100%"){
                $note = "ابناء عاملين + ابناء شرطة + شقيق في الجامعة";
                $new_value_descout_rate = 0;
            }
           ?>
       <div>
          رسوم السنة الدراسية
           <input type="text" name="year_fee" value="<?php echo $year_fee*$new_value_descout_rate/100; ?>" readonly>
       </div>
       <div>
           ملاحظة
           <input type="text" name="note" value="<?php echo $note; ?>" id="">
       </div>
       <hr>

        <div>
            <input type="submit" value="تاكيد المعاينة" name="submit">
          
        </div>
    </form>

    <?php
    /*
    echo "<a href='un_submit_info.php?std_id=".$id_std."'><button  class='btn btn-primary'>عدم التاكيد</button></a>";
    */
    ?>
    
</body>
</html>
