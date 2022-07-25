<?php
include "../../../../connection/connection.php";

$id = $_GET["delid"];

$update_data = mysqli_query($connection , "update scientific_affairs_admins set del='yes' where id=$id ");

if($update_data){
   // header ("location: edit_tetcher.php");
   echo "<script>alert('Successfully Delete Information Admin');
   window.location.href='edit_admin.php';
   </script>";
}
echo "<script>alert('SORRY, Error In Delete Information , Plese Call To Devoloper');
window.location.href='edit_admin.php';
</script>";
?>