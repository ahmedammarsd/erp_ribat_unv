<?php

include "../../../../connection/connection.php";


if(isset($_POST["addtetcher"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $academicqualification1 = $_POST["academicqualification1"];
    $academicqualification2 = $_POST["academicqualification2"];
    $academicqualification3 = $_POST["academicqualification3"];
    $salary = $_POST["salary"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");
    if($salary <= 0){
        echo "<script>alert('Sorry, Salary Is Not Accept');
        window.location.href='add_worker.php';</script>";
    }
    else{
    $insert_data = mysqli_query($connection , "insert into tetchers (full_name,phone_number , email , address, academic_qualification1 , academic_qualification2,academic_qualification3, salary, username, date,hours) 
    values ('$fullname','$phone','$email','$address','$academicqualification1','$academicqualification2','$academicqualification3','$salary','$username','$dateofadd','$hours') ");

    if($insert_data){
        echo "<script>alert('Successefylly Add Tetcher');
        window.location.href='add_tetcher.php';</script>";
       // header ("location: add_tetcher.php");
    }
    else{
        echo "<script>alert('Sorry,Error In Add Information')</script>";
       
    }
}
}


?>