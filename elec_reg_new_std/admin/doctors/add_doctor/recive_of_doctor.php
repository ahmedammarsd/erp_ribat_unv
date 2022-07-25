<?php

include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_scientific_affairs"]; 


if(isset($_POST["addtetcher"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $specialization = $_POST["specialization"];
    $username = $_POST["username"];
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");

    $insert_data = mysqli_query($connection , "insert into medical_exam_doctors (full_name,phone_number , email , address, specialization,username,admin_add, date,hours) 
    values ('$fullname','$phone','$email','$address','$specialization','$username','$name_user','$dateofadd','$hours') ");

    if($insert_data){
        echo "<script>alert('Successefylly Add Doctor');
         window.location.href='add_doctor.php';</script>";
       // header ("location: add_tetcher.php");
    }
    else{
        echo "<script>alert('Sorry,Error In Add Information');
        window.location.href='add_doctor.php';</script>";
       
    }
}



?>