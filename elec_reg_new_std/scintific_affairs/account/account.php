<?php
include "../../../connection/connection.php";
session_start();
//info about 
$name_user = $_SESSION["full_name_scientific_affairs"];
$display_info_admin = mysqli_query($connection, "select * from scientific_affairs_admins where full_name='$name_user'");
$display_info_emp = mysqli_query($connection, "select * from scientific_affairs_employes where full_name='$name_user'");
if (mysqli_num_rows($display_info_admin) == 1) {
    $row = mysqli_fetch_array($display_info_admin);
    $name_admin = $row["full_name"];
    $phone_number = $row["phone_number"];
    $email = $row["email"];
    $address = $row["address"];
} elseif (mysqli_num_rows($display_info_emp) == 1) {
    $row = mysqli_fetch_array($display_info_emp);
    $name_admin = $row["full_name"];
    $phone_number = $row["phone_number"];
    $email = $row["email"];
    $address = $row["address"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../../css/manegment/account.css">
    <title>Personal Page</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
        </div>
        <ul>
            <a href="../statics/statics.php">
                <li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li>
            </a>
            <a href="../info_std_electronic_register/info_std_electronic_register.php">
                <li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li>
            </a>
            <a href="../report_review_info_stds_done/report_review_info_stds_done.php">
                <li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Reports</li>
            </a>
            <a href="../../admin/statics/statics.php">
                <li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Admin</li>
            </a>
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
                        <a href="../../logout/logout.php">
                            <div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info-two">
                    <h3> NAME </h3>
                    <h3> <?php
                            echo $name_admin;
                            ?></h3>
                </div>
                <div class="info-two">
                    <h3> PHONE NUMBER </h3>
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