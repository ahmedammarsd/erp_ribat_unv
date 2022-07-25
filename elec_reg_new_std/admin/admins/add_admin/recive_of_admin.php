<?php

include "../../../../connection/connection.php";
session_start();
//info about admin
$name_admin = $_SESSION["full_name_scientific_affairs"];

if(isset($_POST["addtetcher"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $admin_add = $name_admin;
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");

    

    $insert_data = mysqli_query($connection , "insert into scientific_affairs_admins (full_name,phone_number , email , address, username, admin_add, date,hours) 
    values ('$fullname','$phone','$email','$address','$username','$admin_add','$dateofadd','$hours') ");

    if($insert_data){
        echo "<script>alert('Successfully Add Admin');
        window.location.href='add_admin.php';
        </script>";

        //header ("location: add_tetcher.php");
    }
    else{
        echo "<script>alert('SORRY, Error In Add Information , Plese Call To Devoloper');
        window.location.href='add_admin.php';
        </script>";
       
    }
}


?>