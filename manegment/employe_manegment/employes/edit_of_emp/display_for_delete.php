<?php
include "../../../../connection/connection.php";

$id = $_GET["delid"];

$update_data = mysqli_query($connection , "update employes set del='yes' where id=$id ");

if($update_data){
    echo "<script>alert('Successfylly Delete Employe');
    window.location.href='edit_of_emp.php';</script>";
    //header ("location: edit_of_emp.php");
}

?>