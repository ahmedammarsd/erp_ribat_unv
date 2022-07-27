<?php
include "../../../connection/connection.php";
$year = date("y");
session_start();
$name_user = $_SESSION["full_name_doctor"] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/scintific_affairs/info_std_electronic_register.css?v=<?php echo time();?>">
    <title>Review Information Students</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scintific Affairs</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../info_std_electronic_register/info_std_electronic_register.php"><li><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
            <a href="#"><li class="active"><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Reports</li></a>
            <a href="../../admin/statics/statics.php"><li><img src="../../../icons/admin.png" alt="" width="40px" height="40px">Admin</li></a>
        </ul>
        </div>
    <div class="container">
    <div class="header">
        <div class="nav">
        <div>
        <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
        </div>
        <div class="log">
        <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
        </div>
        </div>
    </div>

<div class="form">
<form action="" method="post">
    <div class="row">
        <div class="form-group col-lg-3 col-md-4 col-xs-12">
            <label for="" class="lead">Select The College </label>
            <select name="college" id="" class="form-select">
                <option value="none">Select The College</option>
                <option value="كلية دراسات الحاسوب"> Faculty Of Computers</option>
                <option value="كلية الطب">Faculty Of Medicine</option>
                <option value="كلية الهندسة">Faculty Of Engineering</option>
                <option value="كلية الاقتصاد">Faculty Of Economics</option>
                <option value="كلية الاعلام">Faculty Of Media</option>
            </select>
        </div>
        <div class="form-group col-lg-3 col-md-4 col-xs-12">
            <label for="" class="lead">Select Type Certificate </label>
            <select name="type_certificate_unv" id="" class="form-select">
                <option value="none">Select Type Of Certificate</option>
                <option value="بكلاريوس">Bechelor</option>
                <option value="دبلوم">Diploma</option>
            </select>
        </div>
        <div class="form-group col-lg-3 col-md-4 col-xs-12">
            <label for="" class="lead">Select Type Report </label>
            <select name="type_report" id="" class="form-select">
                <option value="none">Select  Type Report</option>
                <option value="confirm">Confirm Medical Examination</option>
                <option value="unconfirm">Unonfirm Medical Examination</option>
                <option value="all">All</option>
            </select>
        </div>
        <div class="form-group col-lg-3 col-md-12 col-xs-12 my-5">   
            <input type="submit" value="Search" name="ser" class="btn btn-primary ">
        </div>
    </form>
    <?php
if(isset($_POST["ser"])){
    $college = $_POST["college"];
    $type_certificate_unv = $_POST["type_certificate_unv"];
    $type_report = $_POST["type_report"];
   if($college == "none"){
    echo "<script>alert('Sorry, please select college');
    window.location.href='report_med_exam_info_stds_done.php';</script>";
   }
   elseif($type_certificate_unv == "none"){
    echo "<script>alert('Sorry, please select type certificate');
    window.location.href='report_med_exam_info_stds_done.php';</script>";
   }
   elseif($type_report == "none"){
    echo "<script>alert('Sorry, please select type report');
    window.location.href='report_med_exam_info_stds_done.php';</script>";
   }
   else{
    if($type_report == "confirm"){
    $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where college='$college' && type_certificate_unv='$type_certificate_unv' && doctor='done' && optic='done' && psychologist='done' && year='$year'");
    if(mysqli_num_rows($display_data) == 0){
        echo "<script>alert('Sorry, no student');
        window.location.href='report_med_exam_info_stds_done.php';</script>";
    }
    else{
        echo " <table class='table table-striped table-hover'>
        <tr>
            <th>Std Name</th>
            <th>Form Number</th>
            <th>College</th>
            <th>Certificate Type</th>
            <th>Department</th>
        </tr>";
        // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
            while($row = mysqli_fetch_array($display_data)){
                $id = $row['id'];
                $fullname = $row['name_std'];
                $form_number = $row['form_number'];
                $college = $row['college'];
                $type_certificate = $row["type_certificate_unv"];
                $department = $row["department"];
               echo "<tr class='table-success'>";
               echo "<td>".$fullname."</td>";
               echo "<td>".$form_number."</td>";
               echo "<td>".$college."</td>";
               echo "<td>".$type_certificate."</td>";
               echo "<td>".$department."</td>";              
               echo "</tr>";
        }
}
    }
    //----------
    if($type_report == "unconfirm"){
        $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department,notes_not_submit from new_std_form_info where college='$college' && type_certificate_unv='$type_certificate_unv'&& doctor='none' && optic='none' && psychologist='none' && year='$year'");
        if(mysqli_num_rows($display_data) == 0){
            echo "<script>alert('Sorry, no student');
            window.location.href='report_med_exam_info_stds_done.php';</script>";
        }
        else{
            echo " <table class='table table-striped table-hover'>
            <tr>
                <th>Std Name</th>
                <th>Form Number</th>
                <th>College</th>
                <th>Certificate Type</th>
                <th>Department</th>
                <th>Status</th>
            </tr>";
            // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
                while($row = mysqli_fetch_array($display_data)){
                    $id = $row['id'];
                    $fullname = $row['name_std'];
                    $form_number = $row['form_number'];
                    $college = $row['college'];
                    $type_certificate = $row["type_certificate_unv"];
                    $department = $row["department"];
                    $notes_not_submit = $row["notes_not_submit"];
                   echo "<tr class='table-danger'>";
                   echo "<td>".$fullname."</td>";
                   echo "<td>".$form_number."</td>";
                   echo "<td>".$college."</td>";
                   echo "<td>".$type_certificate."</td>";
                   echo "<td>".$department."</td>";      
                   echo "<td>".$notes_not_submit."</td>";              
                   echo "</tr>";
            }
    }
        }  
  //----------
  if($type_report == "all"){
    $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department ,doctor, optic,psychologist from new_std_form_info where  doctor='none' || doctor='done' && optic='none' && optic='done' && psychologist='none'  || psychologist='done' &&  college='$college' && type_certificate_unv='$type_certificate_unv' && year='$year'");
    if(mysqli_num_rows($display_data) == 0){
        echo "<script>alert('Sorry, no student');
        window.location.href='report_med_exam_info_stds_done.php';</script>";
    }
    else{
        echo " <table class='table table-striped table-hover'>
        <tr>
            <th>Std Name</th>
            <th>Form Number</th>
            <th>College</th>
            <th>Certificate Type</th>
            <th>Department</th>
        </tr>";
        // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
            while($row = mysqli_fetch_array($display_data)){
                $id = $row['id'];
                $fullname = $row['name_std'];
                $form_number = $row['form_number'];
                $college = $row['college'];
                $type_certificate = $row["type_certificate_unv"];
                $department = $row["department"];
                $doctor = $row["doctor"];
                $optic = $row["optic"];
                $psychologist = $row["psychologist"];
                if($doctor == "done" && $optic == "done" && $psychologist == "done"){
                    $class = " class='table-success'";
                }
                else{
                    $class = " class='table-danger'";
                }
               echo "<tr $class>";
               echo "<td>".$fullname."</td>";
               echo "<td>".$form_number."</td>";
               echo "<td>".$college."</td>";
               echo "<td>".$type_certificate."</td>";
               echo "<td>".$department."</td>";      
               echo "</tr>";
        }
}
    }  
}
}
// elseif($typejop === "كلية دراسات الحاسوب" && $type_certificate_unv === "دبلوم" ){
//     echo "
//       <table class='table table-striped table-hover'>
//       <tr>
//       <th>Std Name</th>
//       <th>Form Number</th>
//       <th>College</th>
//       <th>Certificate Type</th>
//       <th>Department</th>
//       <th>Opratin</th>
//     </tr>
//      ";
//       $display_data = mysqli_query($connection , "select id,form_number,name_std,college,type_certificate_unv,department from new_std_form_info where review ='none' and type_certificate_unv = 'دبلوم' and year='$year' ");
//           // لو الالمتغير الفوق دا صحيح سوف يتم عرض البيانات
//           if($display_data){
//               while( $row = mysqli_fetch_array($display_data)){
//                   $id = $row['id'];
//                   $fullname = $row['name_std'];
//                   $form_number = $row['form_number'];
//                   $college = $row['college'];
//                   $type_certificate = $row["type_certificate_unv"];
//                   $department = $row["department"];
//                  echo "<tr>";
//                  echo "<td>".$fullname."</td>";
//                  echo "<td>".$form_number."</td>";
//                  echo "<td>".$college."</td>";
//                  echo "<td>".$type_certificate."</td>";
//                  echo "<td>".$department."</td>";            
//                  echo "<td><a href='../review_the_info/review_the_info.php?std_id=".$id."'><button  class='btn btn-primary'> Rview</button></a>";
//                  echo "<tr>";
//               }
//           }
  
 //  echo "</table>" ;
  //}
?>
</table>
</div>
</body>
</html>