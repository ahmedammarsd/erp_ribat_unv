<?php

include "../../../connection/connection.php";
session_start();
$user_name =$_SESSION["user_admin_scientific_affairs"]; 
$display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
$name_user = mysqli_fetch_array($display_info_user)["full_name"];
$_SESSION["full_name_scientific_affairs"] = $name_user;

$id_std = $_GET["std_id"];

if(isset($_POST["submit"])){
    $notes = $_POST["the_note"];

    $add_notes = mysqli_query($connection , "update new_std_form_info set notes_not_submit = '$notes' where id = '$id_std'");
    $update_for_un_submit_the_info = mysqli_query($connection , "update new_std_form_info set review = 'bad' where id='$id_std'");
    if($add_notes && $update_for_un_submit_the_info){
        echo "<script>alert('تم تحديد الملاحظة  بنجاح');
        window.location.href='../info_std_electronic_register/info_std_electronic_register.php';</script>";
       // header("location: ../info_std_electronic_register/info_std_electronic_register.php");
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
    <link rel="stylesheet" href="../../../css/manegment/scintific_affairs/un_submit_info.css?v=<?php echo time();?>">
    <title>الملاحظة عدم التاكيد</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../../icons/da.png" alt="" width="50px" height="50px">Scintific Affairs</h2>
                </div>
        <ul>
            <a href="../statics/statics.php"><li><img src="../../../icons/statc1.png" alt="" width="40px" height="40px">Statics</li></a>
            <a href="../info_std_electronic_register/info_std_electronic_register.php"><li class="active"><img src="../../../icons/stdifo1.png" alt="" width="40px" height="40px"> Students Information</li></a>
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
    <div class="form-group">
        <label for="" class="lead">Write Notes To Not Confirm The Student data </label>
        <textarea name="the_note" id="" cols="30" rows="10" class="textarea" placeholder=" Write Notes Her"></textarea>
    </div>
    <div class="roww">
       <input type="submit" value="OK" name="submit" class="btn btn-primary">
    </div>
    </form>
</div>
</div>
</body>
</html>