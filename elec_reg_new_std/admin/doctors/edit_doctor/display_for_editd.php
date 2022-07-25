<?php
include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_scientific_affairs"];

$id = $_GET["updateid"];
$show_data_input = mysqli_query($connection, "select * from medical_exam_doctors where id = $id");
//لا نحتاج الى حلقة تكرارية لان الناتج صف واحد
$row=mysqli_fetch_array($show_data_input);
//تخزين النواتج في متغيرات لاستخدامها في قيمة الحقل
$inp_name = $row["full_name"];
$inp_phone = $row["phone_number"];
$inp_email = $row["email"];
$inp_address = $row["address"];
$inp_specialization = $row["specialization"];
$inp_username = $row["username"];


if(isset($_POST["edittetcher"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $specialization = $_POST["specialization"];
    $username = $_POST["username"];
    

    $update_data = mysqli_query($connection , "update medical_exam_doctors set full_name='$fullname',
    phone_number = '$phone',
     email= '$email' ,
      address = '$address',
      specialization = '$specialization',
         username = '$username'
          where id=$id");

    if($update_data){
        echo "<script>alert('Successfully Edit Information Doctor');
        window.location.href='edit_doctor.php';</script>";
       // header ("location:edit_tetcher.php");
    }
    else{
        echo "<script>alert('SORRY, Erorr In Edit Information');
        window.location.href='edit_doctor.php';</script>";  
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
    <link rel="stylesheet" href="../../../../css/manegment/add_tetcher.css">
    <title>edit tetcher</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
    <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
            </div>
    <ul>
    <a href="../../statics/statics.php"><li  class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li><img src="../../../../icons/eemp.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../../workers/add_workers/add_worker.php"><li><img src="../../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../../expenses/expenses.php"><li><img src="../../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="../../loans/loans.php"><li><img src="../../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../../mustahqat/add_mustahq.php"><li><img src="../../../../icons/mustahq.png" alt="" width="40px" height="40px">mustahq</li></a>
            <a href="../../salary/salary.php"><li><img src="../../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

            </ul>
</div>
<div class="container">
<div class="header">
    <div class="nav">
    <div>
    <h3> <a href="../../Account/Account.php"><img src="../../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
  </div>
    
    <div class="log">
    <a href="../../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
    </div>
    </div>
</div>
<div class="form">
<form action="" method="post">
    <div class="roww">
    <div  class="form-group">
    <label for="" class="lead">Full Nmae</label>
        <input type="text" name="fullname" id=""  value="<?php echo $inp_name ?>" class="form-control" required>
    </div>
    <div  class="form-group">
    <label for="" class="lead">Phone Number</label>
        <input type="number" name="phone" id=""  value="<?php echo $inp_phone ?>" class="form-control" required>
    </div>
    <div  class="form-group">
    <label for="" class="lead">Email</label>
        <input type="email" name="email" id=""  value="<?php echo $inp_email ?>" class="form-control" required>
    </div>
    </div>
    <div class="roww">
    <div  class="form-group">
    <label for="" class="lead">Address</label>
        <input type="text" name="address" id=""  value="<?php echo $inp_address ?>" class="form-control" required>
    </div>
    <div class="form-group">
                  <label for="" class="lead">Specialization</label>
                 <select name="specialization" id="" class="form-select">
                  <option value="<?php echo $inp_specialization ?>"><?php echo $inp_specialization ?></option>
                  <option value="GP">GP</option>
                  <option value="Optics">Optics</option>
                  <option value="Psychologist">Psychologist</option>
                 </select>
            </div>
    <div  class="form-group">
    <label for="" class="lead">User Nmae</label> 
        <input type="text" name="username" id=""  value="<?php echo $inp_username ?>" class="form-control" required>
    </div>
    </div>
    <div  class="form-group">
        <input type="submit" name="edittetcher" id="" value="Update"  class="btn btn-success">
    </div>
</form>
</div> 
</body>
</html>

