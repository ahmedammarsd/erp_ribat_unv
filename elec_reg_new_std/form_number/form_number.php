<?php
include "../../connection/connection.php";
session_start();
if (isset($_POST["submit"])) {
    $formnumber = $_POST["formnumber"];

    $_SESSION["formno"] = $formnumber;

    $display_form_number_from_api_minstry = "select * from new_std_like_api where form_number = '$formnumber'";

    $display_form_number_from_new_student = mysqli_query($connection, "select form_number from new_std_form_info where form_number = '$formnumber'");
    $display_form_number_from_new_student2 = mysqli_fetch_array($display_form_number_from_new_student)['form_number'];
<<<<<<< HEAD
   // echo $display_form_number_from_new_student2 ;
    if($formnumber == $display_form_number_from_new_student2){
        echo "<script>alert('Sorry, you have already completed the registration process')</script>";
    }
    else{
    if(mysqli_num_rows(mysqli_query($connection , $display_form_number_from_api_minstry)) > 0) {
     //   echo "<script>alert('SUCCESSEFULY')</script>";
     header("location: ../nstd_info_form/nstd_info_form.php");
    }
    else{
        echo "<script>alert('Sorry, the form number is incorrect')</script>";
    }
}
=======
    // echo $display_form_number_from_new_student2 ;
    if ($formnumber == $display_form_number_from_new_student2) {
        echo "<script>alert('عذرا لقد اكملت عملية التسجيل مسبقا')</script>";
    } else {
        if (mysqli_num_rows(mysqli_query($connection, $display_form_number_from_api_minstry)) > 0) {
            //   echo "<script>alert('SUCCESSEFULY')</script>";
            header("location: ../nstd_info_form/nstd_info_form.php");
        } else {
            echo "<script>alert('عذرا رقم الاستمارة غير صحيح')</script>";
        }
    }
>>>>>>> 0c85f42336657d3fab7edb0f700e1799bedbc01a
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/elec_reg_new_std/form_number.css?v=<?php echo time(); ?>">
    <title>Formumber</title>
</head>

<body>
    <div class="header">
        <div class="nav container">
            <div>
                <h3>RIBAT UNVIRSITY</h3>
            </div>
            <div>
                <h3>SCINTIFIC AFFAIRS</h3>
            </div>
        </div>
    </div>
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <img src="../../icons/formnumber.png" alt="" width="30px" height="30px">
                <label for="" class="lead">Form Number</label>
                <input type="text" name="formnumber" id="" placeholder=" Enter Form Number" class="form-control" required>
            </div>
            <div>
                <input type="submit" name="submit" value="Confirm" class=" btn btn-primary">
            </div>
        </form>

    </div>

</body>

</html>