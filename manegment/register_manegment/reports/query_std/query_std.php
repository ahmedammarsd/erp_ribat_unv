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
    <link rel="stylesheet" href="../../../../css/manegment/dialy_reports.css?v=<?php echo time();?>">

    <title>Payment Students</title>
</head>
<body>
    <form action="" method="post">
    <div  class="form-group">
            <label for="" class="lead"> Select Type Search</label>
                <select name="search" id="" class="form-select">
                    <option value="none">--- Select Type Search ---</option>
                    <option value="u_id">Univirsty Id</option>
                    <option value="n_std">Name Student</option>
                </select>
            </div>
            <div class="form-group">
            <label for="" class="lead"> Univirsty Id/ Name Student  </label>
            <input type="text"  name="info_std" class="form-control">
            </div>
    <div class="form-group">
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
                    <option value="all">All</option>
                </select>
            </div>
            <div class="form-group">
            <input type="submit" value="Search" name="ser">
            </div>
    </form>
    <table class="table table-success table-hover">
        <tr class="table-dark">
            <th>Unv ID</th>
            <th>Name Student</th>
            <th>Batch</th>
            <th>Certifcate</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Fees</th>
            <th>Status</th>
        </tr>
        <?php
        if(isset($_POST["ser"])){
            $search = $_POST["search"];
           $info_std = $_POST["info_std"];
           $semester = $_POST["semester"];
           
           if($search == "none"){
            echo "<script>alert('Sorry, Please Select Type Search)</script>";
        }
        elseif($semester == "none"){
            echo "<script>alert('Sorry, Please Select Semester')</script>";
        }
        elseif($search == "u_id"){
            $display_std = mysqli_query($connection , "select * from students where unv_id='$info_std'");
            if(mysqli_num_rows($display_std) == 0){
                echo "<script>alert('Sorry,No Infirmation')</script>";
            }
            else{
            $row = mysqli_fetch_array($display_std);
            $unv_id = $row["unv_id"];
            $name_std = $row["name_std"];
            $type_certifcate_unv = $row["type_certifcate_unv"];
            $department = $row["department"];
            $batch = $row["batch"];
            $register_fee = $row["register_fee"];
            $year_fee = $row["year_fee"];
            $confirm_pay_s1 = $row["confirm_pay_s1"];
            $confirm_pay_s2 = $row["confirm_pay_s2"];
            $confirm_pay_s3 = $row["confirm_pay_s3"];
            $confirm_pay_s4 = $row["confirm_pay_s4"];
            $confirm_pay_s5 = $row["confirm_pay_s5"];
            $confirm_pay_s6 = $row["confirm_pay_s6"];
            $confirm_pay_s7 = $row["confirm_pay_s7"];
            $confirm_pay_s8 = $row["confirm_pay_s8"];
            if($semester == "1"){
                $fees = ($year_fee/2)+$register_fee;
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
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "2"){
                $fees = $year_fee/2;
                if($confirm_pay_s2 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "3"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s3 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "4"){
                $fees = $year_fee/2;
                if($confirm_pay_s4 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "5"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s5 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "6"){
                $fees = $year_fee/2;
                if($confirm_pay_s6 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "7"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s7 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "8"){
                $fees = $year_fee/2;
                if($confirm_pay_s8 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "all"){
                $fees1 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s1 == "done"){
                    $class1= "class='table-success'";
                    $s1 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class1= "class='table-danger'";
                    $s1 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class1>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."1"."</td>";
                echo "<td>".$fees1."</td>";
                echo $s1;
                echo "</tr>";
                //---
                //---
                $fees2 = $year_fee/2;
                if($confirm_pay_s2 == "done"){
                    $class2= "class='table-success'";
                    $s2 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class2= "class='table-danger'";
                    $s2 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class2>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."2"."</td>";
                echo "<td>".$fees2."</td>";
                echo $s2;
                echo "</tr>";
                //------
                $fees3 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s3 == "done"){
                    $class3= "class='table-success'";
                    $s3 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class3= "class='table-danger'";
                    $s3 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class3>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."3"."</td>";
                echo "<td>".$fees3."</td>";
                echo $s3;
                echo "</tr>";
                //---
                $fees4 = $year_fee/2;
                if($confirm_pay_s4 == "done"){
                    $class4= "class='table-success'";
                    $s4 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class4= "class='table-danger'";
                    $s4 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class4>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."4"."</td>";
                echo "<td>".$fees4."</td>";
                echo $s4;
                echo "</tr>";
                //------
                $fees5 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s5 == "done"){
                    $class5= "class='table-success'";
                    $s5 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class5= "class='table-danger'";
                    $s5 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class5>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."5"."</td>";
                echo "<td>".$fees5."</td>";
                echo $s5;
                echo "</tr>";
                //---
                //---
                $fees6 = $year_fee/2;
                if($confirm_pay_s6 == "done"){
                    $class6= "class='table-success'";
                    $s6 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class6= "class='table-danger'";
                    $s6 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class6>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."6"."</td>";
                echo "<td>".$fees6."</td>";
                echo $s6;
                echo "</tr>";
                //----
                $fees7 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s7 == "done"){
                    $class7= "class='table-success'";
                    $s7 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class7= "class='table-danger'";
                    $s7 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class7>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."7"."</td>";
                echo "<td>".$fees7."</td>";
                echo $s7;
                echo "</tr>";
                //---
                $fees8 = $year_fee/2;
                if($confirm_pay_s8 == "done"){
                    $class8= "class='table-success'";
                    $s8 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class8= "class='table-danger'";
                    $s8 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class8>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."8"."</td>";
                echo "<td>".$fees8."</td>";
                echo $s8;
                echo "</tr>";
            }
        }
    }
        ///-----------------------------------------------------------------------------------------------------------------------
        ///-----------------------------------------------------------------------------------------------------------------------
        elseif($search == "n_std"){
            $display_std = mysqli_query($connection , "select * from students where name_std='$info_std'");
            if(mysqli_num_rows($display_std) == 0){
                echo "<script>alert('Sorry,No Infirmation')</script>";
            }
            else{
            $row = mysqli_fetch_array($display_std);
            $unv_id = $row["unv_id"];
            $name_std = $row["name_std"];
            $type_certifcate_unv = $row["type_certifcate_unv"];
            $department = $row["department"];
            $batch = $row["batch"];
            $register_fee = $row["register_fee"];
            $year_fee = $row["year_fee"];
            $confirm_pay_s1 = $row["confirm_pay_s1"];
            $confirm_pay_s2 = $row["confirm_pay_s2"];
            $confirm_pay_s3 = $row["confirm_pay_s3"];
            $confirm_pay_s4 = $row["confirm_pay_s4"];
            $confirm_pay_s5 = $row["confirm_pay_s5"];
            $confirm_pay_s6 = $row["confirm_pay_s6"];
            $confirm_pay_s7 = $row["confirm_pay_s7"];
            $confirm_pay_s8 = $row["confirm_pay_s8"];
            if($semester == "1"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s1 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "2"){
                $fees = $year_fee/2;
                if($confirm_pay_s2 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "3"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s3 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "4"){
                $fees = $year_fee/2;
                if($confirm_pay_s4 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "5"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s5 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "6"){
                $fees = $year_fee/2;
                if($confirm_pay_s6 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "7"){
                $fees = ($year_fee/2)+$register_fee;
                if($confirm_pay_s7 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
            //-----
            elseif($semester == "8"){
                $fees = $year_fee/2;
                if($confirm_pay_s8 == "done"){
                    $class= "class='table-success'";
                    $s = "<td>"."Registerd"."</td>";
                }
                else{
                    $class= "class='table-danger'";
                    $s = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>".$semester."</td>";
                echo "<td>".$fees."</td>";
                echo $s;
                echo "</tr>";
            }
             //-----
             elseif($semester == "all"){
                $fees1 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s1 == "done"){
                    $class1= "class='table-success'";
                    $s1 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class1= "class='table-danger'";
                    $s1 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class1>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."1"."</td>";
                echo "<td>".$fees1."</td>";
                echo $s1;
                echo "</tr>";
                //---
                //---
                $fees2 = $year_fee/2;
                if($confirm_pay_s2 == "done"){
                    $class2= "class='table-success'";
                    $s2 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class2= "class='table-danger'";
                    $s2 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class2>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."2"."</td>";
                echo "<td>".$fees2."</td>";
                echo $s2;
                echo "</tr>";
                //------
                $fees3 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s3 == "done"){
                    $class3= "class='table-success'";
                    $s3 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class3= "class='table-danger'";
                    $s3 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class3>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."3"."</td>";
                echo "<td>".$fees3."</td>";
                echo $s3;
                echo "</tr>";
                //---
                $fees4 = $year_fee/2;
                if($confirm_pay_s4 == "done"){
                    $class4= "class='table-success'";
                    $s4 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class4= "class='table-danger'";
                    $s4 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class4>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."4"."</td>";
                echo "<td>".$fees4."</td>";
                echo $s4;
                echo "</tr>";
                //------
                $fees5 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s5 == "done"){
                    $class5= "class='table-success'";
                    $s5 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class5= "class='table-danger'";
                    $s5 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class5>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."5"."</td>";
                echo "<td>".$fees5."</td>";
                echo $s5;
                echo "</tr>";
                //---
                //---
                $fees6 = $year_fee/2;
                if($confirm_pay_s6 == "done"){
                    $class6= "class='table-success'";
                    $s6 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class6= "class='table-danger'";
                    $s6 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class6>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."6"."</td>";
                echo "<td>".$fees6."</td>";
                echo $s6;
                echo "</tr>";
                //----
                $fees7 = ($year_fee/2)+$register_fee;
                if($confirm_pay_s7 == "done"){
                    $class7= "class='table-success'";
                    $s7 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class7= "class='table-danger'";
                    $s7 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class7>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."7"."</td>";
                echo "<td>".$fees7."</td>";
                echo $s7;
                echo "</tr>";
                //---
                $fees8 = $year_fee/2;
                if($confirm_pay_s8 == "done"){
                    $class8= "class='table-success'";
                    $s8 = "<td>"."Registerd"."</td>";
                }
                else{
                    $class8= "class='table-danger'";
                    $s8 = "<td>"."Not Registerd"."</td>";
                }
                echo "<tr $class8>";
                echo "<td>".$unv_id."</td>";
                echo "<td>".$name_std."</td>";
                echo "<td>".$batch."</td>";
                echo "<td>".$type_certifcate_unv."</td>";
                echo "<td>".$department."</td>";
                echo "<td>"."8"."</td>";
                echo "<td>".$fees8."</td>";
                echo $s8;
                echo "</tr>";
            }
        }
    }
        ///-----------------------------------------------------------------------------------------------------------------------
        ///-----------------------------------------------------------------------------------------------------------------------
    }
        ?>
    </table>
</body>
</html>