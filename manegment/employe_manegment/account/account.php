<?php
include "../../../connection/connection.php";
session_start();
//info about hr
$name_user = $_SESSION["full_name"] ;
 $display_info_emp = mysqli_query($connection , "select * from employes where full_name='$name_user'");
 $row = mysqli_fetch_array($display_info_emp);
   $name_admin = $row["full_name"];
   $phone_number = $row["phone_number"];
   $email = $row["email"];
   $address = $row["address"];
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
    <link rel="stylesheet" href="../../../css/manegment/account.css?v=<?php echo time();?>">
    <title>Personal Page Admin</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
    <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
            </div>
            <ul>   
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../workers/add_workers/add_worker.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../expenses/expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../loans/loans.php"><li><img src="../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../mustahqat/add_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
            <a href="../salary/salary.php"><li><img src="../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

            </ul>
        </div>
        <div class="container">
            <div class="header">
            </div>
            <div class="container">
        <div class="header">
            <div class="nav">
               <div>
               <h3><img src="../../../icons/account.png" alt="" width="40px" height="40px"><?php echo " " . $name_user ?></h3>
                           </div>
               <div class="log">
                <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
            </div>
        </div>
        <div class="info">
    <div class="info-two">
          <h3> NAME </h3>
          <h3>  <?php
            echo $name_admin;
            ?></h3>  
    </div>
    <div class="info-two">
          <h3>  PHONE NUMBER </h3>
          <h3> <?php
            echo $phone_number;
            ?></h3>  
    </div>
    <div class="info-two">
          <h3>EMAIL</h3>
          <h3>
            <?php
            echo $email;
            ?></h3>  
    </div>
    <div class="info-two">
       <h3> ADDRESS</h3>
       <h3><?php
            echo $address;
            ?></h3>  
    </div>
</div>
<div class="change">
            <a href='../change_password/change_password.php'><input type='submit' value='Change Password' class="btn btn-danger"></a>
            
        </div>
</div>
  
       
</body>
</html>