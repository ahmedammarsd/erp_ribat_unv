<?php
include "../../connection/connection.php";
session_start();
$unv_id = $_SESSION["unv_id"];
/*
تجربة لعمل مقارنة بين التوارخ
$date1 = date("Y-m-d");
$date2 = "2022-06-10    ";
if($date1 <= $date2){
    echo "goood";
}
*/
//عرض بعض معلومات الطلبة واستخدام المتغيرات في لحساب عدد ساعات المواد
$display_info_std = mysqli_query($connection , "select type_certifcate_unv , department, batch from students where unv_id='$unv_id'");
$row_std = mysqli_fetch_array($display_info_std);
$type_certifcate_unv = $row_std["type_certifcate_unv"];
$department = $row_std["department"];
$batch = $row_std["batch"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/student/display_result.css?v=<?php echo time();?>">
    <title>result</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Student</h2>
        </div>
        <ul>
        <a href="../display_result/display_result.php"><li class="active"><img src="../../icons/re.png" alt="" width="40px" height="40px">Result</li></a>
        <a href="../elec_reg/elec_reg.php"><li><img src="../../icons/reg.png" alt="" width="40px" height="40px">Register</li></a>   
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
         <div class="form-group col-lg-6 col-md-6 col-xs-12">
         <label for=""class="lead">Semester</label>
                <select name="semester" id="" class="form-select">
                    <option value="none"> Select Semester </option>
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
            <div class="form-group col-lg-4 col-md-6 col-xs-12 my-5">
                <input type="submit" value="Search" name="result" class="btn btn-primary">
            </div>
    </form>
    <?php
    if(isset($_POST["result"])){
        $semester = $_POST["semester"];
        $display_subject_and_degree = mysqli_query($connection , "select name_subject ,degree_exam,number_of_hour_subject , number_of_points from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && check_tetcher='done'");
        if(mysqli_num_rows($display_subject_and_degree) == 0 ){
            echo "عذرا لم يتم اعلان النتيجة حتى الان";
        }
        else{
            while($row = mysqli_fetch_array($display_subject_and_degree)){
                $name_subject = $row["name_subject"];
                $degree_exam = $row["degree_exam"];
                $number_of_hour_subject = $row["number_of_hour_subject"];
                $number_of_points = $row["number_of_points"];
                if($degree_exam >=90){
                    $result = "A";
                    $points = 4;
                }
                elseif($degree_exam >=80){
                    $result = "B+";
                    $points = 3.5;
                }
                elseif($degree_exam >=70){
                    $result = "B";
                    $points = 3;
                }
                elseif($degree_exam >=60){
                    $result = "C+";
                    $points = 2.5;
                }
                elseif($degree_exam >=50){
                    $result = "C";
                    $points = 2;
                }
                elseif($degree_exam <50){
                    $result = "F";
                    $points = 0;
                }
               // $number_points =$number_of_hour_subject* $points;
                echo "
                <table cellpadding='20'>
                <tr>
                <td>$name_subject</td>
                <td><span style='color:blue;'>$result</span></td>
                </tr>
                </table>
                ";
          }
          //عرض مجموع ساعات المواد
          $display_sum_hours = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='$semester'");
          //عرض مجموع نقاط الطالب
          $display_sum_points = mysqli_query($connection , "select sum(number_of_points) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='$semester' && check_tetcher='done'");
                $hours = mysqli_fetch_array($display_sum_hours)["hours"];
                $total_points = mysqli_fetch_array($display_sum_points)["points"];
               // echo $hours ."<br>";
                $SGPA =  $total_points/$hours;
                echo " المعدل الفصلي :". round($SGPA,2) . "<br>";
            
               // لحدي هنا يتم عرض النتيجة على حسب السمستر والمعدل الفصلي
        //------------------------------------------------------------------------------------------------------------------------------------ 
          //---------------------------------------------------------------------------------------------------------------------------------      
          $display_if_have_degree_less_50 = mysqli_query($connection , "select degree_exam from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && degree_exam < 50");
          if(mysqli_num_rows($display_if_have_degree_less_50) > 0 ){
           echo "ملحق <br>";
           // في حالة لديه ملحق
           $display_subject_and_degree = mysqli_query($connection , "select name_subject ,degree_exam2,number_of_hour_subject , number_of_points_2 from submit_std_and_result_subjects where unv_id='$unv_id' && semester='$semester' && degree_exam < 50 && check_tetcher2='done'");
           while($row2 = mysqli_fetch_array($display_subject_and_degree)){
            $name_subject = $row2["name_subject"];
            $degree_exam = $row2["degree_exam2"];
            $number_of_hour_subject = $row2["number_of_hour_subject"];
            $number_of_points = $row2["number_of_points_2"];
            if($degree_exam >=90){
                $result = "A";
                $points = 4;
            }
            elseif($degree_exam >=80){
                $result = "B+";
                $points = 3.5;
            }
            elseif($degree_exam >=70){
                $result = "B";
                $points = 3;
            }
            elseif($degree_exam >=60){
                $result = "C+";
                $points = 2.5;
            }
            elseif($degree_exam >=50){
                $result = "C";
                $points = 2;
            }
            elseif($degree_exam < 50){
                $result = "F";
                $points = 0;
            }
           // $number_points =$number_of_hour_subject* $points;
            echo "
            <table cellpadding='20'>
            <tr>
            <td>$name_subject</td>
            <td><span style='color:blue;'>$result</span></td>
            </tr>
            </table>
            ";
        }
        //اضافة عدد الساعات والنقاط الى المعدلات
           //عرض مجموع ساعات المواد
           $display_sum_hours_sub = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='$semester'");
           //عرض مجموع نقاط الطالب
           $display_sum_points_sub = mysqli_query($connection , "select sum(number_of_points_2) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department'  && semester='$semester' && check_tetcher2='done'");
                 $hours_sub = mysqli_fetch_array($display_sum_hours_sub)["hours"];
                 $total_points_sub = mysqli_fetch_array($display_sum_points_sub)["points"];
                 // التي قام بامتحانها هنا نقوم بحساب او اضافة نقاط المادة على حسب المادة او المواد
                 $new_points = $total_points + $total_points_sub;
                 $SGPA_sub =  $new_points/$hours;
                //echo $SGPA_sub . "<br>";
                //عمل تغيير للمعدللات بعد امتحانات الملاحق
                 if($semester == 1){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S1='$SGPA_sub'  where unv_id='$unv_id'");
                   //$display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 from students where unv_id='$unv_id'");
                    //$row_sub=mysqli_fetch_array($display_SGPA_TGPA);
                    //$display_SGPA_SUB = $row_sub["GPA_S1"];
                   // $display_TGPA_SUB = $row["GPA_S1"];
                }
                if($semester == 2){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S2='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 3){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S3='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 4){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S4='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 5){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S5='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 6){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S6='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 7){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S7='$SGPA_sub'  where unv_id='$unv_id'");
                }
                if($semester == 7){
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S8='$SGPA_sub'  where unv_id='$unv_id'");
                }
                 
       }  
        //--------------------------------------------------------------------------------------------------------------------------------------
          //تاني حساب المعدلات التراكمية على حسب السمستر     
          if($semester == 1){
              //عمل شرط في حالة لمن يتم تحديث المعدل  يتم عمل التحديث واذا تم عمل التحديث يتم العرض
            $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 from students where unv_id='$unv_id'");
            $row=mysqli_fetch_array($display_SGPA_TGPA);
            $display_GPA_S_for_condition = $row["GPA_S1"];
           // $display_TGPA_for_condition = $row["TGPA"];
            if($display_GPA_S_for_condition === "none"){
                $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S1='$SGPA'  where unv_id='$unv_id'");
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1  from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S = round($row["GPA_S1"],2);
                $display_TGPA = round($row["GPA_S1"],2);
            }
            else{
                //echo "hhhhhhh <br>";
               // $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 , TGPA from students where unv_id='$unv_id'");
                //$row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S = round($row["GPA_S1"],2);
                $display_TGPA = round($row["GPA_S1"],2);
            }
        }
        if($semester == 2){
            $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2 , TGPA_S2 from students where unv_id='$unv_id'");
            $row=mysqli_fetch_array($display_SGPA_TGPA);
            $display_GPA_S_1 = $row["GPA_S1"];
            $display_GPA_S_2 = $row["GPA_S2"];
            $display_TGPA_S2 = $row["TGPA_S2"];
            if($display_GPA_S_2 === "none" && $display_TGPA_S2 == "none"){
     /*            //عرض مجموع ساعات المواد
          $display_sum_hours1 = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' &&  semester='1'");
          $display_sum_hours2 = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' &&  semester='2'");
          //عرض مجموع نقاط الطالب
          $display_sum_points1 = mysqli_query($connection , "select sum(number_of_points) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='1' && check_tetcher='done'");
          $display_sum_points2 = mysqli_query($connection , "select sum(number_of_points) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='2' && check_tetcher='done'");
          $display_sum_points_sub1 = mysqli_query($connection , "select sum(number_of_points_2) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='1' && check_tetcher='done'");
                $hours1 = mysqli_fetch_array($display_sum_hours1)["hours"];
                $hours2 = mysqli_fetch_array($display_sum_hours2)["hours"];
                $new_hours = $hours1 + $hours2;
                $total_points1 = mysqli_fetch_array($display_sum_points1)["points"];
                $total_points2 = mysqli_fetch_array($display_sum_points2)["points"];
                $total_points_sub1_points = mysqli_fetch_array($display_sum_points_sub1)["points"];
                $new_total_points = $total_points1 + $total_points2 + $total_points_sub1_points;
                $TGPA =  $new_total_points/$new_hours;
               // echo "<br>".$new_total_points  ."<br>";
               */
              $Calc_TGBA = $SGPA + $display_GPA_S_1;
              $TGPA = $Calc_TGBA/2;
            $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S2='$SGPA' , TGPA_S2='$TGPA' where unv_id='$unv_id'");
            $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S2 , TGPA_S2 from students where unv_id='$unv_id'");
            $row=mysqli_fetch_array($display_SGPA_TGPA);
           // $display_GPA_S = $row["GPA_S2"];
            //$display_TGPA = $row["TGPA_S2"];
                $display_GPA_S = round($row["GPA_S2"],2);
                $display_TGPA = round($TGPA,2);
           // echo $display_TGPA;
            }
            else{
               // echo "hhhhhhhhhhhhhhhhhh <br>";
               $Calc_TGBA = $display_GPA_S_2 + $display_GPA_S_1;
               $TGPA = $Calc_TGBA/2;

                $display_GPA_S = round($row["GPA_S2"],2);
                $display_TGPA = round($TGPA,2);
    
            }
        }
            //------------------------------------
            if($semester == 3){
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2,GPA_S3 , TGPA_S3 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S_1 = $row["GPA_S1"];
                $display_GPA_S_2 = $row["GPA_S2"];
                $display_GPA_S_3 = $row["GPA_S3"];
                $display_TGPA_S3 = $row["TGPA_S3"];
                if($display_GPA_S_3 === "none" && $display_TGPA_S3 == "none"){
         /*            //عرض مجموع ساعات المواد
              $display_sum_hours1 = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' &&  semester='1'");
              $display_sum_hours2 = mysqli_query($connection , "select sum(number_of_hour_subject) AS hours from distribution_subject where batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' &&  semester='2'");
              //عرض مجموع نقاط الطالب
              $display_sum_points1 = mysqli_query($connection , "select sum(number_of_points) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='1' && check_tetcher='done'");
              $display_sum_points2 = mysqli_query($connection , "select sum(number_of_points) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='2' && check_tetcher='done'");
              $display_sum_points_sub1 = mysqli_query($connection , "select sum(number_of_points_2) AS points from submit_std_and_result_subjects where unv_id='$unv_id' && batch='$batch' && type_certifcate_unv='$type_certifcate_unv' && department='$department' && semester='1' && check_tetcher='done'");
                    $hours1 = mysqli_fetch_array($display_sum_hours1)["hours"];
                    $hours2 = mysqli_fetch_array($display_sum_hours2)["hours"];
                    $new_hours = $hours1 + $hours2;
                    $total_points1 = mysqli_fetch_array($display_sum_points1)["points"];
                    $total_points2 = mysqli_fetch_array($display_sum_points2)["points"];
                    $total_points_sub1_points = mysqli_fetch_array($display_sum_points_sub1)["points"];
                    $new_total_points = $total_points1 + $total_points2 + $total_points_sub1_points;
                    $TGPA =  $new_total_points/$new_hours;
                   // echo "<br>".$new_total_points  ."<br>";
                   */
                  $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2;
                  $TGPA = $Calc_TGBA/3;
                $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S3='$SGPA' , TGPA_S3='$TGPA' where unv_id='$unv_id'");
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S3 , TGPA_S3 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
               // $display_GPA_S = $row["GPA_S2"];
                //$display_TGPA = $row["TGPA_S2"];
                    $display_GPA_S = round($row["GPA_S3"],2);
                    $display_TGPA = round($TGPA,2);
               // echo $display_TGPA;
                }
                else{
                   // echo "hhhhhhhhhhhhhhhhhh <br>";
                   $Calc_TGBA = $display_GPA_S_3 + $display_GPA_S_1 + $display_GPA_S_2;
                   $TGPA = $Calc_TGBA/3;
    
                    $display_GPA_S = round($row["GPA_S3"],2);
                    $display_TGPA = round($TGPA,2);
                }
            }
                //------------------------------------
                if($semester == 4){
                    $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2, GPA_S3,GPA_S4 , TGPA_S4 from students where unv_id='$unv_id'");
                    $row=mysqli_fetch_array($display_SGPA_TGPA);
                    $display_GPA_S_1 = $row["GPA_S1"];
                    $display_GPA_S_2 = $row["GPA_S2"];
                    $display_GPA_S_3 = $row["GPA_S3"];
                    $display_GPA_S_4 = $row["GPA_S4"];
                    $display_TGPA_S4 = $row["TGPA_S4"];
                    if($display_GPA_S_4 === "none" && $display_TGPA_S4 == "none"){
                      $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3;
                      $TGPA = $Calc_TGBA/4;
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S4='$SGPA' , TGPA_S4='$TGPA' where unv_id='$unv_id'");
                    $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S4 , TGPA_S4 from students where unv_id='$unv_id'");
                    $row=mysqli_fetch_array($display_SGPA_TGPA);
                        $display_GPA_S = round($row["GPA_S4"],2);
                        $display_TGPA = round($TGPA,2);
                    }
                    else{
                       $Calc_TGBA =$display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4;
                       $TGPA = $Calc_TGBA/4;
        
                        $display_GPA_S = round($row["GPA_S4"],2);
                        $display_TGPA = round($TGPA,2);
                    }
            }
                //------------------------------------
                if($semester == 5){
                    $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2, GPA_S3,GPA_S4,GPA_S5 , TGPA_S5 from students where unv_id='$unv_id'");
                    $row=mysqli_fetch_array($display_SGPA_TGPA);
                    $display_GPA_S_1 = $row["GPA_S1"];
                    $display_GPA_S_2 = $row["GPA_S2"];
                    $display_GPA_S_3 = $row["GPA_S3"];
                    $display_GPA_S_4 = $row["GPA_S4"];
                    $display_GPA_S_5 = $row["GPA_S5"];
                    $display_TGPA_S5 = $row["TGPA_S5"];
                    if($display_GPA_S_5 === "none" && $display_TGPA_S5 == "none"){
                    $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4;
                    $TGPA = $Calc_TGBA/4;
                    $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S5='$SGPA' , TGPA_S5='$TGPA' where unv_id='$unv_id'");
                    $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S5 , TGPA_S5 from students where unv_id='$unv_id'");
                    $row=mysqli_fetch_array($display_SGPA_TGPA);
                        $display_GPA_S = round($row["GPA_S5"],2);
                        $display_TGPA = round($TGPA,2);
                    }
                    else{
                    $Calc_TGBA =$display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5;
                    $TGPA = $Calc_TGBA/5;
        
                        $display_GPA_S = round($row["GPA_S5"],2);
                        $display_TGPA = round($TGPA,2);
                    }
        }
            //------------------------------------
            if($semester == 6){
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2, GPA_S3,GPA_S4,GPA_S5 ,GPA_S6 , TGPA_S6 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S_1 = $row["GPA_S1"];
                $display_GPA_S_2 = $row["GPA_S2"];
                $display_GPA_S_3 = $row["GPA_S3"];
                $display_GPA_S_4 = $row["GPA_S4"];
                $display_GPA_S_5 = $row["GPA_S5"];
                $display_GPA_S_6 = $row["GPA_S6"];
                $display_TGPA_S6 = $row["TGPA_S6"];
                if($display_GPA_S_6 === "none" && $display_TGPA_S6 == "none"){
                $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5;
                $TGPA = $Calc_TGBA/4;
                $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S6='$SGPA' , TGPA_S6='$TGPA' where unv_id='$unv_id'");
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S6 , TGPA_S6 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                    $display_GPA_S = round($row["GPA_S6"],2);
                    $display_TGPA = round($TGPA,2);
                }
                else{
                $Calc_TGBA =$display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5 + $display_GPA_S_6;
                $TGPA = $Calc_TGBA/6;

                    $display_GPA_S = round($row["GPA_S6"],2);
                    $display_TGPA = round($TGPA,2);
                }
        }
            //------------------------------------
            if($semester == 7){
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2, GPA_S3,GPA_S4,GPA_S5 ,GPA_S6 ,GPA_S7 , TGPA_S7 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S_1 = $row["GPA_S1"];
                $display_GPA_S_2 = $row["GPA_S2"];
                $display_GPA_S_3 = $row["GPA_S3"];
                $display_GPA_S_4 = $row["GPA_S4"];
                $display_GPA_S_5 = $row["GPA_S5"];
                $display_GPA_S_6 = $row["GPA_S6"];
                $display_GPA_S_7 = $row["GPA_S7"];
                $display_TGPA_S7 = $row["TGPA_S7"];
                if($display_GPA_S_7 === "none" && $display_TGPA_S7 == "none"){
                $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5 + $display_GPA_S_6;
                $TGPA = $Calc_TGBA/4;
                $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S7='$SGPA' , TGPA_S7='$TGPA' where unv_id='$unv_id'");
                $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S7 , TGPA_S7 from students where unv_id='$unv_id'");
                $row=mysqli_fetch_array($display_SGPA_TGPA);
                    $display_GPA_S = round($row["GPA_S7"],2);
                    $display_TGPA = round($TGPA,2);
                }
                else{
                $Calc_TGBA =$display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5 + $display_GPA_S_6 + $display_GPA_S_7;
                $TGPA = $Calc_TGBA/7;

                    $display_GPA_S = round($row["GPA_S7"],2);
                    $display_TGPA = round($TGPA,2);
                }
        }
        //------------------------------------
        if($semester == 8){
            $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S1 ,GPA_S2, GPA_S3,GPA_S4,GPA_S5 ,GPA_S6 ,GPA_S7, GPA_S8 , TGPA_S8 from students where unv_id='$unv_id'");
            $row=mysqli_fetch_array($display_SGPA_TGPA);
            $display_GPA_S_1 = $row["GPA_S1"];
            $display_GPA_S_2 = $row["GPA_S2"];
            $display_GPA_S_3 = $row["GPA_S3"];
            $display_GPA_S_4 = $row["GPA_S4"];
            $display_GPA_S_5 = $row["GPA_S5"];
            $display_GPA_S_6 = $row["GPA_S6"];
            $display_GPA_S_7 = $row["GPA_S7"];
            $display_GPA_S_8 = $row["GPA_S8"];
            $display_TGPA_S8 = $row["TGPA_S8"];
            if($display_GPA_S_8 === "none" && $display_TGPA_S8 == "none"){
            $Calc_TGBA = $SGPA + $display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5 + $display_GPA_S_6 + $display_GPA_S_7;
            $TGPA = $Calc_TGBA/4;
            $update_SGPA_TGPA = mysqli_query($connection , "update students set GPA_S8='$SGPA' , TGPA_S8='$TGPA' where unv_id='$unv_id'");
            $display_SGPA_TGPA = mysqli_query($connection ,"select GPA_S8 , TGPA_S8 from students where unv_id='$unv_id'");
            $row=mysqli_fetch_array($display_SGPA_TGPA);
                $display_GPA_S = round($row["GPA_S8"],2);
                $display_TGPA = round($TGPA,2);
            }
            else{
            $Calc_TGBA =$display_GPA_S_1 + $display_GPA_S_2 + $display_GPA_S_3 + $display_GPA_S_4 + $display_GPA_S_5 + $display_GPA_S_6 + $display_GPA_S_7 + $display_GPA_S_8;
            $TGPA = $Calc_TGBA/8;

                $display_GPA_S = round($row["GPA_S8"],2);
                $display_TGPA = round($TGPA,2);
            }
        }   
   /*else{
        if($SGPA > 3.50){
        echo "ممتاز";
    }
    if($SGPA > 3){
        echo "جيد جدا";
    }
    if($SGPA > 2.50){
        echo "جيد";
    }
       if($SGPA > 2){
           echo "مقبول";
       }
   }
   */
   echo "الفصلي ". $display_GPA_S . "<br>";
   echo "التراكمي ". $display_TGPA . "<br>";
        
        }
        }
       

    
    ?>
</body>
</html>