<?php
include "../../../../connection/connection.php";

$id = $_GET["delid"];

$update_data = mysqli_query($connection , "update medical_exam_doctors set del='yes' where id=$id ");

if($update_data){
   // header ("location: edit_tetcher.php");
   echo "<script>alert('Successfylly Delete Doctor');
        window.location.href='edit_doctor.php';</script>";
}

?>