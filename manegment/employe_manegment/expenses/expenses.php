<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;
/*$display_value_of_bank = mysqli_query($connection , "select * from safe_monye where id = 1");
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
//عرض رقم الصرف والاضافه عليه للصرف الجديد
$display_number_exp = mysqli_query($connection , "select max(id) as value_id from expenses");
$value_exp = mysqli_fetch_array($display_number_exp);
$the_value_exp = $value_exp["value_id"];


/*if($_GET["select"] == 1){
echo $_SESSION["alert"];
}
if($_GET["select"] == 2){
    echo $_SESSION["alert"];
    
    }
if($_GET["select"] == 3){
    echo $_SESSION["alert"];
    }
    if($_GET["select"] == 4){
        echo $_SESSION["alert"];
        }
        if($_GET["select"] == 5){
            echo $_SESSION["alert"];
            }*/   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/expenses.css?v=<?php echo time();?>">
    <title>expenses</title>
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
            <a href="#"><li class="active"><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../loans/loans.php"><li><img src="../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../mustahqat/add_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">mustahq</li></a>
            <a href="../salary/salary.php"><li><img src="../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3> <a href="../account/account.php"><img src="../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
        <div class="log">
        <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">
    <form action="recive_exp.php" method="post">
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Expense Number</label>
            <input type="text" name="number_expenses" value="<?php echo $the_value_exp + 1 ; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="" class="lead">Expense Type</label>
            <input type="text" name="typeexpens" id="" class="form-control" required>
        </div>
        </div>
        <div class="roww">
        <div class="form-group">
           <label for=""class="lead">Expense Distnation</label>
            <input type="text" name="distnationexpens" id="" class="form-control" required>
        </div>
        <div class="form-group">
           <label for="" class="lead">Expense Value</label>
            <input type="number" name="valueexpens" id="" class="form-control" required>
        </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Send" name="expens" class="btn btn-primary">
        </div>
    </form>
        </div>
        </div>



</body>
</html>