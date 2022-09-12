<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/mustahqat.css?v=<?php echo time();?>">

    <title>add mustahq</title>
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
            <a href="#"><li class="active"><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
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
    <form action="recive_mustahaq.php" method="post">
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead">Name </label>
            <input type="text" name="nameoftake" id=""  class="form-control" placeholder="Enter Name">
        </div>
        <div  class="form-group">
        <label for="" class="lead">Select Type Of Jop</label>
          <select name="typeofjop" id=""  class="form-select">
              <option value="none">----  Select Type Of Jop  ----</option>
              <option value="emp">EMPLOYE</option>
              <option value="tetcher">TETCHER</option>
              <option value="worker">WORKER</option>
              <option value="other">OTHER</option>
          </select>
        </div>
        <div  class="form-group">
            <label for="" class="lead">Mustahaqat Value </label>
            <input type="text" name="valuemustahaq" id=""  class="form-control" placeholder=" Enter Mustahaqat Value">
        </div>
</div>
      <!--  <div>
            تحديد الخزنة
            <select name="typeofsafe" id="">
            <option value="none">---SELECT THE SAFE---</option>
                <option value="bank_safe">البنك</option>
                <option value="unv_safe">الخزنة الجامعية</option>
            </select>
            
        </div>
        --->
        <div class="form-group" >
            <input type="submit"  value="Send" name="addmustahaq"  class="btn btn-primary">
        </div>
    </form>
    
</body>
</html>