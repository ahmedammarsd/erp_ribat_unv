<?php
include "../../../connection/connection.php";
session_start();
$user_name = $_SESSION["username_hr"]; 
$display_info_user = mysqli_query($connection , "select full_name from employes where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name"] = $name_user;


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
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
                </div>
        <ul>
            <a href="#"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/eemp.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../workers/add_workers/add_worker.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../expenses/expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
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
<div class="content">
                <div class="cards">
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $num_emp;  ?></h1>
                            <h3>Employes</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/emp11.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../employes/edit_of_emp/edit_of_emp.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $num_tetchers;  ?></h1>
                            <h3>Teachers</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/th2.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../tetchers/edit_tetcher/edit_tetcher.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1><?php echo $num_workers;  ?></h1>
                            <h3>Workers</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/wk.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                            <a href="../workers/edit_of_worker/edit_of_worker.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
              </div>  
           </div>
        </div>
</body>
</html>