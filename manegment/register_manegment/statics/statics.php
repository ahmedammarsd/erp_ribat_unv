<?php
include "../../../connection/connection.php";
session_start();
$user_name =$_SESSION["username_reg"]; 
$display_info_user = mysqli_query($connection , "select full_name from employes where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_reg"] = $name_user;
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
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../add_subject/add_subject.php"><li><img src="../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../subjects_distribution/subjects_distribution.php"><li><img src="../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../fees_for_batchs/fees_for_batchs.php"><li><img src="../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
            <a href="../exams/distribution_tetcher_for_subject/distribution_tetcher_for_subject.php"><li><img src="../../../icons/dt.png" alt="" width="40px" height="40px">Teacher Distribution</li></a>
        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
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
                            <h3>Query student</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/qs1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../reports/query_std/query_std.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>Batchs</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/loans2.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="../reports/reg_std/reg_std.php"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3> 2</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/mustahq1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="#"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
              </div>  
           </div>
        </div>
</body>
</html>