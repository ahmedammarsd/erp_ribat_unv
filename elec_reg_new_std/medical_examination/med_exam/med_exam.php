<?php
include "../../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الكشف الطبي</title>
</head>
<body>
    <form action="" method="post">
        <div>
            البصريات
            <div>
                كشف النظر
                <input type="text" name="exm_eye" id="">
            </div>
            <div>
                هل لديه اي اصابة في العين او اصابة حصلت قبل مدة؟
                <textarea name="injurs_eye" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <hr>

        
        <div>
            الطبيب
            <div>
                هل عمل عملية قبل كدا؟
                <textarea name="operations" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                هل لديه مرض مزمن
                <textarea name="sick_long" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                هل يعاني من اي شي في الجسد 
                <textarea name="anything_body" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
               هل لديه اي مرض وراثي في الاسرة 
                <textarea name="family_sick" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <hr>
        <div>
            الطبيب النفسي
        </div>
    </form>
</body>
</html>