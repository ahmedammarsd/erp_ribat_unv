<?php

include "../../../../connection/connection.php";
//session_start();


if(isset($_POST["addemp"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $academicqualification = $_POST["academicqualification"];
    $username = $_POST["username"];
    //$password = $_POST["password"];
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");

    $insert_data = mysqli_query($connection , "insert into scientific_affairs_employes (full_name,phone_number , email , address, academic_qualification , username, date_of_add,hours) 
    values ('$fullname','$phone','$email','$address','$academicqualification','$username','$dateofadd','$hours') ");

    if($insert_data){
      //  $_SESSION["msg2"] = "<script>alert('تمت اضافة الموظف بنجاح')</script>";
      echo "<script>alert('Successfully Add Employe');
      window.location.href='add_emp.php';</script>";
       // header ("location: add_emp.php?msg=2");
    }
    else{
       // $_SESSION["msg3"] = "<script>alert('يوجد خطا')</script>";
       echo "<script>alert('Sorry, Error In Add Information');
       window.location.href='add_emp.php';</script>";
       // header ("location: add_emp.php?msg=3");
       
    }
}



?>