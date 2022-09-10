<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_acc"];

/*$employeid = $_GET["employeid"];
$tetcherid = $_GET["tetcherid"];
$workerid = $_GET["workerid"];
if($employeid){
    $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];
//عرض البيانات لادخالها في بعدين في جدو ل القروض
    $display_data_emp = mysqli_query($connection , "select full_name,phone_number,type_of_jop,salary from employes where id = '$employeid' and del='no' ");
    //لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
    $row = mysqli_fetch_array($display_data_emp);
    //تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
    $inp_name = $row["full_name"];
    $inp_phone = $row["phone_number"];
     $inp_jop = $row["type_of_jop"];
    $inp_salary = $row["salary"];
    //عرض مجموع القروض واضافة شرط اذا تخطت قيمة القروض المرتب الشهري على اسم ورقم الموظف
   $display_total_loans = mysqli_query($connection , "select  sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='$inp_jop' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
   $row2 = mysqli_fetch_array($display_total_loans);
   $value_of_loans = $row2["val"];
  // echo $value_of_loans;
   $big_value_loans = $inp_salary - $value_of_loans;
  // echo $big_value_loans;   
    if(isset($_POST["submitt"])){
        $name = $_POST["name"];
        $jop = $_POST["jop"];
        $phone = $_POST["phonenumber"];
        $valueloans = $_POST["valueofloans"];
        $username = $_POST["username"];
        $date = date("Y-m-d h:m:s"); 

        if($valueloans > $value_bank){
            echo "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
        }
        elseif($valueloans > $inp_salary){
            echo "<script>alert('قيمة السلفية اكبر من المرتب')</script>";
        }
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        else{
           
               // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                if($update_safe_bank){
                    header("location: loans.php");
                }
            
           }
           
         }
    
    }
}
//------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
elseif($tetcherid){

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
    // $inp_jop = $row["type_of_jop"];
    $inp_salary = $row["salary"];

     //عرض مجموع القروض واضافة شرط اذا تخطت قيمة القروض المرتب الشهري على اسم ورقم الموظف
   $display_total_loans = mysqli_query($connection , "select  sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='tetcher' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
   $row2 = mysqli_fetch_array($display_total_loans);
   $value_of_loans = $row2["val"] ;
   $big_value_loans = $inp_salary - $value_of_loans;
  
    
    if(isset($_POST["submitt"])){
        $name = $_POST["name"];
        $jop = $_POST["jop"];
        $phone = $_POST["phonenumber"];
        $valueloans = $_POST["valueofloans"];
        $username = $_POST["username"];
        $date = date("Y-m-d h:m:s"); 

        if($valueloans > $value_bank){
            echo "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
        }
        elseif($valueloans > $inp_salary){
            echo "<script>alert('قيمة السلفية اكبر من المرتب')</script>";
        }
      /*  elseif($value_of_loans > $inp_salary){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        الكود ما كان شغال زي الناس 
        
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        else{
           // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                if($update_safe_bank){
                    header("location: loans.php");
                }
            }
        } 
    }}
//----------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------
elseif($workerid){
    $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];
    $display_data_worker = mysqli_query($connection , "select name_worker,phone_number,salary from workers where id = '$workerid' and del='no' ");
    //لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
    $row = mysqli_fetch_array($display_data_worker);
    //تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
    $inp_name = $row["name_worker"];
    $inp_phone = $row["phone_number"];
    // $inp_jop = $row["type_of_jop"];
    $inp_salary = $row["salary"];
     //عرض مجموع القروض واضافة شرط اذا تخطت قيمة القروض المرتب الشهري على اسم ورقم الموظف
   $display_total_loans = mysqli_query($connection , "select  sum(value_of_loans) as val from loans where name_of_take ='$inp_name' and type_of_job='worker' and phone_number='$inp_phone' and status_of_discount_from_salary='no'");
   $row2 = mysqli_fetch_array($display_total_loans);
   $value_of_loans = $row2["val"] ;
   echo $value_of_loans;
   $big_value_loans = $inp_salary - $value_of_loans;
    if(isset($_POST["submitt"])){
        $name = $_POST["name"];
        $jop = $_POST["jop"];
        $phone = $_POST["phonenumber"];
        $valueloans = $_POST["valueofloans"];
        $username = $_POST["username"];
        $date = date("Y-m-d h:m:s"); 

        if($valueloans > $value_bank){
            echo "<script>alert('الرجاء مراجعة الحساب البنكي')</script>";
        }
        elseif($valueloans > $inp_salary){
            echo "<script>alert('قيمة السلفية اكبر من المرتب')</script>";
        }
        /*
        elseif($inp_salary < $value_of_loans){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        else{
           // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
                $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                if($update_safe_bank){
                    header("location: loans.php");
                }
            }
        } 

    }
}
*/
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
$name_of_take = $_GET['name_of_take'];
$type_of_job = $_GET['type_of_job'];
$phone_number = $_GET['phone_number'];
$value_of_loans = $_GET['value_of_loans'];
$username = $_GET['username'];

if(isset($_POST["submit"])){
    $safe = $_POST["safe"];
    if($safe == "none"){
        echo "<script>alert('Sorry, Please Select Safe Type');
       </script>";
    }
    // خصم من البنك
    if($safe == "bank_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($value_of_loans > $value_bank){
            echo "<script>alert('Sorry, Please Check Account Bank');
            window.location.href='submit_loans.php';</script>";
        }
        else{
                    $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $value_of_loans  where id = 1");
                    if($update_safe_bank){
                        $update_check_accountant = mysqli_query($connection ,"update loans set loan_from='$safe',account_name='$name_user' , check_accountant='done' where id=$id && username='$username' && value_of_loans='$value_of_loans'");
                        if($update_check_accountant){
                            echo "<script>alert('Successfully Confirm Loan');
                            window.location.href='submit_loans.php';</script>";
                        }
                    }
                }
            }
            if($safe == "unv_safe"){
                //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
                if($value_of_loans > $value_bank){
                    echo "<script>alert('Sorry, Please Check Safe Univirsty');
                    window.location.href='submit_loans.php';</script>";
                }
                else{
                            $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_unv - $value_of_loans  where id = 2");
                            if($update_safe_bank){
                                $update_check_accountant = mysqli_query($connection ,"update loans set loan_from='$safe',account_name='$name_user' , check_accountant='done' where id=$id && username='$username' && value_of_loans='$value_of_loans'");
                                if($update_check_accountant){
                                    echo "<script>alert('Successfully Confirm Loan');
                                    window.location.href='submit_loans.php';</script>";
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
    <link rel="stylesheet" href="../../../css/manegment/submit_insert_to_loans.css?v=<?php echo time();?>">

    <title>Agree Loans</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../feeding_safe_unv/feeding_safe.php"><li><img src="../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../submit_expenses/submit_expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../submit_loans/submit_loans.php"><li class="active"><img src="../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
            <a href="../submit_mustahqat/submit_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">mustahq</li></a>
            <a href="../submit_salary/submit_salary.php"><li><img src="../../../icons/salary2.png" alt="" width="40px" height="40px">Salary</li></a>            

        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
        <div class="log">
        <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
<div class="form">

<form action="" method="post">
    <div  class="roww">
            <div  class="form-group">
            <label for="" class="lead">Loan Number</label>
            <input type="text" name="number_expenses" value="<?php echo $id?>" class="form-control" readonly>
            </div>
        <div  class="form-group">
            <label for="" class="lead">Name</label>
            <input type="text" name="number_expenses" value="<?php echo $name_of_take?>"  class="form-control"readonly>
        </div>
        <div  class="form-group">
            <label for="" class="lead">Jop</label>
            <input type="text" name="typeexpens" id="" value="<?php echo $type_of_job?>" class="form-control" readonly>
        </div>
    </div>
     <div  class="roww">
        <div  class="form-group">
           <label for="" class="lead">Phone Number</label>
            <input type="text" name="distnationexpens" value="<?php echo $phone_number?>" id="" class="form-control" readonly>
        </div>
        <div  class="form-group">
           <label for="" class="lead">Loan Value</label>
            <input type="number" name="valueexpens" id="" value="<?php echo $value_of_loans?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="" class="lead">Applicant</label>
            <input type="text" name="number_expenses" value="<?php echo $username?>" class="form-control" readonly>
        </div>
        </div>
        <div  class="form-group"> 
        <label for="" class="lead">Safe Type</label>
 <select name='safe' class="form-select">
     <option value='none'> SELECT THE SAFE </option>
     <option value='bank_safe'>Account Bank</option>
     <option value='unv_safe'>Safe Univirsty</option>
 </select>
 </div>
 <div class="form-group">
    <input type="submit" value="Confirm" name="submit"  class='btn btn-primary'>
 </div>
    </form>

  <!--  <form action="" method="post">
        <div>
            <input type="text" name="name" value="<?php /*($employeid) {echo $inp_name;}
            if($tetcherid){echo $inp_name;} if($workerid){echo $inp_name;} ?>" id="" redonly>

            <input type="text" name="jop" id="" value="<?php if($employeid) {echo $inp_jop;}
            if($tetcherid){echo "tetcher";} if($workerid){echo "worker";} ?>" redonly>

            <input type="text" name="phonenumber" value="<?php if($employeid){echo $inp_phone;}
            if($tetcherid){echo $inp_phone;}  if($workerid){echo $inp_phone;} ?>" id="" redonly>
            <br>
            الحد الاقصى للسلفية
            <input type="text" name="bigloans" id="" value="<?php if($employeid){echo $big_value_loans;}
            if($tetcherid){echo $big_value_loans;}  if($workerid){echo $big_value_loans;}*/ ?>" id="" redonly>
            <br>
            قيمة السلفية<input type="text" name="valueofloans" >
            <input type="text" name="username" id="" value="محمد عبد المتعال" hidden>
        </div>
        <div>
            <input type="submit" value="تاكيد" name="submitt">
            
        </div>
    </form>
    -->
</body>
</html>