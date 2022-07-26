<?php
include "../../../../connection/connection.php";
session_start();
//info about admin
$name_admin = $_SESSION["full_name_scientific_affairs"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/edit_emp.css?v=<?php echo time(); ?>">
    <title>Edit Information Admin</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
<h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
        </div>
            <ul>    
            <a href="../../statics/statics.php"><li class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li><img src="../../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe</li></a>
            <a href="../../doctors/add_doctor/add_doctor.php"><li><img src="../../../../icons/doc.png" alt="" width="40px" height="40px"> Add Doctor</li></a>
            <a href="../../admins/add_admin/add_admin.php"><li><img src="../../../../icons/admin.png" alt="" width="40px" height="40px">Add Admin</li></a>
            <a href="../../../scintific_affairs/info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>

            </ul>
        </div>
        <div class="container">
            <div class="header">
                <div class="nav">
                <div>
                <h3> <a href="../../account/account.php"><img src="../../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
                </div>
                <div class="log">
                <a href="../../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
                </div>
            </div>
    <div class="info-std">
    <table class="table table-dark table-hover">
        <tr>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>PHONE NUMBER</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>USERNAME</th>
            <th>DATE OF ADD</th>
            <th>HOURS</th>
            <th>OPERATION</th>
        </tr>
        <?php
        $display_data = mysqli_query($connection , "select * from scientific_affairs_admins where del = 'no' ");
        
            // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
            if($display_data){
               
                while( $row = mysqli_fetch_array($display_data)){
                    $id = $row['id'];
                    $fullname = $row['full_name'];
                    $phone = $row['phone_number'];
                    $email = $row['email'];
                    $adsress = $row['address'];
                    $username = $row['username'];
                    $dateofadd = $row['date'];
                    $hours = $row['hours'];
                   
                   echo "<tr>";
                   echo "<td>".$id."</td>";
                   echo "<td>".$fullname."</td>";
                   echo "<td>".$phone."</td>";
                   echo "<td>".$email."</td>";
                   echo "<td>".$adsress."</td>";
                   echo "<td>".$username."</td>";
                   echo "<td>".$dateofadd."</td>";
                   echo "<td>".$hours."</td>";
                  
                  
                   echo "<td><a href='display_for_editt.php?updateid=".$id."'><button  class='btn btn-primary'>UPDATE</button></a>
                             <a href='display_for_deletet.php?delid=".$id."'><button class='btn btn-danger'>DELETE</button></a></td>";
                   echo "<tr>";
                }
            }
            ?>
 
    </table>
    </div>
</div>
    <script src="../bootstrap/jquery.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>