<?php
include "../../../../connection/connection.php";

$id = $_GET["delid"];

$update_data = mysqli_query($connection , "update workers set del='yes' where id=$id ");

if($update_data){
    echo "<script>alert('Successfully Delete Worker');
    window.location.href='edit_of_worker.php';</script>";
    //header ("location: edit_of_worker.php");
}

?>