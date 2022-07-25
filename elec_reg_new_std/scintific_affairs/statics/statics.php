<?php
include "../../../connection/connection.php";
session_start();
$user_name =$_SESSION["user_admin_scientific_affairs"]; 
$display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_scientific_affairs"] = $name_user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/scintific_affairs/statics.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scintific Affairs</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li class="active"><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
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
                            <h3>1</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/Expenses1.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="#"><button class="btn btn-primary">View</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box"><br>
                            <h3>1</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/loans2.png" alt="" srcset=""  width="70px" height="70px">
                        </div>
                        <div>
                           <a href="#"><button class="btn btn-primary">View</button></a>
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
                    <div class="card">
                        <div class="box"><br>
                            <h3>3</h3>
                        </div>
                        <div class="icon-case">
                            <img src="../../../icons/salary3.png" alt="" srcset=""  width="70px" height="70px">
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