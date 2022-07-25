<?php
include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"];
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
    <title>edit information emp</title>
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
    <h3><a href="../../account/account.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
    <div class="log">
    <a href="../../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
    </div>
    </div>
</div>
 <div class="info-emp">
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>PHONE NUMBER</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>ACADEMIC QUALIFICATION</th>
            <th>TYPE OF JOP</th>
            <th>SALARY</th>
            <th>USERNAME</th>
            <th>DATE OF ADD</th>
            <th>OPERATION</th>
        </tr>
        <?php
        $display_data = mysqli_query($connection , "select * from employes where del = 'no' ");
        
            // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
            if($display_data){
               
                while( $row = mysqli_fetch_array($display_data)){
                    $id = $row['id'];
                    $fullname = $row['full_name'];
                    $phone = $row['phone_number'];
                    $email = $row['email'];
                    $adsress = $row['address'];
                    $academicqualification = $row['academic_qualification'];
                    $typeofjop = $row['type_of_jop'];
                    $salary = $row['salary'];
                    $username = $row['username'];
                    $dateofadd = $row['date_of_add'];
                    $hours = $row['hours'];
                   
                   echo "<tr>";
                   echo "<td>".$id."</td>";
                   echo "<td>".$fullname."</td>";
                   echo "<td>".$phone."</td>";
                   echo "<td>".$email."</td>";
                   echo "<td>".$adsress."</td>";
                   echo "<td>".$academicqualification."</td>";
                   echo "<td>".$typeofjop."</td>";
                   echo "<td>".$salary."</td>";
                   echo "<td>".$username."</td>";
                   echo "<td>".$dateofadd."</td>";
                   echo "<td><a href='display_for_edit.php?updateid=".$id."'><button  class='btn btn-primary'><img src='../../../../icons/u2.png' width='17px' height='20px'></button></a>
                             <a href='display_for_delete.php?delid=".$id."'><button class='btn btn-danger'><img src='../../../../icons/d.png' width='17px' height='20px'></button></a></td>";
                   echo "<tr>";
                }
            }
            ?>
    </table>
    </div>
    
</body>
</html>