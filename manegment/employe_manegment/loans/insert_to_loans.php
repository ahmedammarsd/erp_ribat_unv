<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;
error_reporting(0);   
$employeid = $_GET["employeid"];
$tetcherid = $_GET["tetcherid"];
$workerid = $_GET["workerid"];

if($employeid){

  /*  $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];
*/
   
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
       // $username = $_POST["username"];
        $date = date("Y-m-d"); 

        if($valueloans > $inp_salary){
            echo "<script>alert('Sorry, Value Loan More Than Salary')</script>";
        }
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('Sorry,Values Loans More Than Salary')</script>";
        }
        else{
           
               // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
              //  $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                //if($update_safe_bank){
                  //  header("location: loans.php");
                  echo "<script>alert('Successfully Send Loan');
                  window.location.href='loans.php';</script>";
                
           }
           
         }
    
    }
}

//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------


elseif($tetcherid){

  /*  $display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
    //عرض قيمة النقود في البنك
   $row1=mysqli_fetch_array($display_value_of_bank);
   $value_bank = $row1["total"];
*/
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
       // $username = $_POST["username"];
        $date = date("Y-m-d h:m:s"); 

        if($valueloans > $inp_salary){
            echo "<script>alert('Sorry, Value Loan More Than Salary')</script>";
        }
        /*
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('Sorry,Values Loans More Than Salary')</script>";
        }
        الكود ما كان شغال زي الناس 
        */
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('Sorry,Values Loans More Than Salary')</script>";
        }
        else{
           // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
              //  $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                //if($update_safe_bank){
                  //  header("location: loans.php");
                //}
                echo "<script>alert('Successfully Send Loan');
                window.location.href='loans.php';</script>";
            }
        } 

    }
}

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
   //echo $value_of_loans;
   $big_value_loans = $inp_salary - $value_of_loans;
  
    
    if(isset($_POST["submitt"])){
        $name = $_POST["name"];
        $jop = $_POST["jop"];
        $phone = $_POST["phonenumber"];
        $valueloans = $_POST["valueofloans"];
      //  $username = $_POST["username"];
        $date = date("Y-m-d h:m:s"); 
        if($valueloans > $inp_salary){
            echo "<script>alert('Sorry, Value Loan More Than Salary')</script>";
        }
        /*
        elseif($inp_salary < $value_of_loans){
            echo "<script>alert('عذرا لقد تخطت قيمة القروض المرتب الشهري')</script>";
        }
        */
        elseif($valueloans > $big_value_loans){
            echo "<script>alert('Sorry,Values Loans More Than Salary')</script>";
        }
        else{
           // echo "<script>alert('خطا')</script>";
            $insert_data_loans = mysqli_query($connection , "insert into loans (name_of_take , type_of_job , phone_number , value_of_loans , username , date )
            value ('$name','$jop','$phone','$valueloans','$username','$date')" );
            if($insert_data_loans){
                //بعد الادخال يتم تحديث الخزنه اي الخصم منها
               // $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $valueloans  where id = 1");
                //if($update_safe_bank){
                  //  header("location: loans.php");
                //}
                echo "<script>alert('Successfully Send Loan');
                window.location.href='loans.php';</script>";
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
    <link rel="stylesheet" href="../../../css/manegment/insert_to_loans.css?v=<?php echo time();?>">
    <title>agree loans</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/emp00.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../icons/ath.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../workers/add_workers/add_worker.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../expenses/expenses.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../loans/loans.php"><li class="active"><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">loans</li></a>
            <a href="../mustahqat/add_mustahq.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">mustahq</li></a>
            <a href="../salary/salary.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">salary</li></a>

        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3> <a href="../account/account.php"><img src="../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
        <div class="log">
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">
    <form action="" method="post">
        <div class="roww">
            <div class="form-group">
                <label for="" class="lead">Name</label>
                <input type="text" name="name" value="<?php if($employeid) {echo $inp_name;}
                if($tetcherid){echo $inp_name;} if($workerid){echo $inp_name;} ?>" id="" class="form-control" redonly>
            </div>
            <div class="form-group">
                <label for="" class="lead">Jop Type</label>
                <input type="text" name="jop" id="" value="<?php if($employeid) {echo $inp_jop;}
                if($tetcherid){echo "tetcher";} if($workerid){echo "worker";} ?>" class="form-control" redonly>
            </div>
            <div class="form-group">
                <label for="" class="lead">Phone Number</label>
                <input type="text" name="phonenumber" value="<?php if($employeid){echo $inp_phone;}
                if($tetcherid){echo $inp_phone;}  if($workerid){echo $inp_phone;} ?>" class="form-control" id="" redonly>
            </div>
        </div>
        <div class="roww">
            <div class="form-group">
                <label for="" class="lead">maximun Loan</label>
                <input type="text" name="bigloans" id="" value="<?php if($employeid){echo $big_value_loans;}
                if($tetcherid){echo $big_value_loans;}  if($workerid){echo $big_value_loans;} ?>" id="" class="form-control" redonly>
            </div>
            <div class="form-group bssa">
                <label for="" class="lead">Loan Value</label>
                <input type="text" name="valueofloans" class="form-control" placeholder=" Enter Loan Value">
            </div>
        </div>
            <div class="form-group">
                <input type="submit" value="Send" name="submitt"  class="btn btn-primary">
            </div>
        <div>
        <input type="text" name="username" id="" value="<?php echo $name_user; ?>" hidden>
        </div>
    </form>
</div>
</body>
</html>