<?php
include "../../../../connection/connection.php";
session_start();
//info about admin
$name_admin = $_SESSION["full_name_scientific_affairs"];


$id = $_GET["updateid"];
$show_data_input = mysqli_query($connection, "select * from scientific_affairs_admins where id= $id");
//لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
$row=mysqli_fetch_array($show_data_input);
//تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
$inp_name = $row["full_name"];
$inp_phone = $row["phone_number"];
$inp_email = $row["email"];
$inp_address = $row["address"];
$inp_username = $row["username"];


if(isset($_POST["edittetcher"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    

    $update_data = mysqli_query($connection , "update scientific_affairs_admins set full_name = '$fullname',
    phone_number = '$phone',
     email= '$email' ,
      address = '$address',
         username = '$username'
          where id = $id ");

    if($update_data){
        echo "<script>alert('Successfully Edit Information Admin');
        window.location.href='edit_admin.php';
        </script>";

        //header ("location:edit_tetcher.php");
    }
    else{
        echo "<script>alert('SORRY, Error In Edit Information , Plese Call To Devoloper');
        window.location.href='edit_admin.php';
        </script>";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/add_tetcher.css">
    <title>Edit Admin</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
            <h2>Coustoms Univirsity</h2>
        </div>
        <ul>
        <a href="../../statics/statics.php"><li class="active">Dashboard</li></a>
            <a href="../../admins/add_admin/add_admin.php"><li>admin</li></a>
            <a href="../../students/add_student/add_student.php"><li>Students</li></a>
            <a href="../../tetchers/add_tetchers/add_tetcher.php"><li>Tetchers</li></a>
            <a href="../../add_subject/add_subject.php"><li>Add subject</li></a>
            <a href="../../subjects_distribution/subjects_distribution.php"><li>Distribute Subjects</li></a>
            <a href="../../profile_admin/profile_admin.php"><li>Account</li></a>
        </ul>
    </div>
<div class="container">
        <div class="header">
            <div class="nav">
               <div>
                   <h3><img src="../../../images/icon-admin.png" alt="" srcset="" width="50px" height="50px"> Admin :<?php echo " " . $name_admin ?> </h3>
               </div>
               <div class="log">
               <a href="../../../logout/logout.php"><div><img src="../../../images/logout.png" alt="" srcset="" width="50px" height="50px"></div></a>
               </div>
            </div>
        </div>
        <div class="form">

<form action="" method="post">
<div class="roww">
    <div>
    <label for="" class="form-group">Full Name</label>
        <input type="text" name="fullname" id=""  value="<?php echo $inp_name ?>" class="form-control">
    </div>
    <div>
    <label for="" class="form-group">Phone Number</label>
        <input type="text" name="phone" id=""  value="<?php echo $inp_phone ?>" class="form-control">
    </div>
    <div>
    <label for="" class="form-group">Email</label>
        <input type="email" name="email" id=""  value="<?php echo $inp_email ?>" class="form-control">
    </div>
    <div>
    <label for="" class="form-group">Address</label>
        <input type="text" name="address" id=""  value="<?php echo $inp_address ?>" class="form-control">
    </div>
    <div>
    <label for="" class="form-group">Username</label>
        <input type="text" name="username" id=""  value="<?php echo $inp_username ?>" class="form-control">
    </div>
</div>
    <div>
        <input type="submit" name="edittetcher" id="" value="Update"  class="btn btn-success">
    </div>
</form>
</div>
</div>
    <script src="../bootstrap/jquery.js"></script>
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>

