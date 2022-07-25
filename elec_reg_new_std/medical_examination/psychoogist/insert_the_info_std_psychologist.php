<?php
include "../../../connection/connection.php";
$id_std = $_GET["std_id"];
session_start();
$name_user = $_SESSION["full_name_doctor"] ;
$specialization = $_SESSION["specialization_doctor"];

if($specialization != "Psychologist"){
echo "<script>alert('Sorry, You don\'t have permissions');
 window.location.href='../statics/statics.php'</script>";
}
$dispaly_name_and_college_std = mysqli_query($connection , "select form_number ,name_std , college from new_std_form_info where id= '$id_std'");
$row = mysqli_fetch_array($dispaly_name_and_college_std);
$form_number = $row["form_number"];
$name_std = $row["name_std"];
$college = $row["college"];



if(isset($_POST["submit"])){
    $name_std1 = $_POST["name_std"];
    $college1 = $_POST["college"];
    $form_number1 = $_POST["form_number"];
    $answer_q1 = $_POST["answer_q1"];
    $answer_q2 = $_POST["answer_q2"];
    $answer_q3 = $_POST["answer_q3"];
    $answer_q4 = $_POST["answer_q4"];
    $date = date("Y-m-d");
    $hours = date("h:m:s");
    $year = date("y");
    
    $insert_info_med = mysqli_query($connection , "insert into med_psychologist (form_number,name, college, answer_q1 , answer_q2 , answer_q3, answer_q4 , date , hours , year) value ('$form_number1','$name_std1','$college1','$answer_q1','$answer_q2', '$answer_q3' , '$answer_q4','$date','$hours','$year')");
    if($insert_info_med){
        $update_med_optics_submit = mysqli_query($connection , "update new_std_form_info set psychologist='done' where id='$id_std' ");
        if($update_med_optics_submit){
            echo "<script>alert('تمت الكشف  بنجاح');
            window.location.href='display_std_for_psychologist_exm.php';</script>";
            //header("location: display_std_for_psychologist_exm.php");
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
    <title>كشف الطبيب النفسي</title>
</head>
<body>
    <form action="" method="post">
        <div>

        رقم الاستمارة
        <input type="text" name="form_number"  value="<?php echo $form_number ?>" id="">
        <br>
             الاسم
            <input type="text" name="name_std" value="<?php echo $name_std ?>" id="">
            <br>
            الكلية
            <input type="text" name="college" value="<?php echo $college ?>" id="">
            
        </div>
        <br>
        <div>
            الطبيب النفسي
            <div>
               رقم كم في الاسرة
               <input type="number"name="answer_q1" id="">
            </div>
            <div>
               هل ابواه منفصلين
                <textarea name="answer_q2" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
               هل لديه مريض نفسي في الاسرة
                <textarea name="answer_q3" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
              هل ذهبت او فكرة في ان تذهب الى طبيب نفسي
                <textarea name="answer_q4" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <input type="submit" value="تاكيد" name="submit">
        
    </form>
    
</body>
</html>