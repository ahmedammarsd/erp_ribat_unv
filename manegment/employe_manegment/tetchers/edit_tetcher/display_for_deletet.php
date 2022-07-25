<?php
include "../../../../connection/connection.php";

$id = $_GET["delid"];

$update_data = mysqli_query($connection , "update tetchers set del='yes' where id=$id ");

if($update_data){
   // header ("location: edit_tetcher.php");
   echo "<script>alert('Successfylly Delete Teacher');
        window.location.href='edit_tetcher.php';</script>";
}

?>