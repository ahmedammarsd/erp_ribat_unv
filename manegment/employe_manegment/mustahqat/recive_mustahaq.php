<?php
include "../../../connection/connection.php";
session_start();
$username = "aahmed";

if(isset($_POST["addmustahaq"])){
    $nameoftake = $_POST["nameoftake"];
    $typejop = $_POST["typeofjop"];
    $valuemustahaq = $_POST["valuemustahaq"];
    //$typesafe = $_POST["typeofsafe"];
    //$username = $_POST["username"];
    $date = date("Y-m-d");
    $hours = date("h:m:s");
/*
$display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
$display_value_of_unv = mysqli_query($connection , "select * from safe_monye where id = 2");

    //عرض قيمة النقود في البنك
$row=mysqli_fetch_array($display_value_of_bank);
$value_bank = $row["total"];


//عرض قيمة النقود في الخزنة
$row1=mysqli_fetch_array($display_value_of_unv);
$value_unv = $row1["total"];
*/

    if($typejop === "none"){
        //echo "<script>alert('عذرا الرجاء تحديد الحساب او الخزنة للخصم')</script>";
        echo "<script>alert('Sorry,Please Select Jop Type');
        window.location.href='add_mustahq.php';</script>";
    }
    elseif($valuemustahaq < 0 ){
      echo "<script>alert('Sorry,Value Is Not Accept');
      window.location.href='add_mustahq.php';</script>";
    }
    else{
      $insert_mustahqat =  mysqli_query($connection , "insert into mustahqat (name_of_take, type_jop , value_mustahqat  ,user_name, date_of_mus ,hours_of_mus)
      value('$nameoftake','$typejop','$valuemustahaq','$username','$date','$hours')");
      if($insert_mustahqat){
        echo "<script>alert('Successfully Send Mustahg');
        window.location.href='add_mustahq.php';</script>";
    }
    else{
      echo "<script>alert('Sorry,Erorr In Program');
      window.location.href='add_mustahq.php';</script>";
    }
  
    }
  }

/*
     // خصم من البنك
    // elseif($typesafe === "bank_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
       // if($valuemustahaq > $value_bank){
          //  header("location: expenses.php");
           // $_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>"; 
          // echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";   
         // $_SESSION['alertmustahaq'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";
          //header("location: add_mustahq.php?bank=2");
         // echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب');
          //window.location.href='add_mustahq.php';</script>";
        }
        else{
            //اذا اصغر يتم الادخال البيانات
          $insert_mustahqat =  mysqli_query($connection , "insert into mustahqat (name_of_take, type_jop , value_mustahqat  , type_safe ,user_name, date ,hours)
            value('$nameoftake','$typejop','$valuemustahaq','$typesafe','$username','$date','$hours')");
            if($insert_mustahqat){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
             //   $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valuemustahaq  where id = 1");
               // if($update_safe_bank){  
                  //  $_SESSION['alertmustahaq'] = "<script>alert('تم الخصم بنجاح')</script>";
                    //header("location: add_mustahq.php?bank=1");
                  // echo "<script>alert('تم الخصم بنجاح')</script>";
                }
            }
        
    


     // خصم من الجامعة
     elseif($typesafe === "unv_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($valuemustahaq > $value_unv){
           // $_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";
           // header("location: expenses.php");
          // echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الخزنة')</script>";
         // $_SESSION['alertmustahaq'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الخزنة')</script>";
           //         header("location: add_mustahq.php?unv=1");
                    echo "<script>alert('قيمة الخصم اكبر من  الموجودة في الخزنة');
                    window.location.href='add_mustahq.php';</script>";
        }
        else{
            //اذا اصغر يتم الادخال البيانات
          $insert_mustahqat =  mysqli_query($connection , "insert into mustahqat (name_of_take, type_jop , value_mustahqat  , type_safe ,user_name, date ,hours)
          value('$nameoftake','$typejop','$valuemustahaq','$typesafe','$username','$date','$hours') ");
            if($insert_mustahqat){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_unv - $valuemustahaq  where id = 2");
                if($update_safe_bank){
                 //   $_SESSION['alert'] =  "<script>alert('تم الخصم بنجاح')</script>";
                   // header("location: expenses.php");
                  // echo "<script>alert('تم الخصم بنجاح')</script>";
                //  $_SESSION['alertmustahaq'] = "<script>alert('تم الخصم بنجاح')</script>";
                 // header("location: add_mustahq.php?unv=2");
                 echo "<script>alert('تم الخصم بنجاح');
                 window.location.href='add_mustahq.php';</script>";
                }
            }
        }
    }


  }
*/
?>