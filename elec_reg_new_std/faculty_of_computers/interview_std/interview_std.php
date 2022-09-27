<?php
include "../../../connection/connection.php";
session_start();
$name_teacher =  $_SESSION["name_of_tetcher"];
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
                echo "<script>alert('Previewed successfully');
                window.location.href='../display_std/display_std.php';</script>";
            //header("location: ../display_std/display_std.php");
            }
        }  
        else{
            echo "<script>alert('Sorry, there is an error in the preview. Please contact the developer')</script>";
        }        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/teacher/interview_std.css?v=<?php echo time();?>">
    <title>information student</title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_teacher ?></h3>
        </div>
        <div class="log">
        <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">
    <form action="" method="post">
    <div class="row">
            <div  class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Form Number </label>
                <input type="text"  value="<?php echo $form_number  ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Name </label>
                <input type="text" value="<?php echo $name_std  ?>"  class="form-control"  readonly>
            </div>
             <div class="form-group col-lg-4 col-md-6 col-xs-12">
             <label for="" class="lead">College</label>
                <input type="text" value="<?php echo $the_college  ?>"  class="form-control"  readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead"> Type Certificate Unv </label>
                <input type="text"  value="<?php echo $type_certificate_unv  ?>"  class="form-control"  readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Department</label>
                <input type="text"  value="<?php echo $the_department  ?>"  class="form-control"  readonly>
            </div>
             <div class="form-group col-lg-4 col-md-6 col-xs-12">
             <label for="" class="lead"> Certificate Type</label>
                <input type="text"  value="<?php echo $the_type_certificate  ?>"  class="form-control"  readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">The Course</label>
                <input type="text" value="<?php echo $the_course  ?>"  class="form-control"  readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Certificate Rate</label>
                <input type="text"  value="<?php echo $the_certificate_rate  ?>"  class="form-control"  readonly>
            </div>
            <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Set Number</label>
                <input type="text"  value="<?php echo $the_set_number  ?>"  class="form-control"  readonly>
            </div>
        
        <hr>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Nationality Number </label> 
            <input type="text"  value="<?php echo $nationality_number  ?>" class="form-control"  readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Gender</label>
            <input type="text"  value="<?php echo $gender  ?>" class="form-control"  readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Nationality</label>
            <input type="text"  value="<?php echo $nationality  ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Religion </label>
            <input type="text"  value="<?php echo $religion  ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12" >
        <label for="" class="lead">State</label>
            <input type="text"  value="<?php echo $state  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">City</label>
            <input type="text"  value="<?php echo $city  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Area</label>
            <input type="text"  value="<?php echo $area  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Home Number</label>
            <input type="text"  value="<?php echo $home_number  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Guardian Name</label>
            <input type="text"  value="<?php echo $name_guardian  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Guardian Jop</label>
            <input type="text"  value="<?php echo $jop_guardian  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Relatuve Relation</label>
            <input type="text"  value="<?php echo $relatuve_relation  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Guardian Phone</label>
            <input type="text"  value="<?php echo $phone_guardian  ?>" class="form-control" readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead"> Student Phone</label>
            <input type="text"  value="<?php echo $phone_std  ?>" class="form-control"  readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead"> Email</label>
            <input type="email"  value="<?php echo $email_std  ?>" class="form-control"  readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Closest Relative Name</label>
            <input type="text"  value="<?php echo $name_closest_relative  ?>" class="form-control"  readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Closest Relative Address</label> 
            <input type="text"  value="<?php echo $address_closest_relative  ?>" class="form-control"  readonly>
        </div>
        <div  class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for="" class="lead">Closest Relative Phone</label> 
            <input type="text"  value="<?php echo $phone_closest_relative  ?>" class="form-control"  readonly>
        </div>
        <div  class="form-group col-lg-6 col-md-12 col-xs-12">
        <label for="" class="lead">Personal Photo</label>
        <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
           <img src="../../nstd_info_form/images_uplodes/<?php echo $personal_photo ?>" alt="none" width="100%" height="100%">
           </div>
        </div>
        <div  class="form-group col-lg-6 col-md-12 col-xs-12">
        <label for="" class="lead">Nationality Number Photo</label>
        <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
           <img src="../../nstd_info_form/images_uplodes/<?php echo $photo_nationality_number ?>" alt="none" width="100%" height="100%">
           </div>
        </div>
        <br>
        <?php 
        if($name_of_brother != "none" && $univirsity_number != "none" && $card_photo != "none" ){
            echo "
            <div>
            <label class='lead'>A 10% Discount if you have a Brother or Sister Who is Currently Studying at The University</label>
            <div class='form-group'>
                <label class='lead'>Brother or Sister Name</label>
                <input type='text' name='name_brother'  value='$name_of_brother' class='form-control' readonly>
            </div>
            <div class='form-group'>
               <label>UNV ID</label>
                <input type='text' name='unv_number'  value='$univirsity_number' class='form-control' readonly>
            </div>
            <div class='form-group'>
            <label>Attach a copy of the university card</label>
            <div style='width: 500px; height: 500px;'>
           <img src='../../nstd_info_form/images_uplodes/$card_photo' alt='none' width='100%' height='100%' class='form-control'>
           </div>
            </div>
        </div>
        <div>
            ";
        }

        if($name_of_father_police != "none" && $services_certificate != "none"){
            echo "
            <label> A 20% Discount if your Father or Mother is Currently Working in the Police</label>
            <div class='form-group'>
                <label>Father's or Mother's Name</label>
                <input type='text' name='name_father_police'  value='$name_of_father_police' class='form-control' readonly>
            </div>
            <div class='form-group'>
            <label>Attach Proof of Service Registration Certificate</label>
                <div style='width: 500px; height: 500px;'>
                <img src='../../nstd_info_form/images_uplodes/$services_certificate' alt='none' width='100%' height='100%' class='form-control'>
           </div>
            </div>
        </div>
        <div>
            ";
        }

        if($name_of_fater_unv != "none" && $services_certificate_unv != "none"){
            echo "
            <label>A 70% discount if your father or mother is currently working in the administration of the National Ribat University</label>
            <div class='form-group'>
                <label>Father's or Mother's Name</label>
                <input type='text' name='name_father_unv'  value='$name_of_fater_unv' class='form-control'>
            </div>
            <div class='form-group'>
                <label>Attach proof of service registration certificate</label>
                <div style='width: 500px; height: 500px;'>
           <img src='../../nstd_info_form/images_uplodes/$services_certificate_unv' alt='none' width='100%' height='100%' class='form-control'>
           </div>
            </div>
        </div>
       
            ";
        }
        ?>
       
         <br>   
         <div  class="form-group col-lg-4 col-md-6 col-xs-12">
         <label for="" class="lead">discount pesnt</label>
                <input type="text" name="descount_rate"  value="<?php echo $descount_rate ?>" class="form-control" readonly>
            </div>
       <br>
       <hr>
       <div  class="form-group col-lg-4 col-md-6 col-xs-12">
       <label for="" class="lead">Batch</label>
           <input type="text" name="batch" id="" value="<?php echo $batch; ?>"class="form-control" readonly>
       </div>
       <div class="form-group col-lg-4 col-md-6 col-xs-12">
       <label for="" class="lead">unv_id</label>
           <input type="text" name="unv_idd" id="" value="<?php echo $unv_rand_id ?>"class="form-control" readonly>
       </div>
       <div  class="form-group col-lg-4 col-md-6 col-xs-12">
       <label for="" class="lead">register fees</label>
           <input type="text" name="reg_fee" value="<?php echo $register_fee; ?>"class="form-control" readonly>
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
       <div  class="form-group col-lg-4 col-md-6 col-xs-12">
       <label for="" class="lead"> Study fees</label>
       <input type="text" name="year_fee" value="<?php echo $year_fee*$new_value_descout_rate/100; ?>"class="form-control" readonly>
       </div>
       <div class="form-group col-lg-4 col-md-6 col-xs-12">
       <label for="" class="lead">  Noots</label>
           <input type="text" name="note" value="<?php echo $note; ?>"class="form-control" id="" readonly>
       </div>
       <hr>

        <div class="form-group col-lg-12 col-md-12 col-xs-12">
           <input type="submit" value="Confirm Interview " name="submit" class='btn btn-primary' >
        </div>
    </div>
    </form>

    <?php
    /*
    echo "<a href='un_submit_info.php?std_id=".$id_std."'><button  class='btn btn-primary'>عدم التاكيد</button></a>";
    */
    ?>
    
</body>
</html>
