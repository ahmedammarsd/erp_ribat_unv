<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;
error_reporting(0);   
$employeid = $_GET["employeid"];
$tetcherid = $_GET["tetcherid"];
$workerid = $_GET["workerid"];

 

if($employeid){
    $display_data_emp = mysqli_query($connection , "select full_name,phone_number,type_of_jop,salary from employes where id = '$employeid' and del='no' ");
    //لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
    $row = mysqli_fetch_array($display_data_emp);
    //تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
    $inp_name = $row["full_name"];
    $inp_phone = $row["phone_number"];
     $inp_jop = $row["type_of_jop"];
    $inp_salary = $row["salary"];
    $inp_date1 = date("Y-m-d h:m:s"); 

    //اظار اذا ما كان عندو سلفيات اخر ومجموع هذه السلفيات
 $display_if_have_loans = mysqli_query($connection , "select sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='$inp_jop' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
 $row4 = mysqli_fetch_array($display_if_have_loans);
 $value_of_loans = $row4["val"];
//echo $value_of_loans;
    
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $phone = $_POST["phonenumber"];
        $jop = $_POST["jop"];
        $salary = $_POST["salary"];

            //اظار اذا ما كان عندو سلفيات اخر ومجموع هذه السلفيات
            $display_if_have_loans = mysqli_query($connection , "select name_of_take, type_of_job, phone_number , sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='$inp_jop' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
            $row2 = mysqli_fetch_array($display_if_have_loans);
            $value_of_loans = $row2["val"];
           // echo $value_of_loans;

            if($value_of_loans !== ""){
                $discoun_loans_from_salary = $salary - $value_of_loans;
                $insert_data_salary = mysqli_query($connection , "insert into salary (name, phone_number ,type_of_jop,salary,value_loan ,value_salary ,date)
                value ('$name','$phone','$jop','$inp_salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
                if($insert_data_salary){
                   /* //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                    $update_safe_bank = mysqli_query($connection, "update safe_monye set total = $value_bank - $discoun_loans_from_salary  where id = 1");
                    $update_take_loans_from_salary = mysqli_query($connection , "update loans set status_of_discount_from_salary ='yes' where  name_of_take ='$inp_name' and type_of_job='$inp_jop' and phone_number = '$inp_phone'");
                    echo "<script>alert('تم خصم السلفية من المرتب')</script>";
                    if($update_safe_bank && $update_take_loans_from_salary){
                       $update_take_salary = mysqli_query($connection , "update employes set take_salary ='yes' where id = '$employeid'");
                       if($update_take_salary){
                        header("location: salary.php");}*/
                        $update_take_loans_from_salary = mysqli_query($connection , "update loans set status_of_discount_from_salary ='yes' where  name_of_take ='$inp_name' and type_of_job='$inp_jop' and phone_number = '$inp_phone'");
                       // echo "<script>alert('تم خصم السلفية من المرتب')</script>";
                        if($update_take_loans_from_salary){
                            $update_take_salary = mysqli_query($connection , "update employes set take_salary ='yes' where id = '$employeid'");
                            if($update_take_salary){
                                echo "<script>alert('Successfully Send Info Salary');
                                window.location.href='salary.php';
                                </script>";
                            }
                        }

                       
                    }
            }
           else {
            $insert_data_salary = mysqli_query($connection , "insert into salary (name, phone_number ,type_of_jop,salary,value_loan ,value_salary ,date)
            value ('$name','$phone','$jop','$inp_salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
            if($insert_data_salary){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
              //  $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $salary  where id = 1");
                //if($update_safe_bank){
                   $update_take_salary = mysqli_query($connection , "update employes set take_salary ='yes' where id = '$employeid'");
                   if($update_take_salary){
                   // header("location: salary.php");}
                   echo "<script>alert('Successfully Send Info Salary');
                   window.location.href='salary.php';
                   </script>";
            }
        }
        }

    }

}
//--------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------


if($tetcherid){

    $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];


    $display_data_tetcher = mysqli_query($connection , "select full_name,phone_number,salary from tetchers where id = '$tetcherid' and del='no' ");
    //لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
    $row = mysqli_fetch_array($display_data_tetcher);
    //تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
    $inp_name = $row["full_name"];
    $inp_phone = $row["phone_number"];
    $inp_salary = $row["salary"];
    $inp_date1 = date("Y-m-d h:m:s"); 

    $display_if_have_loans = mysqli_query($connection , "select name_of_take, type_of_job, phone_number , sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='tetcher' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
            $row2 = mysqli_fetch_array($display_if_have_loans);
            $value_of_loans = $row2["val"] ;
           // echo $value_of_loans;
    
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $phone = $_POST["phonenumber"];
        $jop = "tetcher";
        $salary = $_POST["salary"];

            $display_if_have_loans = mysqli_query($connection , "select name_of_take, type_of_job, phone_number , sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='tetcher' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
            $row2 = mysqli_fetch_array($display_if_have_loans);
            $value_of_loans = $row2["val"] ;
           // echo $value_of_loans;

            if($value_of_loans !== "" ){
                $discoun_loans_from_salary = $salary - $value_of_loans;
                $insert_data_salary = mysqli_query($connection , "insert into salary (name,phone_number,type_of_jop,salary,value_loan,value_salary,date)
                value ('$name','$phone','$jop','$salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
                if($insert_data_salary){
                   /* //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                    $update_safe_bank = mysqli_query($connection, "update safe_monye set total = $value_bank - $discoun_loans_from_salary  where id = 1");
                    */$update_take_loans_from_salary = mysqli_query($connection , "update loans set status_of_discount_from_salary ='yes' where  name_of_take ='$inp_name' and type_of_job='$jop' and phone_number = '$inp_phone'");
                   // echo "<script>alert('تم خصم السلفية من المرتب')</script>";
                    
                    if($update_take_loans_from_salary){
                       $update_take_salary = mysqli_query($connection , "update tetchers set take_salary ='yes' where id = '$tetcherid'");
                       if($update_take_salary){
                       // header("location: salary.php");}
                       echo "<script>alert('Successfully Send Info Salary');
                       window.location.href='salary.php';
                       </script>";}
                       }
                    }
            }
           else {
            $insert_data_salary = mysqli_query($connection , "insert into salary (name,phone_number,type_of_jop,salary,value_loan,value_salary,date)
            value ('$name','$phone','$jop','$salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
            if($insert_data_salary){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
               // $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $salary  where id = 1");
               // if($update_safe_bank){
                  $update_take_salary = mysqli_query($connection , "update tetchers set take_salary ='yes' where id = '$tetcherid'");
                   if($update_take_salary){
                    echo "<script>alert('Successfully Send Info Salary');
                       window.location.href='salary.php';
                       </script>";
                    }
                   
                
            }
        }
        }

    }


//-----------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------


if($workerid){

    $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];


    $display_data_tetcher = mysqli_query($connection , "select name_worker,phone_number,salary from workers where id = '$workerid' and del='no' ");
    //لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
    $row = mysqli_fetch_array($display_data_tetcher);
    //تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
    $inp_name = $row["name_worker"];
    $inp_phone = $row["phone_number"];
    $inp_salary = $row["salary"];
    $inp_date1 = date("Y-m-d h:m:s"); 

    $display_if_have_loans = mysqli_query($connection , "select name_of_take, type_of_job, phone_number , sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='worker' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
    $row2 = mysqli_fetch_array($display_if_have_loans);
    $value_of_loans = $row2["val"] ;
   // echo $value_of_loans;
    
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $phone = $_POST["phonenumber"];
        $jop = "worker";
        $salary = $_POST["salary"];

            $display_if_have_loans = mysqli_query($connection , "select name_of_take, type_of_job, phone_number , sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='worker' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
            $row2 = mysqli_fetch_array($display_if_have_loans);
            $value_of_loans = $row2["val"] ;
           // echo $value_of_loans;

            if($value_of_loans !== "" ){
                $discoun_loans_from_salary = $salary - $value_of_loans;
                $insert_data_salary = mysqli_query($connection , "insert into salary (name,phone_number,type_of_jop,salary,value_loan,value_salary,date)
                value ('$name','$phone','$jop','$salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
                if($insert_data_salary){
                    //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                   // $update_safe_bank = mysqli_query($connection, "update safe_monye set total = $value_bank - $discoun_loans_from_salary  where id = 1");
                    $update_take_loans_from_salary = mysqli_query($connection , "update loans set status_of_discount_from_salary ='yes' where  name_of_take ='$inp_name' and type_of_job='$jop' and phone_number = '$inp_phone'");
                   // echo "<script>alert('تم خصم السلفية من المرتب')</script>";
                    if($update_take_loans_from_salary){
                       $update_take_salary = mysqli_query($connection , "update workers set take_salary ='yes' where id = '$workerid'");
                       if($update_take_salary){
                        echo "<script>alert('Successfully Send Info Salary');
                        window.location.href='salary.php';
                        </script>";
                       
                    }
            }
           else {
            $insert_data_salary = mysqli_query($connection , "insert into salary (name,phone_number,type_of_jop,salary,value_loan,value_salary,date)
            value ('$name','$phone','$jop','$salary','$value_of_loans','$discoun_loans_from_salary','$inp_date1')");
            if($insert_data_salary){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
              //  $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $salary  where id = 1");
                //if($update_safe_bank){
                   $update_take_salary = mysqli_query($connection , "update workers set take_salary ='yes' where id = '$workerid'");
                   if($update_take_salary){
                    echo "<script>alert('Successfully Send Info Salary');
                    window.location.href='salary.php';
                    </script>";
                }
                
            }
        }
        }

    }
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
    <link rel="stylesheet" href="../../../css/manegment/insert to salary.css?v=<?php echo time();?>">
    <title>Salary</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
    <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
            </div>
      <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/eemp.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../workers/add_workers/add_worker.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../expenses/expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../loans/loans.php"><li><img src="../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../mustahqat/add_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">mustahq</li></a>
            <a href="../salary/salary.php"><li class="active"><img src="../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

      </ul>
</div>
<div class="container">
<div class="header">
    <div class="nav">
    <div>
    <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
    <div class="log">
    <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
    </div>
    </div>
</div>
<div class="form">
    <form action="" method="post">
        <div>
        <div class="roww">
            <div class="form-group"> 
                    <label for="" class="lead">Name</label>
                    <input type="text" name="name" value="<?php echo $inp_name ?>" id="" class="form-control"readonly>
                </div>
                <div class="form-group">
                    <label for="" class="lead">Phone Number</label>
                    <input type="text" name="phonenumber" value="<?php echo $inp_phone ?>" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="roww">
                <div class="form-group">
                    <label for="" class="lead">Type Of Jop</label>
                    <input type="text" name="jop" id="" value="<?php if($employeid){ echo $inp_jop;} elseif($tetcherid){echo "Teacher";} elseif($workerid){echo "Worker";} ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="lead">Salary</label>
                    <input type="text" name="salary" value="<?php echo $inp_salary ?>" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="roww">
                <div class="form-group">
                <label for="" class="lead">Value Of Loans</label>
                    <input type="text" name="" id="" value="<?php if($value_of_loans == 0){
                        echo 0;}
                        else{
                            echo $value_of_loans;
                        }
                      ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="lead">Value Of Loans After Expenses</label>
                    <input type="text" name="" id="" value="<?php echo $inp_salary - $value_of_loans ?>" class="form-control" readonly>
                </div>
            </div>
    
            <div class="form-group">
                <input type="submit" value="Send" name="submit" class="btn btn-primary">
            </div>
    </form>
    </div>
</div>
</body>
</html>