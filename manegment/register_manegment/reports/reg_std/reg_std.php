<?php
include "../../../../connection/connection.php";
session_start();
$name_user = $_SESSION["full_name_acc"];
$date_now = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/Register/reg_std.css?v=<?php echo time();?>">

    <title>Payment Students</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
         </div>
        <ul>
            <a href="../../statics/statics.php"><li class="active"><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../add_subject/add_subject.php"><li ><img src="../../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../../subjects_distribution/subjects_distribution.php"><li><img src="../../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../../fees_for_batchs/fees_for_batchs.php"><li><img src="../../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
            <a href="../../exams/distribution_tetcher_for_subject/distribution_tetcher_for_subject.php"><li><img src="../../../../icons/dt.png" alt="" width="40px" height="40px">Teacher Distribution</li></a>
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../../account/account.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
            </div>
            <div class="log">
            <a href="../../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form">
    <form action="" method="post">
    <div class="row">
    <div  class="form-group col-lg-4">
        <label for="" class="lead"> Select  The Type Certificate </label>
            <select name="type_certificate" id="" class="form-select">
                <option value="none">--- Select The Certificate ---</option>
                <option value="بكلاريوس">Bachelors</option>
                <option value="دبلوم">Diploma</option>
            </select>
        </div>   
        <div  class="form-group col-lg-4">
        <label for="" class="lead"> Select Department </label>
            <select name="department" id="" class="form-select">
                <option value="none">--- Select The Department ---</option>
                <option value="تقنية معلومات">Information Technology</option>
                <option value="علوم حاسوب">Computer Science</option>
            </select>
        </div>
        <div class="form-group col-lg-4">
        <label for="" class="lead"> Select Batch </label>
                <select name="batch" id="" class="form-select">
                    <option value="none">--- Select The Batch ---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
        </div>
        <div  class="form-group col-lg-4">
            <label for="" class="lead"> Select Semester </label>
                <select name="semester" id="" class="form-select">
                    <option value="none">--- Select Semester ---</option>
                    <option value="1">S1</option>
                    <option value="2">S2</option>
                    <option value="3">S3</option>
                    <option value="4">S4</option>
                    <option value="5">S5</option>
                    <option value="6">S6</option>
                    <option value="7">S7</option>
                    <option value="8">S8</option>
                </select>
            </div>
            <div class="form-group col-lg-4">
        <label for="" class="lead"> Select Status </label>
                <select name="status" id="" class="form-select">
                    <option value="none">--- Select The Status ---</option>
                    <option value="paied">Paied</option>
                    <option value="n_paied">Not Paied</option>
                    <option value="both">All</option>
                </select>
        </div>
            <div class="form-group col-lg-4">
                <input type="submit" value="Search" name="ser" class="btn btn-primary">
            </div>
    </form>
    <table class="table table-success table-hover">
        <tr>
            <th>Unv ID</th>
            <th>Name Student</th>
            <th>Batch</th>
            <th>Certifcate</th>
            <th>Semester</th>
            <th>Fees</th>
            <th>Status</th>
        </tr>
    <?php
       if(isset($_POST["ser"])){
        $type_certificate = $_POST["type_certificate"];
       $department = $_POST["department"];
       $batch = $_POST["batch"];
       $semester = $_POST["semester"];
       $status = $_POST["status"];
       
       if($type_certificate == "none"){
        echo "<script>alert('عذرا الرجاء تحديد الشهادة')</script>";
    }
    elseif($department == "none"){
        echo "<script>alert('عذرا الرجاء تحديد القسم')</script>";
    }
    elseif($batch == "none"){
        echo "<script>alert('عذرا الرجاء تحديد الدفعة')</script>";
    }
    elseif($semester == "none"){
        echo "<script>alert('عذرا الرجاء تحديد السمستر')</script>";
    }
    elseif($status == "none"){
        echo "<script>alert('Sorry, Please Select Status')</script>";
    }
    elseif($type_certificate == "دبلوم" && ($semester == 7 || $semester == 8)){
       // if($semester == 3 || $semester == 4 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8){
        echo "<script>alert('Sorry, Max Semester In Deplom is S6')</script>";
       // }
    }
    elseif($semester == "1" && $status == "paied"){
            $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s1='done'" );
            if(mysqli_num_rows($display_stds) == 0){
                echo "<script>alert('Sorry,No Reports ')</script>";
            }
            // if(mysqli_num_rows($display_stds) == 0){
            //     echo "none";
            // }
            // if($display_stds){
            //     echo "yy";
            // }
            // else{
            //     echo "fff";
            // }
            else{
            while($row = mysqli_fetch_array($display_stds)){
                $unv_id = $row['unv_id'];
                $name_std = $row['name_std'];
                $batch = $row['batch'];
                $type_certifcate_unv = $row['type_certifcate_unv'];
                $year_fee = $row['year_fee'];
                $register_fee = $row['register_fee'];
                $fees = ($year_fee/2)+$register_fee;
                echo "<tr class='table-success'>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo "<td>"."Registerd"."</td>";
                echo "</tr>";
        }
    }

    }
    elseif($semester == "1" && $status == "n_paied"){
        $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s1='none'" );
        if(mysqli_num_rows($display_stds) == 0){
            echo "<script>alert('Sorry,No Reports ')</script>";
        }
        else{
        while($row = mysqli_fetch_array($display_stds)){
            $unv_id = $row['unv_id'];
            $name_std = $row['name_std'];
            $batch = $row['batch'];
            $type_certifcate_unv = $row['type_certifcate_unv'];
            $year_fee = $row['year_fee'];
            $register_fee = $row['register_fee'];
            $fees = ($year_fee/2)+$register_fee;
            echo "<tr class='table-danger'>";
            echo "<td>".$unv_id."</td>";
            echo "<td>".$name_std."</td>";
            echo "<td>".$batch."</td>";
            echo "<td>".$type_certifcate_unv."</td>";
            echo "<td>".$semester."</td>";
            echo "<td>".$fees."</td>";
            echo "<td>"."Not Registerd"."</td>";
            echo "</tr>";
    }
}
}
elseif($semester == "1" && $status == "both"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && (confirm_pay_s1='none' || confirm_pay_s1='done')" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = ($year_fee/2)+$register_fee;
        $confirm_pay_s1 = $row["confirm_pay_s1"];
        if($confirm_pay_s1 == "done"){
            $class= "class='table-success'";
            $s =   "<td>"."Registerd"."</td>";
        }
        else{
            $class= "class='table-danger'";
            $s =   "<td>"."Not Registerd"."</td>";
        }
        echo "<tr $class>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo $s;
        echo "</tr>";
}
    }
}
///----------------------------------------------------------------------------------------
elseif($semester == "2" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s2='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "2" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s2='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = $year_fee/2;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "2" && $status == "both"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s2='none' || confirm_pay_s2='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2 ;
        $confirm_pay_s2 = $row["confirm_pay_s2"];
        if($confirm_pay_s2 == "done"){
            $class= "class='table-success'";
            $s =   "<td>"."Registerd"."</td>";
        }
        else{
            $class= "class='table-danger'";
            $s =   "<td>"."Not Registerd"."</td>";
        }
        echo "<tr $class>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo $s;
        echo "</tr>";
}
    }
}
///----------------------------------------------------------------------------------------
elseif($semester == "3" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s3='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = ($year_fee/2)+$register_fee;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "3" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s3='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = ($year_fee/2)+$register_fee;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "3" && $status == "both"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s3='none' || confirm_pay_s3='done'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
$unv_id = $row['unv_id'];
$name_std = $row['name_std'];
$batch = $row['batch'];
$type_certifcate_unv = $row['type_certifcate_unv'];
$year_fee = $row['year_fee'];
$register_fee = $row['register_fee'];
$fees = ($year_fee/2)+$register_fee;
$confirm_pay_s3 = $row["confirm_pay_s3"];
if($confirm_pay_s3 == "done"){
    $class= "class='table-success'";
    $s =   "<td>"."Registerd"."</td>";
}
else{
    $class= "class='table-danger'";
    $s =   "<td>"."Not Registerd"."</td>";
}
echo "<tr $class>";
echo "<td>".$unv_id."</td>";
echo "<td>".$name_std."</td>";
echo "<td>".$batch."</td>";
echo "<td>".$type_certifcate_unv."</td>";
echo "<td>".$semester."</td>";
echo "<td>".$fees."</td>";
echo $s;
echo "</tr>";
}
}
}
//-------------------------------------------------------------------------------------------------------------------------
elseif($semester == "4" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s4='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "4" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s4='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = $year_fee/2;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "4" && $status == "both"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s3='none' || confirm_pay_s3='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2 ;
        $confirm_pay_s4 = $row["confirm_pay_s4"];
        if($confirm_pay_s4 == "done"){
            $class= "class='table-success'";
            $s =   "<td>"."Registerd"."</td>";
        }
        else{
            $class= "class='table-danger'";
            $s =   "<td>"."Not Registerd"."</td>";
        }
        echo "<tr $class>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo $s;
        echo "</tr>";
}
    }
}
//---------------------------------------------------------------------------------------------------------------------------
elseif($semester == "5" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s5='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = ($year_fee/2)+$register_fee;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "5" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s5='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = ($year_fee/2)+$register_fee;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}

}
elseif($semester == "5" && $status == "both"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s5='none' || confirm_pay_s5='done'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
$unv_id = $row['unv_id'];
$name_std = $row['name_std'];
$batch = $row['batch'];
$type_certifcate_unv = $row['type_certifcate_unv'];
$year_fee = $row['year_fee'];
$register_fee = $row['register_fee'];
$fees = ($year_fee/2)+$register_fee;
$confirm_pay_s5 = $row["confirm_pay_s5"];
if($confirm_pay_s5 == "done"){
    $class= "class='table-success'";
    $s =   "<td>"."Registerd"."</td>";
}
else{
    $class= "class='table-danger'";
    $s =   "<td>"."Not Registerd"."</td>";
}
echo "<tr $class>";
echo "<td>".$unv_id."</td>";
echo "<td>".$name_std."</td>";
echo "<td>".$batch."</td>";
echo "<td>".$type_certifcate_unv."</td>";
echo "<td>".$semester."</td>";
echo "<td>".$fees."</td>";
echo $s;
echo "</tr>";
}
}
}
//-----------------------------------------------------------------------------------------------------------------------------------------
elseif($semester == "6" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s6='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "6" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s6='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = $year_fee/2;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "6" && $status == "both"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s6='none' || confirm_pay_s6='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2 ;
        $confirm_pay_s6 = $row["confirm_pay_s6"];
        if($confirm_pay_s6 == "done"){
            $class= "class='table-success'";
            $s =   "<td>"."Registerd"."</td>";
        }
        else{
            $class= "class='table-danger'";
            $s =   "<td>"."Not Registerd"."</td>";
        }
        echo "<tr $class>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo $s;
        echo "</tr>";
}
    }
}
//---------------------------------------------------------------------------------------------------------------------------
elseif($semester == "7" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s7='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = ($year_fee/2)+$register_fee;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "7" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s7='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = ($year_fee/2)+$register_fee;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "7" && $status == "both"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s7='none' || confirm_pay_s7='done'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
$unv_id = $row['unv_id'];
$name_std = $row['name_std'];
$batch = $row['batch'];
$type_certifcate_unv = $row['type_certifcate_unv'];
$year_fee = $row['year_fee'];
$register_fee = $row['register_fee'];
$fees = ($year_fee/2)+$register_fee;
$confirm_pay_s7 = $row["confirm_pay_s7"];
if($confirm_pay_s7 == "done"){
    $class= "class='table-success'";
    $s =   "<td>"."Registerd"."</td>";
}
else{
    $class= "class='table-danger'";
    $s =   "<td>"."Not Registerd"."</td>";
}
echo "<tr $class>";
echo "<td>".$unv_id."</td>";
echo "<td>".$name_std."</td>";
echo "<td>".$batch."</td>";
echo "<td>".$type_certifcate_unv."</td>";
echo "<td>".$semester."</td>";
echo "<td>".$fees."</td>";
echo $s;
echo "</tr>";
}
}
}
//-----------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------
elseif($semester == "8" && $status == "paied"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s8='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2;
        echo "<tr class='table-success'>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo "<td>"."Registerd"."</td>";
        echo "</tr>";
}
    }
}
elseif($semester == "8" && $status == "n_paied"){
$display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s8='none'" );
if(mysqli_num_rows($display_stds) == 0){
    echo "<script>alert('Sorry,No Reports ')</script>";
}
else{
while($row = mysqli_fetch_array($display_stds)){
    $unv_id = $row['unv_id'];
    $name_std = $row['name_std'];
    $batch = $row['batch'];
    $type_certifcate_unv = $row['type_certifcate_unv'];
    $year_fee = $row['year_fee'];
    $register_fee = $row['register_fee'];
    $fees = $year_fee/2;
    echo "<tr class='table-danger'>";
    echo "<td>".$unv_id."</td>";
    echo "<td>".$name_std."</td>";
    echo "<td>".$batch."</td>";
    echo "<td>".$type_certifcate_unv."</td>";
    echo "<td>".$semester."</td>";
    echo "<td>".$fees."</td>";
    echo "<td>"."Not Registerd"."</td>";
    echo "</tr>";
}
}
}
elseif($semester == "8" && $status == "both"){
    $display_stds = mysqli_query($connection , "select * from students where batch='$batch' && type_certifcate_unv='$type_certificate' && department='$department' && confirm_pay_s8='none' || confirm_pay_s8='done'" );
    if(mysqli_num_rows($display_stds) == 0){
        echo "<script>alert('Sorry,No Reports ')</script>";
    }
    else{
    while($row = mysqli_fetch_array($display_stds)){
        $unv_id = $row['unv_id'];
        $name_std = $row['name_std'];
        $batch = $row['batch'];
        $type_certifcate_unv = $row['type_certifcate_unv'];
        $year_fee = $row['year_fee'];
        $register_fee = $row['register_fee'];
        $fees = $year_fee/2 ;
        $confirm_pay_s8 = $row["confirm_pay_s8"];
        if($confirm_pay_s8 == "done"){
            $class= "class='table-success'";
            $s =   "<td>"."Registerd"."</td>";
        }
        else{
            $class= "class='table-danger'";
            $s =   "<td>"."Not Registerd"."</td>";
        }
        echo "<tr $class>";
        echo "<td>".$unv_id."</td>";
        echo "<td>".$name_std."</td>";
        echo "<td>".$batch."</td>";
        echo "<td>".$type_certifcate_unv."</td>";
        echo "<td>".$semester."</td>";
        echo "<td>".$fees."</td>";
        echo $s;
        echo "</tr>";
}
    }
}
//---------------------------------------------------------------------------------------------------------------------------
}
    ?>
    </table>
</body>
</html>   