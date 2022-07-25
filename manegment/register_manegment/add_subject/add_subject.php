<?php
include "../../../connection/connection.php";
session_start();
$name_user =$_SESSION["full_name_reg"];

if(isset($_POST["add_subject"])){
    $name_subject = $_POST["name_subject"];
    $hours_subject = $_POST["hours_subject"];
    $username = $_POST["username"];
    $date = date("Y-m-d");
    $hours = date("h:m:s");

    if($hours_subject == 0){
        echo "<script>alert('عذرا لا يمكن ان يكون عدد الساعات = 0')</script>";
    }
    elseif($hours_subject > 15) {
        echo "<script>alert('عذرا لايمكن ان يتخطى عدد ساعات الماده 15')</script>";
    }
    else{

        $insert_subject = mysqli_query($connection , "insert into subjects (name_subject ,number_hours_subject , user_name, date , hour)
        value ('$name_subject','$hours_subject','$username','$date','$hours')");

   if($insert_subject){
       echo "<script>alert('تمت اضافة المادة')</script>";
   }    
   else{
       echo "<script>alert('عذرا لم تتم عملية الاضافة')</script>";
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
    <link rel="stylesheet" href="../../../css/manegment/Register/add_subject.css?v=<?php echo time();?>">
    <title> Add Subject</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Register</h2>
         </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../add_subject/add_subject.php"><li class="active"><img src="../../../icons/sub2.png" alt="" width="40px" height="40px"> Add Subject</li></a>
            <a href="../subjects_distribution/subjects_distribution.php"><li><img src="../../../icons/ds.png" alt="" width="40px" height="40px">Subject Distribution</li></a>
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
            <a href="../../login/login.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form-change">
    <form action="" method="post">
        <div class="form-group">
            <label for="" class="lead">Subject Name</label>
            <input type="text" name="name_subject" id=""  class="form-control" placeholder=" Enter Subject Name" required>
        </div>
        <div class="form-group">
            <label for="" class="lead">The Number Of Hours</label>
            <input type="number" name="hours_subject" id="" class="form-control"placeholder=" Enter  Number Of Hours "  required>
        </div>
        <div class="form-group">
            <input type="submit" value="Add" name="add_subject" class="btn btn-primary" >
        </div>
        <div>
            <input type="text" name="username" value="<?php echo $name_user;?>" hidden>
        </div>
    </form>
</div>
</div>
</body>
</html>