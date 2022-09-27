<?php
include "../../connection/connection.php";
session_start();
if (isset($_POST["pay"])) {
   $unv_id = $_SESSION["unv_id"];
   $name_std = $_SESSION["name_std"];
   $batch = $_SESSION["batch"];
   $register_fee = $_SESSION["register_fee"];
   $type_certifcate_unv = $_SESSION["type_certifcate_unv"];
   $department = $_SESSION["department"];
   $status = $_SESSION["status"];
   $semester_reg_pay = $_SESSION["semester_reg_pay"];
   $bank = $_POST["bank"];
   $account_number = $_POST["account_number"];
   $ipan = $_POST["ipan"];
   $total_price = $_POST["total_price"];
   $date = date("Y-m-d");
   $time = date("h:m:s");
   if ($bank == "none") {
      echo "<script>alert('Sorry Please Select The Bank');
        window.location.href='online_pay.php';</script>";
   } elseif ($bank == "krt") {
      //عرض معلومات الحساب لاتمام ملية الدفع
      $display_info_account = mysqli_query($connection, "select * from khartoum_bank where account_number='$account_number' && ipan_code='$ipan'");
      if (mysqli_num_rows($display_info_account) == 0) {
         echo "<script>alert('Sorry, Wrong Account Information');
        window.location.href='online_pay.php'</script>";
      } elseif (mysqli_num_rows($display_info_account) == 1) {
         //رصيد حساب العميل
         $clint_balance = mysqli_fetch_array($display_info_account)["balance"];
         //عرض رصيد الحساب الخاص بالادارة
         $display_balance_main_account = mysqli_query($connection, "select * from safe_monye where id=1");
         $balance_main = mysqli_fetch_array($display_balance_main_account)["total"];
         echo $balance_main;
         if ($total_price > $clint_balance) {
            echo "<script>alert('Sorry, Please Check Your Account');
                window.location.href='online_pay.php';</script>";
         } else {
            $update_account_clinet = mysqli_query($connection, "update khartoum_bank set balance=$clint_balance-$total_price where  account_number='$account_number' && ipan_code='$ipan'");
            if ($update_account_clinet) {
               $update_account_main_manegment = mysqli_query($connection, "update safe_monye set total=$balance_main+$total_price where id=1");
               if ($update_account_main_manegment) {
                  $insert_data_reg = mysqli_query($connection, "insert into std_reg_fees(unv_id ,name_std,batch ,type_certifcate_unv ,department ,status , reg_for_semester , total_pay , date, time)
                 value ('$unv_id','$name_std','$batch','$type_certifcate_unv','$department','$status','$semester_reg_pay','$total_price','$date','$time')");
                  if ($insert_data_reg) {
                     if ($semester_reg_pay == 1) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s1='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                            window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 2) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s2='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 3) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s3='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 4) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s4='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 5) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s5='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 6) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s6='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 7) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s7='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 8) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s8='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                           window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     }
                  }
               }
            }
         }
      }
   }
   //-----------------------------------------
   elseif ($bank == "fisal") {
      //عرض معلومات الحساب لاتمام ملية الدفع
      $display_info_account = mysqli_query($connection, "select * from fisal_bank where account_number='$account_number' && ipan_code='$ipan'");
      if (mysqli_num_rows($display_info_account) == 0) {
         echo "<script>alert('Sorry, Wrong Account Information');
           window.location.href='online_pay.php'</script>";
      } elseif (mysqli_num_rows($display_info_account) == 1) {
         //رصيد حساب العميل
         $clint_balance = mysqli_fetch_array($display_info_account)["balance"];
         //عرض رصيد الحساب الخاص بالادارة
         $display_balance_main_account = mysqli_query($connection, "select * from safe_monye where id=1");
         $balance_main = mysqli_fetch_array($display_balance_main_account)["total"];
         echo $balance_main;
         if ($total_price > $clint_balance) {
            echo "<script>alert('Sorry, Please Check Your Account');
                   window.location.href='online_pay.php';</script>";
         } else {
            $update_account_clinet = mysqli_query($connection, "update fisal_bank set balance=$clint_balance-$total_price where  account_number='$account_number' && ipan_code='$ipan'");
            if ($update_account_clinet) {
               $update_account_main_manegment = mysqli_query($connection, "update safe_monye set total=$balance_main+$total_price where id=1");
               if ($update_account_main_manegment) {
                  $insert_data_reg = mysqli_query($connection, "insert into std_reg_fees(unv_id ,name_std,batch ,type_certifcate_unv ,department ,status , reg_for_semester , total_pay , date, time)
                    value ('$unv_id','$name_std','$batch','$type_certifcate_unv','$department','$status','$semester_reg_pay','$total_price','$date','$time')");
                  if ($insert_data_reg) {
                     if ($semester_reg_pay == 1) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s1='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                               window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 2) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s2='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 3) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s3='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 4) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s4='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 5) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s5='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 6) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s6='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 7) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s7='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     } elseif ($semester_reg_pay == 8) {
                        $update_to_confirm_pay_semester = mysqli_query($connection, "update students set confirm_pay_s8='done' where unv_id='$unv_id'");
                        if ($update_to_confirm_pay_semester) {
                           echo "<script>alert('Successfully Registered');
                              window.location.href='../profile_std/profile_std.php';</script>";
                        } else {
                           echo "<script>alert('Sorry, There Was An Error In The Registration Process')</script>";
                        }
                     }
                  }
               }
            }
         }
      }
   }
}
