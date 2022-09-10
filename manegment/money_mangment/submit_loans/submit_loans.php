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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/submit_loans.css?v=<?php echo time();?>">
    <title>add loans</title>
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
            <label for="" class="lead">Balance In Bank</label>
           <input type="text" name="" id="" value="<?php echo $value_bank; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
        <label for="" class="lead">Balance In Safe</label>
        <input type="text" name="" id="" value="<?php echo $value_unv; ?>" class="form-control" readonly>
        </div>
  </div>
</form>
     
    <?php
  echo "
  <div class='info-emp'>
  <table class='table table-striped table-hover'>
  <tr>
    <th>Loan Number</th>
    <th>Name</th>
    <th>Jop</th>
    <th>Value Loan</th>
    <th>Applicant</th>
    <th>Date</th>
    <th></th>
  </tr>
 ";
 $display_data_from_exp = mysqli_query($connection , "select id, name_of_take,type_of_job,phone_number,value_of_loans,username,date from loans where check_accountant='none'");
if(mysqli_num_rows($display_data_from_exp)== 0){
    echo "<script>alert('No Loan For Now')</script>";
}
else{
 while( $row = mysqli_fetch_array($display_data_from_exp)){
  $id = $row['id'];
  $name_of_take = $row['name_of_take'];
  $type_of_job = $row['type_of_job'];
  $phone_number = $row['phone_number'];
  $value_of_loans = $row['value_of_loans'];
  $username = $row['username'];
  $date = $row['date'];

 echo "<tr>";
 echo "<td>".$id."</td>";
 echo "<td>".$name_of_take."</td>";
 echo "<td>".$type_of_job."</td>";
// echo "<td>".$phone_number."</td>";
 echo "<td>".$value_of_loans."</td>";
 echo "<td>".$username."</td>";
 echo "<td>".$date."</td>";
 echo " <td><a href='submit_insert_to_loans.php?id=$id&name_of_take=$name_of_take&type_of_job=$type_of_job&phone_number=$phone_number&value_of_loans=$value_of_loans&username=$username'><button class='btn btn-primary'>View</button></a></td>";
 

  echo "<tr>";
}
}
echo "</table> </div>" ;
    ?>
    
</body>
</html>