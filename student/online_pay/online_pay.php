<?php
session_start();
$unv_id = $_SESSION["unv_id"];
$name_std = $_SESSION["name_std"];
$register_fee = $_SESSION["register_fee"] ;
$year_fee=$_SESSION["year_fee"];
$semester_reg_pay = $_SESSION["semester_reg_pay"];
if($semester_reg_pay == 2 || $semester_reg_pay == 4 || $semester_reg_pay== 6 || $semester_reg_pay== 8){
    $register_fee = "0";
}
$fee_semester = $year_fee/2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/manegment/student/online_pay.css?v=<?php echo time();?>">
    <title>online_pay</title>
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h2><img src="../../icons/da.png" alt="" width="50px" height="50px">Student</h2>
        </div>
        <ul>
        <a href="../display_result/display_result.php"><li><img src="../../icons/re.png" alt="" width="40px" height="40px">Result</li></a>
        <a href="../elec_reg/elec_reg.php"><li class="active"><img src="../../icons/reg.png" alt="" width="40px" height="40px">Register</li></a>   
        </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div>
            <h3><a href="../profile_std/profile_std.php"><img src="../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_std ?></h3>
            </div>
            <div class="log">
            <a href="../logout/logout.php"><div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div></a>
            </div>
        </div>
    </div>
<div class="form">
<form action="recive_data.php" method="post">
<div class="row">
         <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for=""class="lead">Select Bank</label>
                <select name="bank" id="" class="form-select">
                    <option value="none"> Select Bank </option>
                    <option value="krt">Bank Al-kartoum</option>
                    <option value="fisal">Fisal Bank</option>
                </select>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Bank Account Number</label>
            <input type="number" name="account_number" id="" class="form-control" required>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">IPIN</label>
            <input type="number" name="ipan" id="" class="form-control" required>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Register Fees</label>
            <input type="number" name="fee_reg" id="" class="form-control" value="<?php echo $register_fee; ?>" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Semester Fees</label>
            <input type="number" name="semester_reg" id="" class="form-control" value="<?php echo $fee_semester; ?>" readonly>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-xs-12">
            <label for="" class="lead">Total Fees</label>
            <input type="number" name="total_price" id="" class="form-control" value="<?php echo $fee_semester + $register_fee; ?>" readonly>
        </div>
        <div class="roww">
        <div class="form-group col-lg-12 col-md-12 col-xs-12">
            <input type="submit" value="Pay" name="pay" class="btn btn-primary">
        </div>
        </div>
    </form>
</body>
</html>