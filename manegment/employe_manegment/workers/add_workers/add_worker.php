<?php
session_start();
$name_user = $_SESSION["full_name"];
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
    <link rel="stylesheet" href="../../../../css/manegment/mustahqat.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
<h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
        </div>
            <ul>
            <a href="../../statics/statics.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li><img src="../../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="#"><li  class="active"><img src="../../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../../expenses/expenses.php"><li><img src="../../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../../loans/loans.php"><li><img src="../../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../../mustahqat/add_mustahq.php"><li><img src="../../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
            <a href="../../salary/salary.php"><li><img src="../../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

            </ul>
        </div>
<div class="container">
<div class="header">
    <div class="nav">
    <div>
    <h3><a href="../../account/account.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
    <div class="log">
    <a href="../../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
    </div>
    </div>
</div>
<div class="form">
    <form action="recive_of_worker.php" method="post">
        <div class='roww'>
                <div class="form-group">
                    <label for="" class="lead">Full Name</label>
                    <input type="text" name="fullname" id="" placeholder="Enter Full Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="lead"> Phone Number</label>
                    <input type="number" name="phone" id=""  placeholder="Enter Phone Number" class="form-control" required>
                </div>
        </div>
        <div class='roww'>
                <div class="form-group">
                    <label for="" class="lead">Address</label>
                    <input type="text" name="address" id=""  placeholder="Enter Address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="lead"> Salary</label>
                    <input type="number" name="salary" id=""  placeholder="Enter Salary" class="form-control" required>
                </div>
        </div>
            <div>
                <input type="submit" value="Add" name="addworker" class='btn btn-primary'>
            </div>
    </form>
</div>
</body>
</html>