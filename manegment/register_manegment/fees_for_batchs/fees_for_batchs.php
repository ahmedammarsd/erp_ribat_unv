<?php
include "../../../connection/connection.php";
session_start();
$name_user =$_SESSION["full_name_reg"];

if(isset($_POST["add_fees"])){
    $department = $_POST["department"];
    $type_certificate = $_POST["type_certificate"];
    $batch = $_POST["batch"];
    $register_fee = $_POST["register_fee"];
    $year_fee = $_POST["year_fee"];
    $username = $_POST["username"];
    $date = date("Y-m-d");
    $hour = date("h:m:s");
    
    $insert_date_fees = mysqli_query($connection , "insert into fees_for_batchs (department,type_certificate,batch,register_fee,year_fee,username,date ,hours)
     value ('$department','$type_certificate','$batch','$register_fee','$year_fee','$username','$date','$hour') ");
     if($insert_date_fees){
         echo "<script>alert('تم تحديد الرسوم بنجاح')</script>";
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
    <link rel="stylesheet" href="../../../css/manegment/Register/fees_for_batchs.css?v=<?php echo time();?>">
    <title>نحديد الرسوم الدراسية</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
         </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../add_subject/add_subject.php"><li ><img src="../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../subjects_distribution/subjects_distribution.php"><li><img src="../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
            <a href="../fees_for_batchs/fees_for_batchs.php"><li  class="active"><img src="../../../icons/fb.png" alt="" width="40px" height="40px">Fees For Batchs</li></a>
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
    <div  class="form-group">
        <label for="" class="lead"> Select Section </label>
            <select name="department" id="" class="form-select">
                <option value="none">--- Select The Saction ---</option>
                <option value="تقنية معلومات">Information Technology</option>
                <option value="علوم حاسوب">Computer Science</option>
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
        <div>
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
    </div>
    <div class="roww">
            <div  class="form-group">
            <label for="" class="lead"> Enter Register fees </label>
            <input type="text" name="register_fee" id="" placeholder ="Enter Register fees" class="form-control">
            </div>
            <div  class="form-group bssa">
            <label for="" class="lead">  Enter Study Fees </label>
            <input type="text" name="year_fee" id=""placeholder="Enter Study fees" class="form-control">
            </div>
            </div>
        </div>
        <div  class="form-group">
            <input type="Submit"  name="add_fees" value="Confirm" class=" btn btn-primary bss2">
        </div>
        <div>
            <input type="text" name="username" value="<?php echo $name_user; ?>" hidden>
        </div>
    </form>
</div>
</div>
</body>
</html>