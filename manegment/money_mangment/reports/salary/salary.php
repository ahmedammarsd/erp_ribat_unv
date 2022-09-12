<?php
include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_acc"];
$date_now = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/query_daialy_reports.css">
    <title>Salary Reports</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../../statics/statics.php"><li  class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../../feeding_safe_unv/feeding_safe.php"><li><img src="../../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../../submit_expenses/submit_expenses.php"><li><img src="../../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../../submit_loans/submit_loans.php"><li><img src="../../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
            <a href="../../submit_mustahqat/submit_mustahq.php"><li><img src="../../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
            <a href="../../submit_salary/submit_salary.php"><li><img src="../../../../icons/salary2.png" alt="" width="40px" height="40px">Salary</li></a>            

        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../account/account.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">
    <form action="" method="post">     
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="" class="lead"> Select Year</label>
            <select name="year" id=""  class="form-select">
                <?php
                for($year = date("Y"); $year >= 2000; $year--){
                   echo "<option value='$year'>$year</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <label for="" class="lead"> Select Month</label>
            <select name="month" id=""  class="form-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <input type="submit" value="Search" name="search"  class='btn btn-primary'>
        </div>
    </div>
    </form>
    <table class='table table-striped table-hover'>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Jop Type</th>
            <th>Salary</th>
            <th>Loans</th>
            <th>Salary After Loans</th>
            <th>Accountant</th>
            <th>Date</th>
        </tr>
    <?php
    if(isset($_POST["search"])){
        $year_select = $_POST["year"];
        $month = $_POST["month"];
        $date_select_user = date("$year_select-$month-01");
        $last_date_in_month = date("Y-$month-31");
        //echo $date_select_user;
       $display_report_salary = mysqli_query($connection , "select * from salary where check_accountant='done' && date between '$date_select_user' and '$last_date_in_month'");
       if(mysqli_num_rows($display_report_salary) == 0){
        echo "<script>alert('Sorry, No Reports')</script>";
       }
       else{
       while($row=mysqli_fetch_array($display_report_salary)){
        $name = $row["name"];
        $phone_number = $row["phone_number"];
        $type_of_jop = $row["type_of_jop"];
        $salary = $row["salary"];
        $value_loan = $row["value_loan"];
        $value_salary = $row["value_salary"];
        $accountant_name = $row["accountant_name"];
        $date = $row["date"];
        echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$phone_number."</td>";
        echo "<td>".$type_of_jop."</td>";
        echo "<td>".$salary."</td>";
        echo "<td>".$value_loan."</td>";
        echo "<td>".$value_salary."</td>";
        echo "<td>".$accountant_name."</td>";
        echo "<td>".$date."</td>";
        echo "</tr>";
       }
    }
    }
    ?>
    </table>
</div>
</div>
</body>
</html>