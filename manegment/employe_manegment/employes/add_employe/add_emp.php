
<?php
//session_start();
/*$msg = $_GET["msg"];
if($msg == "1"){
    echo "<script>alert('عذرا الرجاء تحديد نوع الوظيفة')</script>";
}
elseif($msg == "2"){
    echo "<script>alert('تمت اضافة الموظف بنجاح')</script>";
}
elseif($msg == "3"){
    echo "<script>alert('عذرا يوجد خط')</script>";
}
*/
session_start();
$name_user = $_SESSION["full_name"];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/add_emp.css">
    <title>add employe</title>
</head>
<body>
<div class="side-menu">
<div class="brand-name">
<h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
        </div>
            <ul>    
            <a href="../../statics/statics.php"><li ><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../employes/add_employe/add_emp.php"><li class="active"><img src="../../../../icons/eemp.png" alt="" width="40px" height="40px"> Add Employe </li></a>
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
                <h3> <a href="../../account/account.php"><img src="../../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
                </div>
                <div class="log">
                <a href="../../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
                </div>
                </div>
            </div>
            <div class="form">
<form action="recive_data_for_insert.php" method="post">
    <div class="roww">
    <div class="form-group">
       <label for="" class="lead">Full Name</label>
        <input type="text" name="fullname" id="" placeholder="Enter Full Name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="" class="lead">Phone Number</label>
        <input type="text" name="phone" id=""  placeholder="Enter Phone Number" class="form-control" required>
    </div>
    <div class="form-group">
     <label for="" class="lead">Email</label> 
        <input type="email" name="email" id=""  placeholder="Enter Email" class="form-control" required>
    </div>
    </div>
    <div class="roww">
    <div class="form-group">
    <label for="" class="lead">Address</label>  
        <input type="text" name="address" id=""  placeholder="Enter Address" class="form-control" required>
    </div>
    <div class="form-group">
     <label for="" class="lead">Academic Qualification</label> 
     <input type="text" name="academicqualification" id=""  placeholder="Enter Academic Qualification" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="" class="lead">Select Type Of Jop </label>
        <select name="typeofjop" id="" class="form-select">
            <option value="none">----  Select Type Of Jop  ----</option>
            <option value="General Manager">General Manager</option>
            <option value="Financial Manager">Financial Manager</option>
            <option value="Technical Manager">Technical Manager</option>
            <option value="Human Resource">Human Resource</option>
            <option value="Registered">Registered</option>
            <option value="Accountant">Accountant</option>
            <option value="Librarian">Librarian</option>
            <option value="Secretary">Secretary</option>
            <option value="Lab Technician">Lab Technician</option>  
        </select>
    </div>
</div>
<div class="roww">
    <div class="form-group">
    <label for="" class="lead">Salary</label>
        <input type="text" name="salary" id=""  placeholder="Enter Salary" class="form-control" required>
    </div>
    <div class="form-group sa">
      <label for="" class="lead">User Name</label>
      <input type="text" name="username" id=""  placeholder="Enter User Name"  class="form-control" required>
    </div>
</div>

    <div class="form-group">
        <input type="submit" name="addemp" id="" value="Add" class="btn btn-primary">
    </div>
</form>
</div>
    
</body>
</html>