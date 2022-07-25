<?php
include "../../../connection/connection.php";

session_start();
$name_user = $_SESSION["full_name_acc"];
$display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
$display_value_of_unv = mysqli_query($connection , "select * from safe_monye where id = 2");
//عرض قيمة النقود في البنك
$row=mysqli_fetch_array($display_value_of_bank);
$value_bank = $row["total"];
//$_SESSION["valuebank"] = $row["total"];

//عرض قيمة النقود في الخزنة
$row2 = mysqli_fetch_array($display_value_of_unv);
$value_unv = $row2["total"];

  $id = $_GET['id'];
  $name = $_GET['name'];
  $type_of_jop = $_GET['type_of_jop'];
  $salary = $_GET['salary'];
  $value_loan = $_GET['value_loan'];
  $value_salary = $_GET['value_salary'];
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($value_salary > $value_bank){
            echo "<script>alert('Sorry, Please Check Account Bank');
            window.location.href='submit_salary.php';</script>";
        }
        else{
                    $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $value_salary  where id = 1");
                    if($update_safe_bank){
                        $update_check_accountant = mysqli_query($connection ,"update salary set accountant_name='$name_user' , check_accountant='done' where id=$id");
                        if($update_check_accountant){
                            echo "<script>alert('Successfully Confirm Salary');
                            window.location.href='submit_salary.php';</script>";
                        }
                    }
                }
            
           /* if($safe == "unv_safe"){
                //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
                if($value_mustahqat > $value_bank){
                    echo "<script>alert('Sorry, Please Check Safe Univirsty');
                    window.location.href='submit_mustahq.php';</script>";
                }
                else{
                            $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_unv - $value_mustahqat  where id = 2");
                            if($update_safe_bank){
                                $update_check_accountant = mysqli_query($connection ,"update mustahqat set type_safe='$safe',accountant_name='$name_user' , check_accountant='done' where id=$id && user_name='$username' && value_mustahqat='$value_mustahqat'");
                                if($update_check_accountant){
                                    echo "<script>alert('Successfully Confirm Loan');
                                    window.location.href='submit_mustahq.php';</script>";
                                }
                            }
                        }
                    }*/ 
?>