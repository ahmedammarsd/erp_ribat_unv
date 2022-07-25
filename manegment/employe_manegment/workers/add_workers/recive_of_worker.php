<?php

include "../../../../connection/connection.php";


if(isset($_POST["addworker"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");
    if($salary <= 0){
        echo "<script>alert('Sorry, Salary Is Not Accept');
        window.location.href='add_worker.php';</script>";
    }
    else{

    $insert_data = mysqli_query($connection , "insert into workers (name_worker,phone_number,address , salary, date,hours) 
    values ('$fullname','$phone','$address','$salary','$dateofadd','$hours') ");

    if($insert_data){
        echo "<script>alert('Successefylly Add Worker');
        window.location.href='add_worker.php';</script>";
        //header ("location: add_worker.php");
    }
    else{
        echo "<script>alert('SORRY,Error In Add Information')</script>";
       
    }
}
}


?>