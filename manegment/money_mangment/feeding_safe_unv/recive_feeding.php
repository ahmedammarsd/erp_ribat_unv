<?php

include "../../../connection/connection.php";
session_start();

//عرض الرصيد الحالي في البنك
$display_total_bank_safe = mysqli_query($connection , "select total from safe_monye where id =1");
$row = mysqli_fetch_array($display_total_bank_safe);
$total_of_bank = $row["total"];

 //عرض الرصيد الحالي في خزنة الجامعة
 $display_total_unv_safe = mysqli_query($connection , "select total from safe_monye where id =2");
 $row2 = mysqli_fetch_array($display_total_unv_safe);
 $total_of_unv = $row2["total"];

 if(isset($_POST["feeding"])){
    $username = $_POST["usernmae"];
    $value_feeding = $_POST["feddingvalue"];
    $date_of_feeding = date("Y-m-d h:m:s");
 
        
    if($value_feeding > $total_of_bank){
        //header("location: feeding_safe.php?selects=1");
        //$_SESSION["alertf"] = "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
        echo "<script>alert('Please check the bank account');
        window.location.href='feeding_safe.php';</script>";
    }
    else{
    //تحديث الحساب البنكي على حسم القيمة المدخلة وخصمها من الحساب
     $update_safe_bank1 = mysqli_query($connection , "update safe_monye set total = $total_of_bank - $value_feeding where id = 1");
     if($update_safe_bank1){
         //بعد التاكد من الخصم يتم تحديث خزنة الجامعة باضافة القيمة التي تم تحديدها
         $update_safe_unv1 = mysqli_query($connection , "update safe_monye set total = $total_of_unv + $value_feeding   where id = 2");
         if($update_safe_unv1){
             //بعد التاكد من اضافة القيمة الى الخزنة الجامعية يتم ادخال البيانات
             $insert_information_fedding =  mysqli_query($connection , "insert into feeding (user_name , value_of_feeding, date)
             value ('$username','$value_feeding','$date_of_feeding')");
             if($insert_information_fedding){
               // $_SESSION["alertf"] = "<script>alert('تم تغذية الخزينة الجامعية')</script>";
               // header("location: feeding_safe.php?selects=2");
               echo "<script>alert('Feeding Successfully');
               window.location.href='feeding_safe.php';</script>";
             }
         }
     }
    }
 }






/*
//عرض الرصيد الحالي في البنك
$display_total_bank_safe = mysqli_query($connection , "select safe from bank_safe");
$row = mysqli_fetch_array($display_total_bank_safe);
$total_of_bank = $row["safe"];

 //عرض الرصيد الحالي في خزنة الجامعة
 $display_total_unv_safe = mysqli_query($connection , "select safe from unv_safe");
 $row2 = mysqli_fetch_array($display_total_unv_safe);
 $total_of_unv = $row2["safe"];

 if(isset($_POST["feeding"])){
    $username = $_POST["usernmae"];
    $value_feeding = $_POST["feddingvalue"];
    $date_of_feeding = date("Y-m-d h:m:s");

    if($value_feeding > $total_of_bank){
        header("location: feeding_safe.php?selects=1");
        $_SESSION["alert"] = "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
    }
    elseif($total_of_bank >= $value_feeding){
    //تحديث الحساب البنكي على حسم القيمة المدخلة وخصمها من الحساب
     $update_safe_bank1 = mysqli_query($connection , "update bank_safe set safe=$total_of_bank-$value_feeding");
    
         //بعد التاكد من الخصم يتم تحديث خزنة الجامعة باضافة القيمة التي تم تحديدها
         $update_safe_unv1 = mysqli_query($connection , "update unv_safe set safe=$total_of_unv+$value_feeding");
         if($update_safe_unv1){
             //بعد التاكد من اضافة القيمة الى الخزنة الجامعية يتم ادخال البيانات
             $insert_information_fedding =  mysqli_query($connection , "insert into feeding (user_name , value_of_feeding, date)
             value ('$username','$value_feeding','$date_of_feeding')");
             if($insert_information_fedding){
                $_SESSION["alert"] = "<script>alert('تم تغذية الخزينة الجامعية')</script>";
                header("location: feeding_safe.php?selects=2");
             }
         }
     
    }
}
*/

/* 

تم الالغاء نظرا لبعض المشاكل في عمليات التحويلات بين البنك والخزنة
if(isset($_POST["feeding"])){
    $value_feeding = $_POST["feddingvalue"];
    $from_safe = $_POST["fromsafe"];
    $to_safe = $_POST["tosafe"];
    $date_of_feeding = date("Y-m-d h:m:s");

    if($from_safe === "none"){
        $_SESSION["alertfeeding"] = "<script>alert(' عذرا الرجاء تحديد الخزنة المسحوب منها')</script>";
        header("location: feeding_safe.php?selects=1");
    }

    elseif($to_safe === "none"){
        $_SESSION["alertfeeding"] = "<script>alert('عذرا الرجاء تحديد الخزنة التي سيتم تغذيتها')</script>";
        header("location: feeding_safe.php?selects=2");
    }
    elseif($from_safe === "banksafe" && $to_safe === "banksafe"){
        $_SESSION["alertfeeding"] = "<script>alert('عذرا الرجاء تحديد الخزنة التي سيتم تغذيتها او السحب منها')</script>";
        header("location: feeding_safe.php?selects=3");
    }
    elseif($from_safe === "unvsafe" && $to_safe === "unvsafe"){
        $_SESSION["alertfeeding"] = "<script>alert('عذرا الرجاء تحديد الخزنة التي سيتم تغذيتها او السحب منها')</script>";
        header("location: feeding_safe.php?selects=4");
    }

    elseif($from_safe === "banksafe" && $to_safe === "unvsafe"){
        
        if($value_feeding > $total_of_bank){
            header("location: feeding_safe.php?selects=5");
            $_SESSION["alertfeeding"] = "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
        }
        else{
        //تحديث الحساب البنكي على حسم القيمة المدخلة وخصمها من الحساب
         $update_safe_bank1 = mysqli_query($connection , "update safe_monye set total = $total_of_bank - $value_feeding where id = 1");
         if($update_safe_bank1){
             //بعد التاكد من الخصم يتم تحديث خزنة الجامعة باضافة القيمة التي تم تحديدها
             $update_safe_unv1 = mysqli_query($connection , "update safe_monye set total = $total_of_unv + $value_feeding   where id = 2");
             if($update_safe_unv1){
                 //بعد التاكد من اضافة القيمة الى الخزنة الجامعية يتم ادخال البيانات
                 $insert_information_fedding =  mysqli_query($connection , "insert into feeding (value_of_feeding , from_safe  , to_safe , date)
                 value ('$value_feeding','$from_safe','$to_safe','$date_of_feeding')");
                 if($insert_information_fedding){
                    $_SESSION["alertfeeding"] = "<script>alert('تم تغذية الخزينة الجامعية')</script>";
                    header("location: feeding_safe.php?selects=6");
                 }
             }
         }
        }
    }

    elseif($from_safe === "unvsafe" && $to_safe === "banksafe"){

        if($value_feeding > $total_of_unv){
            $_SESSION["alertfeeding"] = "<script>alert('عذرا الرجاء مراجعة الخزنة الجامعية')</script>";
            header("location: feeding_safe.php?selects=7");
        }
        else{
        //تحديث الخزنة الجامعية وخصم منها القيمة التي تم تحديدها وتةريدها في الحساب البنكي
         $update_safe_unv2 = mysqli_query($connection , "update safe_monye set total =$total_of_unv - $value_feeding where id = 2");
         $update_safe_bank2 = mysqli_query($connection , "update safe_monye set total =$total_of_bank + $value_feeding  where id = 1");
         if($update_safe_unv2 && $update_safe_bank2){
                 $insert_information_fedding =  mysqli_query($connection , "insert into feeding (value_of_feeding , from_safe  , to_safe , date)
                 value ('$value_feeding','$from_safe','$to_safe','$date_of_feeding')");
                 if($insert_information_fedding){
                    $_SESSION["alertf"] = "<script>alert('تم تغذية الحساب البنكي')</script>";
                    header("location: feeding_safe.php?selects=8");
                 }
             
         }
        }
    }
}
*/

?>