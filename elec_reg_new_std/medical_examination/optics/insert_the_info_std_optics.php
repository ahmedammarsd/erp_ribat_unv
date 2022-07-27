<?php
include "../../../connection/connection.php";
$id_std = $_GET["std_id"];
session_start();
$name_user = $_SESSION["full_name_doctor"] ;
$specialization = $_SESSION["specialization_doctor"];

// if($specialization != "Optics"){
// echo "<script>alert('Sorry, You don\'t have permissions');
//  window.location.href='../statics/statics.php'</script>";
// }

$dispaly_name_and_college_std = mysqli_query($connection , "select form_number ,name_std , college from new_std_form_info where id= '$id_std'");
$row = mysqli_fetch_array($dispaly_name_and_college_std);
$form_number = $row["form_number"];
$name_std = $row["name_std"];
$college = $row["college"];



if(isset($_POST["submit"])){
    $name_std1 = $_POST["name_std"];
    $college1 = $_POST["college"];
    $form_number1 = $_POST["form_number"];
    $exm_eye = $_POST["exm_eye"];
    $injurs_eye = $_POST["injurs_eye"];
    $date = date("Y-m-d");
    $hours = date("h:m:s");
    $year = date("y");
    
    $insert_info_med = mysqli_query($connection , "insert into med_optics (form_number,name, college, answer_q1 , answer_q2 , date , hours , year) value ('$form_number1','$name_std1','$college1','$exm_eye','$injurs_eye','$date','$hours','$year')");
    if($insert_info_med){
        $update_med_optics_submit = mysqli_query($connection , "update new_std_form_info set optic='done' where id='$id_std' ");
        if($update_med_optics_submit){
            echo "<script>alert('تمت الكشف  بنجاح');
            window.location.href='display_std_for_optics_exm.php';</script>";
           // header("location: display_std_for_optics_exm.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/medical_examination/insert_the_info_std_optics.css?v=<?php echo time();?>">
    <title>Optics Examination </title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Medical Examination</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li ><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../doctor/display_std_for_doctor_exm.php"><li><img src="../../../icons/doc.png" alt="" width="40px" height="40px"> Doctor</li></a>
            <a href="../optics/display_std_for_optics_exm.php"><li  class="active"><img src="../../../icons/ds.png" alt="" width="40px" height="40px"> Optics</li></a>
            <a href="../psychoogist/display_std_for_psychologist_exm.php"><li><img src="../../../icons/op.png" alt="" width="40px" height="40px">Psychoogist</li></a>
            <a href="../info_std_for_med/info_std_for_med.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px">Students Information</li></a>
        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>
<div class="form">
<form action="" method="post">
<div class="row">
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Form Number</label>
        <input type="text" name="form_number"  value="<?php echo $form_number ?>" id="" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">Name</label>
        <input type="text" name="name_std" value="<?php echo $name_std ?>" id="" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-6 col-xs-12">
        <label for=""class="lead">College</label>
        <input type="text" name="college" value="<?php echo $college ?>" id="" class="form-control" readonly>
    </div>      
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
        <label for=""class="lead">Optics Detect</label>  
        <input type="number"  name="exm_eye" id="" class="form-control">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
        <label for=""class="lead">Do He Has Any Eye Injuries or Disease?</label>
        <textarea name="injurs_eye" id=""  class="form-control"></textarea>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <input type="submit" value="Done" name="submit" class="btn btn-primary">
    </div>
        </div>
        
    </form>
    
</body>
</html>