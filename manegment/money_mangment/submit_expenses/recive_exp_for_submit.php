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
//$_SESSION["valueunv"] = $row["total"];
    $id = $_GET["id"];
    $username = $_GET["username"];
    $type_of_exp = $_GET["type_of_exp"];
    $distnation_expens = $_GET["distnation_expens"];
    $value_of_exp = $_GET["value_of_exp"];
if(isset($_POST["submit"])){
    $safe = $_POST["safe"];
    if($safe == "none"){
      //  header("location: expenses.php?select=1");
        //$_SESSION['alert'] = "<script>alert('عذرا الرجاء تحديد الخزنة المسحوب منها')</script>";
        echo "<script>alert('Sorry, Please Select Safe Type');
       </script>";

    }

    // خصم من البنك
    if($safe == "bank_safe"){
        //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
        if($value_of_exp > $value_bank){
            //header("location: expenses.php?select=2");
            //$_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";  
            echo "<script>alert('Sorry, Please Check Account Bank');
            window.location.href='submit_expenses.php';</script>";
      
        }
        else{
          /*  //اذا اصغر يتم الادخال البيانات
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
                    */
                    $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_bank - $value_of_exp  where id = 1");
                    if($update_safe_bank){
                        $update_check_accountant = mysqli_query($connection ,"update expenses set exp_from='$safe',name_accountant='$name_user' , check_accountant='done' where id=$id && username='$username' && value_exp='$value_of_exp'");
                        if($update_check_accountant){
                            echo "<script>alert('Successfully Confirm Expense');
                            window.location.href='submit_expenses.php';</script>";
                        }
                    }
                }
            }
            if($safe == "unv_safe"){
                //في حالة القيمة المدخلة اكبر من الموجوده في البنك يحصل خطا
                if($value_of_exp > $value_bank){
                    //header("location: expenses.php?select=2");
                    //$_SESSION['alert'] = "<script>alert('قيمة الخصم اكبر من  الموجودة في الحساب')</script>";  
                    echo "<script>alert('Sorry, Please Check Safe Univirsty');
                    window.location.href='submit_expenses.php';</script>";
              
                }
                else{
                  /*  //اذا اصغر يتم الادخال البيانات
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
                            */
                            $update_safe_bank = mysqli_query($connection, "update safe_monye set total =$value_unv - $value_of_exp  where id = 2");
                            if($update_safe_bank){
                                $update_check_accountant = mysqli_query($connection ,"update expenses set exp_from='$safe',name_accountant='$name_user' , check_accountant='done' where id=$id && username='$username' && value_exp='$value_of_exp'");
                                if($update_check_accountant){
                                    echo "<script>alert('Successfully Confirm Expense');
                                    window.location.href='submit_expenses.php';</script>";
                                }
                            }
                        }
                    }
        }            
    /* // خصم من الجامعة
     if($safe == "unv_safe"){
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/submit_insert_to_loans.css?v=<?php echo time();?>">
    <title>Submit Expense</title>
</head>
<body>
<form action="" method="post">
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../feeding_safe_unv/feeding_safe.php"><li><img src="../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../submit_expenses/submit_expenses.php"><li class="active"><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../submit_loans/submit_loans.php"><li ><img src="../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
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
            <div class="form-group">
            <label for=""  class="lead">Expense Number</label>
            <input type="text" name="number_expenses" value="<?php echo $id?>" class="form-control" readonly>
            </div>
        <div class="form-group">
            <label for=""  class="lead">Applicant</label>
            <input type="text" name="number_expenses" value="<?php echo $username?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for=""  class="lead">Expense Type</label>
            <input type="text" name="typeexpens" id="" value="<?php echo $type_of_exp?>" class="form-control" readonly>
        </div>
    </div>
    <div  class="roww">
        <div class="form-group">
           <label for=""  class="lead">Expense Distnation</label>
            <input type="text" name="distnationexpens" value="<?php echo $distnation_expens?>" class="form-control" id="" readonly>
        </div>
        <div class="form-group">
           <label for=""  class="lead">Expense Value</label>
            <input type="number" name="valueexpens" id="" value="<?php echo $value_of_exp?>" class="form-control" readonly>
        </div>
        <div class="form-group"> 
        <label for=""  class="lead">Safe Type</label>
        <select name='safe' class="form-select">
            <option value='none'>---SELECT THE SAFE---</option>
            <option value='bank_safe'>Account Bank</option>
            <option value='unv_safe'>Safe Univirsty</option>
        </select>
 </div>
</div>
 <div class="form-group">
    <input type="submit" value="Confirm" name="submit" class='btn btn-primary'>
 </div>
    </form>
</body>
</html>