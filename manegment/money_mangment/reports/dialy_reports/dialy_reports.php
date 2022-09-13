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
    <link rel="stylesheet" href="../../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../../css/manegment/dialy_reports.css?v=<?php echo time();?>">

    <title>Dialy Reports</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Accountant</h2>
                </div>
        <ul>
            <a href="../../statics/statics.php"><li class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../../feeding_safe_unv/feeding_safe.php"><li><img src="../../../../icons/safe_in.png" alt="" width="40px" height="40px"> Feeding Safe </li></a>
            <a href="../../submit_expenses/submit_expenses.php"><li><img src="../../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../../submit_loans/submit_loans.php"><li><img src="../../../../icons/loans1.png" alt="" width="40px" height="40px">Loans</li></a>
            <a href="../../submit_mustahqat/submit_mustahq.php"><li ><img src="../../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
            <a href="../../submit_salary/submit_salary.php"><li ><img src="../../../../icons/salary2.png" alt="" width="40px" height="40px">Salary</li></a>            

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
    <div class="roww">
    <div class="form-group">
        <select name="reports" id="" class="form-select">
            <option value="none">---SELECT REPORTS---</option>
            <option value="exp">Expenses</option>
            <option value="loans">Loans</option>
            <option value="mustahqat">mustahaqat</option>  
            <option value="fees_std">Student Registaration Fee</option>  
        </select>
</div>
<div class="form-group">
        <input type="submit" value="Search" name="ser" class='btn btn-primary'>

    </div>  
    </div>
    </form>
    <?php
    if(isset($_POST["ser"])){
        $report_type = $_POST["reports"];

        if($report_type === "none"){
            echo "<script>alert('Please Selact Report Type')</script>";
        }
        elseif($report_type === "exp"){
            echo "
            <table class='table table-striped table-hover'>
            <tr>
              <th>User Name</th>
              <th>Expens Type</th>
              <th>Expens Value</th>
              <th>Form</th>
              <th>Date</th>
            </tr>
           ";
           $display_data_from_exp = mysqli_query($connection , "select username,type_exp,value_exp,exp_from,date_of_exp from expenses where date_of_exp='$date_now'");

           while( $row = mysqli_fetch_array($display_data_from_exp)){
            $username = $row['username'];
            $type_of_exp = $row['type_exp'];
            $value_of_exp = $row['value_exp'];
            $safe = $row['exp_from'];
            $date = $row['date_of_exp'];
    
           echo "<tr>";
           echo "<td>".$username."</td>";
           echo "<td>".$type_of_exp."</td>";
           echo "<td>".$value_of_exp."</td>";
           echo "<td>".$safe."</td>";
           echo "<td>".$date."</td>";

            echo "<tr>";
        }
        echo "</table>" ;
        echo "<br>";

        $display_total_from_exp = mysqli_query($connection , "select sum(value_exp) AS total_exp from expenses where date_of_exp='$date_now'");
        $row_exp = mysqli_fetch_array($display_total_from_exp);
        $total_exp = $row_exp["total_exp"];
        echo "<div class='alert alert-primary'>Total Expenses :" . $total_exp . "</div>";
        

     
    }
    elseif($report_type === "loans"){
        echo "
        <table class='table table-striped table-hover'>
        <tr>
          <th>Name</th>
          <th>Jop Type</th>
          <th>Phone number</th>
          <th>Loans Value</th>
          <th>User Name</th>
          <th>Date</th>
        </tr>
       ";
       $display_data_from_loans = mysqli_query($connection , "select name_of_take,type_of_job,phone_number,value_of_loans,username,date from loans where date='$date_now'");

       while( $row = mysqli_fetch_array($display_data_from_loans)){
        $name_of_take = $row['name_of_take'];
        $type_of_job = $row['type_of_job'];
        $phone_number = $row['phone_number'];
        $value_of_loans = $row['value_of_loans'];
        $username = $row['username'];
        $date = $row['date'];

       echo "<tr>";
       echo "<td>".$name_of_take."</td>";
       echo "<td>".$type_of_job."</td>";
       echo "<td>".$phone_number."</td>";
       echo "<td>".$value_of_loans."</td>";
       echo "<td>".$username."</td>";
       echo "<td>".$date."</td>";

        echo "<tr>";
    }
    echo "</table>" ;
    echo "<br>";
    $display_total_from_loans = mysqli_query($connection , "select sum(value_of_loans) AS total_loans from loans where date='$date_now'");
    $row_loans = mysqli_fetch_array($display_total_from_loans);
    $total_loans = $row_loans["total_loans"];
    echo "<div class='alert alert-primary'>Total Loans:" . $total_loans . "<div";
 
}

elseif($report_type === "mustahqat"){
    echo "
    <table class='table table-striped table-hover'>
    <tr>
      <th>Name</th>
      <th>Jop Type</th>
      <th>Phone number</th>
      <th>mustahqat Value</th>
      <th>User Name</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
   ";
   $display_data_from_mustahqat = mysqli_query($connection , "select name_of_take , type_jop ,value_mustahqat ,type_safe ,user_name ,date_of_mus ,hours_of_mus from mustahqat where date_of_mus='$date_now'");

   while($row = mysqli_fetch_array($display_data_from_mustahqat)){
    $name_of_take = $row['name_of_take'];
    $type_of_job = $row['type_jop'];
    $value_mustahqat = $row['value_mustahqat'];
    $type_safe = $row['type_safe'];
    $username = $row['user_name'];
    $date = $row['date_of_mus'];
    $hours = $row['hours_of_mus'];

   echo "<tr>";
   echo "<td>".$name_of_take."</td>";
   echo "<td>".$type_of_job."</td>";
   echo "<td>".$value_mustahqat."</td>";
   echo "<td>".$type_safe."</td>";
   echo "<td>".$username."</td>";
   echo "<td>".$date."</td>";
   echo "<td>".$hours."</td>";

    echo "<tr>";
}
echo "</table>" ;
    echo "<br>";
    $display_total_from_mustahqat = mysqli_query($connection , "select sum(value_mustahqat) AS total_mus from mustahqat where date_of_mus='$date_now'");
    $row_mus = mysqli_fetch_array($display_total_from_mustahqat);
    $total_mus = $row_mus["total_mus"];
    echo "<div class='alert alert-primary'>Total mustahqat :" . $total_mus . "</div>";

}
elseif($report_type === "fees_std"){
    echo "
    <table class='table table-striped table-hover'>
    <tr>
      <th>Unv ID</th>
      <th>Name Student</th>
      <th>Batch</th>
      <th>Certifcate</th>
      <th>Register For Semester</th>
      <th>Paid</th>
      <th>Date</th>
    </tr>
   ";
   $display_data_fees_std = mysqli_query($connection , "select * from std_reg_fees where date='$date_now'");

   while($row = mysqli_fetch_array($display_data_fees_std)){
         
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $status = $row['status'];
    $reg_for_semester = $row['reg_for_semester'];
    $total_pay = $row['total_pay'];
    $date = $row['date'];

   echo "<tr>";
   echo "<td>".$unv_id."</td>";
   echo "<td>".$name_std."</td>";
   echo "<td>".$batch."</td>";
   echo "<td>".$type_certifcate_unv."</td>";
   echo "<td>".$reg_for_semester."</td>";
   echo "<td>".$total_pay."</td>";
   echo "<td>".$date."</td>";
    echo "<tr>";
}
echo "</table>" ;
    echo "<br>";
    $display_total_from_fees = mysqli_query($connection , "select sum(total_pay) AS total_fees from std_reg_fees where date='$date_now'");
    $row_fees = mysqli_fetch_array($display_total_from_fees);
    $total_fees = $row_fees["total_fees"];
    echo "<div class='alert alert-primary'>Total Fees :" . $total_fees . "</div>";

}
    
    }
       
     /*   
        $display_total_from_exp = mysqli_query($connection , "select sum(value_exp) AS total_exp from expenses where date_of_exp='$date_now'");
        $row_exp = mysqli_fetch_array($display_total_from_exp);
        $total_exp = $row_exp["total_exp"];


        $display_total_from_loans = mysqli_query($connection , "select sum(value_of_loans) AS total_loans from loans where date='$date_now'");
        $row_loans = mysqli_fetch_array($display_total_from_loans);
        $total_loans = $row_loans["total_loans"];


        $display_total_from_mustahqat = mysqli_query($connection , "select sum(value_mustahqat) AS total_mus from mustahqat where date_of_mus='$date_now'");
        $row_mus = mysqli_fetch_array($display_total_from_mustahqat);
        $total_mus = $row_mus["total_mus"];

        echo "<br><br><br>";
        echo "مجموع المصروفات :" . $total_exp . "<br>";
        echo "مجموع السلفيات :" . $total_loans . "<br>";
        echo "مجموع المستحقات :" . $total_mus . "<br><br>";
        echo "المجموع الكلي :";
        echo $total_exp + $total_loans + $total_mus ."<br>";
*/
    ?>
    </div>
</body>
</html>