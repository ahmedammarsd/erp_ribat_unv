<?php
include "../../../../connection/connection.php";
session_start();
$name_user =$_SESSION["full_name_reg"];
if(isset($_POST["add_info_exams"])){
    $name_subject2 = $_POST["name_subject"];
    $name_tetcher = $_POST["name_tetcher"];
    $type_certificate = $_POST["type_certificate"];
    $department = $_POST["department"];
    $batch = $_POST["batch"];
    $study_year = $_POST["study_year"];
    $semester = $_POST["semester"];
    $type_exams = $_POST["type_exams"];
    $date_of_exam = $_POST["date_of_exam"];
    $username = $_POST["username"];
    $year = date("y");
    $date = date("Y-m-d");
    $hours = date("h:m:s");

    if($name_subject2 == "none"){
        echo "<script>alert('Sorry, Please Select The Subject ')</script>";
    }
    elseif($name_tetcher == "none"){
        echo "<script>alert('Sorry, Please Select A Teacher')</script>";
    }
    elseif($type_certificate == "none"){
        echo "<script>alert('Sorry, please Select The Certificate')</script>";
    }
    elseif($department == "none"){
        echo "<script>alert('Sorry, Please Select The Department')</script>";
    }
    elseif($batch == "none"){
        echo "<script>alert('Sorry, Please Select The Batch')</script>";
    }
    elseif($study_year == "none"){
        echo "<script>alert('Sorry, Please Select The Study Year')</script>";
    }
    elseif($semester == "none"){
        echo "<script>alert('Sorry, please select a Semester')</script>";
    }
    elseif($type_exams == "none"){
        echo "<script>alert('Sorry, please select a Semester')</script>";
    }
    elseif($study_year == "First" && ($semester == 3 || $semester == 4 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8)){
       // if($semester == 3 || $semester == 4 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8){
        echo "<script>alert('Sorry, The First Year Only Accepts The First nd Second Semester')</script>";
       // }
    }
    elseif($study_year == "Second" && ($semester == 1 || $semester == 2 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8)){
       // if($semester == 1 || $semester == 2 || $semester == 5 || $semester == 6 || $semester == 7 || $semester == 8){
        echo "<script>alert('Sorry, The Second Year Only Accepts The Third And Fourth Semester')</script>";
       // }
    }
    elseif($study_year == "Third"  && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 7 || $semester == 8)){
        //if($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 7 || $semester == 8){
        echo "<script>alert('Sorry, The Third Year Only Accepts The Fifth Snd Sixth Semester')</script>";
        //}
    }
    elseif($study_year == "Fourth" && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 5 || $semester == 6)){
      //  if($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4 || $semester == 5 || $semester == 6){
        echo "<script>alert('Sorry, The Fourth Year Only Accepts The Seventh And Eighth Semester')</script>";
       // }
    }
    else{
       $insert_data = mysqli_query($connection , "insert into distribution_tetcher_exams (name_subject , name_tetcher , type_certificate ,department, batch ,study_year, semester,type_exam, date_of_exam , username, year, date, hours)
               value ('$name_subject2','$name_tetcher','$type_certificate','$department','$batch','$study_year','$semester','$type_exams','$date_of_exam','$username','$year','$date','$hours')");
       if($insert_data){
           echo "<script>alert('Successfully Selected')</script>";
       }      
       else{
          echo "<script>alert('Sorry, There Was An Error In The Selection')</script>";
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
    <link rel="stylesheet" href="../../../../css/all.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/manegment/Register/distribution_tetcher_for_subject.css?v=<?php echo time();?>">
    <title>distribution_tetcher_for_subject</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
         </div>
        <ul>
            <a href="../../statics/statics.php"><li><img src="../../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../../add_subject/add_subject.php"><li ><img src="../../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../../subjects_distribution/subjects_distribution.php"><li><img src="../../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../../fees_for_batchs/fees_for_batchs.php"><li><img src="../../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
            <a href="../../exams/distribution_tetcher_for_subject/distribution_tetcher_for_subject.php"><li class="active"><img src="../../../../icons/dt.png" alt="" width="40px" height="40px">Teacher Distribution</li></a>
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../../account/account.php"><img src="../../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
            </div>
            <div class="log">
            <a href="../../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
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
        <div>
        <label for="" class="lead"> Select Teacher </label>
            <select name="name_tetcher" id="" class="form-select">
            <option value="none">--- Select Teacher ---</option>
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
                <option value="بكلاريوس">pacliryos</option>
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
    <div class="roww">
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
            <label for="" class="lead"> Select Type Of Exams </label>
                <select name="type_exams" id=""class="form-select">
                    <option value="none">--- Select Type Exams ---</option>
                    <option value="normal">Final Exams</option>
                    <option value="sub_exams">Supplements Exams</option>
                </select>
            </div>
            <div class="form-group">
            <label for="" class="lead"> Select Exam date </label>
                <input type="date" name="date_of_exam" id="" class="form-control">
            </div>
            </div>
        
            <div class="form-group">
                <input type="submit" value="Identification" name="add_info_exams" class="btn btn-primary">
            </div>
            <div >
                <input type="text" name="username" value="<?php echo $name_user; ?>" id="" hidden>
            </div>
    </form>
    
</body>
</html>