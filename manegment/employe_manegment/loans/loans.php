<?php
include "../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name"] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/loans.css?v=<?php echo time();?>">

    <title>add loans</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Human Resource</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../employes/add_employe/add_emp.php"><li><img src="../../../icons/eemp3.png" alt="" width="40px" height="40px"> Add Employe </li></a>
            <a href="../tetchers/add_tetchers/add_tetcher.php"><li><img src="../../../icons/thh.png" alt="" width="40px" height="40px">Add Tetcher</li></a>
            <a href="../workers/add_workers/add_worker.php"><li><img src="../../../icons/wok1.png" alt="" width="40px" height="40px">Add Worker</li></a>
            <a href="../expenses/expenses.php"><li><img src="../../../icons/Expenses.png" alt="" width="40px" height="40px">Expenses</li></a>
            <a href="#"><li  class="active"><img src="../../../icons/loans.png" alt="" width="40px" height="40px">loans</li></a>            
            <a href="../mustahqat/add_mustahq.php"><li><img src="../../../icons/mustahq.png" alt="" width="40px" height="40px">Financial Receivables</li></a>
            <a href="../salary/salary.php"><li><img src="../../../icons/salary2.png" alt="" width="40px" height="40px">salary</li></a>

        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3> <a href="../account/account.php"><img src="../../../icons/account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
    </div>
        <div class="log">
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
    <div class="form">

    <form action="" method="post">
    <div class="roww">
        <div class="form-group">
        <label for="" class="lead">Select Type Of Jop</label>
            <select name="typeofjop" id="" class="form-select">
               <option value="none">----  Select Type Of Jop  ----</option>
               <option value="emp">EMPLOYE</option>
               <option value="tetcher">TETCHER</option>
               <option value="worker">WORKER</option>
            </select>
</div>     
<div class="form-group">
        <input type="submit" value="Search" name="relode" class="btn btn-primary bssa">
</div>
</div> 
</form>

        <?php

if(isset($_POST["relode"])){
    $typejop = $_POST["typeofjop"];
 
  if($typejop === "emp"){ 
   

  echo "
  <div class='info-emp'>
    <table class='table table-striped table-hover'>
    <tr>
        <th>FULL NAME</th>
        <th>PHONE NUMBER</th>
        <th>JOP</th>
        <th>SALARY</th>
        <th></th>
    </tr>
    
   ";
    $display_data = mysqli_query($connection , "select id,full_name,phone_number,type_of_jop,salary from employes where del = 'no'");
    
        // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
        if($display_data){
           
            while( $row = mysqli_fetch_array($display_data)){
                $id = $row['id'];
                $fullname = $row['full_name'];
                $phone = $row['phone_number'];
                $typeofjop = $row['type_of_jop'];
                $salary = $row['salary'];
    
               
               echo "<tr>";
               echo "<td>".$fullname."</td>";
               echo "<td>".$phone."</td>";
               echo "<td>".$typeofjop."</td>";
               echo "<td>".$salary."</td>";

              
              
               echo "<td><a href='insert_to_loans.php?employeid=$id'><button class='btn btn-primary'>View</button></a></td>";
               echo "<tr>";
            }
        }
     

 echo "</table> </div>" ;
}

  elseif($typejop === "tetcher"){

   echo " 
   <div class='info-emp'>
   <table class='table table-striped table-hover'>
        <tr>
            
            <th>FULL NAME</th>
            <th>PHONE NUMBER</th>
            <th>JOP</th>
            <th>SALARY</th>
            <th></th>
        </tr>
    ";
        $display_data = mysqli_query($connection , "select id,full_name,phone_number,address,salary from tetchers where del = 'no' ");
        
            // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
            if($display_data){
               
                while( $row = mysqli_fetch_array($display_data)){
                    $id = $row["id"];
                    $fullname = $row['full_name'];
                    $phone = $row['phone_number'];
                    $adsress = $row['address'];
                    $salary = $row['salary'];

                   
                   echo "<tr>";
                   echo "<td>".$fullname."</td>";
                   echo "<td>".$phone."</td>";
                   echo "<td>tetcher</td>";
                   echo "<td>".$salary."</td>";
                  
                  
                   echo "<td><a href='insert_to_loans.php?tetcherid=".$id."'><button  class='btn btn-primary'>View</button></a>";
                   echo "<tr>";
                }
            }
  
 
  echo  "</table>
  </div>";
}

  elseif($typejop=== "worker"){


 echo " 
 <div class='info-emp'>
 <table class='table table-striped table-hover'>
    <tr>
        <th>NAME</th>
        <th>PHONE NUMBER</th>
        <th>JOP</th>
        <th>SALARY</th>
        <th></th>
    </tr>
    ";
    $display_workers = mysqli_query($connection , "select id,name_worker,phone_number,salary from workers where del = 'no'");

    if($display_workers){
     while ( $row = mysqli_fetch_array($display_workers)){
        $id = $row['id'];
        $fullname = $row['name_worker'];
        $phone = $row['phone_number'];
        $salary = $row['salary'];
       
       echo "<tr>";
       echo "<td>".$fullname."</td>";
       echo "<td>".$phone."</td>";
       echo "<td>worker</td>";
       echo "<td>".$salary."</td>";
      
      
       echo "<td><a href='insert_to_loans.php?workerid=".$id."'><button  class='btn btn-primary'>View</button></a>";
       echo "<tr>";
    }
}
   echo "
   </div>
   </table>";


  }

 } 
   ?> 
  
  </div>
</body>
</html>