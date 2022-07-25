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
    <link rel="stylesheet" href="../../../css/manegment/subimt_expenses.css?v=<?php echo time();?>">

    <title>Expenses</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../feeding_safe_unv/feeding_safe.php"><li><img src="../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../submit_expenses/submit_expenses.php"><li class="active"><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../submit_loans/submit_loans.php"><li><img src="../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
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
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">
    <form action="" method="post">
        <div class="roww">
                <div class="form-group">
                <label for="" class="lead">Balance In Bank</label>
                <input type="text" name="" id="" value="<?php echo $value_bank; ?>"  class="form-control" readonly>
                </div>
                <div class="form-group">
                <label for="" class="lead">Balance In Safe</label> 
                <input type="text" name="" id="" value="<?php echo $value_unv; ?>"  class="form-control" readonly>
                </div>
        </div>
        </form>
    <?php
  echo "
  <table class='table table-striped table-hover'>
  <tr>
    <th>Expense Number</th>
    <th>Applicant</th>
    <th>Expense Type</th>
    <th>Expense Distnation</th>
    <th>Expense Value</th>
    <th>Date</th>
    <th></th>
  </tr>
 ";
 $display_data_from_exp = mysqli_query($connection , "select id, username,type_exp,distnation_expens,value_exp,date_of_exp from expenses where check_accountant='none'");
if(mysqli_num_rows($display_data_from_exp)== 0){
    echo "<script>alert('No Expenses For Now')</script>";
}
else{
 while( $row = mysqli_fetch_array($display_data_from_exp)){
  $id = $row['id'];
  $username = $row['username'];
  $type_of_exp = $row['type_exp'];
  $distnation_expens = $row['distnation_expens'];
  $value_of_exp = $row['value_exp'];
  $date = $row['date_of_exp'];

 echo "<tr>";
 echo "<td>".$id."</td>";
 echo "<td>".$username."</td>";
 echo "<td>".$type_of_exp."</td>";
 echo "<td>".$distnation_expens."</td>";
 echo "<td>".$value_of_exp."</td>";
 echo "<td>".$date."</td>";
 echo " <td><a href='recive_exp_for_submit.php?id=$id&username=$username&type_of_exp=$type_of_exp&distnation_expens=$distnation_expens&value_of_exp=$value_of_exp&name_user=$name_user'><button class='btn btn-primary'>View</button></a></td>";
 

  echo "<tr>";
}
}
echo "</table>" ;
    ?>
</div>
</div>
</body>
</html>