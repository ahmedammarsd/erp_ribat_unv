<?php
session_start();
$name_user = $_SESSION["full_name_scientific_affairs"]; 
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
    <link rel="stylesheet" href="../../../../css/manegment/admin/add_doctor.css?v=<?php echo time();?>">
    <title>add tetcher</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
<h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Scientific Affairs</h2>
        </div>
      <ul>
            <a href="../../statics/statics.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../registration_statistics/registration_statistics.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Registration Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li><img src="../../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe</li></a>
            <a href="../../doctors/add_doctor/add_doctor.php"><li class="active"><img src="../../../../icons/doc.png" alt="" width="40px" height="40px"> Add Doctor</li></a>
            <a href="../../admins/add_admin/add_admin.php"><li><img src="../../../../icons/admin.png" alt="" width="40px" height="40px">Add Admin</li></a>
            <a href="../../../scintific_affairs/info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
            <a href="../../../medical_examination/statics/statics.php"><li><img src="../../../../icons/doc.png" alt="" width="40px" height="40px">Medical Examination</li></a>
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
<form action="recive_of_doctor.php" method="post">
    <div class="roww">
          <div class="form-group">
                  <label for="" class="lead">Full Name</label>
                  <input type="text" name="fullname" id="" placeholder="Enter Full Nmae" class="form-control" required>
          </div>
          <div class="form-group">
                  <label for="" class="lead">Phone Number</label>
                  <input type="text" name="phone" id=""  placeholder="Enter Phone Number"  class="form-control" required>
          </div>
          <div class="form-group">
                  <label for="" class="lead">Email</label>
                  <input type="email" name="email" id=""  placeholder="Enter Email"  class="form-control" required>
          </div>
    </div>
      <div class="roww">
            <div class="form-group">
                  <label for="" class="lead">Address</label>
                  <input type="text" name="address" id="" placeholder="Enter Address"  class="form-control" required>
            </div>
            <div class="form-group">
                  <label for="" class="lead">Specialization</label>
                 <select name="specialization" id="" class="form-select">
                  <option value="none">Seelect Specialization Doctor</option>
                  <option value="GP">GP</option>
                  <option value="Optics">Optics</option>
                  <option value="Psychologist">Psychologist</option>
                 </select>
            </div>
            <div class="form-group">
                  <label for="" class="lead">User Name</label> 
                  <input type="text" name="username" id=""  placeholder=" Enter User Name" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
                  <input type="submit" name="addtetcher" value="Add" id="" class="btn btn-primary">
    </div>
</div>
</form>
</body>
</html>