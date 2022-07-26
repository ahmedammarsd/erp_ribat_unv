<?php
include "../../connection/connection.php";
session_start();
$user_name =$_SESSION["user_admin_scientific_affairs"]; 
$display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_scientific_affairs"] = $name_user;

$formnumber1 =  $_SESSION["formno"];

$display_data_new_std = mysqli_query($connection ,"select * from new_std_like_api where form_number = '$formnumber1'");
$row = mysqli_fetch_array($display_data_new_std);
 $form_no = $row["form_number"];
 $name_std = $row["name_std"];
 $univirsity = $row["univirsity"];
 $college = $row["college"];
 $type_certificate_unv = $row["type_certificate_unv"];
 $department = $row["department"];
 $type_certifcate = $row["type_certifcate"];
 $course = $row["course"];
 $certifcate_rate = $row["certifcate_rate"];
 $set_number = $row["set_number"];

 /*$dispaly_data_if_std_complate_the_register = mysqli_query($connection , "select form_number from new_std_form_info where form_number = 'formnumber1'");
 $row2 = mysqli_fetch_array($dispaly_data_if_std_complate_the_register);
 $form_no_comlete_register = $row2["form_number"];

 if(mysqli_num_rows($dispaly_data_if_std_complate_the_register) > 0){
     echo "لقد قمت بعملية التسجييل وشكرا";
 }

 else{
     */
 //بسم الله توكلت على الله اكبر عملية ادخال الى قاعدة البيانات

if(isset($_POST["addreg"])){

    //جعل الحقول في متغيرات لعملية الادخال

    $form_number = $_POST["formnumber"];
    $name_of_student = $_POST["namestd"];
    $the_college = $_POST["college"];
    $the_department = $_POST["department"];
    $the_type_certificate = $_POST["typecertifcate"];
    $the_course = $_POST["course"];
    $the_certificate_rate = $_POST["certifcaterate"];
    $the_set_number = $_POST["setnumber"];
    $nationality_number = $_POST["nationalitynumber"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $religion = $_POST["religion"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $area = $_POST["area"];
    $home_number = $_POST["homenumber"];
    $name_guardian = $_POST["nameguardian"];
    $jop_guardian = $_POST["jopguardian"];
    $relatuve_relation = $_POST["relatuverelation"];
    $phone_guardian = $_POST["phoneguardian"];
    $phone_std = $_POST["phonestd"];
    $email_std = $_POST["emailstd"];
    $name_closest_relative = $_POST["nameclosestrelative"];
    $address_closest_relative = $_POST["addressclosestrelative"];
    $phone_closest_relative = $_POST["phoneclosestrelative"];
    //$personal_photo = 0;
    // $photo_nationality_number = 0;
    $name_of_brother = $_POST["nameofbrother"];
    $univirsity_number = $_POST["univirsitynumber"];
    // $card_photo = 0;
    $name_of_father_police = $_POST["nameoffatherpolice"];
    //$services_certificate =0;
    $name_of_fater_unv = $_POST["nameoffaterunv"];
    // $services_certificate_unv = 0;
    $date = date("Y-m-d");
    $hours = date("h:m:s");
    $year = date("y");


    $if_have_brother_or_no = $_POST["brother"];
    $if_father_in_police = $_POST["police"];
    $if_father_in_manegment_unv = $_POST["manegment"];


    if($_FILES["personalphoto"]["error"] === 4){
        echo "<script>alert('عذرا الرجاء ارفاق صورة الرقم الوطني')</script>";
    }
    elseif($_FILES["photonationalitynumber"]["error"] === 4){
        echo "<script>alert('عذرا الرجاء ارفاق صورة شخصية')</script>";
    }
    else{
         //الصورة الشخصية
        $personal_photo_name = $_FILES["personalphoto"]["name"];
        $personal_photo_size = $_FILES["personalphoto"]["size"];
        $personal_photo_tmpname = $_FILES["personalphoto"]["tmp_name"];

        $validimageextinsion = ["jpg" , "jpeg" , "png"];
        $imageextension = explode("." , $personal_photo_name);
        $imageextension = strtolower(end($imageextension));
        //---------------------------------------------------

        // صورة الرقم الوطني
        $national_number_name = $_FILES["photonationalitynumber"]["name"];
        $national_number_size = $_FILES["photonationalitynumber"]["size"];
        $national_number_tmpname = $_FILES["photonationalitynumber"]["tmp_name"];
       
        $validimageextinsion_national = ["jpg" , "jpeg" , "png"];
        $imageextension_national = explode("." , $national_number_name);
        $imageextension_national = strtolower(end($imageextension_national));
        //-------------------------------------------------

         // صورة البطاقة للاخ او الاخت
         $borther_photo_name = $_FILES["cardphoto"]["name"];
         $borther_photo_size = $_FILES["cardphoto"]["size"];
         $borther_photo_tmpname = $_FILES["cardphoto"]["tmp_name"];

         $borther_validimageextinsion = ["jpg" , "jpeg" , "png"];
         $borther_imageextension = explode("." , $borther_photo_name);
         $borther_imageextension = strtolower(end($borther_imageextension));
         //----------------------------------------------------------------

          // صورة شهادة قيد العمل في الشرطة اي اثبات
          $police_photo_name = $_FILES["servicessertificate"]["name"];
          $police_photo_size = $_FILES["servicessertificate"]["size"];
          $police_photo_tmpname = $_FILES["servicessertificate"]["tmp_name"];

          $police_validimageextinsion = ["jpg" , "jpeg" , "png"];
          $police_imageextension = explode("." , $police_photo_name);
          $police_imageextension = strtolower(end($police_imageextension));
          //-------------------------------------------------------

           // صورة شهادة قيد العمل في ادارة الجامعة
           $unv_photo_name = $_FILES["servicessertificateunv"]["name"];
           $unv_photo_size = $_FILES["servicessertificateunv"]["size"];
           $unv_photo_tmpname = $_FILES["servicessertificateunv"]["tmp_name"];

           $unv_validimageextinsion = ["jpg" , "jpeg" , "png"];
           $unv_imageextension = explode("." , $unv_photo_name);
           $unv_imageextension = strtolower(end($unv_imageextension));
           //----------------------------------------------------------------


        //للتحقق من مسار الصورة التي تم اختيارها 
        if(!in_array($imageextension , $validimageextinsion)){
            echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بالصورة الشخصية غير صالح')</script>";
        }
        //للتحقق من مساحاة الصورة وعدم تخطيها مساحة ال2 ميغابايت
        elseif($personal_photo_size > 2000000){
            echo "<script>alert('عذرا مساحة الصورة الخاصة بالصورة الشخصية اكبر من المساحة المحددة')</script>";
        }
        //-----------------------------------------------------------


        elseif(!in_array($imageextension_national , $validimageextinsion_national)){
            echo "<script>alert('عذرا هذا الملف او الصورة الخاص بالرقم الوطني غير صالح')</script>";
        }
        elseif($national_number_size > 2000000){
            echo "<script>alert('عذرا مساحة الصورة الخاصة بالرقم الوطني اكبر من المساحة المحددة')</script>";
        }
        //----------------------------------------------------------------

        elseif($if_have_brother_or_no == "none"){
            echo "<script>alert('عذرا الرجاء تحديد اذا ماكان لديك اخ او اخت في يدرس في الجامعة')</script>";
        }
        elseif($if_father_in_police == "none"){
            echo "<script>alert('عذرا الرجاء تحديد اذا ماكان الوالد او الوالدة في الشرطة')</script>";
        }
        elseif($if_father_in_manegment_unv == "none"){
            echo "<script>alert('عذرا الرجاء تحديد اذا ماكان الوالد او الوالدة في ي/تعمل في ادارة الجامعة')</script>";
        }
        elseif($if_have_brother_or_no == "no" && $if_father_in_police == "no" && $if_father_in_manegment_unv == "no"){
            //كود خاص برفع الصورة السخصية الي السيرفر
            $new_personal_image = uniqid();
            $new_personal_image .= '.' . $imageextension ;
            move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image); 
          //----------------------------------------------------------

           //كود خاص برفع صورة الرقم الوطني الي السيرفر
            $new_national_image = uniqid();
            $new_national_image .= '.' . $imageextension_national ;
            move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
         //-----------------------------------------------------------------------------------

         $insert_data_std = mysqli_query($connection , 
    "insert into new_std_form_info (form_number , name_std , college , type_certificate_unv, department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours, year)
                         value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','none','none','none','none','none','none','none','$date','$hours','$year')");
            if($insert_data_std){
                echo "<script>alert('تم التسجيل بنجاح')</script>";
            }
        }
        elseif($if_have_brother_or_no == "yes" && $if_father_in_police == "no" && $if_father_in_manegment_unv == "no"){
           
            if($_FILES["cardphoto"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة البطاقة الجامعية (اخ / اخت)')</script>";
            }

            elseif(!in_array($borther_imageextension , $borther_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة ببطافة الجامعة(اخ/اخت) غير صالحه')</script>";
            }
            elseif($borther_photo_size > 2000000){
                echo "<script>alert('عذرا مساحة الصورة الخاصة ببطافة الجامعة(اخ/اخت) اكبر من المساحة المحددة')</script>";
            }
            else{
                $new_brother_image = uniqid();
                $new_brother_image .= '.' . $borther_imageextension ;
                move_uploaded_file($borther_photo_tmpname ,'images_uplodes/'.$new_brother_image);
                //----------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
              //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
             //-----------------------------------------------------------------------------------

             $insert_data_std = mysqli_query($connection , 
             "insert into new_std_form_info (form_number , name_std , college , type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                                  value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','$name_of_brother','$univirsity_number','$new_brother_image','none','none','none','none','$date','$hours','$year')");
         
                                  if($insert_data_std){
                                    echo "<script>alert('تم التسجيل بنجاح')</script>";
                                }
            }
        }
        elseif($if_have_brother_or_no == "yes" && $if_father_in_police == "yes" && $if_father_in_manegment_unv == "no"){
           
           if($_FILES["cardphoto"]["error"] === 4){
               echo "<script>alert('عذرا الرجاء ارفاق صورة البطاقة الجامعية (اخ / اخت)')</script>";
           }
           elseif($_FILES["servicessertificate"]["error"] === 4){
            echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في الشرطة')</script>";
           }

           elseif(!in_array($borther_imageextension , $borther_validimageextinsion)){
               echo "<script>alert('عذرا هذا الملف او الصورة الخاصة ببطافة الجامعة(اخ/اخت) غير صالحه')</script>";
           }
           elseif($borther_photo_size > 2000000){
               echo "<script>alert('عذرا مساحة الصورة الخاصة ببطافة الجامعة(اخ/اخت) اكبر من المساحة المحددة')</script>";
           }
           elseif(!in_array($police_imageextension , $police_validimageextinsion)){
            echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في الشرطة غير صالحه')</script>";
            }
            elseif($police_photo_size > 2000000){
                echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في الشرطة اكبر من المساحة المحددة')</script>";
            }
           else{
               $new_brother_image = uniqid();
               $new_brother_image .= '.' . $borther_imageextension ;
               move_uploaded_file($borther_photo_tmpname ,'images_uplodes/'.$new_brother_image);
               //----------------------------------------------------------------
               $new_police_image = uniqid();
               $new_police_image .= '.' . $police_imageextension ;
               move_uploaded_file($police_photo_tmpname ,'images_uplodes/'.$new_police_image);
               //------------------------------------------------------------------
               $new_personal_image = uniqid();
               $new_personal_image .= '.' . $imageextension ;
               move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
             //----------------------------------------------------------
               $new_national_image = uniqid();
               $new_national_image .= '.' . $imageextension_national ;
               move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
            //-----------------------------------------------------------------------------------

            $insert_data_std = mysqli_query($connection , 
            "insert into new_std_form_info (form_number , name_std , college , type_certificate_unv, department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                                 value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','$name_of_brother','$univirsity_number','$new_brother_image','$name_of_father_police','$new_police_image','none','none','$date','$hours','$year')");
        
                                 if($insert_data_std){
                                    echo "<script>alert('تم التسجيل بنجاح')</script>";
                                }
           }
       }
            elseif($if_have_brother_or_no == "yes" && $if_father_in_police == "yes" && $if_father_in_manegment_unv == "yes"){

            if($_FILES["cardphoto"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة البطاقة الجامعية (اخ / اخت)')</script>";
            }
            elseif($_FILES["servicessertificate"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في الشرطة')</script>";
            }
            elseif($_FILES["servicessertificateunv"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في ادارة الجامعة')</script>";
            }

            elseif(!in_array($borther_imageextension , $borther_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة ببطافة الجامعة(اخ/اخت) غير صالحه')</script>";
            }
            elseif($borther_photo_size > 2000000){
                echo "<script>alert('عذرا مساحة الصورة الخاصة ببطافة الجامعة(اخ/اخت) اكبر من المساحة المحددة')</script>";
            }
            elseif(!in_array($police_imageextension , $police_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في الشرطة غير صالحه')</script>";
                }
                elseif($police_photo_size > 2000000){
                    echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في الشرطة اكبر من المساحة المحددة')</script>";
                }
                elseif(!in_array($unv_imageextension , $unv_validimageextinsion)){
                    echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة غير صالحه')</script>";
                    }
                    elseif($unv_photo_size > 2000000){
                        echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة اكبر من المساحة المحددة')</script>";
                    }  
            else{
                $new_brother_image = uniqid();
                $new_brother_image .= '.' . $borther_imageextension ;
                move_uploaded_file($borther_photo_tmpname ,'images_uplodes/'.$new_brother_image);
                //----------------------------------------------------------------
                $new_police_image = uniqid();
                $new_police_image .= '.' . $police_imageextension ;
                move_uploaded_file($police_photo_tmpname ,'images_uplodes/'.$new_police_image);
                //------------------------------------------------------------------
                $new_unv_image = uniqid();
                $new_unv_image .= '.' . $unv_imageextension ;
                move_uploaded_file($unv_photo_tmpname ,'images_uplodes/'.$new_unv_image);
                //------------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
                //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
                //-----------------------------------------------------------------------------------

                $insert_data_std = mysqli_query($connection , 
    "insert into new_std_form_info (form_number , name_std , college, type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                         value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','$name_of_brother','$univirsity_number','$new_brother_image','$name_of_father_police','$new_police_image','$name_of_fater_unv','$new_unv_image','$date','$hours','$year')");

                         if($insert_data_std){
                            echo "<script>alert('تم التسجيل بنجاح')</script>";
                        }
            }
        }
        elseif($if_have_brother_or_no == "no" && $if_father_in_police == "yes" && $if_father_in_manegment_unv == "no"){
           
            if($_FILES["servicessertificate"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في الشرطة')</script>";
            }

            elseif(!in_array($police_imageextension , $police_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في الشرطة غير صالحه')</script>";
            }
            elseif($police_photo_size > 2000000){
                echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في الشرطة اكبر من المساحة المحددة')</script>";
            }
            else{
                $new_police_image = uniqid();
                $new_police_image .= '.' . $police_imageextension ;
                move_uploaded_file($police_photo_tmpname ,'images_uplodes/'.$new_police_image);
                //----------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
              //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
             //-----------------------------------------------------------------------------------

             $insert_data_std = mysqli_query($connection , 
    "insert into new_std_form_info (form_number , name_std , college , type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                         value ('$form_number','$name_of_student','$the_college','$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','none','none','none','$name_of_father_police','$new_police_image','none','none','$date','$hours','$year')");

                         if($insert_data_std){
                            echo "<script>alert('تم التسجيل بنجاح')</script>";
                        }
            }
        }
        elseif($if_have_brother_or_no == "no" && $if_father_in_police == "yes" && $if_father_in_manegment_unv == "yes"){

            if($_FILES["servicessertificate"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في الشرطة')</script>";
            }
            elseif($_FILES["servicessertificateunv"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في ادارة الجامعة')</script>";
            }
            elseif(!in_array($police_imageextension , $police_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في الشرطة غير صالحه')</script>";
                }
                elseif($police_photo_size > 2000000){
                    echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في الشرطة اكبر من المساحة المحددة')</script>";
                }
                elseif(!in_array($unv_imageextension , $unv_validimageextinsion)){
                    echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة غير صالحه')</script>";
                    }
                    elseif($unv_photo_size > 2000000){
                        echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة اكبر من المساحة المحددة')</script>";
                    }  
            else{
                $new_police_image = uniqid();
                $new_police_image .= '.' . $police_imageextension ;
                move_uploaded_file($police_photo_tmpname ,'images_uplodes/'.$new_police_image);
                //------------------------------------------------------------------
                $new_unv_image = uniqid();
                $new_unv_image .= '.' . $unv_imageextension ;
                move_uploaded_file($unv_photo_tmpname ,'images_uplodes/'.$new_unv_image);
                //------------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
                //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
                //-----------------------------------------------------------------------------------

                $insert_data_std = mysqli_query($connection , 
                "insert into new_std_form_info (form_number , name_std , college, type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                                     value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','none','none','none','$name_of_father_police','$new_police_image','$name_of_fater_unv','$new_unv_image','$date','$hours','$year')");
            
                                     if($insert_data_std){
                                        echo "<script>alert('تم التسجيل بنجاح')</script>";
                                    }
            }
        }
        elseif($if_have_brother_or_no == "no" && $if_father_in_police == "no" && $if_father_in_manegment_unv == "yes"){

            if($_FILES["servicessertificateunv"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في ادارة الجامعة')</script>";
            }
                elseif(!in_array($unv_imageextension , $unv_validimageextinsion)){
                    echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة غير صالحه')</script>";
                    }
                    elseif($unv_photo_size > 2000000){
                        echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة اكبر من المساحة المحددة')</script>";
                    }  
            else{
                $new_unv_image = uniqid();
                $new_unv_image .= '.' . $unv_imageextension ;
                move_uploaded_file($unv_photo_tmpname ,'images_uplodes/'.$new_unv_image);
                //------------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
                //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
                //-----------------------------------------------------------------------------------

                $insert_data_std = mysqli_query($connection , 
                "insert into new_std_form_info (form_number , name_std , college, type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours,year)
                                     value ('$form_number','$name_of_student','$the_college', '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','none','none','none','none','none','$name_of_fater_unv','$new_unv_image','$date','$hours',$year)");
            
                                     if($insert_data_std){
                                        echo "<script>alert('تم التسجيل بنجاح')</script>";
                                    }
            }
        }
        elseif($if_have_brother_or_no == "yes" && $if_father_in_police == "no" && $if_father_in_manegment_unv == "yes"){

            if($_FILES["cardphoto"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة البطاقة الجامعية (اخ / اخت)')</script>";
            }
            elseif($_FILES["servicessertificateunv"]["error"] === 4){
                echo "<script>alert('عذرا الرجاء ارفاق صورة شهادة قيد العمل لاثبات ان الوالد او الوالدة ت/يعمل في ادارة الجامعة')</script>";
            }

            elseif(!in_array($borther_imageextension , $borther_validimageextinsion)){
                echo "<script>alert('عذرا هذا الملف او الصورة الخاصة ببطافة الجامعة(اخ/اخت) غير صالحه')</script>";
            }
            elseif($borther_photo_size > 2000000){
                echo "<script>alert('عذرا مساحة الصورة الخاصة ببطافة الجامعة(اخ/اخت) اكبر من المساحة المحددة')</script>";
            }
                elseif(!in_array($unv_imageextension , $unv_validimageextinsion)){
                    echo "<script>alert('عذرا هذا الملف او الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة غير صالحه')</script>";
                    }
                    elseif($unv_photo_size > 2000000){
                        echo "<script>alert('عذرا مساحة الصورة الخاصة بشهادة قيد العمل في ادارة الجامعة اكبر من المساحة المحددة')</script>";
                    }  
            else{
                $new_brother_image = uniqid();
                $new_brother_image .= '.' . $borther_imageextension ;
                move_uploaded_file($borther_photo_tmpname ,'images_uplodes/'.$new_brother_image);
                //----------------------------------------------------------------
                $new_unv_image = uniqid();
                $new_unv_image .= '.' . $unv_imageextension ;
                move_uploaded_file($unv_photo_tmpname ,'images_uplodes/'.$new_unv_image);
                //------------------------------------------------------------------
                $new_personal_image = uniqid();
                $new_personal_image .= '.' . $imageextension ;
                move_uploaded_file($personal_photo_tmpname ,'images_uplodes/'.$new_personal_image);
                //----------------------------------------------------------
                $new_national_image = uniqid();
                $new_national_image .= '.' . $imageextension_national ;
                move_uploaded_file($national_number_tmpname ,'images_uplodes/'.$new_national_image);
                //-----------------------------------------------------------------------------------

                $insert_data_std = mysqli_query($connection , 
                "insert into new_std_form_info (form_number , name_std , college , type_certificate_unv , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours, year)
                                     value ('$form_number','$name_of_student','$the_college' , '$type_certificate_unv','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$new_personal_image','$new_national_image','$name_of_brother','$univirsity_number','$new_brother_image','none','none','$name_of_fater_unv','$new_unv_image','$date','$hours','$year')");
            
                                     if($insert_data_std){
                                        echo "<script>alert('تم التسجيل بنجاح')</script>";
                                    }
            }
        }


    }

   /*
    $insert_data_std = mysqli_query($connection , 
    "insert into new_std_form_info (form_number , name_std , college , department , type_certifcate , course , certifcate_rate , set_number , nationality_number , gender , nationality , religion , state, city , area , home_number , name_of_guardian , jop_guardian , relatuve_relation , phone_of_guardian , phone_std , email_std , name_closest_relative , address_closest_relative , phone_closest_relative , personal_photo , photo_nationality_number , name_of_brother , univirsity_number , card_photo , name_of_father_police , services_certificate , name_of_fater_unv , services_certificate_unv, date, hours)
                         value ('$form_number','$name_of_student','$the_college','$the_department','$the_type_certificate','$the_course','$the_certificate_rate','$the_set_number','$nationality_number','$gender','$religion','$state','$city','$area','$home_number','$name_guardian','$jop_guardian','$jop_guardian','$relatuve_relation','$phone_guardian','$phone_std','$email_std','$name_closest_relative','$address_closest_relative','$phone_closest_relative','$personal_photo','$photo_nationality_number','$name_of_brother','$univirsity_number','$card_photo','$name_of_father_police','$services_certificate','$name_of_fater_unv','$services_certificate_unv','$date','$hours')");

                         */
}
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/nstd_info_form/nstd_info_form.css?v=<?php echo time();?>">
    <title>بيانات الطالب</title>
</head>
<body>
<div class="container">
    <!-- <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../account/account.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div> -->
    <div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="roww">
            <div class="form-group">
                <label for="" class="lead">Form Number </label>
                <input type="text"  class="form-control" value="<?php echo $form_no; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="lead">Name </label>
                <input type="text"  class="form-control" value="<?php echo $name_std; ?>" readonly>
            </div>
             <div  class="form-group">
                <label for="" class="lead">College</label>
                <input type="text" class="form-control" value="<?php echo $college; ?>" readonly>
            </div>
        </div>
        <div class="roww">
            <div  class="form-group">
                <label for="" class="lead">  Certificate Unv Type </label>
                <input type="text"  class="form-control" value="<?php echo $type_certificate_unv; ?>" readonly>
            </div>
            <div  class="form-group">
                <label for="" class="lead">Department</label>
                <input type="text"  class="form-control" value="<?php echo $department; ?>" readonly>
            </div>
            <div  class="form-group">
                 <label for="" class="lead"> Certificate Type</label>
                <input type="text"  class="form-control" value="<?php echo $type_certifcate; ?>" readonly>
            </div>
        </div>
        <div class="roww">
            <div class="form-group">
                <label for="" class="lead">The Course</label>
                <input type="text" class="form-control" value="<?php echo $course; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="lead">Certificate Rate</label>
                <input type="text"   class="form-control" value="<?php echo $certifcate_rate; ?>" readonly>
            </div>
            <div class="form-group">
            <label for="" class="lead">Set Number</label>
                <input type="text" class="form-control" value="<?php echo $set_number; ?>" readonly>
            </div>
        </div>
        <hr>
        <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Nationality</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Nationality">
        </div>
        <div class="form-group">
            <label for="" class="lead">Nationality Number </label>
            <input type="text"  value="" class="form-control" placeholder="Enter Your Nationality Number">
        </div>
        <div class="form-group bssa">
            <label for="" class="lead"> Select  Gender</label>
            <input type="radio" name="gender" id="" value="none" checked hidden ><br>
            <input type="radio" name="gender" id="" value="male">
            <label for="" class="lead">Male</label>
            <input type="radio" name="gender" id="" value="female">
            <label for="" class="lead">Female</label>
        </div>
    </div>
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Religion </label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Religion">
        </div>
        <div class="form-group">
            <label for="" class="lead">State</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your State">
        </div>
        <div class="form-group">
            <label for="" class="lead">City</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your City">
        </div>
    </div>
    <div class="roww">    
        <div class="form-group">
            <label for="" class="lead">Area</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Area">
        </div>
        <div class="form-group">
            <label for="" class="lead">Home Number</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Home Number">
        </div>
        <div class="form-group">
            <label for="" class="lead">Guardian Name</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Guardian Name">
        </div>
    </div>
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Guardian Jop</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Guardian Jop">
        </div>
        <div class="form-group">
            <label for="" class="lead">Relatuve Relation</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Relatuve Relation">
        </div>
        <div class="form-group" >
            <label for="" class="lead">Guardian Phone</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Guardian Phone">
        </div>
    </div>
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead"> Student Phone</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Your Phone Number">
        </div>
        <div class="form-group">
            <label for="" class="lead"> Email</label>
            <input type="email"  value="" class="form-control"  placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <label for="" class="lead">Closest Relative Name</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Closest Relative Name">
        </div>
    </div>
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Closest Relative Address</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Closest Relative Address">
        </div>
        <div class="form-group">
            <label for="" class="lead">Closest Relative Phone</label>
            <input type="text"  value="" class="form-control"  placeholder="Enter Closest Relative Phone">
        </div>
        <div class="form-group">
            <label for="" class="lead">Select Personal Photo</label>
            <input type="file" name="personalphoto" id="" class="form-select">
        </div>
        <div class="form-group">
            <label for="" class="lead"> Select Nationality Number Photo</label>
            <input type="file" name="photonationalitynumber" id="" class="form-select">
        </div>
        </div>
        <br><hr>
        <div>
        <label for="" class="lead">A 10% discount If You Have A Brother Or Sister Who Is Currently Studying At Ribat University :</label><br><br>
            <div>
            <label for="" class="lead">Do You Have A Brother Or Sister Who Is Currently Studying At Ribat University?</label>
                <input type="radio" name="brother" id="" value="none" checked hidden>
                <br>
                <input type="radio" name="brother" id="" value="yes">
                <label for="" class="lead">Yes</label>
                <br>
                <input type="radio" name="brother" id="" value="no">
                <label for="" class="lead">No</label>
            </div>
        <div class="roww">    
            <div class="form-group">
                <label for="" class="lead">Brother Or Sister Name</label>
                <input type="text" name="name_brother"  value=""  class="form-control" placeholder="Enter Your Brother Or Sister Name" >
            </div>
            <div class="form-group">
                <label for="" class="lead">Univirsity Number</label>
                <input type="text" name="unv_number"  value=""  class="form-control" placeholder="Enter His Univirsity Number" >
            </div>
            <div>
            <label for="" class="lead"> Select Univirsity Card Photo</label>
                <input type="file" name="cardphoto" id="" class="form-select">
            </div>
        </div><br><hr>
        <div>
        <label for="" class="lead">A 20% discount If You Father Or Mother Currently Working In Police :</label><br><br>
            <div>
            <label for="" class="lead">Is You Father Or Mother Currently Working In Police?</label>
                <input type="radio" name="police" id="" value="none" checked hidden>
                <br>
                <input type="radio" name="police" id="" value="yes">
                <label for="" class="lead">Yes</label>
                <br>
                <input type="radio" name="police" id="" value="no">
                <label for="" class="lead">No</label>
            </div>
        <div class="roww">
            <div class="form-group">
                <label for="" class="lead"> Father Or Mother Name</label>
                <input type="text" name="nameoffatherpolice" id="" class="form-control" placeholder=" Enter Your Father Or Mother Name ">
            </div>
            <div class="form-group">
                <label for="" class="lead">Select Proof Of Service Certificate</label>
                <input type="file" name="servicessertificate" id="" class="form-select">
            </div>
        </div><br><hr>
        <div>
        <label for="" class="lead">A 70% discount If You Father Or Mother Currently Working In Ribat University :</label><br><br>
           <div>
           <label for="" class="lead">Is You Father Or Mother Currently Working In Ribat University :</label>
                <input type="radio" name="manegment" id="" value="none" checked hidden>
                <br>
                <input type="radio" name="manegment" id="" value="yes">
                <label for="" class="lead">Yes</label>
                <br>
                <input type="radio" name="manegment" id="" value="no">
                <label for="" class="lead">No</label>
            </div>
            <div class="roww">
            <div class="form-group">
            <label for="" class="lead"> Father Or Mother Name</label>
            <input type="text" name="nameoffaterunv" id="" class="form-control" placeholder=" Enter Your Father Or Mother Name ">
            </div>
            <div class="form-group">
                <label for="" class="lead">Select Proof Of Service Certificate</label>
                <input type="file" name="servicessertificateunv" id="" class="form-select">
            </div>
        </div>
        <div>
            <center><input type="submit" value="Regist" name="addreg" class="btn btn-primary"></center>
        </div>


    </form>
</body>
</html>