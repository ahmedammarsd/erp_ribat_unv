<?php

$host = "localhost";
$u_name = "root";
$pass = "";
$database = "university";

// new way to connaction to database
$connection  = new mysqli($host,$u_name,$pass,$database);
/*if($connection){
    echo "sssssssss";
}
else{
    die(mysqli_error($connection));
}
*/
?>