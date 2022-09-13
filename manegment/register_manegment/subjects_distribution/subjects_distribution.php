<?php
include "../../../connection/connection.php";
session_start();
$name_user =$_SESSION["full_name_reg"];
if(isset($_POST["add_info"])){
    $name_subject2 = $_POST["name_subject"];
    $name_tetcher = $_POST["name_tetcher"];
    $type_certificate = $_POST["type_certificate"];
    $department = $_POST["department"];
    $batch = $_POST["batch"];
    $study_year = $_POST["study_year"];
    $semester = $_POST["semester"];
    $username = $_POST["username"];
    $year = date("y");
    $date = date("Y-m-d");
    $hours = date("h:m:s");

    if($name_subject2 == "none"){
        echo "<script>alert('عذرا الرجاء تحديد المادة')</script>";
    }
    elseif($name_tetcher == "none"){
        echo "<script>alert('عذرا الرجاء تحديد الاستاذ')</script>";
    }
    elseif($type_certificate == "none"){
        echo "<script>alert('عذرا الرجاء تحديد الشهادة')</script>";
    }
    elseif($department == "none"){
        echo "<script>alert('عذرا الرجاء تحديد القسم')</script>";
    }
    elseif($batch == "none"){
        echo "<script>alert('عذرا الرجاء تحديد الدفعة')</script>";
    }
    elseif($study_year == "none"){
        echo "<script>alert('عذرا الرجاء تحديد السنة الدراسية')</script>";
    }
    elseif($semester == "none"){
        echo "<script>alert('عذرا الرجاء تحديد السمستر')</script>";
    }
    elseif($study_year == "الاولى" && ($semester == 3 || $semester == 4 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8)){
       // if($semester == 3 || $semester == 4 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8){
        echo "<script>alert('عذرا السنة الاولى تقبل السمستر الاول والثاني فقط')</script>";
       // }
    }
    elseif($study_year == "الثانية" && ($semester == 1 || $semester == 2 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8)){
       // if($semester == 1 || $semester == 2 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8){
        echo "<script>alert('عذرا السنة الثانية تقبل السمستر الثالث والرابع فقط')</script>";
       // }
    }
    elseif($study_year == "الثالثة"  && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 7 || $semester == 8)){
        //if($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 7 || $semester == 8){
        echo "<script>alert('عذرا السنة الثالثة تقبل السمستر الخامس والسادس فقط')</script>";
        //}
    }
    elseif($study_year == "الرابعة" && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 5 || $semester == 6)){
      //  if($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 5 || $semester == 6){
        echo "<script>alert('عذرا السنة الرابعة تقبل السمستر السابع والثامن فقط')</script>";
       // }
    }
    else{
        //عرض عدد ساعات المادة ودخالها
        $display_hours_subject_for_insert = mysqli_query($connection , "select number_hours_subject from subjects where name_subject='$name_subject2' ");
        $value_hour = mysqli_fetch_array($display_hours_subject_for_insert);
        $value_hour2 = $value_hour["number_hours_subject"];
        if($display_hours_subject_for_insert && $value_hour2 != ""){
            $insert_data = mysqli_query($connection , "insert into distribution_subject (name_subject , name_tetcher , type_certifcate_unv ,department, batch ,study_year, semester,number_of_hour_subject, username, year, date, hours)
               value ('$name_subject2','$name_tetcher','$type_certificate','$department','$batch','$study_year','$semester','$value_hour2','$username','$year','$date','$hours')");
       if($insert_data){
           echo "<script>alert('تم التحديد بنجاح')</script>";
       }      
       else{
          echo "<script>alert('عذرا حدث خطا في التحديد')</script>";
       }  
        }
        else{
            echo "<script>alert('عذرا حدث خطا في التحديد الرجاء الاتصال بالمطور')</script>";
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
    <link rel="stylesheet" href="../../../css/dashboard.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../../../css/manegment/Register/Subject Distribution.css?v=<?php echo time();?>">
    <title>Subject Distribution</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
         </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../add_subject/add_subject.php"><li ><img src="../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../subjects_distribution/subjects_distribution.php"><li class="active" ><img src="../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../fees_for_batchs/fees_for_batchs.php"><li><img src="../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
            <a href="../exams/distribution_tetcher_for_subject/distribution_tetcher_for_subject.php"><li><img src="../../../icons/dt.png" alt="" width="40px" height="40px">Teacher Distribution</li></a>
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
            </div>
            <div class="log">
            <a href="../../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form">
    <form action="" method="post">
    <div class="roww">
        <div class="form-group">
            <label for="" class="lead"> Select Subject </label>
            <select name="name_subject" id="" class="form-select">
                <option value="none">--- Select Subject ---</option>
                <?php
                //عرض المواد لاختيار المادة
                $display_subject = mysqli_query($connection , "select name_subject from subjects");
                if($display_subject){
                    while($row = mysqli_fetch_array($display_subject)){
                        $name_subject = $row["name_subject"];

                        echo "<option value='$name_subject'>$name_subject</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="lead"> Select Teacher </label>
            <select name="name_tetcher" id="" class="form-select">
            <option value="none">--- Select TeAcher ---</option>
            <?php
                //عرض الاساتذة للاختيار
                $display_subject = mysqli_query($connection , "select full_name from tetchers");
                if($display_subject){
                    while($row = mysqli_fetch_array($display_subject)){
                        $full_name = $row["full_name"];

                        echo "<option value='$full_name'>$full_name</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div  class="form-group">
        <label for="" class="lead"> Select  The Type Certificate </label>
            <select name="type_certificate" id="" class="form-select">
                <option value="none">--- Select The Certificate ---</option>
                <option value="بكلاريوس">Bachelors</option>
                <option value="دبلوم">Diploma</option>
            </select>
        </div>   
    </div>
    <div class="roww">
        <div  class="form-group">
        <label for="" class="lead"> Select Section </label>
            <select name="department" id="" class="form-select">
                <option value="none">--- Select The Saction ---</option>
                <option value="تقنية معلومات">Information Technology</option>
                <option value="علوم حاسوب">Computer Science</option>
            </select>
        </div>
            <div  class="form-group">
            <label for="" class="lead"> Select Batch </label>
                <select name="batch" id="" class="form-select">
                    <option value="none">--- Select The Batch ---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div  class="form-group">
            <label for="" class="lead"> Select Study Year</label>
                <select name="study_year" id="" class="form-select">
                    <option value="none">--- Select The Study Year ---</option>
                    <option value="الاولى">First Year</option>
                    <option value="الثانية">Second Year</option>
                    <option value="الثالثة">Third Year</option>
                    <option value="الرابعة">Fourth Year</option>
                </select>
            </div>
    </div>
            <div  class="form-group">
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
            <div  class="form-group">
                <input type="submit" value="Add" name="add_info" class="btn btn-primary">
            </div>
            <div>
                <input type="text" name="username" value="<?php echo $name_user; ?>" id="" hidden>
            </div>

    </form>
    
</body>
</html>