<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_acc"];

$display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
$display_value_of_unv = mysqli_query($connection , "select * from safe_monye where id = 2");
//عرض قيمة النقود في البنك
$row = mysqli_fetch_array($display_value_of_bank);
$value_bank = $row["total"];
//$_SESSION["valuebank"] = $row["total"];

//عرض قيمة النقود في الخزنة
$row2 = mysqli_fetch_array($display_value_of_unv);
$value_unv = $row2["total"];
//$_SESSION["valueunv"] = $row["total"];
/*
if($_GET["selects"] == 1){
    echo $_SESSION["alertf"];
}
if($_GET["selects"] == 2){
    echo $_SESSION["alertf"];
}
//عرض الرصيد الحالي في البنك
$display_total_bank_safe = mysqli_query($connection , "select safe from bank_safe");
$row = mysqli_fetch_array($display_total_bank_safe);
$value_bank = $row["safe"];

 //عرض الرصيد الحالي في خزنة الجامعة
 $display_total_unv_safe = mysqli_query($connection , "select safe from unv_safe");
 $row2 = mysqli_fetch_array($display_total_unv_safe);
 $value_unv = $row2["safe"];

if($_GET["selects"] == 1){
    echo $_SESSION["alert"];
}
if($_GET["selects"] == 2){
    echo $_SESSION["alert"];
}
*/
/*
if($_GET["selects"] == 1){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 2){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 3){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 4){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 5){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 6){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 7){
    echo $_SESSION["alertfeeding"];
}
if($_GET["selects"] == 8){
    echo $_SESSION["alertf"];
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
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../css/manegment/feeding_safe.css?v=<?php echo time();?>">

    <title>feeding</title>
</head>
<body>    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="#"><li class="active"><img src="../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../submit_expenses/submit_expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../submit_loans/submit_loans.php"><li><img src="../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
            <a href="../submit_mustahqat/submit_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
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
<div class="form-change">
    <form action="recive_feeding.php" method="post">
        <div class="form-group">
                <label for="" class="lead">Balance in Bank</label>
                <input type="text" name="" id="" value="<?php echo $value_bank; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="" class="lead">Balance in Safe</label> 
                <input type="text" name="" id="" value="<?php echo $value_unv; ?>"  class="form-control" readonly>
            </div>
        <div class="form-group">
        <label for="" class="lead">Feeding Safe</label>
            <input type="text" name="feddingvalue" id="" class="form-control" required>
        </div>

     <!--   تم الالغاء نظرا لبعض المشاكل في عمليات التحويلات بين البنك والخزنة
         <div>
            FROM
            <select name="fromsafe" id="">
                <option value="none">----SELECT THE SAFE----</option>
                <option value="banksafe">BANK</option>
                <option value="unvsafe">UNV SAFE</option>
            </select>
        </div>
        <div>
           TO
            <select name="tosafe" id="">
                <option value="none">----SELECT THE SAFE----</option>
                <option value="banksafe">BANK</option>
                <option value="unvsafe">UNV SAFE</option>
            </select>
        </div>
-->
        <div class="form-group">
            <input type="submit" value="Feeding" name="feeding" class="btn btn-primary">
        </div>
        <div>
            <input type="text" name="usernmae" id="" value="محمد عبدالمتعال" hidden>
        </div>
    </form>
</div>
</div>
</body>
</html>