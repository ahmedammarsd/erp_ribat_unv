<?php
include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_scientific_affairs"];

$id = $_GET["updateid"];
$show_data_input = mysqli_query($connection, "select * from scientific_affairs_employes where id = $id");
//لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
$row=mysqli_fetch_array($show_data_input);
//تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
$inp_name = $row["full_name"];
$inp_phone = $row["phone_number"];
$inp_email = $row["email"];
$inp_address = $row["address"];
$inp_academic = $row["academic_qualification"];
$inp_username = $row["username"];


if(isset($_POST["addemp"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $academicqualification = $_POST["academicqualification"];
    $typeofjop = $_POST["typeofjop"];
    $salary = $_POST["salary"];
    $username = $_POST["username"];
    

    $update_data = mysqli_query($connection , "update scientific_affairs_employes set full_name = '$fullname',
    phone_number = '$phone',
     email= '$email' ,
      address = '$address',
       academic_qualification = '$academicqualification',
         username = '$username'
          where id = $id ");

    if($update_data){
        echo "<script>alert('Successfully Edit Information Employe');
        window.location.href='edit_of_emp.php';</script>";
       // header ("location:edit_of_emp.php");
    }
    else{
        echo "<script>alert('SORRY, Erorr In Edit Information')</script>";
       
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/scintific_affairs/display_for_edit.css">
    <title>Edit Employe</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
<h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
        </div>
            <ul>    
            <a href="../../statics/statics.php"><li  class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../registration_statistics/registration_statistics.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Registration Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li><img src="../../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe</li></a>
            <a href="../../doctors/add_doctor/add_doctor.php"><li><img src="../../../../icons/doc.png" alt="" width="40px" height="40px"> Add Doctor</li></a>
            <a href="../../admins/add_admin/add_admin.php"><li><img src="../../../../icons/admin.png" alt="" width="40px" height="40px">Add Admin</li></a>
            <a href="../../../scintific_affairs/info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
            <a href="../../../medical_examination/statics/statics.php"><li><img src="../../../../icons/doc.png" alt="" width="40px" height="40px">Medical Examination</li></a>
            </ul>
        </div>
        <div class="container">
            <div class="header">
                <div class="nav">
                <div>
                <h3> <a href="../../account/account.php"><img src="../../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
                </div>
                <div class="log">
                <a href="../../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
                </div>
            </div>
<div class="form">
<form action="" method="post">
    <div class="row">
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">Full Name</label>
        <input type="text" name="fullname" id=""  value="<?php echo $inp_name ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">Phone Number</label>
        <input type="number" name="phone" id=""  value="<?php echo $inp_phone ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">Email</label> 
        <input type="email" name="email" id=""  value="<?php echo $inp_email ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">Address</label>  
        <input type="text" name="address" id=""  value="<?php echo $inp_address ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">Academic Qualification</label> 
        <input type="text" name="academicqualification" id=""  value="<?php echo $inp_academic ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
    <label for="" class="lead">User Name</label>
        <input type="text" name="username" id=""  value="<?php echo $inp_username ?>" class="form-control" required>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <input type="submit" name="addemp" id="" value="Update" class="btn btn-success">
    </div>
</div>
</form>
</div>
</body>
</html>

