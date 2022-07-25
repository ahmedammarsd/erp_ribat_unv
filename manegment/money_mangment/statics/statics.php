<?php
include "../../../connection/connection.php";
session_start();
$user_name =$_SESSION["username_acc"]; 
$display_info_user = mysqli_query($connection , "select full_name from employes where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_acc"] = $name_user;


$display_num_user_emp = mysqli_query($connection , "select full_name from employes where del='no'");
$num_emp = mysqli_num_rows($display_num_user_emp);
$display_num_user_tetcher = mysqli_query($connection , "select * from tetchers where del='no'");
$num_tetchers = mysqli_num_rows($display_num_user_tetcher);
$display_num_user_worker = mysqli_query($connection , "select name_worker from workers where del='no'");
$num_workers = mysqli_num_rows($display_num_user_worker);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/statics.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../feeding_safe_unv/feeding_safe.php"><li><img src="../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../submit_expenses/submit_expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
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
<div class="content">
                <div class="cards">
                    <div class="card">
                        <div class="box"><br>
                            <h3>Dialy Reports</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/Expenses1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../reports/dialy_reports/dialy_reports.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Query Dialy Reports</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/loans2.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../reports/dialy_reports/query_daialy_reports.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Period Reports</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/mustahq1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../reports/period_reports/period_reports.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Salary</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/salary3.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                            <a href="../reports/salary/salary.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Payments</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/salary3.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                            <a href="../reports/payment_std/payment_std.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Query Student</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/salary3.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                            <a href="../reports/query_std/query_std.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
              </div>  
           </div>
        </div>
</body>
</html>