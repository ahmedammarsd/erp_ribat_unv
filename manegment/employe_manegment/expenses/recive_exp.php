<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;
/*
$display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
$display_value_of_unv = mysqli_query($connection , "select * from safe_monye where id = 2");
//عرض قيمة النقود في البنك
$row=mysqli_fetch_array($display_value_of_bank);
$value_bank = $row["total"];
//$_SESSION["valuebank"] = $row["total"];

//عرض قيمة النقود في الخزنة
$row2 = mysqli_fetch_array($display_value_of_unv);
$value_unv = $row2["total"];
//$_SESSION["valueunv"] = $row["total"];
*/
if(isset($_POST["expens"])){
    $typeexpens = $_POST["typeexpens"];
    $valueexpens = $_POST["valueexpens"];
    $distnationexpens = $_POST["distnationexpens"];
  //  $typesafe = $_POST["safe"];
    $date = date("Y-m-d");
    $hours = date("h:m:s");

    if($valueexpens < 0){
        echo "<script>alert('Sorry, Expense Value Not Accept');
        window.location.href='expenses.php';</script>";
    }
    else{
            $insert_exp =  mysqli_query($connection , "insert into expenses (type_exp,username, distnation_expens , value_exp , date_of_exp, hours_of_exp)
            value('$typeexpens','$name_user', '$distnationexpens','$valueexpens','$date','$hours') ");
            if($insert_exp){
               // header("location: expenses.php?select=3");
                //$_SESSION['alert'] = "<script>alert('تم الخصم بنجاح')</script>";
                echo "<script>alert('Sucessfylly Send Expense');
                window.location.href='expenses.php';</script>";  
    }
}
    }
  /*  if($typesafe == "none"){
      //  header("location: expenses.php?select=1");
        //$_SESSION['alert'] = "<script>alert('عذرا الرجاء تحديد الخزنة المسحوب منها')</script>";
        echo "<script>alert('عذرا الرجاء تحديد الخزنة المسحوب منها');
        window.location.href='expenses.php';</script>";
    }
    // خصم من البنك
    if($typesafe == "bank_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($valueexpens > $value_bank){
            //header("location: expenses.php?select=2");
            //$_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";  
            echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب');
            window.location.href='expenses.php';</script>";
        }
        else{
            //اذا اصغر يتم الادخال البيانات
          $insert_exp =  mysqli_query($connection , "insert into expenses (type_exp, distnation_expens , value_exp , exp_from, date_of_exp, hours_of_exp)
            value('$typeexpens', '$distnationexpens','$valueexpens','$typesafe','$date','$hours') ");
            if($insert_exp){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueexpens  where id = 1");
                if($update_safe_bank){
                   // header("location: expenses.php?select=3");
                    //$_SESSION['alert'] = "<script>alert('تم الخصم بنجاح')</script>";
                    echo "<script>alert('تم الخصم بنجاح');
                    window.location.href='expenses.php';</script>";
                }
            }
        }
    }
     // خصم من الجامعة
     if($typesafe == "unv_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($valueexpens > $value_unv){
           // $_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";
            //header("location: expenses.php?select=4");
            echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب');
            window.location.href='expenses.php';</script>";
        }
        else{
            //اذا اصغر يتم الادخال البيانات
          $insert_exp =  mysqli_query($connection , "insert into expenses (type_exp, distnation_expens, value_exp,exp_from,date_of_exp,hours_of_exp)
          value('$typeexpens','$distnationexpens','$valueexpens','$typesafe','$date','$hours') ");
            if($insert_exp){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_unv - $valueexpens  where id = 2");
                if($update_safe_bank){
                   // $_SESSION['alert'] =  "<script>alert('تم الخصم بنجاح')</script>";
                    //header("location: expenses.php?select=5");
                    echo "<script>alert('تم الخصم بنجاح');
                    window.location.href='expenses.php';</script>";
                }
            }
        }
    }
*/

?>