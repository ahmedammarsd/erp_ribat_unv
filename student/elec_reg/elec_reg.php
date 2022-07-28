<?php
include "../../connection/connection.php";
session_start();
$unv_id = $_SESSION["unv_id"];
$name_std = $_SESSION["name_std"] ;
$batch = $_SESSION["batch"];
$TGPA = $_SESSION["TGPA"];
$register_fee = $_SESSION["register_fee"] ;
$year_fee=$_SESSION["year_fee"];
$semester = $_SESSION["semester"];
$type_certifcate_unv = $_SESSION["type_certifcate_unv"];
$department = $_SESSION["department"];
$confirm_pay_s1 = $_SESSION["confirm_pay_s1"];
 $confirm_pay_s2 = $_SESSION["confirm_pay_s2"];
 $confirm_pay_s3 = $_SESSION["confirm_pay_s3"];
 $confirm_pay_s4 = $_SESSION["confirm_pay_s4"];
 $confirm_pay_s5 = $_SESSION["confirm_pay_s5"];
 $confirm_pay_s6 = $_SESSION["confirm_pay_s6"];
 $confirm_pay_s7 = $_SESSION["confirm_pay_s7"];
 $confirm_pay_s8 = $_SESSION["confirm_pay_s8"];
//echo $semester;
//هنا لمعرفة اذا ما النتيجة طلعت او لا لاستكمال عملية التسجيل والدفع
$GPA_S1 = $_SESSION["GPA_S1"];
 $GPA_S2 = $_SESSION["GPA_S2"];
 $GPA_S3 = $_SESSION["GPA_S3"];
 $GPA_S4 = $_SESSION["GPA_S4"];
 $GPA_S5 = $_SESSION["GPA_S5"];
 $GPA_S6 = $_SESSION["GPA_S6"];
 $GPA_S7 = $_SESSION["GPA_S7"];
 $GPA_S8 = $_SESSION["GPA_S8"];
//-----------------------------------------------------
//عرض نتيجته على حسب السمستر في حالة ساقط في مادة
if($semester == 2 || $semester == 4 || $semester == 6){
    //عرض الدرجات الاقل من خمسين في الامتحان النهائي للسنه ولو يمتحنو الملحق بعد
$display_num_subject_if_degree_less_50_normal_exam = mysqli_query($connection , "select * from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && degree_exam<'49' && degree_exam!='' && check_tetcher2='none'");
 //عرض الدرجات الاقل من خمسين في الامتحان الملاحق 
$display_num_subject_if_degree_less_50_sub_exam = mysqli_query($connection , "select * from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && degree_exam2<49 && degree_exam2!=''");
//عرض لدرجات الامتجانين مع بعض النهائي والملاحق
//$display_num_subject_if_degree_less_50_normal_exam = mysqli_query($connection , "select * from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && degree_exam<'49' && degree_exam!='' && degree_exam2<49");
$num_subject_normal_exam  = mysqli_num_rows($display_num_subject_if_degree_less_50_normal_exam);
$num_subject_sub_exam  = mysqli_num_rows($display_num_subject_if_degree_less_50_sub_exam);
//اي اظهار عدد المواد التي لديه فيها ملحق ثم امتحنها ولم ينجح ايضا
if($num_subject_normal_exam >= 1){
    $num_subject =  $num_subject_normal_exam;
}
elseif($num_subject_sub_exam >= 1){
    $num_subject = $num_subject_sub_exam;
}
else{
    $num_subject = 0;
}
}
else{
    $num_subject = 0;
}
//echo $num_subject;

if($confirm_pay_s1 == "none"){
    $status = "التسجيل ودفع رسوم السمستر الاول";
    $semester_reg_pay =1;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "none"){
    $status = "التسجيل ودفع رسوم السمستر الثاني";
    $semester_reg_pay =2;
    $TGPA_S = $GPA_S1;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "none" ){
    $status = "التسجيل ودفع رسوم السمستر الثالث";
    $semester_reg_pay =3;
    $TGPA_S = $GPA_S2;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'none' ){
    $status = "التسجيل ودفع رسوم السمستر الرابع";
    $$semester_reg_pay =4;
    $TGPA_S = $GPA_S3;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'done' && $confirm_pay_s5 == 'none' ){
    $status = "التسجيل ودفع رسوم السمستر الخامس";
    $semester_reg_pay =5;
    $TGPA_S = $GPA_S4;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'done' && $confirm_pay_s5 == 'done' && $confirm_pay_s6 == 'none' ){
    $status = "التسجيل ودفع رسوم السمستر السادس";
    $semester_reg_pay =6;
    $TGPA_S = $GPA_S5;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'done' && $confirm_pay_s5 == 'done' && $confirm_pay_s6 == 'done' && $confirm_pay_s7 == "none" ){
    $status = "التسجيل ودفع رسوم السمستر السابع";
    $semester_reg_pay =6;
    $TGPA_S = $GPA_S6;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'done' && $confirm_pay_s5 == 'done' && $confirm_pay_s6 == 'done' && $confirm_pay_s7 == "done" && $confirm_pay_s8 == "none" ){
    $status = "التسجيل ودفع رسوم السمستر الثامن";
    $semester_reg_pay =8;
    $TGPA_S = $GPA_S7;
}
elseif($confirm_pay_s1 == "done" && $confirm_pay_s2 == "done" && $confirm_pay_s3 == "done" && $confirm_pay_s4 == 'done' && $confirm_pay_s5 == 'done' && $confirm_pay_s6 == 'done' && $confirm_pay_s7 == "done" && $confirm_pay_s8 == "done" ){
    $status = "لقد اكملت دفع رسوم كل السمسترات";
}
if(isset($_POST["check_info_std"])){
     //عرض البيانات في حالة اذا الطالب كان مسجل
    // $display_std_if_exsist_in_reg = mysqli_query($connection , "select * from std_reg_fees where unv_id='$unv_id' && name_std='$name_std' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && reg_for_semester='$semester'");
     //$display_submit_std_if_exsist_in_reg = mysqli_num_rows($display_std_if_exsist_in_reg);
     //if($display_submit_std_if_exsist_in_reg >= 1){
       //  echo "<script>alert('عذرا لقد قمت بعملية التسجيل مسبقا');
         //window.location.href='../profile_std/profile_std.php';</script>";
     //}
     if($TGPA_S == 'none' || $TGPA_S=='0.00'){
        echo "<script>alert('عذرا لم يتم فتح التسجيل بعد')</script>";
    }
    elseif($semester == 2 && $TGPA < 2.00){
        echo "<script>alert('عذرا معدلك التراكمي اقل من 2.00')</script>";
    }
    elseif($semester == 4 && $TGPA < 2.00){
        echo "<script>alert('عذرا معدلك التراكمي اقل من 2.00')</script>";
    }
    elseif($semester == 6 && $TGPA < 2.00){
        echo "<script>alert('عذرا معدلك التراكمي اقل من 2.00')</script>";
    }
    elseif($num_subject > 0){
        echo "<script>alert('عذرا لديك امتحانات ملاحق لايمكنك التسجيل')</script>";
    }
    else{
        $_SESSION["status"] = $status;
        $_SESSION["semester_reg_pay"] = $semester_reg_pay;
       header("location: ../online_pay/online_pay.php");
    }
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
    <link rel="stylesheet" href="../../css/manegment/student/elec_reg.css?v=<?php echo time();?>">
    <title>elec_reg</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Student</h2>
        </div>
        <ul>
        <a href="../display_result/display_result.php"><li><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Result</li></a>
        <a href="../elec_reg/elec_reg.php"><li class="active"><img src="../../icons/statc1.png" alt="" width="40px" height="40px">Register</li></a>   
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../profile_std/profile_std.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name ?></h3>
            </div>
            <div class="log">
            <a href="../login_std/login_std.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form">
<form action="" method="post">
<div class="row">
    <div class="form-group col-lg-12 col-md-6 col-xs-12">
        <label for=""class="lead">UNV ID </label>
        <input type="text" name="unv_id" value="<?php echo $unv_id ?>" id="" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-12 col-md-6 col-xs-12">
        <label for=""class="lead">Name</label>
        <input type="text" name="name_std" value="<?php echo $name_std ?>" id="" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-12 col-md-6 col-xs-12">
        <label for=""class="lead">Status </label>
        <input type="text" name="name_std" value="<?php echo $status ?>" id="" class="form-control" readonly>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
            <input type="submit" value="Continue Registre" name="check_info_std" class="btn btn-primary">
        </div>
    </form>
</body>
</html>