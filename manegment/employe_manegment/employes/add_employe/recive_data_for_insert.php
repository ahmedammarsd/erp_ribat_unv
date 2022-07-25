<?php

include "../../../../connection/connection.php";
//session_start();


if(isset($_POST["addemp"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $academicqualification = $_POST["academicqualification"];
    $typeofjop = $_POST["typeofjop"];
    $salary = $_POST["salary"];
    $username = $_POST["username"];
    //$password = $_POST["password"];
    $dateofadd = date("Y-m-d");
    $hours = date("h:m:s");
    if($salary <= 0){
      echo "<script>alert('Sorry, Salary Is Not Accept');
      window.location.href='add_worker.php';</script>";
  }
    
    elseif($typeofjop === "none"){
      //  $_SESSION["msg1"] = "<script>alert('عذرا الرجاء تحديد نوع الوظيفة')</script>";
      echo "<script>alert('Sorry, Please Select Jop Type');
      window.location.href='add_emp.php';</script>";
        //header ("location: add_emp.php?msg=1");
    }
    else{

    $insert_data = mysqli_query($connection , "insert into employes (full_name,phone_number , email , address, academic_qualification , type_of_jop, salary, username, date_of_add,hours) 
    values ('$fullname','$phone','$email','$address','$academicqualification','$typeofjop','$salary','$username','$dateofadd','$hours') ");

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
}


?>