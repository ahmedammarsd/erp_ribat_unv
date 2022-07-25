<?php
session_start();
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
    <title>الدفع الالكتروني</title>
</head>
<body>
<form action="recive_data.php" method="post">
        <div class="form-group">
            <select name="bank" id="" class="form-select">
                <option value="none">----Select Bank---</option>
                <option value="krt">Bank Al-kartoum</option>
                <option value="fisal">Fisal Bank</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">رقم الحساب</label>
            <input type="number" name="account_number" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">رقم الايبان الخاص بالحساب</label>
            <input type="number" name="ipan" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">رسوم التسجيل</label>
            <input type="number" name="fee_reg" id="" class="form-control" value="<?php echo $register_fee; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">رسوم السمستر</label>
            <input type="number" name="semester_reg" id="" class="form-control" value="<?php echo $fee_semester; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">المجموع الكلي للرسوم</label>
            <input type="number" name="total_price" id="" class="form-control" value="<?php echo $fee_semester + $register_fee; ?>" readonly>
        </div>
        <div class="roww">
        <div>
            <input type="submit" value="Pay" name="pay" class="btn btn-primary">
        </div>
        </div>
    </form>
</body>
</html>